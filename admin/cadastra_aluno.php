<?php
	//pega os dados via POST
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
	$matricula_aluno=addslashes($_POST["matricula_aluno"]);
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
	$sql = "INSERT INTO tbaluno (matricula_aluno, nome_completo, data_nascimento, logradouro, numero, complemento, bairro, cidade, estado, cep, cpf, rg, nome_da_mae, nome_do_pai, telefone, email, telefone_recado, email_alternativo, usuario, senha) VALUES (:matricula_aluno, :nome_completo, :data_nascimento, :logradouro, :numero, :complemento, :bairro, :cidade, :uf, :cep, :cpf, :rg, :nome_da_mae, :nome_do_pai, :telefone, :email, :telefone_recado, :email_alternativo, :usuario, :senha);"; 
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
	$stmt->bindValue(':matricula_aluno', $matricula_aluno);	
	$stmt->bindValue(':telefone', $telefone);
	$stmt->bindValue(':telefone_recado', $telefone_recado);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':email_alternativo', $email_alternativo);
	$stmt->bindValue(':senha', $senha);
	$stmt->bindValue(':usuario', $usuario);
	//se achou imprime o nome, caso contrário, erro
	$stmt->execute();
	if 	($stmt->rowCount()){
	header("Location:cadastrar_aluno.php?cadastro=ok");
	}else {
	header("Location:cadastrar_aluno.php?cadastro=erro");
	}
?>