<?php 
	require_once "../classes/conecta.class.php";
	include 'cabecalho.php';	
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	if($cadastro=="ok"){
							echo  "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
						}
	if($cadastro=="erro"){
							echo  "<script language=javascript>alert( 'Erro ao cadastrar a disciplina!');</script>";
						}						
	?>		
	
	<div class="container-fluid">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Cadastrar Disciplina</h4>
            </div>
            <div class="card-body">
				<form method="POST" action="cadastra_disciplina.php">
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label>Nome da Disciplina</label>
						  <input type="text" required=""  class="form-control" id="nome_disciplina" name="nome_disciplina">
						</div>
						<div class="form-group col-md-6">
						  <label>Professor</label><br>
							<select class="custom-select form-control" id="idprofessor" name="idprofessor">
								<?php
									//prepara o SQL para listar turmas
									$query = "SELECT * FROM tbprofessor;";
									$conectar = Conecta::abrirConexao()->prepare($query);
									$conectar->execute();
									//percorre por todos os registros encontrados e armazena num array
									$execucoes = $conectar->fetchAll(PDO::FETCH_ASSOC);
									foreach ( $execucoes as $execucao ) {
										echo "<option value=".$execucao['idprofessor'].">".$execucao['nome_completo']."</option>";
									}
								?>
							</select>
						</div>
					</div>	
					<button type="submit" class="btn btn-primary"> Cadastrar </button>				  
				</form>
			</div>
		</div>
	</div>

<?php
	include 'rodape.php';
?>