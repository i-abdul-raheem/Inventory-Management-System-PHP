<?php
$active = "orders";
$titleButton = true;
$titleIcon = "";
$titleText = "Update Order ";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");
?>
<div class="container-fluid" id="edit-order-page">
    <?php titleBar("Update Order", "updateOrderModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>
        </div>
        <div class="card-body">
            <div class="custom-row">
                <div class="mb-3 input-label">
                    <label for="orderType" class="form-label">Order Type<super style="color:red;">*</super></label>
                    <input class="form-control" name="type" id="edit-orderType" readonly required />
                    <input class="form-control" type="hidden" name="id" id="edit-id" value="<?= $_GET['order_id'] ?>" />
                </div>
                <div class="mb-3 input-label">
                    <label for="orderCompany" class="form-label">Company Name<super style="color:red;">*</super></label>
                    <input class="form-control" name="company" id="edit-orderCompany" readonly required />
                </div>
                <div class="mb-3 input-label">
                    <label for="orderStatus" class="form-label">Order Status<super style="color:red;">*</super></label>
                    <select class="form-control" name="status" id="edit-orderStatus" required>
                        <option value="">Select order type...</option>
                        <option value="pending">Pending</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Items</h6>
        </div>
        <div class="card-body">
            <div class="custom-row">
                <div class="mb-3 input-label">
                    <label for="orderCategory" class="form-label">Category<super style="color:red;">*</super></label>
                    <select class="form-control" name="category" id="orderCategory" onchange="populateMaterial(this)" required>
                        <option value="">Select category...</option>
                    </select>
                </div>
                <div class="mb-3 input-label">
                    <label for="orderMaterial" class="form-label">Material<super style="color:red;">*</super></label>
                    <select class="form-control" name="material" id="orderMaterial" required>
                        <option value="">Select material...</option>
                    </select>
                </div>
                <div class="mb-3 input-label">
                    <label for="orderQuantity" class="form-label">Quantity<super style="color:red;">*</super></label>
                    <input class="form-control" type="number" name="quantity" id="orderQuantity" placeholder="QTY" required />
                </div>
                <div class="mb-3 label-button">
                    <button class="btn btn-secondary" onclick="addToEditOrder(<?= $_GET['order_id'] ?>)"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>QTY</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>QTY</th>
                            <th>Received</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody id="editOrderList">
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
require("./components/confirmUpdateOrder.php");
?>
<script src="/js/main.js"></script>