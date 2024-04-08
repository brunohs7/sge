<?php  
	include 'cabecalho.php';
	 
 ?> 
<html>
<head>
    <title>Enviando arquivos com PHP</title>
</head>
<body>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Enviar Arquivos</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				<form action="envia_arquivos.php" method="post" enctype="multipart/form-data">
				<div class="form-row">
				<div class="form-group col-md-">
				<input type="text"  class="form-control" name="nome" value="">
				</div>
				<input type="file" name="userfile" value="">
				</div>
				<input type="submit" value="Enviar" class="btn btn-primary">
				
				</form>
				</div>
				</div>
				</div>
				</div>
				
				
				
 
</body>
</html>
<?php
include 'rodape.php';
?>