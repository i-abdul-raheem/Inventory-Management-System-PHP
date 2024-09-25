<?php
$active = "dashboard";
$titleButton = false;
$titleIcon = "download";
$titleText = "Generate Reports";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");

$connection = new SQLite3('api/database.db');
if (!$connection) {
    die("Connection failed: " . $connection->lastErrorMsg());
}

// Array of table names to count records and their corresponding variable names
$tables = [
    'categories' => 'res_cat',
    'customers' => 'res_cust',
    'materials' => 'res_mat',
    'vendors' => 'res_ven'
];
$counts = [];

// Loop through each table and get the count
foreach ($tables as $table => $varName) {
    $stmt = $connection->prepare("SELECT COUNT(*) as count FROM " . $table);
    if (!$stmt) {
        die("Preparation failed: " . $connection->lastErrorMsg());
    }

    $result = $stmt->execute();
    if (!$result) {
        die("Execution failed: " . $connection->lastErrorMsg());
    }

    $row = $result->fetchArray(SQLITE3_ASSOC);
    $$varName = $row['count'];  // Use variable variables to store counts
}
?>

<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Dashboard"); ?>

    <!-- Content Row -->
    <div class="row">
        <?php Card("primary", "Categories", $res_cat, "list"); ?>
        <?php Card("secondary", "Customers", $res_cust, "users"); ?>
        <?php Card("warning", "Materials", $res_mat, "warehouse"); ?>
        <?php Card("info", "Vendors", $res_ven, "boxes"); ?>
    </div>

    <?php require("./components/pending-orders.php"); ?>
</div>
<?php
require("./components/footer.php");
?>

<script src="js/main.js"></script>