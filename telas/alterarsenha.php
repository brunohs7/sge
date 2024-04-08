<?php  
	include 'cabecalho.php';
	 
 ?> 
	<div class="container-fluid"><br>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Alterar Senha</h4>
			</div>
			<div class="card-body">
			<form action="alterasenha.php" method="POST"> 
			  <div class="form-row">
				<div class="form-group col-md-3">
				  <label>Email</label><br>
				   <input type="email" required="" class="form-control" name="email" > 
				</div>
				<div class="form-group col-md-2">
				  <label>Senha Atual</label><br>
				  <input type="password" required="" class="form-control" name="senhaatual" >  
				</div>				
				<div class="form-group col-md-2">
				  <label>Nova Senha</label><br>
				   <input type="password" required="" class="form-control" name="novasenha" >
				</div>
				</div>
				<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
	</div>

<?php
include 'rodape.php';
?>