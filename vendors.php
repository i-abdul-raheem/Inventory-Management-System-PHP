<?php
$active = "vendors";
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
$query = "SELECT * FROM vendors";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

// Fetch the vendors from the result
$vendors = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $vendors[] = $row;
}
?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Vendors", "addVendorModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of vendors</h6>
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
                        foreach ($vendors as $vendor) {
                        ?>
                            <tr>
                                <td><?= $index_cust ?></td>
                                <td><?= $vendor['company_name'] ?></td>
                                <td><?= $vendor['contact_person'] ?></td>
                                <td><?= $vendor['phone'] ?></td>
                                <td><?= $vendor['email'] ?></td>
                                <td><?= $vendor['address'] ?></td>
                                <td><?= $vendor['vat_number'] ?></td>
                                <td>
                                    <button data-toggle="modal" onclick="setEditVendorId(<?= $vendor['id'] ?>)" data-target="#editVendorModal" class="btn btn-secondary"><i class="fa fa-edit"></i></button>
                                    <button data-toggle="modal" onclick="setDeleteVendorId(<?= $vendor['id'] ?>)" data-target="#deleteVendorModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
require("./components/addVendor.php");
require("./components/editVendor.php");
require("./components/deleteVendor.php");
?>

<script src="js/main.js"></script>