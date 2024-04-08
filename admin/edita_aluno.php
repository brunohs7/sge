<?php
	//pega os dados via POST
	$idaluno = addslashes($_GET['idaluno']);
	$nome_completo=addslashes($_POST["nome_completo"]);
	$cpf=addslashes($_POST["cpf"]);
	$rg=addslashes($_POST["rg"]);
	$logradouro=addslashes($_POST["logradouro"]);
	$numero=addslashes($_POST["numero"]);
	$complemento=addslashes($_POST["complemento"]);
	$bairro=addslashes($_POST["bairro"]);
	$cidade=addslashes($_POST["cidade"]);
	$uf=addslashes($_POST["uf"]);
	$cep=addslashes($_POST["cep"]);	
	$status=addslashes($_POST["status"]);
	$data_nascimento=addslashes($_POST["data_nascimento"]);	
	$nome_da_mae=addslashes($_POST["nome_da_mae"]);
	$nome_do_pai=addslashes($_POST["nome_do_pai"]);
	$telefone=addslashes($_POST["telefone"]);
	$telefone_recado=addslashes($_POST["telefone_recado"]);
	$email=addslashes($_POST["email"]);
	$email_alternativo=addslashes($_POST["email_alternativo"]);
	$senha=addslashes($_POST["senha"]);
	$senha=sha1($senha);	
	$usuario=addslashes($_POST["usuario"]);
	$usuario=mb_convert_case($usuario,MB_CASE_LOWER,"utf-8");
	$email=mb_convert_case($email,MB_CASE_LOWER,"utf-8");
	$email_alternativo=mb_convert_case($email_alternativo,MB_CASE_LOWER,"utf-8");
	//chamar arquivo de conexão
	require_once "../classes/conecta.class.php";
	//inserir na tabela
	$sql = "UPDATE tbaluno SET nome_completo = :nome_completo, cep = :cep, status = :status, cpf = :cpf, rg = :rg, logradouro = :logradouro, data_nascimento = :data_nascimento, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :uf, nome_da_mae = :nome_da_mae, nome_do_pai = :nome_do_pai, telefone = :telefone, telefone_recado = :telefone_recado, email = :email, email_alternativo = :email_alternativo, senha = :senha, usuario = :usuario WHERE idaluno = :idaluno;"; 
	$stmt=Conecta::abrirConexao()->prepare($sql);
	$stmt->bindValue(':nome_completo', $nome_completo);
	$stmt->bindValue(':cpf', $cpf);
	$stmt->bindValue(':rg', $rg);
	$stmt->bindValue(':logradouro', $logradouro);
	$stmt->bindValue(':numero', $numero);
	$stmt->bindValue(':complemento', $complemento);
	$stmt->bindValue(':bairro', $bairro);
	$stmt->bindValue(':cidade', $cidade);
	$stmt->bindValue(':uf', $uf);
	$stmt->bindValue(':cep', $cep);	
	$stmt->bindValue(':nome_da_mae', $nome_da_mae);
	$stmt->bindValue(':nome_do_pai', $nome_do_pai);
	$stmt->bindValue(':data_nascimento', $data_nascimento);
	$stmt->bindValue(':status', $status);	
	$stmt->bindValue(':telefone', $telefone);
	$stmt->bindValue(':telefone_recado', $telefone_recado);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':email_alternativo', $email_alternativo);
	$stmt->bindValue(':senha', $senha);
	$stmt->bindValue(':usuario', $usuario);
	$stmt->bindValue(':idaluno', $idaluno);	
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	(null !== $stmt->rowCount()){
	header("Location:editar_aluno.php?idaluno=$idaluno&cadastro=ok");
	}else {
	header("Location:editar_aluno.php?idaluno=$idaluno&cadastro=erro");
	}
?>