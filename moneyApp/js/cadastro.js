function login() {
    var email = $('#email').val();
    var senha = $('#senha').val();
    $('#error-message').html('');

    if (email.indexOf('@') == -1) {
        $('#error-message').html('O email deve conter um "@"');
    } else if (senha.length < 6) {
        $('#error-message').html('A senha deve ter pelo menos 6 caracteres');
    } else {
        var dados = {
            email: email,
            senha: senha
        };

        var jsonData = JSON.stringify(dados);

        $.ajax({
            url: '../classes/LoginService.php',
            type: 'POST',
            data: jsonData,
            contentType: 'application/json',
            success: function(response) {
              var data = JSON.parse(response);
                if (data.success) {
                    console.log(data);
                    window.location.href = data.redirect;
                }   else {
            console.error(data.error);
              }
            },
            error: function(xhr, status, error) {
                console.error("Erro ao realizar o login:");
            }
        });
    }
}

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
// Função para enviar dados do formulário para o servidor
function trocarSenha() {
    // Coleta os dados do formulário
    var senhaAtual = $("#senha_atual").val();
    var novaSenha = $("#nova_senha").val();
    var confirma = $("#confirmar_nova_senha").val();

    // Verifica se as novas senhas coincidem
    if (novaSenha !== confirma) {
        alert("A senha do campo confirma deve ser a mesma do campo nova senha!");
        return;
    }

    // Cria um objeto com os dados da troca de senha
    var dados = {
        senha_atual: senhaAtual,
        nova_senha: novaSenha
    };

    // Converte o objeto em formato JSON
    var jsonData = JSON.stringify(dados);
    console.log(jsonData);
    // Envia os dados para o servidor via AJAX
    $.ajax({
        url: '../classes/SenhaService.php', 
        type: 'POST',
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {
            console.log("Senha alterada com sucesso.");
        },
        error: function(xhr, status, error) {
            // Manipule o erro aqui, se necessário
            console.error("Erro ao alterar a senha:", error);
        }
    });
}


