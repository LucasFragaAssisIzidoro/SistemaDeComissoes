<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabela de Bolsas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2>Tabela de Bolsas</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID Bolsa</th>
        <th>Vendedora</th>
        <th>Data Criação</th>
        <th>Data Vencimento</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
     
    <?php foreach($dados['bolsas'] as $bolsa): ?>
      <tr>
        <td><?= $bolsa->id_bolsa?></td>
        <td><?= $bolsa->nome_vendedora?></td>
        <td><?=date('d/m/Y', strtotime($bolsa->data_criacao))?></td>
        <td><?=date('d/m/Y', strtotime($bolsa->data_vencimento))?></td>
        <td><?=$bolsa->statusbolsa?></td>
        <td><button class="btn btn-primary btn-sm">Fechar Bolsa</button>
        <a href="<?=URL?>/bolsas/itens/<?=$bolsa->id_bolsa?>"><button class="btn btn-primary btn-sm">Ver Itens</button></a> <button class="btn btn-primary btn-sm">Editar</button></td>
      </tr>
    <?php endforeach;?>
      <!-- Mais linhas seriam adicionadas dinamicamente -->
    </tbody>
  </table>
</div>

</body>
</html>
