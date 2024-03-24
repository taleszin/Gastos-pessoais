// Função para enviar dados do formulário para o servidor
function registrarUsuario() {
    // Coleta os dados do formulário
    var nome = $("#nome").val();
    var email = $("#email").val();
    var senha = $("#senha").val();
    var confirmarSenha = $("#confirmar_senha").val();

    // Verifica se as senhas coincidem
    if (senha !== confirmarSenha) {
        alert("As senhas não coincidem.");
        return;
    }

    // Cria um objeto com os dados do usuário
    var usuario = {
        nome: nome,
        email: email,
        senha: senha
    };

    // Converte o objeto em formato JSON
    var jsonData = JSON.stringify(usuario);

    // Envia os dados para o servidor via AJAX
    $.ajax({
        url: '../classes/RegistroService.php', // URL do script que insere os dados no banco de dados
        type: 'POST',
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {
            // Manipule a resposta do servidor aqui, se necessário
            console.log("Usuário registrado com sucesso.");
            $("#mensagem").text("Usuário registrado com sucesso.").addClass("text-success").show();
        },
        error: function(xhr, status, error) {
            // Manipule o erro aqui, se necessário
            console.error("Erro ao registrar usuário:", error);
        }
    });
}
