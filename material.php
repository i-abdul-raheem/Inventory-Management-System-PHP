<?php
$active = "material";
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
$query = "SELECT * FROM materials";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

// Fetch the material from the result
$material = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $material[] = $row;
}

function getCategory($id)
{
    global $connection;
    $query = "SELECT * FROM categories WHERE id = $id";
    $stmt = $connection->prepare($query);
    $result = $stmt->execute();
    return $result->fetchArray(SQLITE3_ASSOC)["title"];
}
?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Material", "addMaterialModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of material</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $index_item = 1;
                        foreach ($material as $item) {
                        ?>
                            <tr>
                                <td><?= $index_item ?></td>
                                <td><?= $item['title'] ?></td>
                                <td><?= $item['code'] ?></td>
                                <td><?= getCategory($item['category']) ?></td>
                                <td>
                                    <button data-toggle="modal" onclick="setEditMaterialId('<?= $item['code'] ?>')" data-target="#editMaterialModal" class="btn btn-secondary"><i class="fa fa-edit"></i></button>
                                    <button data-toggle="modal" onclick="setDeleteMaterialId('<?= $item['id'] ?>')" data-target="#deleteMaterialModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php
                            $index_item++;
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
require("./components/addMaterial.php");
require("./components/editMaterial.php");
require("./components/deleteMaterial.php");
?>

<script src="js/main.js"></script>