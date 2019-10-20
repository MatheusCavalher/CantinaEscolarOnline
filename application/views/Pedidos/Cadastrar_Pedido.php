<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Cadastrar Pedido</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <form action="<?php echo base_url() ?>Pedidos/Cadastro_Pedido" method="post" autocomplete="off">
            <input type="hidden" id="valor_unit" name="valor_unit">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">  
                        <label>Tipo Cliente:</label>
                        <select class="form-control" id="tipo_cliente" name="tipo_cliente">
                            <option value="">-</option>
                            <option value="1">Funcionários</option>
                            <option value="2">Alunos</option>
                            <option value="3">Pais</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">  
                        <label>Cliente:</label>
                        <select class="form-control" id="cliente" name="cliente">
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">  
                        <label>Produto:</label>
                        <select class="form-control" id="produto" name="produto">
                            <?php echo $options_produtos; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">  
                        <label>Qtd:</label>
                        <select class="form-control" id="produto_qtd" name="produto_qtd">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">  
                        <label>Tipo Pagamento:</label>
                        <select class="form-control" id="tipo_pag" name="tipo_pag">
                            <option value="1">Fiado</option>
                            <option value="2">Dinheiro</option>
                            <option value="3">Crédito</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">  
                        <label>Valor Total:</label>
                        <input type="text" class="form-control" id="valor_total" name="valor_total">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">  
                        <label>Obs:</label>
                        <textarea class="form-control" style="resize: vertical" id="obs_pedido" name="obs_pedido" rows="4"></textarea>
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
                        <a href="<?php echo base_url('Cantina');?>" class="btn btn-danger btn-icon-split float-right mr-2">
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