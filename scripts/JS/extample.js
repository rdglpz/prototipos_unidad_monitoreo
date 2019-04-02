var options = {
  chart: {
    height: 380,
    width: "100%",
    type: "area",

  },
  series: [{
    name: 'Temperatura',
    data: [ 25.2,25.2,25.2,25.2,25.2,25.3,25.3, 25.3,25.4,25.4,25.5,25.5,25.6,25.7,25.8,25.8,25.9,26, 26, 26,26.1, 26.1]
  }],
  xaxis: {
    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();