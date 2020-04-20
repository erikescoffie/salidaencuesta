<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>submit demo</title>
  <style>
  p {
    margin: 0;
    color: blue;
  }
  div,p {
    margin-left: 10px;
  }
  span {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
 
<form method="POST" id="fechas">
    <input type="text" name="x" id="x">
    <input type="text" name="z" id="z">
    <input type="submit" value="Guardar"></input>
</form>

<script>
	$('#fechas').submit(function(e) {
		var fechas = $(this).serialize();
	    e.preventDefault();
	    alert(fechas);
	});
</script>
 
</body>
</html>