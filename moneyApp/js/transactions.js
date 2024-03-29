
function CriarGasto() {
    var popupContent = `
        <div class="modal fade" id="criarGastoModal" tabindex="-1" role="dialog" aria-labelledby="criarGastoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="criarGastoModalLabel">Registrar Novo Gasto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCriarGasto">
                            <div class="form-group">
                                <label for="descricao">Descrição:</label>
                                <input type="text" class="form-control" id="descricao" required>
                            </div>
                            <div class="form-group">
                                <label for="valor">Valor:</label>
                                <input type="number" class="form-control" id="valor" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="data">Data:</label>
                                <input type="date" class="form-control" id="data" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" onclick="registraGasto()">Registrar Gasto</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    var confirmaContent = `
        <div class="modal fade" id="confirmaModal" tabindex="-1" role="dialog" aria-labelledby="confirmaModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmaModalLabel">Sucesso!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Gasto registrado com sucesso!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $("body").append(popupContent);
    $("body").append(confirmaContent);
    $("#criarGastoModal").modal("show");
}

function registraGasto() {
    var descricao = $("#descricao").val();
    var valor = $("#valor").val();
    var data = $("#data").val();
    var id = $("#id_usuario").val();
    var dados = {
        descricao: descricao,
        valor: valor,
        data: data,
        id: id
     
    };

    var jsonData = JSON.stringify({ dados: dados });
    console.log(jsonData);
    $.ajax({
        url: '../classes/TransactionsService.php',
        type: 'POST',
        contentType: 'application/json',
        data: jsonData,
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success){
                console.log("deu certo" + data.success);
                $("#criarGastoModal").modal("hide");
                $("#confirmaModal").modal("show");
            }
            else { console.log("deu erro");
            }           
        },
        error: function(xhr, status, error) {
            console.error("Erro ao registrar o gasto:", error);
        }
    });
}
function editarTransacao() {
    var popupContent = `
        <div class="modal fade" id="editarTransacaoModal" tabindex="-1" role="dialog" aria-labelledby="editarTransacaoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarTransacaoModalLabel">Histórico de Transações</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table" id="transactionTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $("body").append(popupContent);
    $("#editarTransacaoModal").modal("show");
    var id = $("#id_usuario").val();
    $.ajax({
        url: '../classes/TransactionsService.php',
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        success: function(response) {
            // Limpar a tabela de transações
            $('#transactionTable tbody').empty();
            for (var i = 0; i < response.length; i++) {
                var transaction = response[i];
                $('#transactionTable tbody').append(
                    '<tr>' +
                    '<td>' + transaction.id + '</td>' +
                    '<td>' + transaction.descricao + '</td>' +
                    '<td>' + transaction.valor + '</td>' +
                    '<td>' + transaction.data + '</td>' +
                    '</tr>'
                );
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro ao obter transações:', status, error);
        }
    });
}


