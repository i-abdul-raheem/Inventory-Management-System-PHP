<?php
$active = "inventory";
$titleButton = false;
$titleIcon = "";
$titleText = "";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");

$connection = new SQLite3('api/database.db');
if (!$connection) {
    die("Connection failed: " . $connection->lastErrorMsg());
}

// Fetch sell and purchase orders in a single query
$query = "
    SELECT * FROM orders 
    WHERE status = 'delivered' 
    AND (type = 'sell' OR type = 'purchase')
";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

$sell_ids = [];
$purchase_ids = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if ($row["type"] === "sell") {
        $sell_ids[] = $row["id"];
    } elseif ($row["type"] === "purchase") {
        $purchase_ids[] = $row["id"];
    }
}
$stmt->close();

// Fetch all order items at once for both sell and purchase orders
$order_ids = array_merge($sell_ids, $purchase_ids);
$order_ids_str = implode(',', array_fill(0, count($order_ids), '?'));
$query = "SELECT * FROM order_items WHERE order_id IN ($order_ids_str)";
$stmt = $connection->prepare($query);
foreach ($order_ids as $index => $id) {
    $stmt->bindValue($index + 1, $id, SQLITE3_INTEGER);
}
$result = $stmt->execute();

$items_sold = [];
$items_purchased = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if (in_array($row['order_id'], $sell_ids)) {
        $items_sold[] = $row;
    } elseif (in_array($row['order_id'], $purchase_ids)) {
        $items_purchased[] = $row;
    }
}
$stmt->close();

// Fetch all materials at once
$query = "SELECT * FROM materials";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

$materials = [];
$m_list = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $query1 = "SELECT * FROM categories WHERE id = :id";
    $stmt1 = $connection->prepare($query1);
    $stmt1->bindValue(':id', $row["category"], SQLITE3_INTEGER);
    $result1 = $stmt1->execute();
    $cat = $result1->fetchArray(SQLITE3_ASSOC);
    $row['quantity'] = 0;  // Initialize quantity
    $row['category_title'] = $cat['title'];
    $materials[] = $row;
    $m_list[$row['id']] = $row;
}
$stmt->close();

// Adjust material quantities based on sold and purchased items
foreach ($items_sold as $item) {
    $material_id = $item['material_id'];
    $quantity_sold = $item['received'];
    if (isset($m_list[$material_id])) {
        $m_list[$material_id]['quantity'] -= $quantity_sold;  // Decrease quantity
    }
}
foreach ($items_purchased as $item) {
    $material_id = $item['material_id'];
    $quantity_purchased = $item['received'];
    if (isset($m_list[$material_id])) {
        $m_list[$material_id]['quantity'] += $quantity_purchased;  // Increase quantity
    }
}

$items = array_values($m_list);

?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Inventory"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of inventory</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Quantity</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Quantity</th>
                            <th>Category</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $index_inv = 1;
                        foreach ($items as $item) {
                        ?>
                            <tr>
                                <td><?= $index_inv ?></td>
                                <td><?= $item['title'] ?></td>
                                <td><?= $item['code'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $item['category_title'] ?></td>
                            </tr>
                        <?php
                            $index_inv++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require("./components/footer.php");
?>