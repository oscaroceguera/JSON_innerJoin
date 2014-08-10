<?php

$host     = "localhost";
$user     = "root";
$password = "root";
$dbName   = "prueba";

$conexion = mysqli_connect($host,$user,$password,$dbName);

// en la consulta saque lo de AS A y AS B, como pregunta, recomendacion y
// nomModulo no se repiten entre las tablas no lo necesitas y podes referirte
// a cada tabla simplemente con su nombre, igual si se lo agregás anda.
$consulta = "SELECT pregunta, recomendacion, nomModulo FROM CAT_PREGUNTAS INNER JOIN modulos_diagnosticos ON cat_preguntas.id_modulo = modulos_diagnosticos.id_modulo";

// ejecuto la consulta
$query = mysqli_query($conexion,$consulta);

$arr = array();
while($row = mysqli_fetch_object($query)){
  // en cada vuelta del ciclo hago un array_push
  // en este array_push agrego al array $arr un nuevo array con dos posiciones,
  // pregunta y modulo.
  // y este array lo encodeo en utf8 usando array_map ya que está mal
  // encodeado en la base de datos
  array_push($arr, array_map('utf8_encode', array(
      'pregunta' => $row->pregunta,
      'modulo'   => $row->nomModulo
    )));
}

// lo convierto a JSON
$json = json_encode($arr);

// devuelvo el JSON
echo $json;