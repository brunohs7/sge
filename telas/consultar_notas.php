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

			<!-- Page Heading -->
			<div class="form-row">

				<form method="POST" action="" class="col-md-12">
					<div class="col-md-8" style="margin-bottom:0px;padding:0px !important;">
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
              <h4 class="m-0 font-weight-bold text-primary">Minhas Notas</h4>
            </div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead>
					<tr>
					  <th>Disciplina</th>
					  <th>Nota 1</th>
					  <th>Nota 2</th>
					  <th>Nota 3</th>
					  <th>Nota 4</th>					  
					  <th>Prova Bimestral</th>
					</tr>
				  <tbody>
					<?php
						if (isset($idaluno_da_turma) && isset($n_bimestre)){
						//prepara o SQL para listar usuários
						$sql = "SELECT * FROM tbdisciplina as a JOIN tbdisciplinas_da_turma as b ON a.iddisciplina = b.tbdisciplina_iddisciplina JOIN tbnotas as c ON b.iddisciplina_da_turma = c.iddisciplina_da_turma_fk WHERE c.idaluno_da_turma_fk = $idaluno_da_turma AND c.n_bimestre = $n_bimestre;";
						$stmt = Conecta::abrirConexao()->prepare($sql);
						$stmt->execute();
						//percorre por todos os registros encontrados e armazena num array
						$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ( $linhas as $linha ) {
							echo "<tr><td>";
							echo $linha['nome_disciplina'];	
							echo "</td><td>";
							echo $linha['nota1'];	
							echo "</td><td>";
							echo $linha['nota2'];	
							echo "</td><td>";							
							echo $linha['nota3'];	
							echo "</td><td>";
							echo $linha['nota4'];	
							echo "</td><td>";		
							echo $linha['bimestre'];	
							echo "</td><tr>";		
							
						}}
					?>
				  </tbody>
				  </thead>
				  <tfoot>
					<tr>
					  <th>Disciplina</th>
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