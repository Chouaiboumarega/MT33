const ctx = document.getElementById('myChart');
const config = {
  type: 'doughnut',
  data: {
    labels: ['Janv-24', 'Févr-24', 'Mars-24', 'Avr-24', 'Mai-24'],
    datasets: [{
      label: 'Livraisons',
      data: [432, 543, 324, 843, 456],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(153, 102, 255)'
      ],
      hoverOffset: 7
    }]
  }
};
new Chart(ctx, config);

const cty = document.getElementById('myDep').getContext('2d');
const configu = {
  type: 'line',
  data: {
    labels: ['Janv-24', 'Févr-24', 'Mars-24', 'Avr-24', 'Mai-24'],
    datasets: [{
      label: 'Depenses',
      data: [432, 543, 324, 843, 456],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(153, 102, 255)'
      ],
      hoverOffset: 7
    }]
  }
};
new Chart(cty, configu);