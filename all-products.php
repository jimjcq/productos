<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "botica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nombre_art,cantidad_art,descripcion_art,id_art,vencimiento_art,categorias.nombre_cat AS categoria FROM articulos INNER JOIN categorias ON articulos.id_cat01 = categorias.id_cat";
$result = $conn->query($sql);

$output = [];

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($output, $row) ;
  }
} else {
  echo "0 results";
}

$conn->close();

$output = array(data => $output);

echo json_encode($output);

?> 
