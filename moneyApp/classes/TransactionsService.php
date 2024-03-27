<?php
include("config.php");
include("LogService.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar se o parâmetro 'id' está presente na solicitação GET
    if(isset($_GET['id'])) {
        $ID = $_GET['id'];
        $sql_select = "SELECT * FROM money.gastos WHERE UserID = ?";
        $stmt_select = $conexao->prepare($sql_select);
        $stmt_select->bind_param("i", $ID);
        $stmt_select->execute();
        $result = $stmt_select->get_result();
        $transacoes = array();

        while ($row = $result->fetch_assoc()) {
            $transacoes[] = array(
                'id' => $row['id'],
                'descricao' => $row['descricao'],
                'valor' => $row['valor'],
                'data' => $row['data']
            );
        }

        echo json_encode($transacoes);
        exit();
    } else {
        // A solicitação GET será tratada quando o usuário acionar a função editarTransacao() no JavaScript
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['dados'])) {
        $gasto = $data['dados']; // Apenas um único objeto de gastos
        $requiredProperties = ['descricao', 'valor', 'data', 'id'];
        $gastoKeys = array_keys($gasto);
        if (count(array_diff($requiredProperties, $gastoKeys)) == 0) {
            // Prepara e executa a inserção no banco de dados
            $sql_insert = "INSERT INTO money.gastos (UserID, descricao, valor, data) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conexao->prepare($sql_insert);
            $stmt_insert->bind_param("isds", $gasto['id'], $gasto['descricao'], $gasto['valor'], $gasto['data']);
            $stmt_insert->execute();

            echo json_encode(["success" => true, "message" => "Gasto inserido com sucesso."]);
            exit();
        } else {
            echo json_encode(["success" => false, "error" => "Alguma propriedade está faltando"]);
            exit();
        }
    } else {
        // Dados de entrada inválidos
        echo json_encode(["success" => false, "error" => "Dados de entrada invalidos."]);
        exit();
    }
}
?>
