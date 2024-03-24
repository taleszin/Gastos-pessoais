<?php
// Aqui você pode adicionar lógica PHP para verificar se o usuário está autenticado e redirecioná-lo para a página de login se não estiver.
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gastos Pessoais</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Adicione outras importações de estilos, se necessário -->
    <style>
        /* Adicione estilos personalizados aqui */
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Gastos Pessoais</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configurações</a>
                    </li>
                </ul>         
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="button">Sair</button>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Bem-vindo ao Sistema de Gastos Pessoais!</h1>
            <p class="lead">Aqui você pode controlar suas despesas e receitas de forma fácil e eficaz.</p>
            <hr class="my-4">
            <p>Use o menu acima para navegar pelas diferentes funcionalidades do sistema.</p>
        </div>
    </main>

    <footer class="footer bg-light text-center py-3">
        <div class="container">
            <span class="text-muted">&copy; <?php echo date("Y"); ?> Sistema de Gastos Pessoais. Todos os direitos reservados.</span>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Adicione outros scripts, se necessário -->
</body>
</html>
