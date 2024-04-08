<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
if (isset($_GET['idturma'])){
	$idturma = $_GET['idturma'];
}
include 'cabecalho.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Consultar Turma</h1>
		  <form method="GET" action="">
		  <div class="form-row">
				<div class="form-group col-md-4">
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
						?>
					</select>
				</div>
			
		  </div>
			<?php
				if (isset($_GET['turma'])){		  
					echo "<div class='form-row' style='margin-left:2px !Important; margin-top:5px;margin-bottom:5px;'><h6 style='color:red;'>Primeiro consulte os alunos da turma que você deseja editar!</h6></div>";
				}
			?>	
		  <div class="form-row">
		  <button type="submit" class="btn btn-primary" style="margin-left:5px; margin-right:5px;">Consultar Alunos</button>
		  </form>
		  <form method="POST" action="<?php 
				if (isset($_GET['idturma'])){
					echo "editar_turma.php?"."idturma=".$linha['idturma'];
				}else {
					echo "consultar_alunos_da_turma.php?turma=erro";
				}
				?>">
			<button type="submit" class="btn btn-danger">Editar dados da Turma</button>
		  </form>
		  </div>
<br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">A tabela mostra apenas os alunos que estão matriculados</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				    <tr>
                      <th>Matrícula</th>					
                      <th>Nome Completo</th>
                      <th>Data de Nascimento</th>
                      <th>Telefone</th>
					  <th>E-mail</th>
					  <th></th>
                    </tr>
				  <tbody>
					<?php
						if (isset($idturma)){
						//prepara o SQL para listar usuários
						$sql = "SELECT * FROM tbaluno INNER JOIN tbalunos_da_turma ON tbaluno.idaluno = tbalunos_da_turma.tbaluno_idaluno WHERE tbalunos_da_turma.tbturmas_idturma LIKE $idturma;";
						$stmt = Conecta::abrirConexao()->prepare($sql);
						$stmt->execute();
						//percorre por todos os registros encontrados e armazena num array
						$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ( $linhas as $linha ) {
							echo "<tr><td>";
							echo($linha['idaluno_da_turma']);
							echo("</td><td>");
							echo($linha['nome_completo']);	
							echo("</td><td>");
							echo($linha['data_nascimento']);
							echo("</td><td>");
							echo($linha['telefone']);
							echo("</td><td>");
							echo($linha['email']);
							echo("</td><td>");
							
							echo "<a href='editar_aluno.php?idaluno=".$linha['idaluno']."'>Detalhar / Editar </a>";
							echo("</td></tr>\n");
						}}
					?>
                  </tbody>
                  </thead>
                  <tfoot>
				    <tr>
                      <th>Matrícula</th>					
                      <th>Nome Completo</th>
                      <th>Data de Nascimento</th>
                      <th>Telefone</th>
					  <th>E-mail</th>
					  <th></th>
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
