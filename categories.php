<?php
$active = "categories";
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
$query = "SELECT * FROM categories";
$stmt = $connection->prepare($query);
$result = $stmt->execute();

// Fetch the categories from the result
$categories = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $categories[] = $row;
}
?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid" id="categories">

    <!-- Page Heading -->
    <?php titleBar("Categories", "addCategoryModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody id="categories-tbody">
                        <?php
                        $index_cat = 1;
                        foreach ($categories as $category) {
                            echo '
                            <tr>
                                <td>' . $index_cat . '</td>
                                <td>' . $category['title'] . '</td>
                                <td>
                                    <button data-toggle="modal" data-target="#editCategoryModal" class="btn btn-secondary" data-id="' . $category['id'] . '" data-title="' . $category['title'] . '" onclick="setEditCategoryDetails(' . $category['id'] . ', \'' . $category['title'] . '\')"><i class="fa fa-edit"></i></button>
                                    <button data-toggle="modal" data-target="#deleteCategoryModal" class="btn btn-danger" data-id="' . $category['id'] . '" onclick="setDeleteCategoryId(' . $category['id'] . ')"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            ';
                            $index_cat++;
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
require("./components/addCategory.php");
require("./components/editCategory.php");
require("./components/deleteCategory.php");
?>

<script src="js/main.js"></script>