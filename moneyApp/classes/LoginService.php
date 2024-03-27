<?php
include("config.php");
include("LogService.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['email']) && isset($data['senha'])) {
        $email = $data['email'];
        $senha = $data['senha'];
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $ID = $row['id'];
            if (password_verify($senha, $row['senha'])) {
                session_start(); 
                $_SESSION['id_usuario'] = $ID;
                $_SESSION['email'] = $email;
                echo json_encode(["success" => true, "message" => "Login Realizado com sucesso $email + $ID", "redirect" => "../view/inicio.php"]);
                gravaEntrada($email, $ID); 
                exit();
            } else {
                // Senha incorreta
                echo json_encode(["success" => false, "error" => "Senha incorreta."]);
                exit();
            }
        } else {
            // Usuário não encontrado
            echo json_encode(["success" => false, "error" => "Usuario indefinido."]);
            exit();
        }
    } else {
        // Dados de entrada inválidos
        echo json_encode(["success" => false, "error" => "Dados de entrada inválidos."]);
        exit();
    }
}
?>
