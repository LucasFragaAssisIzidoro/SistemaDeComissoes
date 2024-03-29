<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/reluisa/public/js/edit.js"></script>
    <script src="/reluisa/public/js/filter.js"></script>

</head>

<body>
    <div class="tab-content">
        <section class="container">
        <?php echo Sessao::mensagem('produto');?>


            <button class="btn btn-primary mb-3" id="toggleFilterArea">Mostrar Filtros</button>

            
            <div id="filterArea" style="display: none;">
                <form action="<?= URL ?>/estoques/pesquisa" method="POST">

                    <div class="form-group">
                        <label for="codigo_produto">Filtrar por Código:</label>
                        <input type="text" class="form-control" id="filtroCodigo" name="codigo_produto" placeholder="Digite o código">
                    </div>

                    <button type="submit" class="btn btn-warning">Aplicar Filtros</button>
                </form>
            </div>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col" id="ac">Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelaProdutos">
                    <?php foreach ($dados['produto'] as $produto) : ?>

                        <tr>
                            <td><?php echo $produto->cod_mercadoria; ?></td>
                            <td><?php echo $produto->nome_produto; ?></td>
                            <td><?php echo "R$".$produto->valor_produto; ?></td>                            
                            <td><?php echo $produto->quantidade_produto; ?></td>
                            <td><?php echo $produto->id_fornecedor; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm mr-2 editButton" data-toggle="modal" data-target="#editItemModal" data-id="<?= $produto->id_produto ?>" data-nome="<?= $produto->nome_produto ?>" data-codigo="<?= $produto->cod_mercadoria ?>" data-idfornecedor="<?= $produto->id_fornecedor ?>" data-valorprod="<?= $produto->valor_produto?>" data-quantidade="<?= $produto->quantidade_produto ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="#" class="btn btn-danger btn-sm deleteButton" data-id="<?= $produto->id_produto ?>" data-toggle="modal" data-target="#confirmDeleteModal">
                                    <i class="fas fa-trash"></i> Deletar
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- modal de edicao -->

    <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Editar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= URL ?>/estoques/editarProduto" method="post" id="editarProduto">
                        <div class="form-group px-4">
                            <label for="codigo">Código:</label>
                            <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" required>
                            <input type="text" class="form-control" id="id_produto" name="id_produto" hidden>
                            <span class="invalid-feedback" id="mensagemErroCodigo"></span>
                        </div>
                        <div class="form-group  px-4">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
                            <span class="invalid-feedback" id="mensagemErroNome"></span>
                        </div>

                        <div class="form-group  px-4">
                            <label for="tamanho">Quantidade:</label>
                            <input type="number" class="form-control" id="quantidade_produto" name="quantidade_produto" required>
                            <span class="invalid-feedback" id="mensagemErroQtde"></span>
                        </div>

                        <div class="form-group  px-4">
                            <label for="tamanho">Valor:</label>
                            <input type="decimal" class="form-control" id="valor_produto" name="valor_produto" required>
                            <span class="invalid-feedback" id="mensagemErroValor"></span>
                        </div>

                        <div class="form-group px-4">
                            <label for="fornecedor">Selecione o Fornecedor:</label>
                            <select class="form-control" id="fornecedor_produto" name="fornecedor_produto" required>
                                <option value="" disabled selected>Selecione o fornecedor </option>
                                <?php foreach ($dados["fornecedores"] as $fornecedor) : ?>
                                    <option value="<?php echo $fornecedor->id_fornecedor ?>">
                                        <?= $fornecedor->nome_fornecedor ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-secondary" id="saveItem">Salvar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- fim modal de edicao -->

    <!-- modal de exclusao -->
    <?php foreach ($dados['produto'] as $produto) : ?>
    <form method="post" action="<?=URL?>/estoques/deletar/<?=$produto->cod_mercadoria?>">
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="confirmDeleteBtn">Deletar</button>
                </div>
            </div>
        </div>
        <!-- fim modal de exclusao -->
    </div>
    </form>
    <?php endforeach;?>
</body>

</html>