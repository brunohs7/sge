<?php 
require_once "../classes/conecta.class.php";
if (isset($_GET['idturma'])){
	$idturma = $_GET['idturma'];
}
include 'cabecalho.php';

?>
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Histórico</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
				    <tr>
                      <th>Etapa</th>					
                      <th>Disciplina</th>
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

<?php 
	include 'rodape.php';
?>
