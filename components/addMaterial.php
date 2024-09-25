<div class="modal fade" id="addMaterialModal" tabindex="-1" role="dialog" aria-labelledby="addMaterialModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="add-material-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMaterialModalTitle">Add Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="materialTitle" class="form-label">Title<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="title" id="materialTitle" placeholder="Enter Title" required />
                </div>
                <div class="mb-3">
                    <label for="materialCode" class="form-label">Code<super style="color:red;">*</super></label>
                    <input class="form-control" type="text" name="code" id="materialCode" placeholder="Enter Code" required />
                </div>
                <div class="mb-3">
                    <label for="materialCategory" class="form-label">Category<super style="color:red;">*</super></label>
                    <select class="form-control" name="category" id="materialCategory" required>
                        <option value="">Select category...</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>