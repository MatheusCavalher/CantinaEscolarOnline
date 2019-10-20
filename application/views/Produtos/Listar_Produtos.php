<a href="<?php echo base_url('Produtos/Cadastrar_Produto');?>" class="btn btn-primary btn-icon-split">
  <span class="icon text-white-50">
  <i class="fas fa-plus"></i>
  </span>
  <span class="text">Cadastrar</span>
</a>
<hr>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Listagem de produtos</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Qtd</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Qtd</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </tfoot>
        <tbody>
        <?php foreach ($produtos as $produto) { ?>
          <tr>
            <td><?= $produto->produto_nome; ?></td>
            <td><?= $produto->produto_preco; ?></td>
            <td><?= $produto->produto_qtd; ?></td>
            <td class="text-center">
              <a href="<?php echo base_url('Produtos/Editar_Produto/'. $produto->produto_id) ?>" class="btn btn-warning btn-circle">
                <i class="far fa-edit"></i>
              </a>
            </td>
            <td class="text-center">
              <a href="<?php echo base_url('Produtos/Excluir_Produto/'. $produto->produto_id) ?>" class="btn btn-danger btn-circle" onclick="return confirm('Deseja realmente remover o produto ?');">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php } ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>