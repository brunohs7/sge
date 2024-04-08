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
			echo 'Erro!<br><BR>';
	}
	//$comma_separated = implode(",", $_POST);
	//echo $comma_separated;
	$dados = array_chunk($_POST, 7);
	$idaluno_da_turma = array_slice($dados,0,1);
	foreach ($dados as $dado){
		$idaluno_turma = $dado[0];
		$horario1 = $dado[1];
		$horario2 = $dado[2];
		$horario3 = $dado[3];
		$horario4 = $dado[4];
		$horario5 = $dado[5];
		$data_da_falta = $dado[6];
		print_r ($dados);
		$consulta="SELECT idfaltas FROM tbfaltas WHERE iddisciplina_turma_fk = $iddisciplina_da_turma AND idaluno_turma_fk = $idaluno_turma AND data_da_falta = '$data_da_falta';";
		$conexao=Conecta::abrirConexao()->prepare($consulta);
		$conexao->execute();
		if 	($conexao->rowCount()){
			$colunas = $conexao->fetchAll(PDO::FETCH_ASSOC);			
			foreach ( $colunas as $coluna ) {
				$idfaltas = $coluna['idfaltas'];
			}	$sql = "UPDATE tbfaltas SET iddisciplina_turma_fk = $iddisciplina_da_turma , idaluno_turma_fk = $idaluno_turma, horario1 = '$horario1', horario2 = '$horario2', horario3 = '$horario3', horario4 = '$horario4', horario5 = '$horario5' WHERE idfaltas = $idfaltas;"; 
				$stmt=Conecta::abrirConexao()->prepare($sql);	
				if 	($stmt->execute()){
					header("Location:lancamento_de_faltas.php?cadastro=ok");
				}else {
					header("Location:lancamento_de_faltas.php?cadastro=erro");
				}
		}else {
			$sql = "INSERT INTO tbfaltas (iddisciplina_turma_fk, idaluno_turma_fk, horario1, horario2, horario3, horario4, horario5, data_da_falta) VALUES ($iddisciplina_da_turma, $idaluno_turma, '$horario1', '$horario2', '$horario3', '$horario4', '$horario5', '$data_da_falta');"; 
			$stmt=Conecta::abrirConexao()->prepare($sql);	
			if 	($stmt->execute()){
				header("Location:lancamento_de_faltas.php?cadastro=ok");
			}else {
				header("Location:lancamento_de_faltas.php?cadastro=problema");
			}
		}
	}

?>