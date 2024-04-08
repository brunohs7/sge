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
	echo $linha['idaluno']."&";
	echo $linha['tbturmas_idturma']."&";
	echo $idaluno_da_turma = $linha['idaluno_da_turma']."&";
	echo $nome = $linha['nome_completo'];
}
}else {
echo "Erro";
}
?>