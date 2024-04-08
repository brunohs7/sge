<?php 
require_once "../classes/conecta.class.php";
$idaluno_da_turma = $_POST['idaluno_da_turma'];
$idturma = $_POST['idturma'];
$idaluno = $_POST['idaluno'];
//SQL
$sql = "SELECT * FROM tbdisciplina as a JOIN tbdisciplinas_da_turma as b ON a.iddisciplina = b.tbdisciplina_iddisciplina WHERE b.tbturmas_idturma = $idturma;";
$stmt = Conecta::abrirConexao()->prepare($sql);
$stmt->execute();
$linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
$numero = 1;
if (count($linhas) != 0) {
foreach ( $linhas as $linha ) {
	$iddisciplina_da_turma = $linha['iddisciplina_da_turma'];
	$nome_disciplina = $linha['nome_disciplina'];
	$sql2 = "SELECT iddisciplina_da_turma_fk, idaluno_da_turma_fk, n_bimestre, nota1 + nota2 + nota3 + nota4 + bimestre as total, bimestre from tbnotas WHERE idaluno_da_turma_fk = $idaluno_da_turma AND iddisciplina_da_turma_fk = $iddisciplina_da_turma AND n_bimestre = 1";
	$stmt2 = Conecta::abrirConexao()->prepare($sql2);
	$stmt2->execute();
	$linhas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	if (count($linhas2) != 0){
		foreach ($linhas2 as $linha2){
				$bimestre1 = $linha2['total'];
		}	
	}else{
		$bimestre1 = 0;
	}
	$sql3 = "SELECT iddisciplina_da_turma_fk, idaluno_da_turma_fk, n_bimestre, nota1 + nota2 + nota3 + nota4 + bimestre as total, bimestre from tbnotas WHERE idaluno_da_turma_fk = $idaluno_da_turma AND iddisciplina_da_turma_fk = $iddisciplina_da_turma AND n_bimestre = 2";
	$stmt3 = Conecta::abrirConexao()->prepare($sql3);
	$stmt3->execute();
	$linhas3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
	if (count($linhas3) != 0){
		foreach ($linhas3 as $linha3){
				$bimestre2 = $linha3['total'];
				if ($linha3['bimestre'] != 0){
					$prova_bimestral = $linha3['bimestre'];
				}else{
					$prova_bimestral = 0;
				}
		}	
	}else {
		$bimestre2 = 0;
		$prova_bimestral = 0;
	}
	$array[$numero] = $linha['nome_disciplina'];
	$numero++;
	if (isset($bimestre1)){
		$array[$numero] = $bimestre1;
		$numero++;		
	}else{
		$array[$numero] = ' ';
		$numero++;
	}	
	if (isset($bimestre2)){
		$array[$numero] = $bimestre2;
		$numero++;		
	}else{
		$array[$numero] = ' ';
		$numero++;
	}		
	if	(isset($bimestre1) && isset($bimestre2)){
		$array[$numero] = $total;
		$numero++;		
	}else{
		$array[$numero] = ' ';
		$numero++;
	}	
	if ($prova_bimestral != 0){
		if (isset($total)){
			if ($total >= 60){
				$array[$numero] = 'Aprovado';
				$numero++;
			}else {
				$array[$numero] = 'Reprovado';
				$numero++;
			}
		}else{
			$array[$numero] = ' ';
			$numero++;
		}
	}else{
		$array[$numero] = ' ';
		$numero++;
	}	
	$numero++;
}
}else {
	echo 'erro';
}
?>