// Modul Datatable Interaktif (Vanilla JS)

function escapeRegExp(string) {
  return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function highlightText(element, query) {
  // Bersihkan tag mark.at-highlight yang sudah ada sebelumnya
  const marks = element.querySelectorAll('mark.at-highlight');
  marks.forEach(mark => {
    const parent = mark.parentNode;
    if (parent) {
      parent.replaceChild(document.createTextNode(mark.textContent), mark);
      parent.normalize(); // Menggabungkan text node yang berdekatan
    }
  });

  if (!query) return;

  const regex = new RegExp(`(${escapeRegExp(query)})`, 'gi');
  
  function walk(node) {
    if (node.nodeType === Node.TEXT_NODE) {
      const match = node.nodeValue.match(regex);
      if (match) {
        const tempSpan = document.createElement('span');
        tempSpan.innerHTML = node.nodeValue.replace(regex, '<mark class="at-highlight bg-warning-subtle text-warning-emphasis p-0">$1</mark>');
        
        const parent = node.parentNode;
        if (parent && parent.tagName !== 'SCRIPT' && parent.tagName !== 'STYLE' && !parent.classList.contains('at-highlight')) {
          while (tempSpan.firstChild) {
            parent.insertBefore(tempSpan.firstChild, node);
          }
          parent.removeChild(node);
        }
      }
    } else if (node.nodeType === Node.ELEMENT_NODE && node.nodeName !== 'SCRIPT' && node.nodeName !== 'STYLE' && !node.classList.contains('at-highlight')) {
      // Iterasi terbalik agar aman saat memodifikasi childNodes secara realtime
      for (let i = node.childNodes.length - 1; i >= 0; i--) {
        walk(node.childNodes[i]);
      }
    }
  }
  
  walk(element);
}

export function initDatatables() {
  const tableContainers = document.querySelectorAll('[data-at-datatable]');
  
  tableContainers.forEach(container => {
    const table = container.querySelector('table');
    const searchInput = container.querySelector('.at-table-search');
    const paginationContainer = container.querySelector('.at-table-pagination');
    const pageSizeSelect = container.querySelector('.at-table-pagesize');
    const exportCsvBtn = container.querySelector('.at-table-export-csv');
    if (!table) return;
 
    const tbody = table.querySelector('tbody');
    if (!tbody) return;
 
    const rows = Array.from(tbody.querySelectorAll('tr'));
    let filteredRows = [...rows];
    let currentPage = 1;
    let pageSize = parseInt(pageSizeSelect ? pageSizeSelect.value : (container.dataset.pageSize || '5'), 10);
 
    function applySearch() {
      const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
      filteredRows = rows.filter(row => {
        return row.textContent.toLowerCase().includes(query);
      });
      currentPage = 1;
      render();
      
      // Jalankan penyorotan teks setelah rendering selesai
      if (searchInput) {
        const rawQuery = searchInput.value.trim();
        filteredRows.forEach(row => {
          highlightText(row, rawQuery);
        });
      }
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
              // Pastikan penyorotan tetap ada setelah navigasi halaman
              if (searchInput) {
                const rawQuery = searchInput.value.trim();
                filteredRows.forEach(row => {
                  highlightText(row, rawQuery);
                });
              }
            }
          });
        });
      }
    }
 
    if (searchInput) {
      searchInput.addEventListener('input', applySearch);
    }

    if (pageSizeSelect) {
      pageSizeSelect.addEventListener('change', () => {
        pageSize = parseInt(pageSizeSelect.value, 10);
        currentPage = 1;
        render();
        if (searchInput) {
          const rawQuery = searchInput.value.trim();
          filteredRows.forEach(row => highlightText(row, rawQuery));
        }
      });
    }

    if (exportCsvBtn) {
      exportCsvBtn.addEventListener('click', e => {
        e.preventDefault();
        exportToCsv();
      });
    }

    function exportToCsv() {
      const headers = Array.from(table.querySelectorAll('th')).map(th => th.textContent.trim());
      
      const csvData = [];
      // Tambahkan header
      csvData.push(headers.join(','));

      // Tambahkan data baris yang terfilter
      filteredRows.forEach(row => {
        const rowData = Array.from(row.querySelectorAll('td')).map(td => {
          // Ganti baris baru dan kutip ganda untuk format CSV aman
          let val = td.textContent.trim().replace(/"/g, '""');
          return `"${val}"`;
        });
        csvData.push(rowData.join(','));
      });

      const csvContent = "data:text/csv;charset=utf-8,\uFEFF" + csvData.join("\n");
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", `${container.dataset.exportName || 'datatables_export'}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
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
          
          // Jika data numerik, bandingkan sebagai angka
          const numA = parseFloat(valA.replace(/[^\d.-]/g, ''));
          const numB = parseFloat(valB.replace(/[^\d.-]/g, ''));
          if (!isNaN(numA) && !isNaN(numB)) {
            return isAsc ? numB - numA : numA - numB;
          }
          return isAsc ? valB.localeCompare(valA) : valA.localeCompare(valB);
        });
        render();
        if (searchInput) {
          const rawQuery = searchInput.value.trim();
          filteredRows.forEach(row => highlightText(row, rawQuery));
        }
      });
    });
 
    render();
  });
}
