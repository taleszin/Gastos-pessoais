<?php
session_start();
if(isset($_SESSION['id_usuario']) && isset($_SESSION['email'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gastos Pessoais</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                        <a class="nav-link" href="#transactions">Transações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reports">Relatórios</a>
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
        <div class="jumbotron" id="transactions">
            <h2 class="display-4">Transações Financeiras</h2>
            <p class="lead">Esta seção permite que você adicione, visualize e gerencie suas transações financeiras.</p>
            <hr class="my-4">
            <p>Aqui você pode adicionar novas transações, editar ou excluir transações existentes, e visualizar um resumo de suas transações.</p>
            <p>Utilize os filtros e opções de ordenação para facilitar a visualização de suas transações.</p>
            <p>Além disso, você pode classificar suas transações por data, tipo, categoria, etc.</p>
        </div>

        <section id="reports" class="mt-5">
            <h2>Relatórios Financeiros</h2>
            <p>A seção de relatórios oferece uma análise detalhada de suas finanças, incluindo despesas, receitas e tendências ao longo do tempo.</p>
        </section>
    </main>

    <footer class="footer bg-light text-center py-3">
        <div class="container">
            <span class="text-muted">&copy; <?php echo date("Y"); ?> Sistema de Gastos Pessoais. Todos os direitos reservados.</span>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
