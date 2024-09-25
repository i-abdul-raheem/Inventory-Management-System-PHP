<?php
$active = "orders";
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
$query = "SELECT * FROM orders WHERE id = :id";
$stmt = $connection->prepare($query);
$stmt->bindValue(':id', $_GET['order_id'], SQLITE3_INTEGER);
$result = $stmt->execute();

$order = $result->fetchArray(SQLITE3_ASSOC);
if ($order["customer_id"] != 0) {
    $stmt1 = $connection->prepare("SELECT * FROM customers WHERE id = :id");
    $stmt1->bindValue(':id', $order["customer_id"], SQLITE3_INTEGER);
    $result1 = $stmt1->execute();
    $order["company"] = $result1->fetchArray(SQLITE3_ASSOC);
} else {
    $stmt1 = $connection->prepare("SELECT * FROM vendors WHERE id = :id");
    $stmt1->bindValue(':id', $order["vendor_id"], SQLITE3_INTEGER);
    $result1 = $stmt1->execute();
    $order["company"] = $result1->fetchArray(SQLITE3_ASSOC);
}
$order["items"] = [];
$query = "SELECT * FROM order_items WHERE order_id = :id";
$stmt = $connection->prepare($query);
$stmt->bindValue(':id', $_GET['order_id'], SQLITE3_INTEGER);
$result = $stmt->execute();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $stmt1 = $connection->prepare("SELECT * FROM materials WHERE id = :id");
    $stmt1->bindValue(':id', $row["material_id"], SQLITE3_INTEGER);
    $result1 = $stmt1->execute();
    $row["material"] = $result1->fetchArray(SQLITE3_ASSOC);
    $order['items'][] = $row;
}

?>
<div class="container-fluid">
    <?php titleBar("Order No. ".$_GET['order_id']); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>
        </div>
        <div class="card-body">
            <div class="custom-row">
                <div class="mb-3 input-label">
                    <label for="orderType" class="form-label">Order Type<super style="color:red;">*</super></label>
                    <input class="form-control" name="type" id="orderType" value="<?= $order["type"] ?>" readonly required />
                </div>
                <div class="mb-3 input-label">
                    <label for="orderCompany" class="form-label">Company Name<super style="color:red;">*</super></label>
                    <input class="form-control" name="company" id="orderCompany" value="<?= $order["company"]["company_name"] ?>" readonly required />
                </div>
                <div class="mb-3 input-label">
                    <label for="orderStatus" class="form-label">Order Status<super style="color:red;">*</super></label>
                    <input class="form-control" name="status" id="orderStatus" value="<?= $order["status"] ?>" readonly required />
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Items</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>Ordered QTY</th>
                            <th>Received QTY</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>Ordered QTY</th>
                            <th>Received QTY</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $index_mat = 1;
                        foreach ($order['items'] as $item) {
                        ?>
                            <tr>
                                <td><?= $index_mat ?></td>
                                <td><?= $item['material']['title'] ?> (<?= $item['material']['code'] ?>)</td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $item['received'] ?></td>
                            </tr>
                        <?php
                            $index_mat++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
require("./components/footer.php");
?>