<?php
include("classes/config.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador Financeiro Pessoal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/comum.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gerenciador Financeiro Pessoal</h1>
            <!-- Adicione aqui opções de navegação, como login, registro, etc., se aplicável -->
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <section class="cta-section">
                        <h2>Bem-vindo ao seu Gerenciador Financeiro Pessoal</h2>
                        <p>Aqui você pode controlar suas finanças de forma simples e eficaz.</p>
                        <a href="view/login.php" class="btn btn-success">Login</a> <!-- Link para a página de login -->
                        <a href="view/registro.php" class="btn btn-primary">Registrar-se</a> <!-- Link para a página de registro -->
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="features-section">
                        <h2>Principais Recursos</h2>
                        <ul>
                            <li>Registro de Transações</li>
                            <li>Categorização de Transações</li>
                            <li>Relatórios Financeiros</li>
                            <li>Gerenciamento de Categorias</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Gerenciador Financeiro Pessoal. Todos os direitos reservados @taleszin.</p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
