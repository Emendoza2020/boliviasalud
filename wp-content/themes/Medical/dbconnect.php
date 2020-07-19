<?php
// $servername = "localhost";
// $database = "saludbolivia_db";
// $username = "root";
// $password = "";

//$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
// if (!$conn) {
//       die("Connection failed: " . mysqli_connect_error());
// }
//echo "Connected successfully";
/*
$servername = "localhost";
$database = "saludbolivia_db";
$username = "root";
$password = "";
 
$conn = mysqli_connect($servername, $username, $password, $database);
 
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}*/

      $database = "saludbolivia_db";
      $user = "root";
      $password = "";

      try{
            $con = new PDO('mysql:host=localhost;dbname='.$database,$user,$password);
      }catch(PDOException $e){
            echo "Error".$e->getMessage();
      }
?>