<?php
// session_start inicia a sessão
session_start();
//chama os arquivos
require_once "../classes/conecta.class.php";
//pega os dados do formulário via POST com segurança
$idaluno = addslashes($_POST["idaluno"]);
//prepara o SQL para consultar usuário
$sql = "SELECT * FROM tbalunos_da_turma WHERE tbaluno_idaluno = :idaluno;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->bindValue(':idaluno', $idaluno);
$stmt->execute();
//se achou imprime o nome, caso contrário, erro
if ($linhas = $stmt->fetchAll(PDO::FETCH_ASSOC)){
foreach ( $linhas as $linha ) {
	$idturma = $linha['tbturmas_idturma'];
	$sql2 = "SELECT * FROM tbdisciplinas_da_turma WHERE tbturmas_idturma = :idturma";
	$stmt2 = Conecta::abrirConexao()->prepare($sql2);
	$stmt2->bindValue(':idturma', $idturma);
	$stmt2->execute();
	$linhas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach ( $linhas2 as $linha2 ) {
		$iddisciplina = $linha2['tbdisciplina_iddisciplina'];
		$sql3 = "SELECT * FROM tbdisciplina WHERE iddisciplina = :iddisciplina";
		$stmt3 = Conecta::abrirConexao()->prepare($sql3);
		$stmt3->bindValue(':iddisciplina', $iddisciplina);
		$stmt3->execute();
		$linhas3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
		foreach ( $linhas3 as $linha3) {
			echo $linha3['nome_disciplina'];
			die;
		}
	}
}
}else {
echo "Erro";
}
?>