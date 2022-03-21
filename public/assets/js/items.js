const _searchQuery = new URLSearchParams(location.search);
const url = new URL(window.location);

let _currPage = _searchQuery.get('page') ? Number(_searchQuery.get('page')) : 1;

getItems(_currPage);

async function getItems(page = 1) {
    const tableData = document.getElementById('items');
    const itemPagination = document.getElementById('item-pagination');

    const res = await fetch('Items/getItems?page=' + page);
    const data = await res.json();

    tableData.innerHTML = data && data?.items.map((item, index) => {
        return (`
            <tr>
                <th scope="row">${item.item_id}</th>
                <td>${item.item_name}</td>
                <td>${item.item_hs_code}</td>
                <td>${item.serial_number}</td>
                <td>
                    <select class="form-control">
                        <option selected>Choose Certificate</option>
                        <option>Ventilator</option>
                        <option>Pump</option>
                        <option>Burner</option>
                        <option>Electric Cable</option>
                        <option>EDB</option>
                        <option>Crown Rise</option>
                        <option>Safety Valve</option>
                    </select>
                </td>
            </tr>
        `)
    }).join('');

    const links = pagination(page, data.pager);

    itemPagination.innerHTML = links && links.map(link => {
        return (`
            <li class="page-item ${page === link.page ? 'active' : ''}">
                <a class="page-link _page-link" data-page="${link.page ? link.page : null}" href="${link.query ? link.query : '#'}">
                    ${link.page ? link.page : '...'}
                </a>
            </li>
        `)
    }).join('');  

    Array.from(
        document.getElementsByClassName('_page-link')
    ).forEach(elem => {
        elem.addEventListener('click', (e) => {
            e.preventDefault();
            const { page } = e.target.dataset;
            if (page != 'null') {
                _searchQuery.set('page', page);
                url.searchParams.set(
                    'page', 
                    page
                );
                window.history.pushState({}, '', url);
                getItems(Number(page));
            }
            
        });
    })
}

