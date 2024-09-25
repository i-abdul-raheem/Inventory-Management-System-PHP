<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="add-category-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="categoryTitle" class="form-label">Title<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="title" id="categoryTitle" placeholder="Enter Title" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="add-category-close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>