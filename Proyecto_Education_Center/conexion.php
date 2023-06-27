<?php
$host="localhost";
$dbname="centroeducacion";
$user="root";
$pass="";
try
{
$pdo=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e)
{
echo "conexion fallida:" . $e->getMessage();

}

?>