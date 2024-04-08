<?php
// session_start inicia a sessão
session_start();
//chama os arquivos
require_once "../classes/conecta.class.php";
//pega os dados do formulário via POST com segurança
$usuario = addslashes($_POST["usuario"]);
$senha = addslashes($_POST["senha"]);
//criptografa a senha
$senha = sha1($senha);
//prepara o SQL para consultar usuário
$sql = "SELECT * FROM tbaluno as a JOIN tbalunos_da_turma as b ON a.idaluno = b.tbaluno_idaluno WHERE usuario LIKE :usuario AND senha LIKE :senha ORDER BY nome_completo;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->bindValue(':usuario', $usuario);
$stmt->bindValue(':senha', $senha);
$stmt->execute();
//se achou imprime o nome, caso contrário, erro
if ($linhas = $stmt->fetchAll(PDO::FETCH_ASSOC)){
foreach ( $linhas as $linha ) {
}
$idaluno = $linha['idaluno'];
$nome = $linha['nome_completo'];
$idturma = $linha['tbturmas_idturma'];
$idaluno_da_turma = $linha['idaluno_da_turma'];
$_SESSION['nome_completo'] = $nome;
$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
$_SESSION['idaluno'] = $idaluno;
$_SESSION['idturma'] = $idturma;
$_SESSION['idaluno_da_turma'] = $idaluno_da_turma;
header('location: home.php');
}else {
unset ($_SESSION['usuario']);
unset ($_SESSION['senha']);
header("Location:login.php?login=false");
}
?>