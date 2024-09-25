<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="add-customer-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCustomerModalTitle">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="customerCompany" class="form-label">Company Name<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="company_name" id="customerCompany" placeholder="Enter Company Name" required />
                </div>
                <div class="mb-3">
                    <label for="customerContact" class="form-label">Contact Person<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="contact_person" id="customerContact" placeholder="Enter Contact Person" required />
                </div>
                <div class="mb-3">
                    <label for="customerPhone" class="form-label">Phone<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="phone" id="customerPhone" placeholder="Enter Phone Number" required />
                </div>
                <div class="mb-3">
                    <label for="customerEmail" class="form-label">Email<super style="color:red;">*</super></label>
                    <input class="form-control" type="email" name="email" id="customerEmail" placeholder="Enter Email" required />
                </div>
                <div class="mb-3">
                    <label for="customerAddress" class="form-label">Address<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="address" id="customerAddress" placeholder="Enter Address" required />
                </div>
                <div class="mb-3">
                    <label for="customerVat" class="form-label">VAT #<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="vat_number" id="customerVat" placeholder="Enter VAT #" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>