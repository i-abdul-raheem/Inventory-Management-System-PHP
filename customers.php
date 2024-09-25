<?php
$active = "customers";
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
$query = "SELECT * FROM customers";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

// Fetch the customers from the result
$customers = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $customers[] = $row;
}
?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Customers", "addCustomerModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of customers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>VAT#</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>VAT#</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $index_cust = 1;
                        foreach ($customers as $customer) {
                        ?>
                            <tr>
                                <td><?= $index_cust ?></td>
                                <td><?= $customer['company_name'] ?></td>
                                <td><?= $customer['contact_person'] ?></td>
                                <td><?= $customer['phone'] ?></td>
                                <td><?= $customer['email'] ?></td>
                                <td><?= $customer['address'] ?></td>
                                <td><?= $customer['vat_number'] ?></td>
                                <td>
                                    <button data-toggle="modal" onclick="setEditCustomerId(<?= $customer['id'] ?>)" data-target="#editCustomerModal" class="btn btn-secondary"><i class="fa fa-edit"></i></button>
                                    <button data-toggle="modal" onclick="setDeleteCustomerId(<?= $customer['id'] ?>)" data-target="#deleteCustomerModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php
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
require("./components/addCustomer.php");
require("./components/editCustomer.php");
require("./components/deleteCustomer.php");
?>

<script src="js/main.js"></script>