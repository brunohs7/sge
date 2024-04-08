<?php 
	include 'cabecalho.php';
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	if($cadastro=="ok"){
							echo  "<script language=javascript>alert( 'Dados alterados com sucesso!' );</script>";
						}
	if($cadastro=="erro"){
							echo  "<script language=javascript>alert( 'Erro ao alterar os dados!');</script>";
						}						
	?>		
	
	<div class="container-fluid"><br>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Cadastrar nova Turma</h4>
			</div>
			<div class="card-body">
			<form method="POST" action="cadastra_turma.php">
			  <div class="form-row">
				<div class="form-group col-md-3">
				  <label>Nome da Turma</label>
				  <input type="text" required="" class="form-control" id="nome_turma" name="nome_turma">
				</div>
				<div class="form-group col-md-2">
				  <label>Curso</label>
				  <input type="text" required="" class="form-control" id="curso" name="curso">
				</div>
				<div class="form-group col-md-2">
				  <label>Turno</label>
				  <input type="text" required="" class="form-control" id="turno" name="turno">
				</div>
				<div class="form-group col-md-2">
				  <label>Período</label>
				  <input type="text" required="" class="form-control" id="periodo" name="etapa">
				</div>
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>				  
			</form>
			</div>
		</div>
	</div>
<?php
	include 'rodape.php';
?>