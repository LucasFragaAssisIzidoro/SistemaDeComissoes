<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/reluisa/public/js/erros.js"></script>
   
<body>
    <?php echo Sessao::mensagem('estoque'); ?>
    <section class="container">
        <h1>Produtos</h1>
        <article class="section services-section">
            <div class="container">
                <div class="row">
                <div class="col-sm-9 col-lg-3">

                        <a href="#" data-toggle="modal" data-target="#adicionarMercadoria">
                            <div class="feature-box-1">
                                <div class="icon">
                                <i class="fa fa-archive"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Cadastro de Mercadoria</h5>
                                </div>
                            </div>
                        </a>

                        <!-- modal de cadastro de mercadoria -->

                        <div class="modal fade" id="adicionarMercadoria" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicionar Produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?=URL?>/estoques/cadastrarmercadoria" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="text-left">Código do produto</label>
                                            <input type="text" class="form-control is-invalid float-right" id="cod_mercadoria" name="cod_mercadoria"
                                                placeholder="Digite o código do produto" required>
                                                <span class="invalid-feedback" id="mensagemErro">GENTE</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit">Categoria</label>
                                            <select name="categoria_mercadoria" id="categoria_mercadoria" class="form-control" required>
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

                    <!-- fim modal de adicao de mercadoria -->

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