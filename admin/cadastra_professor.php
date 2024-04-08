<?php
	//pega os dados via POST
	$nome_completo=addslashes($_POST["nome_completo"]);
	$cpf=addslashes($_POST["cpf"]);
	$rg=addslashes($_POST["rg"]);
	$masp=addslashes($_POST["masp"]);
	$logradouro=addslashes($_POST["logradouro"]);
	$numero=addslashes($_POST["numero"]);
	$complemento=addslashes($_POST["complemento"]);
	$bairro=addslashes($_POST["bairro"]);
	$cidade=addslashes($_POST["cidade"]);
	$uf=addslashes($_POST["uf"]);
	$formacao=addslashes($_POST["formacao"]);	
	$telefone=addslashes($_POST["telefone"]);
	$telefone_recado=addslashes($_POST["telefone_recado"]);
	$email=addslashes($_POST["email"]);
	$email_alternativo=addslashes($_POST["email_alternativo"]);
	$email=mb_convert_case($email,MB_CASE_LOWER,"utf-8");
	$email_alternativo=mb_convert_case($email_alternativo,MB_CASE_LOWER,"utf-8");
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	$sql = "INSERT INTO tbprofessor (masp, nome_completo, logradouro, numero, complemento, 
	bairro, cidade, estado, rg, cpf, formacao, telefone, telefone_recado, email, email_alternativo) 
	VALUES (:masp, :nome_completo,:logradouro,:numero,:complemento,:bairro,:cidade,:uf,:rg,:cpf,
	:formacao,:telefone,:telefone_recado,:email,:email_alternativo);"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':nome_completo', $nome_completo);
	$stmt->bindValue(':cpf', $cpf);
	$stmt->bindValue(':rg', $rg);
	$stmt->bindValue(':masp', $masp);	
	$stmt->bindValue(':logradouro', $logradouro);
	$stmt->bindValue(':numero', $numero);
	$stmt->bindValue(':complemento', $complemento);
	$stmt->bindValue(':bairro', $bairro);
	$stmt->bindValue(':cidade', $cidade);
	$stmt->bindValue(':uf', $uf);
	$stmt->bindValue(':formacao', $formacao);
	$stmt->bindValue(':telefone', $telefone);
	$stmt->bindValue(':telefone_recado', $telefone_recado);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':email_alternativo', $email_alternativo);
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	(null !== $stmt->rowCount()){
	header("Location:cadastrar_professor.php?cadastro=ok");
	}else {
	header("Location:cadastrar_professor.php?cadastro=erro");
	}
?>