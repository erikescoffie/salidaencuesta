<?php 
include '../conectar.php';
$sumTA = 0;
$sumA = 0;
$sumD = 0;
$sumTD = 0;

if (isset($_POST['anio']) AND isset($_POST['mes'])) {
  include 'resultadosEspecificos.php';
} else {
  include 'resultadosGenerales.php';
}
?>
