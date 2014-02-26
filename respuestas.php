<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 
//echo "<h1><B>".$_POST["pregunta1"]."</B></h1>";
//echo "<h1><B>".$_POST["pregunta2"]."</B></h1>";
//echo "<h1><B>".$_POST["pregunta3"]."</B></h1>";

$r1=$_POST["pregunta1"];
$r2=$_POST["pregunta2"];
$r3=$_POST["pregunta3"];
$nalumno=1;

$self = $_SERVER['PHP_SELF']; 
$servidor = "localhost";
$usuario = "root"; 
$password = ""; 
$BD = "asistencia"; 
$conexion = @mysql_connect($servidor, $usuario, $password);
if (!$conexion) {
    die('<strong>No pudo conectarse:</strong> ' . mysql_error());
}else{
//La siguiente linea no es necesaria, simplemente la pondremos ahora para poder observar que la conexión ha sido realizada
echo ' <br />';
}

mysql_select_db($BD, $conexion) or die(mysql_error($conexion));

$sql = "UPDATE preguntas SET respuesta='".$r1."' WHERE id_alumno=1 and pregunta=1";
$result = mysql_query ($sql);

$sql = "UPDATE preguntas SET respuesta='".$r2."' WHERE id_alumno=1 and pregunta=2";
$result = mysql_query ($sql);

$sql = "UPDATE preguntas SET respuesta='".$r3."' WHERE id_alumno=1 and pregunta=3";
$result = mysql_query ($sql);
// verificamos que no haya error
if (! $result){
echo "La consulta SQL contiene errores.".mysql_error();
exit();
}else {
	
	if ($r1=="A")
		echo "Pregunta 1. Respuesta correcta <br/>";
	else
		echo "Pregunta 1. Respuesta incorrecta, la respuesta correcta es inciso A <br/>";
	if ($r2=="B")
		echo "Pregunta 2. Respuesta correcta  B <br/>";
	else
		echo "Pregunta 2. Respuesta incorrecta,  la respuesta correcta inciso B <br/>";
	if ($r3=="C")
		echo "Pregunta 3. Respuesta correcta C <br/>";
	else
		echo "Pregunta 3. Respuesta incorrecta  la respuesta correcta inciso C <br/>";
}

?>



</body>
</html>