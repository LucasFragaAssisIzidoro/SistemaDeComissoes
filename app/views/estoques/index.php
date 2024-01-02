<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .container {
            text-align: center;
        }

        .feature-box-1 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 150px; /* Altura do box */
            border: 1px solid #ccc; /* Adicionei uma borda para visualização */
            margin-bottom: 20px;
        }

        .feature-box-1 .icon {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .feature-box-1 h5 {
            font-size: 18px;
            margin: 0;
        }
    </style>
<body>
    <?php echo Sessao::mensagem('estoque'); ?>
    <section class="container">
        <h1>Produtos</h1>
        <article class="section services-section">
            <div class="container">
                <div class="row">
                <div class="col-sm-9 col-lg-3">

                        <a href="#" data-toggle="modal" data-target="#addItemModal">
                            <div class="feature-box-1">
                                <div class="icon">
                                <i class="fa fa-archive"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Cadastro de Produtos</h5>
                                </div>
                            </div>
                        </a>

                        <!-- modal de cadastro de produto -->

                        <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addItemModalLabel">Adicionar Produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?=URL?>/estoques/cadastrarprod" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="productcode">Código do produto</label>
                                            <input type="text" class="form-control" id="codeproduct" name="codeproduct"
                                                placeholder="Digite o código do produto" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit">Categoria</label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="" disabled selected>Selecione a categoria</option>
                                                <option value="meia">meia</option>
                                                <option value="cueca">cueca</option>
                                                <option value="calcinha">calcinha</option>
                                                <option value="conjunto">conjunto</option>
                                                <option value="pijama">pijama</option>
                                                <option value="camisola">camisola</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-secondary" id="saveItem">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- fim modal de adicao de produto -->

                    </div>
                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/entrada">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Entrada de Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/ver">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Ver Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/estoques/saida">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Saída de Produtos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section>
</body>

</html>