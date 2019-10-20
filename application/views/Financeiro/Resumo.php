<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Resumo Financeiro</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="resumo-tab" data-toggle="tab" href="#resumo" role="tab" aria-controls="resumo" aria-selected="true">Resumo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="PDF-tab" data-toggle="tab" href="#PDF" role="tab" aria-controls="PDF" aria-selected="false">PDF</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Excel-tab" data-toggle="tab" href="#Excel" role="tab" aria-controls="Excel" aria-selected="false">Excel</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="resumo" role="tabpanel" aria-labelledby="resumo-tab">
                <br>
                <form action="<?php echo base_url() ?>Financeiro" method="post" autocomplete="off" id="resumo_cantina">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Inicial:</label>
                                <input id="datepicker" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Final:</label>
                                <input id="datepicker2" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label>Tipo Cliente:</label>
                                <select class="form-control" id="tipo_cliente" name="tipo_cliente">
                                    <option value="-">-</option>
                                    <option value="1">Funcionários</option>
                                    <option value="2">Alunos</option>
                                    <option value="3">Pais</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label>Cliente:</label>
                                <select class="form-control" id="cliente" name="cliente">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-icon-split float-right mr-2 mb-2" name="resumo_cantina" id="resumo_cantina">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-money-check-alt"></i>
                                    </span>
                                    <span class="text">Resumo</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <hr>
                </form>
            </div>
            <div class="tab-pane fade" id="PDF" role="tabpanel" aria-labelledby="PDF-tab">
                <br>
                <form action="<?php echo base_url() ?>Financeiro" method="post" autocomplete="off" id="form_cantina">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Inicial:</label>
                                <input id="datepicker" class="form-control" id="data_inicial" name="data_inicial">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Final:</label>
                                <input id="datepicker2" class="form-control" id="data_final" name="data_final">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label>Tipo Cliente:</label>
                                <select class="form-control" id="tipo_cliente" name="tipo_cliente">
                                    <option value="-">-</option>
                                    <option value="1">Funcionários</option>
                                    <option value="2">Alunos</option>
                                    <option value="3">Pais</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label>Cliente:</label>
                                <select class="form-control" id="cliente" name="cliente">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-icon-split float-right mb-2" name="gerar_pdf_cantina" id="gerar_pdf_cantina">
                                    <span class="icon text-white-50">
                                        <i class="far fa-file-pdf"></i>
                                    </span>
                                    <span class="text">Gerar PDF</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <hr>
                </form>
            </div>
            <div class="tab-pane fade" id="Excel" role="tabpanel" aria-labelledby="Excel-tab">
                <br>
                <form action="<?php echo base_url() ?>Financeiro" method="post" autocomplete="off" id="form_cantina">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Inicial:</label>
                                <input id="datepicker" class="form-control" id="data_inicial" name="data_inicial">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Final:</label>
                                <input id="datepicker2" class="form-control" id="data_final" name="data_final">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label>Tipo Cliente:</label>
                                <select class="form-control" id="tipo_cliente" name="tipo_cliente">
                                    <option value="-">-</option>
                                    <option value="1">Funcionários</option>
                                    <option value="2">Alunos</option>
                                    <option value="3">Pais</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label>Cliente:</label>
                                <select class="form-control" id="cliente" name="cliente">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-icon-split float-right mr-2 mb-2" name="gerar_excel_cantina" id="gerar_excel_cantina">
                                    <span class="icon text-white-50">
                                        <i class="far fa-file-excel"></i>
                                    </span>
                                    <span class="text">Gerar Excel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <hr>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div id="resumo_tabela">

                </div>
            </div>
        </div>
        <br>    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="<?php echo base_url('Cantina');?>" class="btn btn-danger btn-icon-split float-right mr-2">
                        <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Voltar</span>
                    </a>
                </div>
            </div>
        </div>  
        <br> 
    </div>
  </div>
</div>