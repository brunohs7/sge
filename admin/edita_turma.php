<?php
	//pega os dados via POST
	$idturma = addslashes($_GET['idturma']);
	$nome_turma=addslashes($_POST["nome_turma"]);
	$curso=addslashes($_POST["curso"]);
	$etapa=addslashes($_POST["etapa"]);
	$turno=addslashes($_POST["turno"]);
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	$sql = "UPDATE tbturmas SET nome_turma = :nome_turma, curso = :curso, etapa = :etapa, turno = :turno WHERE idturma = :idturma;"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':idturma', $idturma);	
	$stmt->bindValue(':nome_turma', $nome_turma);
	$stmt->bindValue(':curso', $curso);
	$stmt->bindValue(':etapa', $etapa);
	$stmt->bindValue(':turno', $turno);	
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	($stmt->rowCount()){
	header("Location:editar_turma.php?idturma=$idturma&cadastro=ok");
	}else {
	header("Location:editar_turma.php?idturma=$idturma&cadastro=erro");
	}
?>