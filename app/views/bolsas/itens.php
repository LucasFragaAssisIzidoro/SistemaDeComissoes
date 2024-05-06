<div class="container">
  <h2>Detalhes da Bolsa</h2>
  <?php if (!empty($dados['bolsa'])): ?>
    <?php $bolsa = $dados['bolsa'][0]; ?>
    <div class="row">
      <div class="col-md-4">
        <p><strong>Nome da Vendedora:</strong> <?= $bolsa->nome_vendedora ?></p>
        <p><strong>Data de Vencimento:</strong> <?= date('d/m/Y', strtotime($bolsa->data_vencimento))?></p>
      </div>
      <div class="col-md-8">
        <h4>Itens da Bolsa</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Código Mercadoria</th>
              <th>Quantidade</th>
              <th>Preço Uni.</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($dados['itens'] as $itens): ?>
              <tr>
                <td><?= $itens->cod_mercadoria?></td>
                <td><?= $itens->quantidade?></td>
                <td>R$<?=$itens->valor_produto?></td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    
  <?php endif ?>
</div>
   
