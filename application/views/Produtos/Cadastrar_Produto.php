<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Cadastrar Produto</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <form action="<?php echo base_url() ?>Produtos/Cadastro_Produto" method="post" autocomplete="off">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" id="produto_nome" name="produto_nome">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Preço:</label>
                        <input type="text" class="form-control" id="produto_preco" name="produto_preco">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Qtd:</label>
                        <input type="number" class="form-control" id="produto_qtd" name="produto_qtd">
                    </div>
                </div>
                
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Cadastrar</span>
                        </button>

                        <a href="<?php echo base_url('Produtos');?>" class="btn btn-danger btn-icon-split float-right mr-2">
                            <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Voltar</span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <br>       
    </div>
  </div>
</div>