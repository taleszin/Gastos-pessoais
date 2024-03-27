function gerarPlanilhaGastos() {
    var dados = {

    };

    var jsonData = JSON.stringify(dados);

    $.ajax({
        url: '../classes/RelatorioService.php',
        type: 'POST',
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {
        },
        error: function(xhr, status, error) {
            // Manipule o erro aqui, se necessário
            console.error("Erro ao gerar planilha de gastos:", error);
        }
    });
}

function gerarRelatorio() {

    var dados = {
    };

    var jsonData = JSON.stringify(dados);

    $.ajax({
        url: '../classes/RelatorioService.php',
        type: 'POST',
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {
            console.log("Relatório gerado com sucesso.");
        },
        error: function(xhr, status, error) {
            // Manipule o erro aqui, se necessário
            console.error("Erro ao gerar relatório:", error);
        }
    });
}

function visualizarTendencias() {
    var dados = {

    };

    var jsonData = JSON.stringify(dados);

    $.ajax({
        url: '../classes/RelatorioService.php',
        type: 'POST',
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {
        },
        error: function(xhr, status, error) {
            // Manipule o erro aqui, se necessário
            console.error("Erro ao visualizar tendências:", error);
        }
    });
}
