function entrada(id) {
    const valor = prompt("Quantidade de entrada:");
    if(valor) enviar(id, 'entrada', valor);
}

function saida(id) {
    const valor = prompt("Quantidade de saída:");
    if(valor) enviar(id, 'saida', valor);
}

function enviar(id, tipo, valor) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'atualizar.php';
    form.innerHTML = `
        <input type="hidden" name="id" value="${id}">
        <input type="hidden" name="tipo" value="${tipo}">
        <input type="hidden" name="valor" value="${valor}">
    `;
    document.body.appendChild(form);
    form.submit();
}
