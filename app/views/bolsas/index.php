<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">\
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/reluisa/public/js/addCampo.js"></script>
    <script>
    $(document).ready(function() {
        $('#vendedora').change(function() {
            console.log("Estou aqui"); // Verifica se o evento de alteração está sendo acionado
            var nome_vendedora = $(this).find('option:selected').text();
            console.log("Texto selecionado:", nome_vendedora); // Verifica o texto selecionado
            $('#nome').val(nome_vendedora); // Tenta atribuir o valor ao campo
            console.log("Valor atribuído:", $('#nome').val()); // Verifica se o valor foi atribuído corretamente
        });
    });
</script>

<body>
    <section class="container">
        <h1>Bolsas</h1>
        <div class="container">
            <div class="row">
                <!-- icone de criar bolsa -->
                <div class="col-sm-9 col-lg-3">
                    <a href="#" data-toggle="modal" data-target="#criarBolsa">
                        <div class="feature-box-1">
                            <div class="icon">
                                <i class="fa fa-archive"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Cadastro de Bolsa</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- fim icone criar bolsa -->

                <!-- modal de criar bolsa -->
                <div class="modal fade" id="criarBolsa" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Criar Bolsa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= URL ?>/bolsas/cadastrar" method="post" id="cadastrarBolsa">
                                <section id="formulario">
                                <div class="form-group px-4">
                                    <label for="fornecedor">Data de Vencimento:</label>
                                    <input type="date" name="data_vencimento" id="data_vencimento" class="form-control">
                                </div>
                                <div class="form-group px-4">
                                    <label for="fornecedor">Selecione a Vendedora:</label>
                                    <select class="form-control" id="vendedora" name="vendedora" required>
                                        <option value="" disabled selected>Selecione a vendedora </option>
                                        <?php foreach ($dados["vendedoras"] as $vendedoras) : ?>
                                            <option value="<?php echo $vendedoras->id_vendedora ?>">
                                                <?= $vendedoras->nome_vendedora ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    

                                </div>
                                <input type="hidden" id="nome" name="nome" value="">

                                <div class="form-group row px-4">
                                    <div class="col">
                                        <label for="codigo">Código:</label>
                                        <input type="number" class="form-control form-control-sm" id="codigo" name="codigo" required>
                                    </div>
                                    <div class="col">
                                        <label for="quantidade">Quantidade:</label>
                                        <input type="number" class="form-control form-control-sm" id="quantidade" name="quantidade" required>
                                    </div>
                                    <div class="col">
                                        <input type="button" class="btn btn-secondary" id="adicionarCampo" name="adicionarCampo" value="+">
                                    </div>
                                </div>
                                </section>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-secondary" id="saveItem">Salvar</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- fim modal de criar bolsa -->

                <!-- icone de criar adicional -->
                <div class="col-sm-9 col-lg-3">
                    <a href="#" data-toggle="modal" data-target="#adicionalBolsa">
                        <div class="feature-box-1">
                            <div class="icon">
                                <i class="fa fa-archive"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Adicional Bolsa</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- fim icone criar adicional-->

                <!-- modal de criar adicional-->
                <!-- fim modal de criar adicional -->

                <!-- icone de ver bolsas -->
                <div class="col-sm-9 col-lg-3">
                    <a href="<?=URL?>/bolsas/ver" >
                        <div class="feature-box-1">
                            <div class="icon">
                                <i class="fa fa-archive"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Ver Bolsas</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- fim icone ver bolsas-->
            </div>
        </div>
    </section>
</body>