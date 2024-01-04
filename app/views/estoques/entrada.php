<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="processar_formulario.php" method="post">
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                </div>

                <div class="form-group">
                    <label for="cor">Cor:</label>
                    <input type="text" class="form-control" id="cor" name="cor" required>
                </div>

                <div class="form-group">
                    <label for="tamanho">Tamanho:</label>
                    <input type="text" class="form-control" id="tamanho" name="tamanho" required>
                </div>

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="fornecedor">Selecione o Fornecedor:</label>
                    <select class="form-control" id="fornecedor" name="fornecedor" required>
                        <option value="">Selecione</option>
                        <option value="fornecedor1">Fornecedor 1</option>
                        <option value="fornecedor2">Fornecedor 2</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
