<!-- Add Sale Modal -->
<div class="modal fade" id="import-purchases" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="importPurchaseLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title" id="importPurchaseLabel">Import Purchase Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
           <div class="modal-body">
               <form action="{{ route('purchases.import.file') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Choose CSV or Excel File</label>
                        <input type="file" name="import_file" class="form-control" accept=".csv, .xlsx, .xls" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Import</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Add Sale Modal -->
