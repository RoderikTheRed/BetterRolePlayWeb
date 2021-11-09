<?php
$host = "localhost";
$name = "betterroleplay";
$user = "root";
$password = "Dt3K3tP8XAeRNVZN";
try {
  $mysql = new PDO("mysql:host=$host; port=3306; dbname=$name", $user, $password);
} catch (PDOExeption $e) {
  echo "SQL Error: ".$e->getMessage();
}
 ?>
