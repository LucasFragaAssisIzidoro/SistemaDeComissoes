<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="processar_formulario.php" method="post">
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                </div>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="cor">Cor:</label>
                    <input type="text" class="form-control" id="cor" name="cor" required>
                </div>

                <div class="form-group">
                    <label for="tamanho">Quantidade:</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>

                <div class="form-group">
                    <label for="fornecedor">Selecione o tamanho:</label>
                    <select class="form-control" id="tamanho" name="tamanho" required>
                        <option value="" disabled selected>Selecione o tamanho</option>
                        <option value="P">P (Adulto)</option>
                        <option value="PP">PP (Adulto)</option>
                        <option value="P">M (Adulto)</option>
                        <option value="PP">G (Adulto)</option>
                        <option value="P">GG (Adulto)</option>
                        <option value="PP">XG (Adulto)</option>
                        <option value="P">P (Criança)</option>
                        <option value="PP">PP (Criança)</option>
                        <option value="P">M (Criança)</option>
                        <option value="PP">G (Criança)</option>
                        <option value="P">GG (Criança)</option>
                        <option value="PP">XG (Criança)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fornecedor">Selecione o Fornecedor:</label>
                    <select class="form-control" id="fornecedor" name="fornecedor" required>
                        <option value="">Selecione</option>
                        <option value="fornecedor1">Fornecedor 1</option>
                        <option value="fornecedor2">Fornecedor 2</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
