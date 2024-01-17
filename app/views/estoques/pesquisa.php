<?=var_dump($_POST)?>
<?=var_dump($dados)?>

<table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col" id="ac">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados['produto'] as $produto) : ?>

                        <tr>
                            <td><?php echo $produto->cod_mercadoria; ?></td>
                            <td><?php echo $produto->nome_produto; ?></td>
                            <td><?php echo $produto->cor_produto; ?></td>
                            <td><?php echo $produto->tamanho_produto; ?></td>
                            <td><?php echo $produto->quantidade_produto; ?></td>
                            <td><?php echo $produto->id_fornecedor; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm mr-2 editButton" data-toggle="modal" data-target="#editItemModal" data-id="<?= $produto->id_produto ?>" data-nome="<?= $produto->nome_produto ?>" data-codigo="<?= $produto->cod_mercadoria ?>" data-idfornecedor="<?= $produto->id_fornecedor ?>" data-tamanho="<?= $produto->tamanho_produto ?>" data-cor="<?= $produto->cor_produto ?>" data-quantidade="<?= $produto->quantidade_produto ?>">
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