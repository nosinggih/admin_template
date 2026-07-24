import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Import Bootstrap
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Import Custom Admin Template Modules
import { initThemeToggle } from './modules/theme.js';
import { initSidebar } from './modules/sidebar.js';
import { initCharts } from './modules/charts.js';
import { initDatatables } from './modules/datatable.js';
import { initAdvancedForms } from './modules/advanced-form.js';

document.addEventListener('DOMContentLoaded', () => {
  initThemeToggle();
  initSidebar();
  initCharts();
  initDatatables();
  initAdvancedForms();

  // Inisialisasi Tooltip & Popover bawaan Bootstrap
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
  [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
});

