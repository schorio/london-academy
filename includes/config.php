<?php 

$config = [
    "URL" => "http://localhost/london-academy/",
    "DB_HOST" => "localhost",
    "DB_NAME" => "london-academy",
    "DB_USER" => "root",
    "DB_PASSWORD" => "",
];


// --------------------------------------------


try
{
$dbh = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config['DB_USER'], $config['DB_PASSWORD'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


// ------------------------------------------------


$conn = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// -------------------------------------------------



$link = mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>