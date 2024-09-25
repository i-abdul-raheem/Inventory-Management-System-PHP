<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="edit-customer-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerModalTitle">Edit Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="customer-id">
                <div class="mb-3">
                    <label for="customerCompany" class="form-label">Company Name<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="company_name" id="customer-company_name" placeholder="Enter Company Name" required />
                </div>
                <div class="mb-3">
                    <label for="customerContact" class="form-label">Contact Person<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="contact_person" id="customer-contact_person" placeholder="Enter Contact Person" required />
                </div>
                <div class="mb-3">
                    <label for="customerPhone" class="form-label">Phone<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="phone" id="customer-phone" placeholder="Enter Phone Number" required />
                </div>
                <div class="mb-3">
                    <label for="customerEmail" class="form-label">Email<super style="color:red;">*</super></label>
                    <input class="form-control" type="email" name="email" id="customer-email" placeholder="Enter Email" required />
                </div>
                <div class="mb-3">
                    <label for="customerAddress" class="form-label">Address<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="address" id="customer-address" placeholder="Enter Address" required />
                </div>
                <div class="mb-3">
                    <label for="customerVat" class="form-label">VAT #<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="vat_number" id="customer-vat_number" placeholder="Enter VAT #" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>