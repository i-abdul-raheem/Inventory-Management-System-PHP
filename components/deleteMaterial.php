<div class="modal fade" id="deleteMaterialModal" tabindex="-1" role="dialog" aria-labelledby="deleteMaterialModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="delete-material-form" class="modal-content">
            <input type="hidden" name="id" id="materialDeleteId">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMaterialModalTitle">Delete Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <p>Are you sure you want to delete this material?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>