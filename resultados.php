<!DOCTYPE html>
<html>
<head>
  <title>Resulltados</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- ChartJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="js/bootstrap.js">

  <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>

  <div class="estilo">
    <div class="titulo">
      <h3>Resultados de las encuestas de salida realizadas</h3>
    </div>
    <div class="logo">
      <img src="images/logoproser.jpg" class="imagen">
    </div> 
  </div>

  <section class="secciones">
    <div id="datos">
      <form id="fechas" accept-charset="utf-8">
        <select name="anio" id="anio">
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select>

        <select name="mes" id="mes">
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
        <input type="submit"></input>
      </form>

      <script>
        $('#fechas').submit(function(e) {
          var fechas = $(this).serialize();
          e.preventDefault();
            // alert(fechas);
            $.ajax({
              method: 'POST',
              url: 'consultas/graficoP1.php',
              data: fechas
            }).done( function(info){
                // alert(fechas);
                // $('#resultados').load('prueba.html');
                $('#resultados').html(info);
              });
          });
        </script>

      </div>
    </section>



    <div id="contenedor">
      <section class="secciones" id="resultados">
        <div class="chart-container">
          <article>
            <div class="pregunta">
              <h4 class="pregunta">¿Que tan satisfecho se va el personal de Grupo X?</h4>  
            </div>
            <div>
              <canvas id="viewP1"></canvas>  
            </div>      
          </article>

          <article>
            <div class="pregunta">
              <h4 class="pregunta">¿Recomendaría a Grupo X como un lugar bueno para trabajar?</h4>
            </div>
            <div>
              <canvas id="viewP10"></canvas>
            </div>      
          </article>

          <article>
            <div class="pregunta">
              <h4 class="pregunta">¿Volvería a laborar con Grupo X?</h4>
            </div>
            <div>
              <canvas id="viewP11"></canvas>  
            </div>      
          </article>
        </div>
     <!--  </section>

      <section class="secciones"> -->
        <div id="completo">
          <h4 class="pregunta">La razón principal por la que se está terminando la relación de trabajo con Grupo X</h4>
          <canvas id="viewP"></canvas>    
        </div>
      </section>  


      <?php 

    // include 'consultas/graficoGerencia.php';
    // include 'consultas/graficoDepas.php';
      include 'consultas/graficoP1.php';
    // include 'consultas/graficoP12.php';
      ?>

      <div class="chart-container">
        <article>
          <h3 class="pregunta">Resultado indicador: <b> <?php echo round($resIndicador,2); ?> </b> </h3>
        </article>
      </div>
    </div> 

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
          <?php echo round($prom1,2); ?>, 
          <?php echo round($prom2,2); ?>, 
          <?php echo round($prom3,2); ?>,
          <?php echo round($prom4,2); ?>, 
          <?php echo round($prom5,2); ?>, 
          <?php echo round($prom6,2); ?>, 
          <?php echo round($prom7,2); ?>, 
          <?php echo round($prom8,2); ?>, 
          <?php echo round($prom9,2); ?> ],

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



</body>
</html>