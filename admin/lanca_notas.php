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
	$dados = array_chunk($_POST, 8);
	$idaluno_da_turma = array_slice($dados,0,1);
	foreach ($dados as $dado){
		$idaluno_turma = $dado[0];
		$nota1 = $dado[1];
		$nota2 = $dado[2];
		$nota3 = $dado[3];
		$nota4 = $dado[4];
		$bimestre = $dado[5];
		$n_bimestre = $dado[6];
		$etapa = $dado[7];
		$consulta="SELECT idnota FROM tbnotas WHERE iddisciplina_da_turma_fk = $iddisciplina_da_turma AND idaluno_da_turma_fk = $idaluno_turma AND n_bimestre = $n_bimestre;";
		$conexao=Conecta::abrirConexao()->prepare($consulta);
		$conexao->execute();
		if 	($conexao->rowCount()){
			$colunas = $conexao->fetchAll(PDO::FETCH_ASSOC);
			foreach ( $colunas as $coluna ) {
				$idnota = $coluna['idnota'];
			}	$sql = "UPDATE tbnotas SET iddisciplina_da_turma_fk = $iddisciplina_da_turma , idaluno_da_turma_fk = $idaluno_turma, nota1 = $nota1, nota2 = $nota2, nota3 = $nota3, nota4 = $nota4, bimestre = $bimestre WHERE idnota = $idnota;"; 
				$stmt=Conecta::abrirConexao()->prepare($sql);	
				if 	($stmt->execute()){
					header("Location:lancamento_de_notas.php?cadastro=ok");
				}else {
					header("Location:lancamento_de_notas.php?cadastro=erro");
				}
		}else {
			$sql = "INSERT INTO tbnotas (iddisciplina_da_turma_fk, idaluno_da_turma_fk, nota1, nota2, nota3, nota4, bimestre, n_bimestre, etapa) VALUES ($iddisciplina_da_turma, $idaluno_turma, $nota1, $nota2, $nota3, $nota4, $bimestre, $n_bimestre, $etapa);"; 
			$stmt=Conecta::abrirConexao()->prepare($sql);	
			if 	($stmt->execute()){
				header("Location:lancamento_de_notas.php?cadastro=ok");
			}else {
				header("Location:lancamento_de_notas.php?cadastro=problema");
			}
		}
	}

?>