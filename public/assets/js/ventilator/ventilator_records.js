const _searchQuery = new URLSearchParams(location.search);
let currPage = _searchQuery.get('page') ? Number(_searchQuery.get('page')) : 1;

getVentilatorRecords(currPage);

async function getVentilatorRecords(page = 1, search = null) {
    const tableData = document.getElementById('ventilator-items');

    const res = await fetch(`Certificates/listAllVentilator?page=${page}&search=${search ? search : ''}`);
    const data = await res.json();

    tableData.innerHTML = data.items?.length ? data.items?.map((item, index) => {
        return (`
            <tr>
                <th scope="row">${item.ventilator_id}</th>
                <td>${item.item}</td>
                <td>${item.serial_no}</td>
                <td>${item.inspector}</td>
                <td>${item.place}</td>
                <td>${item.date} </td>
                <td>
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots" style="font-size: 1.3rem;"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="certificates/ventilatorPDF/${item.ventilator_id}" type="button" class="btn btn-primary btn-sm" target="_blank"><i class="bi bi-file-pdf text-primary"></i> Generate</a></li>
                        <li><a class="dropdown-item" href="certificates/edit-ventilator/${item.ventilator_id}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square text-warning"></i> Update</a></li>
                        <li><button type="button" data-ventilator-id="${item.ventilator_id}" class="dropdown-item btn btn-danger btn-sm delete"><i class="bi bi-trash text-danger"></i> Delete</button></li>
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

    
    const deleteVentilatorId = document.querySelectorAll('.delete');
    
    Array.from(deleteVentilatorId).forEach(element => {
        element.addEventListener('click', async (e) => {
            e.preventDefault();
    
        const ventilator_id = e.currentTarget.dataset.ventilatorId;

        const res = await fetch(`Certificates/removeEachVentilator/${ventilator_id}`, {
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
                    getVentilatorRecords();
                }
            })
        }
        
        });
    })
    paginate({
        paginationEl: '#item-pagination',
        currPage: page,
        pager: data.pager,
        onPaginate: (currPage) => getVentilatorRecords(currPage, search),
    });   

}

document.querySelector('.search').addEventListener('input', async (e) => {
    getVentilatorRecords(1, e.target.value);
});



