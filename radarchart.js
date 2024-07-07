// Data klub sepakbola
const klubData = {
  labels: ['Menang', 'Seri', 'Kalah', 'Gol', 'Kebobolan'],
  datasets: [{
    label: 'Arsenal',
    data: [25,	8,	5,	70,	25], // Contoh data untuk Barcelona
    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna untuk Barcelona
    borderColor: 'rgba(255, 99, 132, 1)',
    borderWidth: 1
  }, {
    label: 'Aston Villa',
    data: [20, 8, 10, 76, 61], // Contoh data untuk Real Madrid
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna untuk Real Madrid
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1
  }]
};

// Pengaturan radar chart
const radarConfig = {
  type: 'radar',
  data: klubData,
  options: {
    elements: {
      line: {
        borderWidth: 2
      }
    },
    scales: {
      r: {
        suggestedMin: 0,
        suggestedMax: 100
      }
    }
  }
};

// Membuat radar chart
const radarChart = new Chart(
  document.getElementById('radarChart'),
  radarConfig
);
