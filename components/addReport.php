<div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="addReportModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="add-report-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReportModalTitle">Add Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="reportStart" class="form-label">Start Date<super style="color:red;">*</super></label>
                    <input class="form-control" type="date" name="start" id="reportStart" required />
                </div>
                <div class="mb-3">
                    <label for="reportEnd" class="form-label">End Date<super style="color:red;">*</super></label>
                    <input class="form-control" type="date" name="end" id="reportEnd" required />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>
    </div>
</div>