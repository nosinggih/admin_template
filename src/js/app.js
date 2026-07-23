// Entry point Bundle JavaScript
import * as bootstrap from 'bootstrap';
import { initThemeToggle } from './modules/theme.js';
import { initSidebar } from './modules/sidebar.js';
import { initCharts } from './modules/charts.js';
import { initDatatables } from './modules/datatable.js';

// Expose bootstrap ke window
window.bootstrap = bootstrap;

document.addEventListener('DOMContentLoaded', () => {
  initThemeToggle();
  initSidebar();
  initCharts();
  initDatatables();

  // Inisialisasi Tooltip & Popover bawaan Bootstrap
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
});
