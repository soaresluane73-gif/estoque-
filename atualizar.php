<?php
include 'conectar.php';

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];

if($tipo == 'entrada') {
    $sql = "UPDATE produtos SET quantidade = quantidade + $valor WHERE id = $id";
} else {
    $sql = "UPDATE produtos SET quantidade = quantidade - $valor WHERE id = $id";
}

$conn->query($sql);

header('Location: index.php');
?>
