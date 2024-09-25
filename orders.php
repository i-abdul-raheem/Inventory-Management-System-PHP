<?php
$active = "orders";
$titleButton = true;
$titleIcon = "plus";
$titleText = "New";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");

$connection = new SQLite3('api/database.db');
if (!$connection) {
    die("Connection failed: " . $connection->lastErrorMsg());
}
$query = "SELECT * FROM orders";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

// Fetch the orders from the result
$orders = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if ($row["customer_id"] != 0) {
        $stmt1 = $connection->prepare("SELECT * FROM customers WHERE id = :id");
        $stmt1->bindValue(':id', $row["customer_id"], SQLITE3_INTEGER);
        $result1 = $stmt1->execute();
        $row["customer"] = $result1->fetchArray(SQLITE3_ASSOC);
    } else {
        $stmt1 = $connection->prepare("SELECT * FROM vendors WHERE id = :id");
        $stmt1->bindValue(':id', $row["vendor_id"], SQLITE3_INTEGER);
        $result1 = $stmt1->execute();
        $row["vendor"] = $result1->fetchArray(SQLITE3_ASSOC);
    }
    $orders[] = $row;
}
function getOrderTypeColor($type)
{
    if ($type == "sell")
        return "danger";
    return "success";
}
function getOrderStatusColor($type)
{
    if ($type == "cancelled")
        return "danger";
    elseif ($type == "pending")
        return "warning";
    elseif ($type == "shipped")
        return "info";
    return "success";
}
?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Orders", "addOrderModal"); ?>
    <script>
        document.getElementById("addOrderModal-id").addEventListener("click", () => {
            window.location.href = "create-order.php";
        });

        function openEditOrder(id) {
            window.location.href = "edit-order.php?order_id=" + id;
        }

        function openViewOrder(id) {
            window.location.href = "view-order.php?order_id=" + id;
        }
    </script>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>VAT #</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>VAT #</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date Time</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $index_ord = 1;
                        foreach ($orders as $order) {
                        ?>
                            <tr>
                                <td><?= $index_ord ?></td>
                                <td><?= $order['type'] == "sell" ? $order["customer"]["company_name"] : $order["vendor"]["company_name"] ?></td>
                                <td><?= $order['type'] == "sell" ? $order["customer"]["vat_number"] : $order["vendor"]["vat_number"] ?></td>
                                <td class="text-<?= getOrderTypeColor($order["type"]) ?>"><?= $order["type"] ?></td>
                                <td class="text-<?= getOrderStatusColor($order["status"]) ?>"><?= $order["status"] ?></td>
                                <td><?= $order["created_at"] ?></td>
                                <td>
                                    <?php
                                    if ($order["status"] != "cancelled" && $order["status"] != "delivered") {
                                    ?>
                                        <button class="btn btn-secondary" onclick="openEditOrder(<?= $order['id'] ?>)"><i class="fa fa-edit"></i></button>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-success" onclick="openViewOrder(<?= $order['id'] ?>)"><i class="fa fa-eye"></i></button>
                                </td>
                            </tr>
                        <?php $index_ord++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require("./components/footer.php");
?>