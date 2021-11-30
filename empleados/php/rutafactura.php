<?php

require_once 'conexion.php';

function getRutaPrecio(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT * FROM `tbl_rutas` WHERE ruta_codigo = $id";
  $result = $mysqli->query($query);
  $Precio = "<input value='$row[ruta_precio]' type='text'>";
  return $Precio;
}

echo getRutaPrecio();

?>