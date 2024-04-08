<?php
require_once "../classes/conecta.class.php";
//prepara o SQL para listar usuários
$sql = "SELECT * FROM tbdisciplina LEFT JOIN tbdisciplinas_da_turma ON tbdisciplina.iddisciplina = tbdisciplinas_da_turma.tbdisciplina_iddisciplina LEFT JOIN tbturmas ON tbdisciplinas_da_turma.tbturmas_idturma = tbturmas.idturma;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->execute();
//percorre por todos os registros encontrados e armazena num array
echo "<select name='disciplinas[]'>";
foreach ( $linhas as $linha ) {
	echo "<option value=".$linha['iddisciplina'].">".$linha['nome_disciplina']."</option>";
}echo "</select>";

?>