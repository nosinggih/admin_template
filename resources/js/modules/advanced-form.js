// Modul Form Input Lanjutan (Vanilla JS dengan Flatpickr & Tom Select)

export function initAdvancedForms() {
  // 1. Inisialisasi Flatpickr (DatePicker)
  if (typeof flatpickr !== 'undefined') {
    // Single Date Picker
    flatpickr('[data-at-datepicker]', {
      dateFormat: 'Y-m-d',
      allowInput: true,
      prevArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
      nextArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
    });

    // Date Range Picker
    flatpickr('[data-at-daterangepicker]', {
      mode: 'range',
      dateFormat: 'Y-m-d',
      allowInput: true,
      prevArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
      nextArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
    });

    // Date Time Picker
    flatpickr('[data-at-datetimepicker]', {
      enableTime: true,
      dateFormat: 'Y-m-d H:i',
      allowInput: true,
      time_24hr: true,
      prevArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
      nextArrow: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
    });
  }

  // 2. Inisialisasi Tom Select (Autocomplete & Tags)
  if (typeof TomSelect !== 'undefined') {
    // Autocomplete Dropdown
    document.querySelectorAll('[data-at-select-search]').forEach(select => {
      new TomSelect(select, {
        create: false,
        controlInput: '<input>',
        render: {
          option: function(data, escape) {
            return `<div>${escape(data.text)}</div>`;
          },
          item: function(data, escape) {
            return `<div>${escape(data.text)}</div>`;
          }
        }
      });
    });

    // Tags Dropdown (Multi-select)
    document.querySelectorAll('[data-at-select-tags]').forEach(select => {
      new TomSelect(select, {
        plugins: ['remove_button'],
        create: true,
        persist: false,
        controlInput: '<input>',
        onItemAdd: function() {
          this.setTextboxValue('');
          this.refreshOptions();
        }
      });
    });
  }
}
