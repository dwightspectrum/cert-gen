function pagination(c, m) {
  var current = c,
    last = m,
    delta = 2,
    left = current - delta,
    right = current + delta + 1,
    range = [],
    rangeWithDots = [],
    l;
  for (let i = 1; i <= last; i++) {
    if (i === 1 || i === last || i >= left && i < right) {
      range.push(i);
    }
  }
  for (let i of range) {
    if (l) {
      if (i - l === 2) {
        rangeWithDots.push(l + 1);
      } else if (i - l !== 1) {
        rangeWithDots.push('...');
      }
    }
    rangeWithDots.push(i);
    l = i;
  }
  if (rangeWithDots.length === 1) {
      return null;
  }
  return rangeWithDots.map(item => ({
      query: item !== '...' ? '?page=' + item : null,
      page: item !== '...' ? item : null,
    }));
}


function paginate({
  paginationEl,
  onPaginate,
  currPage,
  pager,

}) {
  const _paginationEl = document.querySelector(paginationEl);
  const links = pagination(Number(currPage), pager);


  if (_paginationEl) {
    _paginationEl.innerHTML = links && links.map(link => {
      return (`
          <li class="page-item ${Number(currPage) == link.page ? 'active' : ''}">
              <a class="page-link _page-link" data-page="${link.page ? link.page : null}" href="${link.query ? link.query : '#'}">
                  ${link.page ? link.page : '...'}
              </a>
          </li>
      `)
    }).join('');
  }

  Array.from(
    document.getElementsByClassName('_page-link')
  ).forEach(elem => {
      elem.addEventListener('click', (e) => {
          e.preventDefault();
          const { page } = e.target.dataset;
          if (page != 'null') {
              onPaginate(page);
          }
      });
  })
}
