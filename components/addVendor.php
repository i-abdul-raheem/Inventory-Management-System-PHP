<div class="modal fade" id="addVendorModal" tabindex="-1" role="dialog" aria-labelledby="addVendorModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="add-vendor-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVendorModalTitle">Add Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="vendorCompany" class="form-label">Company Name<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="company_name" id="vendorCompany" placeholder="Enter Company Name" required />
                </div>
                <div class="mb-3">
                    <label for="vendorContact" class="form-label">Contact Person<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="contact_person" id="vendorContact" placeholder="Enter Contact Person" required />
                </div>
                <div class="mb-3">
                    <label for="vendorPhone" class="form-label">Phone<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="phone" id="vendorPhone" placeholder="Enter Phone Number" required />
                </div>
                <div class="mb-3">
                    <label for="vendorEmail" class="form-label">Email<super style="color:red;">*</super></label>
                    <input class="form-control" type="email" name="email" id="vendorEmail" placeholder="Enter Email" required />
                </div>
                <div class="mb-3">
                    <label for="vendorAddress" class="form-label">Address<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="address" id="vendorAddress" placeholder="Enter Address" required />
                </div>
                <div class="mb-3">
                    <label for="vendorVat" class="form-label">VAT #<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="vat_number" id="vendorVat" placeholder="Enter VAT #" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>