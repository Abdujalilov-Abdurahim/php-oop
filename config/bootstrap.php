<?php

require_once "autoload.php";

$conn = new Database("127.0.0.1", "oop-teach","root", "Abdurahim_777");
$pdo = $conn->connect();

Post::$pdo = $pdo;

?>