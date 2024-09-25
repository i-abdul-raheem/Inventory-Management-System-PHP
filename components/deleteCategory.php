<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="delete-category-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalTitle">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="deleteCategoryId">
                <p>Are you sure you want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-category-close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>