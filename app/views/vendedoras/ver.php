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
    <script src="/reluisa/public/js/edit3.js"></script>

</head>

<body>
    <div class="tab-content">
        <section class="container">
        <?php echo Sessao::mensagem('vendedora');?>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col" id="ac">Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelaVendedores">
                    
                    <?php foreach ($dados['vendedora'] as $vendedora) : ?>

                        <tr>
                            <td><?php echo $vendedora->nome_vendedora; ?></td>
                            <td><?php echo $vendedora->email_vendedora; ?></td>
                            <td><?php echo $vendedora->telefone_vendedora; ?></td> 
                            <td><?php echo $vendedora->endereco_vendedora; ?></td>                            
                            <td>
                                <a href="#" class="btn btn-warning btn-sm mr-2 editButton3" data-toggle="modal" data-target="#editItemModal" data-id="<?= $vendedora->id_vendedora ?>" data-nome="<?= $vendedora->nome_vendedora?>" data-email="<?= $vendedora->email_vendedora?>" data-telefone="<?php echo $vendedora->telefone_vendedora?>" data-endereco="<?= $vendedora->endereco_vendedora?>">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="#" class="btn btn-danger btn-sm deleteButton" data-toggle="modal" data-target="#confirmDeleteModal">
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
                    <h5 class="modal-title" id="editItemModalLabel">Editar Vendedora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= URL ?>/vendedoras/editar" method="post" id="editarProduto">
                        <div class="form-group  px-4">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                            <span class="invalid-feedback" id="mensagemErroNome"></span>
                        </div>

                        <div class="form-group  px-4">
                            <label for="tamanho">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group  px-4">
                            <input type="hidden" class="form-control" id="id" name="id" required>
                        </div>


                        <div class="form-group  px-4">
                            <label for="tamanho">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="form-group  px-4">
                            <label for="tamanho">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" required>
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
    <?php foreach ($dados['vendedora'] as $vendedora) : ?>
    <form method="post" action="<?=URL?>/vendedoras/deletar/<?=$vendedora->id_vendedora?>">
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