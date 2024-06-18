<?php 
use Dotenv\Dotenv;

require './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];

$url = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';

try{
    $pdo = new PDO($url, $user, $password);
} catch(PDOException $e){
    print_r($e->getMessage());
}

?>