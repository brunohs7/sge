<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
//prepara o SQL para listar usuários
$sql = "SELECT * FROM tbturmas ORDER BY nome_turma;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->execute();
//percorre por todos os registros encontrados e armazena num array
$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'cabecalho.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				    <tr>
                      <th>Nome da Turma</th>
                      <th>Curso</th>					  
                      <th>Turno</th>
                      <th>Período</th>					  
					 <th></th>
                    </tr>
				  <tbody>
					<?php
						foreach ( $linhas as $linha ) {
							echo "<tr><td>";
							echo($linha['nome_turma']);
							echo("</td><td>");
							echo($linha['curso']);
							echo("</td><td>");
							echo($linha['turno']);
							echo("</td><td>");							
							echo($linha['etapa']);
							echo("</td><td>");							
							echo "<a href='editar_turma.php?idturma=".$linha['idturma']."'> Editar </a>";
							echo("</td></tr>\n");
						}
					?>
                  </tbody>
                  </thead>
                  <tfoot>
				    <tr>
                      <th>Nome da Turma</th>
                      <th>Curso</th>					  
                      <th>Turno</th>
                      <th>Período</th>					  
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
