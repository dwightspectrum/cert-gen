<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between my-3">
            <h5 class="card-title">BURNER RECORDS</h5>
            <div>
                <input class="dataTable-input search" name="query" placeholder="Search..." type="text">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Burner Id</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Inspector</th>
                        <th scope="col">Place</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="burner-items">
                </tbody>
            </table>
        </div>
        <nav aria-label="..." class="float-end">
            <ul class="pagination" id="item-pagination">
               
            </ul>
        </nav>
    </div>
</div>
<script src="<?=base_url()?>/assets/js/pagination/pagination.js"></script>
<script src="<?=base_url()?>/assets/js/burner/burner_records.js"></script>