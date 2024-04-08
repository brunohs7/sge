<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
if (isset($_GET['idturma'])){
	$idturma = $_GET['idturma'];
}
if (isset($_GET['iddisciplina'])){
	$iddisciplina = $_GET['iddisciplina'];
}
if (isset($_GET['data_da_falta'])){
	if ($_GET['data_da_falta'] != null){
		$data_da_falta = $_GET['data_da_falta'];
}}
include 'cabecalho.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Lançar Faltas</h1>
			<div class="form-row">
				<form method="GET" action="" class="form-group col-md-5">
						<br>
							<h5>Selecione a Turma</h5>
							<select class="custom-select" name="idturma">
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
							echo '</select>
				<button type="submit" class="btn btn-primary">Consultar Disciplinas</button>
				</form>
				<form method="GET" action="lista_alunos_faltas.php" class="col-md-6">
					<div class="col-md-6" style="float:left;padding:0px !important;">
						<br>
							<h5>Selecione a Disciplina</h5>
							<select class="custom-select" name="iddisciplina" style="width:200px;">';
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
								
							echo '</select>
					</div>
					<div class="col-md-6" style="float:right;margin-bottom:0px;padding:0px !important;">
						<br>
						<h5>Selecione a Data</h5>
						<input type="number" name="idturma" value="';echo $idturma.'"style="display:none;"></input>';
						?>
						<input type="date" name="data_da_falta" class="form-control"></input>
						<button type="submit" class="btn btn-primary" style="margin-left:5px; margin-right:5px;">Consultar Alunos</button>
					</div>
				</form>
			</div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Faltas dos Alunos</h6>
            </div>
			<form method="POST" action="lanca_faltas.php?idturma=<?php echo $idturma; ?>&iddisciplina=<?php echo $iddisciplina; ?>">
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					  <thead>
						<tr>
						  <th>Nome Completo</th>
						  <th>Horário 1</th>
						  <th>Horário 2</th>
						  <th>Horário 3</th>
						  <th>Horário 4</th>					  
						  <th>Horário 5</th>
						</tr>
					  <tbody>
						<?php
							if (isset($idturma) && isset($iddisciplina) && isset($data_da_falta)){
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
										$consulta="SELECT * FROM tbfaltas WHERE idaluno_turma_fk = $idaluno_da_turma AND iddisciplina_turma_fk = $iddisciplina_da_turma AND data_da_falta = '$data_da_falta';";
										$conexao=Conecta::abrirConexao()->prepare($consulta);
										$conexao->execute();
										$contagens = $conexao->fetchAll(PDO::FETCH_ASSOC);
										if 	($conexao->rowCount()){
											foreach ($contagens as $contagem){
												if ($contagem['horario1'] == 'P'){
													$horario1e1 = 'P';
													$horario2e1 = 'F';
												}else{
													$horario1e1 = 'F';
													$horario2e1 = 'P';													
												}
												if ($contagem['horario2'] == 'P'){
													$horario1e2 = 'P';
													$horario2e2 = 'F';
												}else{
													$horario1e2 = 'F';
													$horario2e2 = 'P';													
												}
												if ($contagem['horario3'] == 'P'){
													$horario1e3 = 'P';
													$horario2e3 = 'F';
												}else{
													$horario1e3 = 'F';
													$horario2e3 = 'P';													
												}
												if ($contagem['horario4'] == 'P'){
													$horario1e4 = 'P';
													$horario2e4 = 'F';
												}else{
													$horario1e4 = 'F';
													$horario2e4 = 'P';													
												}												
												if ($contagem['horario5'] == 'P'){
													$horario1e5 = 'P';
													$horario2e5 = 'F';
												}else{
													$horario1e5 = 'F';
													$horario2e5 = 'P';													
												}												
													
												echo("</td><td>");	
												echo "<select class='custom-select' name='horario1_".$linha['idaluno_da_turma']."'>
														<option value='".$horario1e1."'>".$horario1e1."</option>
														<option value='".$horario2e1."'>".$horario2e1."</option>
													  </select>";												
												echo("</td><td>");
												echo "<select class='custom-select' name='horario2_".$linha['idaluno_da_turma']."'>
														<option value='".$horario1e2."'>".$horario1e2."</option>
														<option value='".$horario2e2."'>".$horario2e2."</option>
													  </select>";												
												echo("</td><td>");
												echo "<select class='custom-select' name='horario3_".$linha['idaluno_da_turma']."'>
														<option value='".$horario1e3."'>".$horario1e3."</option>
														<option value='".$horario2e3."'>".$horario2e3."</option>
													  </select>";
												echo("</td><td>");
												echo "<select class='custom-select' name='horario4_".$linha['idaluno_da_turma']."'>
														<option value='".$horario1e4."'>".$horario1e4."</option>
														<option value='".$horario2e4."'>".$horario2e4."</option>
													  </select>";
												echo("</td><td>");							
												echo "<select class='custom-select' name='horario5_".$linha['idaluno_da_turma']."'>
														<option value='".$horario1e5."'>".$horario1e5."</option>
														<option value='".$horario2e5."'>".$horario2e5."</option>
													  </select>";												
												echo "<input type='date' name='data_da_falta_".$linha['idaluno_da_turma']."' value='".$data_da_falta."' style='display:none;'></input>";												
												echo("</td></tr>\n");
											}
										}else {
											echo("</td><td>");
											echo "<select class='custom-select' name='horario1_".$linha['idaluno_da_turma']."'>
													<option value='P'>P</option>
													<option value='F'>F</option>
												  </select>";												
											echo("</td><td>");
											echo "<select class='custom-select' name='horario2_".$linha['idaluno_da_turma']."'>
													<option value='P'>P</option>
													<option value='F'>F</option>
												  </select>";												
											echo("</td><td>");
											echo "<select class='custom-select' name='horario3_".$linha['idaluno_da_turma']."'>
													<option value='P'>P</option>
													<option value='F'>F</option>
												  </select>";
											echo("</td><td>");
											echo "<select class='custom-select' name='horario4_".$linha['idaluno_da_turma']."'>
													<option value='P'>P</option>
													<option value='F'>F</option>
												  </select>";
											echo("</td><td>");							
											echo "<select class='custom-select' name='horario5_".$linha['idaluno_da_turma']."'>
													<option value='P'>P</option>
													<option value='F'>F</option>
												  </select>";	
											echo "<input type='date' name='data_da_falta_".$linha['idaluno_da_turma']."' style='display:none;' value='".$data_da_falta."'></input>";												
											echo("</td></tr>\n");	
										}
							}}}}
						?>
					  </tbody>
					  </thead>
					  <tfoot>
						<tr>
						  <th>Nome Completo</th>
						  <th>Horário 1</th>
						  <th>Horário 2</th>
						  <th>Horário 3</th>
						  <th>Horário 4</th>					  
						  <th>Horário 5</th>
						</tr>
					  </tfoot>
					</table>
				  </div>
					<br>
				    <button type="submit" class="btn btn-danger" style="margin-left:5px; margin-right:5px;">Lançar Faltas</button>
				</div>
			</form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php 
	include 'rodape.php';
?>