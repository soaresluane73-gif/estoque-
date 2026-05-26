if ($conn->query($sql)) {
    // Redireciona de volta para o arquivo PHP correto
    header('Location: index.php'); 
    exit; // Sempre use exit após um header location
}
<?php
include 'conectar.php';

// Verifica se os dados chegaram via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $minimo = $_POST['minimo'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, quantidade, minimo, preco) 
            VALUES ('$nome', '$quantidade', '$minimo', '$preco')";

    if ($conn->query($sql)) {
        // Se der certo, volta para a página principal
        header('Location: estoque.html'); 
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>
