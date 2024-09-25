<div class="modal fade" id="editMaterialModal" tabindex="-1" role="dialog" aria-labelledby="editMaterialModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="edit-material-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMaterialModalTitle">Edit Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="material-id">
                <div class="mb-3">
                    <label for="material-title" class="form-label">Title<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="title" id="material-title" placeholder="Enter Title" required />
                </div>
                <div class="mb-3">
                    <label for="material-code" class="form-label">Code<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="code" id="material-code" placeholder="Enter Code" required />
                </div>
                <div class="mb-3">
                    <label for="material-cateogry" class="form-label">Category<super style="color:red;">*</super></label>
                    <select class="form-control" name="category" id="material-category" required>
                        <option value="">Select category...</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>