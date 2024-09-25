<?php
$active = "reports";
$titleButton = false;
$titleIcon = "";
$titleText = "";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");
?>
<!-- Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php titleBar("Reports", "addReportModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Generate report(s)</h6>
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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sales Report</td>
                            <td>
                                <button data-toggle="modal" data-target="#addReportModal" class="btn btn-primary" data-type="sales"><i class="fa fa-file-pdf"></i> Generate</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Purchase Report</td>
                            <td>
                                <button data-toggle="modal" data-target="#addReportModal" class="btn btn-primary" data-type="purchase"><i class="fa fa-file-pdf"></i> Generate</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Inventory Report</td>
                            <td>
                                <button data-toggle="modal" data-target="#addReportModal" class="btn btn-primary" data-type="inventory"><i class="fa fa-file-pdf"></i> Generate</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require("./components/footer.php");
require("./components/addReport.php");
?>