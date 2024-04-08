<?php
// session_start inicia a sessão
session_start();
//chama os arquivos
require_once "../classes/conecta.class.php";
//pega os dados do formulário via POST com segurança
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);
//criptografa a senha
$senha = sha1($senha);
//prepara o SQL para consultar usuário
$sql = "SELECT * FROM tbusuario WHERE email LIKE :email AND senha LIKE :senha ORDER BY nome;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':senha', $senha);
$stmt->execute();
//se achou imprime o nome, caso contrário, erro
if ($linhas = $stmt->fetchAll(PDO::FETCH_ASSOC)){
foreach ( $linhas as $linha ) {
}
$nome = $linha['nome'];
$idusuario = $linha['idusuario'];
$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
$_SESSION['idusuario'] = $idusuario;
header('location: home.php');
}else {
unset ($_SESSION['email']);
unset ($_SESSION['senha']);
unset ($_SESSION['nome']);
unset ($_SESSION['idusuario']);

header("Location:login.php?login=false");
}
?>