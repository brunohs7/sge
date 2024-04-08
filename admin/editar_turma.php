<?php 
	include 'cabecalho.php';
	$idturma = $_GET['idturma'];
	$cadastro= isset($_REQUEST['cadastro']) ? $_REQUEST['cadastro'] : '1'; 
	require_once "../classes/conecta.class.php";
	$sql = "SELECT * FROM tbturmas WHERE idturma=$idturma ORDER BY nome_turma;";
	$stmt = Conecta::abrirConexao()->prepare($sql);
	$stmt->execute();
	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);	
	foreach ( $linhas as $linha ) {
	}
	if($cadastro=="ok"){
							echo  "<script language=javascript>alert( 'Dados alterados com sucesso!' );</script>";
						}
	if($cadastro=="erro"){
							echo  "<script language=javascript>alert( 'Erro ao alterar os dados!');</script>";
						}						
	?>		
	
	<div class="container-fluid"><br>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h4 class="m-0 font-weight-bold text-primary">Editar Turma: <?php echo $linha['nome_turma'];?></h4>
			</div>
			<div class="card-body">
			<form method="POST" action="edita_turma.php?idturma=<?php echo $linha['idturma'];?>">
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <label>Nome da Turma</label>
				  <input type="text" class="form-control" id="nome_turma" value="<?php echo $linha['nome_turma'];?>" name="nome_turma">
				</div>
				<div class="form-group col-md-2">
				  <label>Curso</label>
				  <input type="text" class="form-control" id="curso" value="<?php echo $linha['curso'];?>" name="curso">
				</div>
				<div class="form-group col-md-2">
				  <label>Turno</label>
				  <input type="text" class="form-control" id="turno" value="<?php echo $linha['turno'];?>" name="turno">
				</div>
				<div class="form-group col-md-2">
				  <label>Período</label>
				  <input type="text" class="form-control" id="periodo" value="<?php echo $linha['etapa'];?>" name="etapa">
				</div>
			  </div>
			  <button type="submit" class="btn btn-primary">Editar Cadastro</button>				  
			</form>
			</div>
		</div>
	</div>

<?php
	include 'rodape.php';
?>