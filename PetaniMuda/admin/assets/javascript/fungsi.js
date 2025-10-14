  (function () {
    const app = document.getElementById('app');
    const sidebar = document.getElementById('sidebar');
    const btnCollapse = document.getElementById('btnCollapse');
    const btnOpenSidebar = document.getElementById('btnOpenSidebar');

    // Load saved state (desktop collapse)
    const saved = localStorage.getItem('sidebar-collapsed') === '1';
    if (saved && window.matchMedia('(min-width: 992px)').matches) {
      app.classList.add('sidebar-collapsed');
    }

    // Desktop collapse toggle
    btnCollapse?.addEventListener('click', () => {
      app.classList.toggle('sidebar-collapsed');
      const isCollapsed = app.classList.contains('sidebar-collapsed');
      localStorage.setItem('sidebar-collapsed', isCollapsed ? '1' : '0');
    });

    // Mobile open/close (offcanvas-like)
    btnOpenSidebar?.addEventListener('click', () => {
      sidebar.classList.toggle('offcanvas-show');
    });

    // Close sidebar when clicking outside (mobile)
    document.addEventListener('click', (e) => {
      if (window.matchMedia('(max-width: 991.98px)').matches) {
        if (!sidebar.contains(e.target) && !btnOpenSidebar.contains(e.target)) {
          sidebar.classList.remove('offcanvas-show');
        }
      }
    });

    // ESC to close (mobile)
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') sidebar.classList.remove('offcanvas-show');
    });
  })();

document.addEventListener("DOMContentLoaded", function() {
  const ctx = document.createElement('canvas');
  const chartContainer = document.querySelector('.card-body .ratio');
  chartContainer.innerHTML = ''; // kosongkan placeholder
  chartContainer.appendChild(ctx);

  const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 200);
  gradient.addColorStop(0, 'rgba(13,110,253,0.3)');
  gradient.addColorStop(1, 'rgba(53, 255, 26, 0)');

  const trafficChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
      datasets: [
        {
          label: 'Traffic',
          data: [120, 150, 180, 220, 260, 210, 190],
          fill: true,
          backgroundColor: gradient,
          borderColor: '#00985B',
          tension: 0.4,
          pointRadius: 3,
          pointHoverRadius: 5
        },
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: { boxWidth: 12, color: getComputedStyle(document.body).getPropertyValue('--bs-body-color') }
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.7)',
          titleFont: { size: 14 },
          bodyFont: { size: 13 },
          padding: 10,
          cornerRadius: 6
        }
      },
      scales: {
        x: {
          grid: { color: 'rgba(0,0,0,0.05)' },
          ticks: { color: getComputedStyle(document.body).getPropertyValue('--bs-secondary-color') }
        },
        y: {
          beginAtZero: true,
          grid: { color: 'rgba(0,0,0,0.05)' },
          ticks: { color: getComputedStyle(document.body).getPropertyValue('--bs-secondary-color') }
        }
      }
    }
  });

  // Optional: Dark mode adaptasi otomatis
  const observer = new MutationObserver(() => {
    trafficChart.options.plugins.legend.labels.color = getComputedStyle(document.body).getPropertyValue('--bs-body-color');
    trafficChart.options.scales.x.ticks.color = getComputedStyle(document.body).getPropertyValue('--bs-secondary-color');
    trafficChart.options.scales.y.ticks.color = getComputedStyle(document.body).getPropertyValue('--bs-secondary-color');
    trafficChart.update();
  });
  observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-bs-theme'] });
});

