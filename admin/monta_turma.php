<?php
	//pega os dados via POST
	$turma=addslashes($_POST["turma"]);
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	foreach ($_POST['alunos'] as $alunos){
	$sql = "INSERT INTO tbalunos_da_turma (tbaluno_idaluno, tbturmas_idturma) VALUES (:alunos, :turma);"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':alunos', $alunos);
	$stmt->bindValue(':turma', $turma);
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	}if 	($stmt->rowCount()){
	header("Location:montar_turma.php?cadastro=ok");
	}else {
	header("Location:montar_turma.php?cadastro=ok");
	}
?>