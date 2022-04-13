const _searchQuery = new URLSearchParams(location.search);
let currPage = _searchQuery.get('page') ? Number(_searchQuery.get('page')) : 1;

getBurnerRecords(currPage);

async function getBurnerRecords(page = 1, search = null) {

    let loader = `  <tr> 
                        <td class="text-center" colspan="7"> 
                            <div class="spinner-grow text-primary" role="status"> 
                            <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-secondary" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-success" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-danger" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-warning" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-info" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-light" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="spinner-grow text-dark" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </td>
                    </tr>
                    `;

    document.getElementById('burner-items').innerHTML = loader;


    const tableData = document.getElementById('burner-items');
    const res = await fetch(`Certificates/listAllBurner?page=${page}&search=${search ? search : ''}`);
    const data = await res.json();

  
    tableData.innerHTML = data.items?.length ? data.items?.map((item, index) => {
        return (`
            <tr>
                <th scope="row">${item.burner_id}</th>
                <td>${item.item}</td>
                <td>${item.serial_no}</td>
                <td>${item.inspector}</td>
                <td>${item.place}</td>
                <td>${item.date} </td>
                <td>
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots" style="font-size: 1.3rem;"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="certificates/burnerPDF/${item.burner_id}" type="button" class="btn btn-primary btn-sm" target="_blank"><i class="bi bi-file-pdf text-primary"></i> Generate</a></li>
                        <li><a class="dropdown-item" href="certificates/edit-burner/${item.burner_id}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square text-warning"></i> Update</a></li>
                        <li><button type="button" data-burner-id="${item.burner_id}" class="dropdown-item btn btn-danger btn-sm delete"><i class="bi bi-trash text-danger"></i> Delete</button></li>
                    </ul>     
                </td>
            </tr>
            <style>
                .table>:not(caption)>*>* {
                    padding: 1.3rem 1.3rem;
                    background-color: var(--bs-table-bg);
                    border-bottom-width: 1px;
                    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
                }
            </style>
        `)
    }).join('') : `<tr><td class="text-center" colspan="7">No records found.</td></tr>`;


    const deleteBurnerId = document.querySelectorAll('.delete');
    
    Array.from(deleteBurnerId).forEach(element => {
        element.addEventListener('click', async (e) => {
            e.preventDefault();
    
        const burner_id = e.currentTarget.dataset.burnerId;

        const res = await fetch(`Certificates/removeEachBurner/${burner_id}`, {
            method: 'DELETE'
        });
    
        const data = await res.json();
        if (data.success) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((data) => {
                if (data.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                    getBurnerRecords();
                }
            })
        }
        
        });
    })
    paginate({
        paginationEl: '#item-pagination',
        currPage: page,
        pager: data.pager,
        onPaginate: (currPage) => getBurnerRecords(currPage, search),
    });    

}

document.querySelector('.search').addEventListener('input', async (e) => {
    getBurnerRecords(1, e.target.value);
});

