<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
//prepara o SQL para listar usuários
$sql = "SELECT * FROM tbdisciplina LEFT JOIN tbprofessor ON tbdisciplina.tbprofessor_idprofessor = tbprofessor.idprofessor ORDER BY nome_disciplina;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->execute();
//percorre por todos os registros encontrados e armazena num array
$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'cabecalho.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Consultar Disciplinas</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				    <tr>
                      <th>Nome da Disciplina</th>
                      <th>Professor</th>
					 <th></th>
                    </tr>
				  <tbody>
					<?php
						foreach ( $linhas as $linha ) {
							echo "<tr><td>";
							echo($linha['nome_disciplina']);
							echo("</td><td>");
							echo($linha['nome_completo']);
							echo("</td><td>");
							echo "<a href='editar_disciplina.php?iddisciplina=".$linha['iddisciplina']."'> Detalhar / Editar</a>";
							echo("</td></tr>\n");
						}
					?>
                  </tbody>
                  </thead>
                  <tfoot>
				    <tr>
                      <th>Nome da Disciplina</th>
                      <th>Professor</th>
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
