<?php
include("class.Upload.php");
$nome_arquivo=addslashes($_POST["nome"]);
//define os tipos permitidos
$tipos[0]=".gif";
$tipos[1]=".jpg";
$tipos[2]=".jpeg";
$tipos[3]=".png";
$tipos[4]=".docx";
$tipos[5]=".xls";
$tipos[6]=".pdf";
 print_r($_FILES);
 
if(isset($_FILES["userfile"])){
	
	$upArquivo = new Upload;
	
	if($upArquivo->UploadArquivo($_FILES["userfile"], "../arquivos/", $tipos))
	{
		$nome = $upArquivo->nome;
		$tipo = $upArquivo->tipo;
		$tamanho = $upArquivo->tamanho;
		require_once "../classes/conecta.class.php";
		//inserir na tabela
		$sql = "INSERT INTO tbarquivos (nome_arquivo,caminho_arquivo, tipo_arquivo, tamanho_arquivo) VALUES (:nome_arquivo,:caminho_arquivo,:tipo_arquivo, :tamanho_arquivo);"; 
		$stmt=Conecta::abrirConexao()->prepare($sql);
		$stmt->bindValue(':nome_arquivo', $nome_arquivo);
		$stmt->bindValue(':caminho_arquivo', $nome);
		$stmt->bindValue(':tipo_arquivo', $tipo);
		$stmt->bindValue(':tamanho_arquivo', $tamanho);
		//se achou imprime o nome, caso contrário, erro
		$stmt->execute();
		}else{
			echo "Falha no envio<br />";	
		}
}
	header("Location:enviar_arquivo.php");
?>
