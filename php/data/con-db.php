<?php
$tmat = $_POST['tmat'];

define('DB_UNAME',getenv('MYSQL_USERNAME'));
define('DB_PASS',getenv('MYSQL_PASSWORD'));
define('DB_HOST',getenv('MYSQL_HOST'));
define('DB_PORT',getenv('MYSQL_PORT'));
define('DB_DATABASE',getenv('MYSQL_DATABASE'));

$dbconn = mysqli_connect(DB_HOST, DB_UNAME, DB_PASS, DB_DATABASE, DB_PORT);
if (!$dbconn){
	echo "no conectado ";
	exit();
}

$query = "select * from material where tmat='".$tmat."'";
$result = $dbconn->query($query);

if (!$result->num_rows > 0){
	echo "sin registros";
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Materiales</h2>

<table>
  <tr>
    <th>Codigo</th>
    <th>Nombre</th>
    <th>Descripcion</th>
	<th>Tipo</th>	
  </tr>
  
 <?php
  while($datos=$result->fetch_array()){
  echo'
  <tr>
    <td>'.$datos["idprod"].'</td>
    <td>'.$datos["name"].'</td>
    <td>'.$datos["descr"].'</td>
	<td>'.$datos["tmat"].'</td>
  </tr>';
  }
 ?>
</table>

</body>
</html>