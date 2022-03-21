<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between my-3">
            <h5 class="card-title">ITEMS</h5>
            <div>
                <input class="dataTable-input" name="query" placeholder="Search..." type="text">
            </div>
        </div>
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Item Id</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Code</th>
                <th scope="col">Serial Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="items">
        </tbody>
        </table>
        <nav aria-label="..." class="float-end">
            <ul class="pagination" id="item-pagination">
               
            </ul>
        </nav>
    </div>
</div>
<script src="assets/js/pagination.js?v=1.0"></script>
<script src="assets/js/items.js?v=1.0"></script>