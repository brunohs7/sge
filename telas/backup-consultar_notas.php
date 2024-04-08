<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
include 'cabecalho.php';
if (isset($_SESSION['idturma'])){
	$idturma = $_SESSION['idturma'];
}
if (isset($_GET['etapa'])){
	$etapa = $_GET['etapa'];
}
if (isset($_GET['iddisciplina'])){
	$iddisciplina = $_GET['iddisciplina'];
}
if (isset($_GET['n_bimestre'])){
	$n_bimestre = $_GET['n_bimestre'];
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Minhas Notas</h1>
			<div class="form-row">

				<form method="GET" action="consulta_notas.php" class="col-md-12">
					<div class="col-md-4" style="float:left;padding:0px !important;">
						<br>
							<h5>Selecione a Disciplina</h5>
							<select class="custom-select" name="iddisciplina" style="width:200px;">';
								<?php	
									if (isset($idturma)){
										//prepara o SQL para listar turmas
										$sql2 = "SELECT * FROM tbdisciplina INNER JOIN tbdisciplinas_da_turma ON tbdisciplinas_da_turma.tbdisciplina_iddisciplina = tbdisciplina.iddisciplina WHERE tbdisciplinas_da_turma.tbturmas_idturma = $idturma;";
										$stmt2 = Conecta::abrirConexao()->prepare($sql2);
										$stmt2->execute();
										//percorre por todos os registros encontrados e armazena num array
										$linhas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
										foreach ( $linhas2 as $linha2 ) {
											echo "<option value=".$linha2['iddisciplina'].">".$linha2['nome_disciplina']."</option>";
									}
									}
								?>
							</select>	
					</div>
					<div class="col-md-8" style="float:right;margin-bottom:0px;padding:0px !important;">
						<br>
						<h5>Selecione o Bimestre</h5>
						<select class="custom-select" name="n_bimestre" style="width:50px;">
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					<button type="submit" class="btn btn-primary" style="margin-left:5px; margin-right:5px;">Consultar Notas</button>
					</div>
				</form>
			</div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Notas dos Alunos</h6>
            </div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead>
					<tr>
					  <th>Nome Completo</th>
					  <th>Nota 1</th>
					  <th>Nota 2</th>
					  <th>Nota 3</th>
					  <th>Nota 4</th>					  
					  <th>Prova Bimestral</th>
					</tr>
				  <tbody>
					<?php
						if (isset($idturma) && isset($iddisciplina)){
						//prepara o SQL para listar usuários
						$sql = "SELECT * FROM tbaluno INNER JOIN tbalunos_da_turma ON tbaluno.idaluno = tbalunos_da_turma.tbaluno_idaluno WHERE tbalunos_da_turma.tbturmas_idturma = $idturma;";
						$stmt = Conecta::abrirConexao()->prepare($sql);
						$stmt->execute();
						//percorre por todos os registros encontrados e armazena num array
						$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ( $linhas as $linha ) {
							$idaluno_da_turma = $linha['idaluno_da_turma'];
							echo "<tr><td style='display:none;'><input type='number' name='idaluno_da_turma_".$linha['idaluno_da_turma']."' value=".$linha['idaluno_da_turma']." style='display:none;'></input>";
							echo "</td><td>";
							echo $linha['nome_completo'];	
							$consulta2="SELECT * FROM tbdisciplinas_da_turma WHERE tbdisciplina_iddisciplina = $iddisciplina;";
							$conexao2=Conecta::abrirConexao()->prepare($consulta2);
							$conexao2->execute();
							$contagens2 = $conexao2->fetchAll(PDO::FETCH_ASSOC);
							if 	($conexao2->rowCount()){
								foreach ($contagens2 as $contagem2){
									$iddisciplina_da_turma = $contagem2['iddisciplina_da_turma'];										
									$consulta="SELECT * FROM tbnotas WHERE idaluno_da_turma_fk = $idaluno_da_turma AND iddisciplina_da_turma_fk = $iddisciplina_da_turma AND n_bimestre = $n_bimestre;";
									$conexao=Conecta::abrirConexao()->prepare($consulta);
									$conexao->execute();
									$contagens = $conexao->fetchAll(PDO::FETCH_ASSOC);
									if 	($conexao->rowCount()){
										foreach ($contagens as $contagem){
											echo("</td><td>");
											echo "<input type='number' name='nota1_".$linha['idaluno_da_turma']."' value='".$contagem['nota1']."'></input>";	
											echo("</td><td>");
											echo "<input type='number' name='nota2_".$linha['idaluno_da_turma']."' value='".$contagem['nota2']."'></input>";	
											echo("</td><td>");
											echo "<input type='number' name='nota3_".$linha['idaluno_da_turma']."' value='".$contagem['nota3']."'></input>";	
											echo("</td><td>");
											echo "<input type='number' name='nota4_".$linha['idaluno_da_turma']."' value='".$contagem['nota4']."'></input>";	
											echo("</td><td>");
											echo "<input type='number' name='bimestral_".$linha['idaluno_da_turma']."' value='".$contagem['bimestre']."'></input>";						
											echo "<input type='number' name='n_bimestre_".$linha['idaluno_da_turma']."' value='".$contagem['n_bimestre']."' style='display:none;'></input>";	
											echo "<input type='number' name='etapa_".$linha['idaluno_da_turma']."' value='".$contagem['etapa']."' style='display:none;'></input>";	
											echo("</td></tr>\n");
										}
									}else {
										echo("</td><td>");
										echo "<input type='number' name='nota1_".$linha['idaluno_da_turma']."' value='0'></input>";	
										echo("</td><td>");
										echo "<input type='number' name='nota2_".$linha['idaluno_da_turma']."' value='0'></input>";	
										echo("</td><td>");
										echo "<input type='number' name='nota3_".$linha['idaluno_da_turma']."' value='0'></input>";	
										echo("</td><td>");
										echo "<input type='number' name='nota4_".$linha['idaluno_da_turma']."' value='0'></input>";	
										echo("</td><td>");
										echo "<input type='number' name='bimestral_".$linha['idaluno_da_turma']."' value='0'></input>";								
										echo "<input type='number' name='n_bimestre_".$linha['idaluno_da_turma']."' style='display:none;' value=".$n_bimestre."></input>";	
										echo "<input type='number' name='etapa_".$linha['idaluno_da_turma']."' style='display:none;' value=".$etapa."></input>";	
										echo("</td></tr>\n");	
									}
						}}}}
					?>
				  </tbody>
				  </thead>
				  <tfoot>
					<tr>
					  <th>Nome Completo</th>
					  <th>Nota 1</th>
					  <th>Nota 2</th>
					  <th>Nota 3</th>
					  <th>Nota 4</th>					  
					  <th>Prova Bimestral</th>
					</tr>
				  </tfoot>
				</table>
			  </div>
			</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php 
	include 'rodape.php';
?>