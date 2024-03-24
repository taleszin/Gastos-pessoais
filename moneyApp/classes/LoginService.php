<?php
// Inclui o arquivo de configuração do banco de dados
include("config.php");

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Query para selecionar o usuário com o email fornecido
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário existe no banco de dados
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verifica se a senha fornecida corresponde à senha no banco de dados
        if (password_verify($senha, $row['senha'])) {
            // Se a senha estiver correta, o login é bem-sucedido
            echo "Login bem-sucedido!";
            header("Location: ../view/inicio.php");
            exit();
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
    }
}
?>
