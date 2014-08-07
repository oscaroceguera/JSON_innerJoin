<?php

$host = "localhost";
$user = "root";
$password = "root";
$dbName = "prueba";

$conexion = mysqli_connect($host,$user,$password,$dbName);

$consulta = "SELECT A.pregunta,A.recomendacion,B.nomModulo FROM CAT_PREGUNTAS AS A INNER JOIN modulos_diagnosticos AS B ON A.id_modulo=B.id_modulo";

$query = mysqli_query($conexion,$consulta);

$json = json_encode($query);

echo $json;