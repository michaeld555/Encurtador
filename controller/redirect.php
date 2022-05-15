<?php

require "conexao.php";

$url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], '/')+1);
$newurl = explode("-", $url);
$id_rand = $newurl[1];
$id_link = $newurl[2];

$sql_add = "UPDATE link SET clicks = clicks+1 WHERE id_rand = '$id_rand' AND id_link = '$id_link'";
$sql_t = $mysqli->query($sql_add) or die("Falha ao Clickar: ".$mysqli->error);
$sql = "SELECT * FROM link WHERE id_rand = '$id_rand' AND id_link = '$id_link'";
$sql_q = $mysqli->query($sql) or die("Falha ao pegar: ".$mysqli->error);
$quantidade = $sql_q->num_rows;
$redirect = $sql_q->fetch_assoc();
$pagina = $redirect['link'];

if($quantidade > 0)
{
    if (strpos($pagina, '//') == true) {

        header("location: $pagina");
    }
    else if (strpos($pagina, '//') == false) {
        
        header("location: http://$pagina");
    }
}
else {
    header("location: ../index.php"); // Colocar Seu dominio de hospedagem
}