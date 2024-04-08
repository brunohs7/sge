<?php
//chama os arquivos
require_once "../classes/conecta.class.php";
//pega os dados do formulário via POST
$idaluno = addslashes($_POST["idaluno"]);
//prepara o SQL para consultar usuário
$sql = "SELECT * FROM tbaluno WHERE idaluno = :idaluno;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->bindValue(':idaluno', $idaluno);
$stmt->execute();
//se achou imprime o nome, caso contrário, erro
if ($linha = $stmt->fetch(PDO::FETCH_OBJ)){
//configura o cabeçalho para exibir os dados no formato JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($linha);
}else {
echo "E-mail e/ou Senha incorretos!";
}
?>