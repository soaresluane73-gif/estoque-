<?php include 'conectar.php'; ?>
<h1>📦 Controle de Estoque</h1>

<form action="salvar.php" method="POST">
    <input type="text" name="nome" placeholder="Nome do produto" required>

    <input type="number" name="quantidade" placeholder="Quantidade" required>

    <input type="number" name="minimo" placeholder="Estoque mínimo" required>

    <input type="number" step="0.01" name="preco" placeholder="Preço" required>

    <button type="submit">Cadastrar</button>
</form>

<table>

<thead>
<tr>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço</th>
    <th>Status</th>
    <th>Ações</th>
</tr>
</thead>

<tbody>

        <?php

$result = $conn->query("SELECT * FROM produtos ORDER BY id DESC");

while($row = $result->fetch_assoc()) {

$status = ($row['quantidade'] <= $row['minimo'])
? "<span class='alerta'>⚠ ESTOQUE BAIXO</span>"
: "<span class='ok'>OK</span>";

echo "
<tr>
    <td>{$row['nome']}</td>
    <td>{$row['quantidade']}</td>
    <td>R$ {$row['preco']}</td>
    <td>$status</td>

    <td class='acoes'>
        <button class='btn-entrada' onclick='entrada({$row['id']})'>+</button>

        <button class='btn-saida' onclick='saida({$row['id']})'>-</button>
         <a href='excluir.php?id={$row['id']}'>
        <button type='button' class='btn-excluir'>X</button>
</a>
    </td>
</tr>
";
}
?>

</tbody>
</table>
</div>
<link rel="stylesheet" href="estoque.css">
<script src="estoque.js"></script>
</body>
</html>
