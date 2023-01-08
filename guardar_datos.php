<?php
include('db.php');
$txt_name= $_POST['nombreapellido'];
$txt_email=$_POST['correoelectronico'];
$txt_telefono=$_POST['telefono'];
$txt_msg=$_POST['mensaje'];
$txt_horario=$_POST['horario'];


$consulta = "INSERT INTO `data_personas`(`nombre`,  `correo_electronico`, `telefono`,  `mensaje`,`horario`) VALUES ('$txt_name','$txt_email','$txt_telefono', '$txt_msg', '$txt_horario')";
$conectarse= new db();
$conexion=$conectarse->conectar();
$conexion->query($consulta);

echo '
<br>
<a href="index.html">ir al inicio</a>

';




?>