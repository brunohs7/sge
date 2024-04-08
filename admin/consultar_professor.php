<!DOCTYPE html>
<?php 
require_once "../classes/conecta.class.php";
//prepara o SQL para listar usuários
$sql = "SELECT * FROM tbprofessor ORDER BY nome_completo;";
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
              <h4 class="m-0 font-weight-bold text-primary">Consultar Professores</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				    <tr>
                      <th>Nome Completo</th>
                      <th>Endereço</th>
                      <th>RG</th>
                     <th>CPF</th>
                     <th>Formação</th>
					 <th></th>
                    </tr>
				  <tbody>
					<?php
						foreach ( $linhas as $linha ) {
							echo "<tr><td>";
							echo($linha['nome_completo']);
							echo("</td><td>");
							echo($linha['logradouro']);
							echo("</td><td>");
							echo($linha['rg']);
							echo("</td><td>");
							echo($linha['cpf']);
							echo("</td><td>");
							echo($linha['formacao']);
							echo("</td><td>");
							echo "<a href='editar_professor.php?idprofessor=".$linha['idprofessor']."'> Detalhar / Editar</a>";
							echo("</td></tr>\n");
						}
					?>
                  </tbody>
                  </thead>
                  <tfoot>
				    <tr>
                     <th>Nome Completo</th>
                     <th>Endereço</th>
                     <th>RG</th>
                     <th>CPF</th>
                     <th>Formação</th>
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
