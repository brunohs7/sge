<?php
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//pega os dados via GET
	$iddisciplina = $_GET['iddisciplina'];
	$idturma = $_GET['idturma'];
	$query="SELECT iddisciplina_da_turma FROM tbdisciplinas_da_turma WHERE tbturmas_idturma LIKE $idturma AND tbdisciplina_iddisciplina LIKE $iddisciplina;";
	$conexaobd=Conecta::abrirConexao()->prepare($query);
	$conexaobd->execute();
	$linhas = $conexaobd->fetchAll(PDO::FETCH_ASSOC);
	if 	($conexaobd->rowCount()){
			foreach ( $linhas as $linha ) {
				$iddisciplina_da_turma = $linha['iddisciplina_da_turma'];
	}}else {
			echo 'Erro<br><BR>';
	}
	//$comma_separated = implode(",", $_POST);
	//echo $comma_separated;
	$dados = array_chunk($_POST, 6);
	print_r($dados);
	echo '<br><br>';
	$idaluno_da_turma = array_slice($dados,0,1);
	print_r($idaluno_da_turma);
	echo '<br><br>';
	foreach ($dados as $teste){
		echo '<br><br>';		
		print_r ($teste);
		echo '<br><br>';		
		$idaluno_turma = $teste[0];
		$nota1 = $teste[1];
		$nota2 = $teste[2];
		$nota3 = $teste[3];
		$nota4 = $teste[4];
		$bimestre = $teste[5];
		$sql = "INSERT INTO tbnotas (iddisciplina_da_turma, idaluno_da_turma, nota1, nota2, nota3, nota4, bimestre) VALUES ($iddisciplina_da_turma, $idaluno_turma, $nota1, $nota2, $nota3, $nota4, $bimestre);"; 
			$stmt=Conecta::abrirConexao()->prepare($sql);
			$stmt->bindValue(':iddisciplina_da_turma', $iddisciplina_da_turma);			
			$stmt->bindValue(':idaluno_da_turma', $idaluno_turma);
			$stmt->bindValue(':nota1', $nota1);
			$stmt->bindValue(':nota2', $nota2);
			$stmt->bindValue(':nota3', $nota3);
			$stmt->bindValue(':nota3', $nota4);			
			$stmt->bindValue(':bimestre', $bimestre);			
			//se achou imprime o nome, caso contrário, erro
			$stmt->execute();
			echo $sql;
	}
	if 	($stmt->rowCount()){
	echo '<br><br>Sucesso!';
	}else {
	echo 'erro';
	}
?>