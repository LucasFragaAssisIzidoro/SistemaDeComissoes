<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/reluisa/public/js/erros.js"></script>

<body>
    <?php echo Sessao::mensagem('fornecedor'); ?>
    <section class="container">
        <h1>Produtos</h1>
        <article class="section services-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-lg-3">
                        <a href="#" data-toggle="modal" data-target="#adicionarFornecedor">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Adicionar Fornecedores</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- modal de entrada de produtos-->
                    <div class="modal fade" id="adicionarFornecedor" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicionar Produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= URL?>/fornecedores/cadastrarFornecedor" method="post" id="cadastrarfornecedor">
                                    <div class="form-group  px-4">
                                        <label for="nome">Nome:</label>
                                        <input type="text" class="form-control" id="nome_fornecedor" name="nome" required>
                                        <span class="invalid-feedback" id="mensagemErroNome"></span>
                                    </div>

                                    <div class="form-group  px-4">
                                        <label for="cor">Email:</label>
                                        <input type="email" class="form-control" id="email_fornecedor" name="email" required>
                                        <span class="invalid-feedback" id="mensagemErroValor"></span>
                                    </div>

                                    <div class="form-group  px-4">
                                        <label for="tamanho">Telefone:</label>
                                        <input type="text" class="form-control" id="telefone_fornecedor" name="telefone" required>
                                        <span class="invalid-feedback" id="mensagemErroQtde"></span>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-secondary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- fim modal de entrada de produtos-->


                    <div class="col-sm-9 col-lg-3">
                        <a href="<?php echo URL ?>/fornecedores/ver">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Ver Fornecedores</h5>
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