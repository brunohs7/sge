<?php
	//pega os dados via POST
	$turma=addslashes($_POST["turma"]);
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	foreach ($_POST['disciplinas'] as $disciplinas){
		$sql = "INSERT INTO tbdisciplinas_da_turma (tbdisciplina_iddisciplina, tbturmas_idturma) VALUES (:disciplinas, :turma);"; 
		$stmt=Conecta::abrirConexao()->prepare($sql);
		$stmt->bindValue(':disciplinas', $disciplinas);
		$stmt->bindValue(':turma', $turma);
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	}if 	($stmt->rowCount()){
		header("Location:vincular_disciplina.php?cadastro=ok");	
	}else {
		header("Location:vincular_disciplina.php?cadastro=ok");
	}
?>