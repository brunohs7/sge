<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
include 'cabecalho.php';
if (isset($_SESSION['idaluno_da_turma'])){
	$idaluno_da_turma = $_SESSION['idaluno_da_turma'];
}
if (isset($_SESSION['idturma'])){
	$idturma = $_SESSION['idturma'];
}
if (isset($_POST['n_bimestre'])){
	$n_bimestre = $_POST['n_bimestre'];
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Notas Consolidadas</h4>
            </div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead>
					<tr>
					  <th>Disciplina</th>
					  <th>1º Bimestre</th>
					  <th>2º Bimestre</th>					  
					  <th>Total</th>
					  <th>Resultado</th>					  
					</tr>
				  <tbody>
					<?php
						$sql = "SELECT * FROM tbdisciplina as a JOIN tbdisciplinas_da_turma as b ON a.iddisciplina = b.tbdisciplina_iddisciplina WHERE b.tbturmas_idturma = $idturma;";
						$stmt = Conecta::abrirConexao()->prepare($sql);
						$stmt->execute();
						$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ( $linhas as $linha ) {
							$iddisciplina_da_turma = $linha['iddisciplina_da_turma'];
							$sql2 = "SELECT iddisciplina_da_turma_fk, idaluno_da_turma_fk, n_bimestre, nota1 + nota2 + nota3 + nota4 + bimestre as total, bimestre from tbnotas WHERE idaluno_da_turma_fk = $idaluno_da_turma AND iddisciplina_da_turma_fk = $iddisciplina_da_turma AND n_bimestre = 1";
							$stmt2 = Conecta::abrirConexao()->prepare($sql2);
							$stmt2->execute();
							$linhas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
							if (count($linhas2) != 0){
								foreach ($linhas2 as $linha2){
										$bimestre1 = $linha2['total'];
								}	
							}else{
								$bimestre1 = 0;
							}
							$sql3 = "SELECT iddisciplina_da_turma_fk, idaluno_da_turma_fk, n_bimestre, nota1 + nota2 + nota3 + nota4 + bimestre as total, bimestre from tbnotas WHERE idaluno_da_turma_fk = $idaluno_da_turma AND iddisciplina_da_turma_fk = $iddisciplina_da_turma AND n_bimestre = 2";
							$stmt3 = Conecta::abrirConexao()->prepare($sql3);
							$stmt3->execute();
							$linhas3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
							if (count($linhas3) != 0){
								foreach ($linhas3 as $linha3){
										$bimestre2 = $linha3['total'];
										if ($linha3['bimestre'] != 0){
											$prova_bimestral = $linha3['bimestre'];
										}else{
											$prova_bimestral = 0;
										}
								}	
							}else {
								$bimestre2 = 0;
								$prova_bimestral = 0;
							}
							echo "<tr><td>";
							echo $linha['nome_disciplina'];	
							echo "</td><td>";
							if (isset($bimestre1)){
								echo $bimestre1;
							}else{
								echo '';
							}	
							echo "</td><td>";
							if (isset($bimestre2)){
								echo $bimestre2;
							}else{
								echo '';
							}
							echo "</td><td>";	
							if	(isset($bimestre1) && isset($bimestre2)){
								$total = $bimestre1+$bimestre2;
								echo $total;	
							}else{
								echo '';
							}
							echo "</td><td>";		
							if ($prova_bimestral != 0){
								if (isset($total)){
									if ($total >= 60){
										echo 'Aprovado';
									}else {
										echo 'Reprovado';
									}
								}else{
									echo '';
								}
							}else{
								echo '';
							}
							echo "</td><tr>";		
						}
					?>
				  </tbody>
				  </thead>
				  <tfoot>
					<tr>
					  <th>Disciplina</th>
					  <th>1º Bimestre</th>
					  <th>2º Bimestre</th>					  
					  <th>Total</th>
					  <th>Resultado</th>	
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