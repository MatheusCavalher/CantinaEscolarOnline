<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cantina</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                <br>
                  <br>
                  <br>
                  <br>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Cantina</h1>
                  </div>
                  <form class="user" method="post" action="<?php echo base_url(); ?>Cantina/logar">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="login" name="login" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" id="comecar">
                      Login
                    </button>
                    <div class="text-center">
                      <p id="aviso"></p>
                    </div>
                  </form>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
            </div>
          </div>
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

  <script type="text/javascript">
     $("#comecar").click(function (event) {
          event.preventDefault();

          var login = document.getElementById("login").value;
          var senha = document.getElementById("senha").value;

          $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>" + "Cantina/logar",
               dataType: 'json',
               data: {login: login,
                      senha: senha},
               success: function (dados) {
                    if (dados === "success")
                         window.location.href = "<?php echo base_url(); ?>" + "Cantina";
                    else
                         $('#aviso').html(dados);
                    
               }
          });

     });
</script>
</body>

</html>
