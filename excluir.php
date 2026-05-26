<?php
include 'conectar.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM produtos WHERE id=$id");
}

header('Location: estoque.php');
exit;
?>
