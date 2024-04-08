<?php 
require_once "../classes/conecta.class.php";
$idaluno_da_turma = $_POST['idaluno_da_turma'];
$idturma = $_POST['idturma'];
if (isset($idaluno_da_turma)){
	//prepara o SQL para listar usuários
	$sql = "SELECT * FROM tbdisciplina as a JOIN tbdisciplinas_da_turma as b ON a.iddisciplina = b.tbdisciplina_iddisciplina WHERE b.tbturmas_idturma = $idturma;";
	$stmt = Conecta::abrirConexao()->prepare($sql);
	$stmt->execute();
	//percorre por todos os registros encontrados e armazena num array
	$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if (count($linhas) != 0) {
		foreach ( $linhas as $linha ) {
			echo $linha['nome_disciplina']."\n";	
			$iddisciplina_turma = $linha['iddisciplina_da_turma'];
			$consulta = "SELECT SUM(b.Total_de_Faltas) AS 'Total de Faltas' FROM (SELECT a.data_da_falta, a.`horario1` + a.`horario2`+ a.`horario3` + a.`horario4` + a.`horario5` as 'Total_de_Faltas' FROM ( SELECT data_da_falta,(case WHEN horario1 = 'F' then count(horario1) else 0 END) as horario1, (case WHEN horario2 = 'F' then count(horario2) else 0 END) as horario2, (case WHEN horario3 = 'F' then count(horario3) else 0 END) as horario3, (case WHEN horario4 = 'F' then count(horario4) else 0 END) as horario4, (case WHEN horario5 = 'F' then count(horario5) else 0 END) as horario5 FROM tbfaltas WHERE idaluno_turma_fk = $idaluno_da_turma AND iddisciplina_turma_fk = $iddisciplina_turma GROUP BY data_da_falta )a)b;";
			$executa = Conecta::abrirConexao()->prepare($consulta);
			$executa->execute();
			$dados = $executa->fetchAll(PDO::FETCH_ASSOC);
			foreach ( $dados as $dado ) {
				if (isset($dado['Total de Faltas'])){
					echo "Total de Faltas: ".$dado['Total de Faltas']."\n"."\n";
				}else{
					echo 'Total de Faltas: 0'."\n"."\n";
				}
			}
		}
	}else {
		echo 'erro';
	}
}
?>