<?php 
	include 'cabecalho.php';
	$iddisciplina = $_GET['iddisciplina'];
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	require_once "../classes/conecta.class.php";
	$sql = "SELECT * FROM tbdisciplina JOIN tbprofessor ON tbdisciplina.tbprofessor_idprofessor = tbprofessor.idprofessor WHERE iddisciplina=$iddisciplina;";
	$stmt = Conecta::abrirConexao()->prepare($sql);
	$stmt->execute();
	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);	
	foreach ( $linhas as $linha ) {
	}
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
				<h4 class="m-0 font-weight-bold text-primary">Editar Disciplina: </strong><?php echo $linha['nome_disciplina'];?></h4>
			</div>
			<div class="card-body">
				<form method="POST" action="edita_disciplina.php?iddisciplina=<?php echo $linha['iddisciplina'];?>">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Nome da Disciplina</label>
							<input type="text" class="form-control" id="nome_disciplina" value="<?php echo $linha['nome_disciplina'];?>" name="nome_disciplina">
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
									echo "<option value=".$linha['idprofessor'].">".$linha['nome_completo']."</option>";
									foreach ( $execucoes as $execucao ) {
										if ($execucao['nome_completo'] != $linha['nome_completo']){
											echo "<option value=".$execucao['idprofessor'].">".$execucao['nome_completo']."</option>";
										}
									}
								?>
							</select>
						</div>
					</div>	
					<button type="submit" class="btn btn-primary">Editar Cadastro</button>				  
				</form>
			</div>
		</div>
	</div>
<?php
	include 'rodape.php';
?>