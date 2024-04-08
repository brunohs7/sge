<?php
	//pega os dados via POST
	$iddisciplina = addslashes($_GET['iddisciplina']);
	$nome_disciplina='"'.addslashes($_POST["nome_disciplina"]).'"';
	$idprofessor=addslashes($_POST["idprofessor"]);	
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	$sql = "UPDATE tbdisciplina SET nome_disciplina = :nome_disciplina, tbprofessor_idprofessor = :idprofessor WHERE iddisciplina = :iddisciplina;"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':iddisciplina', $iddisciplina);
	$stmt->bindValue(':nome_disciplina', $nome_disciplina);
	$stmt->bindValue(':idprofessor', $idprofessor);	
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	($stmt->rowCount()){
	header("Location:editar_disciplina.php?iddisciplina=$iddisciplina&cadastro=ok");
	}else {
	header("Location:editar_disciplina.php?iddisciplina=$iddisciplina&cadastro=erro");
	}
?>