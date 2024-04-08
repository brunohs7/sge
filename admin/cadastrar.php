<?php
	//pega os dados via POST
	$email=addslashes($_POST["email"]);
	$senha=addslashes($_POST["senha"]);
	$telefone=addslashes($_POST["telefone"]);
	$nome=addslashes($_POST["nome"]);
	$cep=addslashes($_POST["cep"]);
	$nome=mb_convert_case($nome,MB_CASE_UPPER,"utf-8");
	$email=mb_convert_case($email,MB_CASE_LOWER,"utf-8");
	//criptografa a senha
	$senha=sha1($senha);
	//chamar arquivo de conexão
	require_once "classes/conecta.class.php";
	//inserir na tabela
	$sql = "INSERT INTO tbusuario (usuario,email,senha,telefone,cep) VALUES (:usuario,:email,:senha,:telefone,:cep);";
	$stmt = Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':usuario', $nome);	
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':senha', $senha);
	$stmt->bindValue(':telefone', $telefone);
	$stmt->bindValue(':cep', $cep);	
	//se achou imprime o nome, caso contrário, erro
	if ($stmt->execute()){
	echo "OK";
	}else {
	echo "Erro";
	}
?>