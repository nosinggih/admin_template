// Modul ApexCharts Sync & Dark Mode Aware
import ApexCharts from 'apexcharts';

export function initCharts() {
  window.ApexCharts = ApexCharts;
  const charts = [];

  const isDark = () => document.documentElement.getAttribute('data-bs-theme') === 'dark';

  // 1. Line Chart
  const lineEl = document.querySelector('#chart-line-demo');
  if (lineEl) {
    const lineChart = new ApexCharts(lineEl, {
      chart: { type: 'line', height: 280, toolbar: { show: false } },
      series: [{ name: 'Pendapatan', data: [30, 40, 35, 50, 49, 60, 70, 91, 125] }],
      xaxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep'] },
      colors: ['#206bc4'],
      theme: { mode: isDark() ? 'dark' : 'light' }
    });
    lineChart.render();
    charts.push(lineChart);
  }

  // 2. Area Chart
  const areaEl = document.querySelector('#chart-area-demo');
  if (areaEl) {
    const areaChart = new ApexCharts(areaEl, {
      chart: { type: 'area', height: 280, toolbar: { show: false } },
      series: [{ name: 'Pengunjung', data: [11, 32, 45, 32, 34, 52, 41] }],
      xaxis: { categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] },
      colors: ['#4299e1'],
      theme: { mode: isDark() ? 'dark' : 'light' }
    });
    areaChart.render();
    charts.push(areaChart);
  }

  // 3. Bar Chart
  const barEl = document.querySelector('#chart-bar-demo');
  if (barEl) {
    const barChart = new ApexCharts(barEl, {
      chart: { type: 'bar', height: 280, toolbar: { show: false } },
      series: [{ name: 'Penjualan', data: [44, 55, 57, 56, 61, 58, 63] }],
      xaxis: { categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] },
      colors: ['#2fb344'],
      theme: { mode: isDark() ? 'dark' : 'light' }
    });
    barChart.render();
    charts.push(barChart);
  }

  // 4. Donut Chart
  const donutEl = document.querySelector('#chart-donut-demo');
  if (donutEl) {
    const donutChart = new ApexCharts(donutEl, {
      chart: { type: 'donut', height: 280 },
      series: [44, 55, 41, 17],
      labels: ['Desktop', 'Mobile', 'Tablet', 'Lainnya'],
      colors: ['#206bc4', '#4299e1', '#2fb344', '#f59f00'],
      theme: { mode: isDark() ? 'dark' : 'light' }
    });
    donutChart.render();
    charts.push(donutChart);
  }

  // 5. Sparklines (Mini Charts)
  document.querySelectorAll('[data-at-sparkline]').forEach((sparkEl) => {
    const type = sparkEl.dataset.type || 'line';
    const color = sparkEl.dataset.color || '#206bc4';
    const values = (sparkEl.dataset.values || '10,20,15,25,20,30').split(',').map(Number);

    const sparkChart = new ApexCharts(sparkEl, {
      chart: { type: type, height: 40, sparkline: { enabled: true } },
      series: [{ data: values }],
      stroke: { width: 2 },
      colors: [color],
      tooltip: { enabled: false },
      theme: { mode: isDark() ? 'dark' : 'light' }
    });
    sparkChart.render();
    charts.push(sparkChart);
  });

  // Dark Mode Mutation Observer Sync
  const observer = new MutationObserver(() => {
    const dark = isDark();
    charts.forEach(c => c.updateOptions({ theme: { mode: dark ? 'dark' : 'light' } }));
  });
  observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-bs-theme'] });
}
