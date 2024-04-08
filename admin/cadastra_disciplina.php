<?php
	//pega os dados via POST
	$idprofessor = addslashes($_POST['idprofessor']);
	$nome_disciplina=addslashes($_POST["nome_disciplina"]);
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	$sql = "INSERT INTO tbdisciplina (tbprofessor_idprofessor, nome_disciplina) VALUES (:idprofessor, :nome_disciplina);"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':idprofessor', $idprofessor);
	$stmt->bindValue(':nome_disciplina', $nome_disciplina);
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	($stmt->rowCount()){
	header("Location:cadastrar_disciplina.php?cadastro=ok");
	}else {
	header("Location:cadastrar_disciplina.php?cadastro=erro");
	}
?>