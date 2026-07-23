// Modul Interaktivitas Sidebar (Collapse & Mobile Overlay)

export function initSidebar() {
  const toggleBtns = document.querySelectorAll('[data-at-toggle="sidebar"]');
  const sidebar = document.querySelector('.at-sidebar');

  if (sidebar && toggleBtns.length > 0) {
    toggleBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        sidebar.classList.toggle('show');
        sidebar.classList.toggle('collapsed');
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebar-collapsed', isCollapsed ? 'true' : 'false');
      });
    });

    document.addEventListener('click', (e) => {
      if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
        if (!sidebar.contains(e.target) && !e.target.closest('[data-at-toggle="sidebar"]')) {
          sidebar.classList.remove('show');
        }
      }
    });
  }
}
