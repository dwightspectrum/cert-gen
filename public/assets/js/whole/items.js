const _searchQuery = new URLSearchParams(location.search);
let currPage = _searchQuery.get('page') ? Number(_searchQuery.get('page')) : 1;

getItems(currPage);


async function getItems(page = 1, search = null) {
    const tableData = document.getElementById('items');

    const res = await fetch(`Items/getItems?page=${page}&search=${search ? search : ''}`);
    const data = await res.json();

    tableData.innerHTML = data && data?.items.map((item, index) => {
        return (`
            <tr>
                <td>${item.item_name}</td>
                <td>${item.item_hs_code}</td>
                <td>${item.serial_number}</td>
                <td>
                    <a class="icon" href="#" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                        <i class="bi bi-three-dots" style="font-size: 1.3rem;"></i>
                    </a>
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Choose Certificate</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-xxl-4 col-md-6">
                                            <a href="/certificate-ventilator/${item.serial_number_id}">
                                                <div class="card info-card sales-card card-modal">
                                                    <div class="card-body">
                                                    <h5 class="card-title"><span>Maintenance</span></h5>
                                                        <div class="d-flex align-items-center">
                                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                                <i class="ri-honor-of-kings-line"></i>
                                                            </div>
                                                            <div class="ps-3">
                                                                <span class="pt-1 fw-bold fs-5" style="color: #4154f1;">VENTILATOR</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xxl-4 col-md-6">
                                            <a href="/certificate-pump/${item.serial_number_id}">
                                                <div class="card info-card revenue-card card-modal">
                                                    <div class="card-body">
                                                    <h5 class="card-title"><span>Maintenance</span></h5>
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-gas-station-line"></i>
                                                        </div>
                                                        <div class="ps-3">
                                                            <span class="pt-1 fw-bold fs-5" style="color: #2eca6a;">PUMP</span>
                                                          
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-xxl-4">
                                            <a href="/certificate-burner/${item.serial_number_id}">
                                                <div class="card info-card customers-card card-modal">
                                                    <div class="card-body">
                                                    <h5 class="card-title"><span>Maintenance</span></h5>
                                                    <div class="d-flex align-items-center">
                                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                            <i class="ri-fire-line"></i>
                                                        </div>
                                                        <div class="ps-3">
                                                            <span class="pt-1 fw-bold fs-5" style="color: #ff771d;">BURNER</span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .sales-card .card-icon {
                            color: #4154f1;
                            background: #f6f6fe;
                        }
                        element.style {
                        }
                        .dashboard .sales-card .card-icon {
                            color: #4154f1;
                            background: #f6f6fe;
                        }
                        .customers-card .card-icon {
                            color: #ff771d;
                            background: #ffecdf;
                        }
                        .revenue-card .card-icon {
                            color: #2eca6a;
                            background: #e0f8e9;
                        }
                        .card-icon {
                            font-size: 32px;
                            line-height: 0;
                            width: 64px;
                            height: 64px;
                            flex-shrink: 0;
                            flex-grow: 0;
                        }
                        .info-card h6 {
                            font-size: 28px;
                            color: #012970;
                            font-weight: 700;
                            margin: 0;
                            padding: 0;
                        }
                        .card-modal:hover {
                            background-color: #dfe2e9;
                        }
                    
                        .table>:not(caption)>*>* {
                            padding: 1.0rem 1.0rem;
                            background-color: var(--bs-table-bg);
                            border-bottom-width: 1px;
                            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
                        }
            
                    </style>
                </td>
            </tr>
        `)
    }).join('');

    paginate({
        paginationEl: '#item-pagination',
        currPage: page,
        pager: data.pager,
        onPaginate: (currPage) => getItems(currPage, search),
    });
    
}

document.querySelector('.search').addEventListener('input', async (e) => {
    getItems(1, e.target.value);
});

