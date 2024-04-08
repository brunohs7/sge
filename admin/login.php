<?php
$login_code= isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
if($login_code=="false"){
    $login_message="Dados Incorretos!";
	  $color="red";
}
else{
    $login_message="Por favor insira seu e-mail e senha!";
	  $color="green";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SGE - Sistema de Gerenciamento Escolar</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
              <div class="col-lg-6 d-none d-lg-block bg-login-image" style="height:450px;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                  <br>  <h1 class="h4 text-gray-900 mb-4" style="margin-bottom: 30px !important;">Bem vindo!</h1>
                  </div>
				  <div class="text-center mb-2">
					<?php if($login_code=="false"){
							$login_message="Dados Incorretos!";
							  $color="red";
							  echo "<font size='4' color='$color'>".$login_message."</font>";
						}
					?>
				  </div>
                  <form action="logar.php" method="POST" class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Digite seu usuário">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="senha" name="senha">
                    </div><br>
					<input type="submit" value="Logar" class="btn btn-primary btn-user btn-block">
					<br>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>