<?php
	//pega os dados via POST
	$nome_turma=addslashes($_POST["nome_turma"]);
	$curso=addslashes($_POST["curso"]);
	$etapa=addslashes($_POST["etapa"]);
	$turno=addslashes($_POST["turno"]);
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	$sql = "INSERT INTO tbturmas (nome_turma, curso, etapa, turno) VALUES (:nome_turma, :curso, :etapa, :turno);"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':nome_turma', $nome_turma);
	$stmt->bindValue(':curso', $curso);
	$stmt->bindValue(':etapa', $etapa);
	$stmt->bindValue(':turno', $turno);	
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	($stmt->rowCount()){
	header("Location:cadastrar_turma.php?cadastro=ok");
	}else {
	header("Location:cadastrar_turma.php?cadastro=erro");
	}
?>