// Modul Datatable Interaktif (Vanilla JS)

export function initDatatables() {
  const tableContainers = document.querySelectorAll('[data-at-datatable]');
  
  tableContainers.forEach(container => {
    const table = container.querySelector('table');
    const searchInput = container.querySelector('.at-table-search');
    const paginationContainer = container.querySelector('.at-table-pagination');
    if (!table) return;

    const tbody = table.querySelector('tbody');
    if (!tbody) return;

    const rows = Array.from(tbody.querySelectorAll('tr'));
    let filteredRows = [...rows];
    let currentPage = 1;
    const pageSize = parseInt(container.dataset.pageSize || '5', 10);

    function applySearch() {
      const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
      filteredRows = rows.filter(row => {
        return row.textContent.toLowerCase().includes(query);
      });
      currentPage = 1;
      render();
    }

    function render() {
      const totalPages = Math.ceil(filteredRows.length / pageSize) || 1;
      if (currentPage > totalPages) currentPage = totalPages;

      const start = (currentPage - 1) * pageSize;
      const end = start + pageSize;

      rows.forEach(row => (row.style.display = 'none'));
      filteredRows.slice(start, end).forEach(row => (row.style.display = ''));

      if (paginationContainer) {
        let html = `<ul class="pagination pagination-sm mb-0">`;
        html += `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}"><a class="page-link" href="#" data-page="${currentPage - 1}">Sebelumnya</a></li>`;
        
        for (let i = 1; i <= totalPages; i++) {
          html += `<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }

        html += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}"><a class="page-link" href="#" data-page="${currentPage + 1}">Berikutnya</a></li>`;
        html += `</ul>`;
        paginationContainer.innerHTML = html;

        paginationContainer.querySelectorAll('a.page-link').forEach(link => {
          link.addEventListener('click', e => {
            e.preventDefault();
            const p = parseInt(link.dataset.page, 10);
            if (p >= 1 && p <= totalPages) {
              currentPage = p;
              render();
            }
          });
        });
      }
    }

    if (searchInput) {
      searchInput.addEventListener('input', applySearch);
    }

    const headers = table.querySelectorAll('th[data-sort]');
    headers.forEach(th => {
      th.style.cursor = 'pointer';
      th.addEventListener('click', () => {
        const isAsc = th.classList.contains('sort-asc');
        headers.forEach(h => h.classList.remove('sort-asc', 'sort-desc'));
        th.classList.add(isAsc ? 'sort-desc' : 'sort-asc');

        const colIndex = Array.from(th.parentNode.children).indexOf(th);
        filteredRows.sort((a, b) => {
          const valA = a.children[colIndex].textContent.trim();
          const valB = b.children[colIndex].textContent.trim();
          return isAsc ? valB.localeCompare(valA) : valA.localeCompare(valB);
        });
        render();
      });
    });

    render();
  });
}
