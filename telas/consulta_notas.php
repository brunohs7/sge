<?php
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//pega os dados via GET
	$idaluno_da_turma = $_GET['idaluno_da_turma'];
	$n_bimestre = $_GET['n_bimestre'];
	$query="SELECT * FROM tbdisciplina as a JOIN tbdisciplinas_da_turma as b ON a.iddisciplina = b.tbdisciplina_iddisciplina JOIN tbnotas as c ON b.iddisciplina_da_turma = c.iddisciplina_da_turma_fk WHERE c.idaluno_da_turma_fk = $idaluno_da_turma;";
	$conexaobd=Conecta::abrirConexao()->prepare($query);
	$conexaobd->execute();
	$linhas = $conexaobd->fetchAll(PDO::FETCH_ASSOC);
	if 	($conexaobd->rowCount()){
			foreach ( $linhas as $linha ) {
				$iddisciplina_da_turma = $linha['iddisciplina_da_turma'];
	}}else {
			echo 'Erro!<br><BR>';
	}
?>



SELECT * FROM tbdisciplina as a INNER JOIN tbdisciplinas_da_turma as b ON a.iddisciplina = b.tbdisciplina_iddisciplina WHERE b.tbturmas_idturma = $idturma;