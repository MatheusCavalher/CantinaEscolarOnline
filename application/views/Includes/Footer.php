</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url() ?>Cantina/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

  
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

  <script src="<?= base_url(); ?>assets/js/jquery.maskMoney.js" type="text/javascript"></script>	
  <script src="<?= base_url(); ?>assets/js/mascaradinheiro_input.js" type="text/javascript"></script>
   <script src="<?php base_url(); ?>assets/datetimepicker/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript"> 
    $('#resumo_cantina').on('submit', function (event) {
      event.preventDefault();

      var data_inicial = $('#datepicker').val();
      var data_final = $('#datepicker2').val();
      var tipo_cliente = $('#tipo_cliente').val();
      var cliente = $('#cliente').val();
      jQuery.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>" + "Financeiro/gerarResumo",
          dataType: 'json',
          data: {data_inicial: data_inicial,
                data_final: data_final,
                tipo_cliente: tipo_cliente,
                cliente: cliente},
          success: function (dados) {
              $("#resumo_tabela").html(dados);
          }
      });  
    });
</script>

  <script type="text/javascript">
    $("select#tipo_cliente").on("change", function () {
        $('select#cliente').empty();
        var tipo_cliente = $('select#tipo_cliente').val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Pedidos/ProcuraClientePorTipo",
            dataType: 'json',
            data: {tipo_cliente: tipo_cliente},
            success: function (dados) {
                $('select#cliente').html(dados);
            }
        });
    });
</script>
<script type="text/javascript">
    $("select#produto").on("change", function () {
        var produto = $('select#produto').val();
        var qtd_prod = $('select#produto_qtd').val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Pedidos/PegaValorUnitProd",
            dataType: 'json',
            data: {produto: produto},
            success: function (dados) {
                //var calculo = qtd_prod * dados[0].produto_preco;
                $("#valor_unit").val(dados[0].produto_preco);
                $("#valor_total").val(dados[0].produto_preco);
            }
        });
    });
</script>

<script type="text/javascript">
    $("select#produto_qtd").on("change", function () {
        var valor_total = $('#valor_total');
        var valor_unit = $('#valor_unit').val();
        var qtd_prod = $('select#produto_qtd').val();
        var calculo = qtd_prod * valor_unit;
        valor_total.val(calculo);
    });
</script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd/mm/yyyy'
    });
    $('#datepicker2').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd/mm/yyyy'
    });
</script>

</body>
</html>