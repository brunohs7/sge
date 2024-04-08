<?php
include 'cabecalho.php';
require_once "../classes/conecta.class.php";
?>
	<div class="container-fluid"><br>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Matricular Alunos</h4>
			</div>
			<div class="card-body">
				<form method="POST" action="monta_turma.php">
				<div class="form-row">
					<div class="form-group col-md-4">
						<h5>Selecione a Turma</h5>
						<select class="custom-select" name="turma">
							<?php
								//prepara o SQL para listar turmas
								$sql = "SELECT * FROM tbturmas;";
								$stmt = Conecta::abrirConexao()->prepare($sql);
								$stmt->execute();
								//percorre por todos os registros encontrados e armazena num array
								$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach ( $linhas as $linha ) {
									echo "<option value=".$linha['idturma'].">".$linha['nome_turma']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<h5 style="margin-top:5px;">Selecione os Alunos</h5>
						<select multiple id="tabela-montar-turma" name="alunos[]" style="height:150px;">
							<?php
								//prepara o SQL para listar alunos
								$sql = "SELECT * FROM tbaluno WHERE status = 'Inativo' ;";
								$stmt = Conecta::abrirConexao()->prepare($sql);
								$stmt->execute();
								//percorre por todos os registros encontrados e armazena num array
								$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach ( $linhas as $linha ) {
									echo "<option value=".$linha['idaluno'].">".$linha['nome_completo']."</option>";
								}
							?>
						</select>
					</div>
				</div>
					<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
	</div>
	<style>
	.form-control {color:black !important; border: 1px solid #ababab;}
	</style>

<?php 
	include 'rodape.php';
?>