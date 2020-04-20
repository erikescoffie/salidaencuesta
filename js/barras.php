<script>
  var ctx = document.getElementById("viewP1").getContext('2d');
  var viewP1 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["TA", "A", "D", "TD"],
      datasets: [{
        label: 'Porcentaje seleccionado',
        data: [
        

        <?php echo round($promTA,2);?>,
        <?php echo round($promA,2);?>,
        <?php echo round($promD,2);?>,
        <?php echo round($promTD,2); ?>],
        backgroundColor: [
        '#021D49',
        '#A7A8A9',
        '#021D49',
        '#A7A8A9'
        ],
        borderColor: [
        '#021D49',
        '#A7A8A9',
        '#021D49',
        '#A7A8A9'
        ],
        borderWidth: 1
      }]
    },

    options: {

      legend: {
        display: false,
      },

      scales: {
        xAxes: [{
          barThickness: 70
        }],
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

  var options = {
    responsive: true,
    showTooltips: false,
    onAnimationComplete: function() {

      var ctx = this.chart.ctx;
      ctx.font = this.scale.font;
      ctx.fillStyle = this.scale.textColor
      ctx.textAlign = "center";
      ctx.textBaseline = "bottom";

      this.datasets.forEach(function(dataset) {
        dataset.bars.forEach(function(bar) {
          ctx.fillText(bar.value, bar.x, bar.y - 5);
        });
      })
    }
  };
</script>

<script>
  var ctx = document.getElementById("viewP10").getContext('2d');
  var viewP10 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["SI", "NO"],
      datasets: [{
        label: 'Veces seleccionada',
        data: [
        <?php echo round($p10s,2); ?>, 
        <?php echo round($p10n,2); ?>],
        backgroundColor: [
        '#021D49',
        '#A7A8A9'
        ],
        borderColor: [
        '#021D49',
        '#A7A8A9'
        ],
        borderWidth: 1
      }]
    },

    options: {
      legend: {
        display: false,
      },

      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>

<script>
  var ctx = document.getElementById("viewP11").getContext('2d');
  var viewP11 = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["SI", "NO"],
      datasets: [{
           // label: 'Veces seleccionada',
           data: [
           <?php echo round($p11s,2); ?>, 
           <?php echo round($p11n,2); ?>],
           backgroundColor: [
           '#021D49',
           '#A7A8A9'
           ],
           borderColor: [
           '#021D49',
           '#A7A8A9'
           ],
           borderWidth: 1
         }]
       },

       options: {
        legend: {
          display: false,
        },

        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById("viewP").getContext('2d');
    var viewP = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        labels: [
        "Mejor sueldo y prestaciones",
        "Horario de trabajo",
        "Ambiente laboral con compañeros",
        "Desacuerdo con Jefe",
        "Jubilación",
        "Falta de ascenso",
        "Continuar estudios",
        "Terminación de contrato",
        "Razones familiares y/o salud",
        "Otro"],
        datasets: [{
          label: 'Veces seleccionada',
          data: [
          <?php echo $prom1; ?>, 
          <?php echo $prom2; ?>, 
          <?php echo $prom3; ?>, 
          <?php echo $prom4; ?>, 
          <?php echo $prom5; ?>, 
          <?php echo $prom6; ?>, 
          <?php echo $prom7; ?>, 
          <?php echo $prom8; ?>, 
          <?php echo $prom9; ?>, 
          <?php echo $prom10; ?>],

          backgroundColor: [
          '#021D49',
          '#f7fcf0',
          '#e0f3db',
          '#ccebc5',
          '#a8ddb5',
          '#7bccc4',
          '#4eb3d3',
          '#2b8cbe',
          '#0868ac',
          '#A7A8A9'
          ]
        }]
      },

      options: {
        legend: {
          display: false,
        },

        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>

  <script>
    function beforePrintHandler () {
      for (var id in Chart.instances) {
        Chart.instances[id].resize()
      }
    }
  </script>