<?php

require "conexao.php";
header('Content-Type: application/json');

$link = $_POST["link"];
$id = rand(1, 999);

$cadastro = "INSERT INTO link (id_rand, link, clicks) VALUES('$id', '$link', 0)";
$query = $mysqli->query($cadastro) or die("Falha ao gerar: ".$mysqli->error);

$consulta = "SELECT * FROM link WHERE id_rand = '$id' AND link = '$link'";
$cquery = $mysqli->query($consulta) or die("Falha ao gerar: ".$mysqli->error);

$resposta = $cquery->fetch_assoc();
$id2 = $resposta['id_link'];

$linkgerado = "localhost/Encurtador/controller/redirect.php?-".$id."-".$id2.""; // Colocar Seu dominio de hospedagem

echo json_encode($linkgerado);