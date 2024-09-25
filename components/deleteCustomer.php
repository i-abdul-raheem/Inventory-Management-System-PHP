<div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="delete-customer-form" class="modal-content">
            <input type="hidden" name="id" id="customerDeleteId">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCustomerModalTitle">Delete Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <p>Are you sure you want to delete this customer?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>