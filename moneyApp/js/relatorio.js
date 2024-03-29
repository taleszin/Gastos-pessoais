function gerarPlanilha() {
    var id = $("#id_usuario").val();
    $.ajax({
        url: '../classes/RelatorioService.php',
        type: 'GET',
        data: {id: id},
        dataType: 'text',
        success: function(response) {
            var blob = new Blob([response], { type: 'text/csv' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'relatorio.csv';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            console.log("Arquivo CSV gerado com sucesso");
        },
        error: function(xhr, status, error) {
            console.error('Erro ao obter transações:', status, error);
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
