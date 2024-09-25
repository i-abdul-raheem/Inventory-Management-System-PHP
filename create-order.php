<?php
$active = "orders";
$titleButton = true;
$titleIcon = "";
$titleText = "Place Order ";
require("./components/titlebar.php");
require("./components/card.php");
require("./components/header.php");
require("./components/sidebar.php");
?>
<div class="container-fluid">
    <?php titleBar("Create Order", "placeOrderModal"); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>
        </div>
        <div class="card-body">
            <div class="custom-row">
                <div class="mb-3 input-label">
                    <label for="orderType" class="form-label">Order Type<super style="color:red;">*</super></label>
                    <select class="form-control" name="type" id="orderType" onchange="populateCompany(this)" required>
                        <option value="">Select order type...</option>
                        <option value="sell">Sell</option>
                        <option value="purchase">Purchase</option>
                    </select>
                </div>
                <div class="mb-3 input-label">
                    <label for="orderCompany" class="form-label">Company Name<super style="color:red;">*</super></label>
                    <select class="form-control" name="company" id="orderCompany" required>
                        <option value="">Select company...</option>
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
                    <input class="form-control" type="number" value="0" name="quantity" id="orderQuantity" placeholder="QTY" required />
                </div>
                <div class="mb-3 label-button">
                    <button onclick="addToAddOrder()" class="btn btn-secondary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>QTY</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>QTY</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody id="addOrderList">
                        
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
require("./components/confirmPlaceOrder.php");
?>
<script src="/js/main.js"></script>