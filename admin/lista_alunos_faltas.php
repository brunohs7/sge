<?php
//pega os dados do formulário via GET
$iddisciplina = addslashes($_GET["iddisciplina"]);
$idturma = addslashes($_GET["idturma"]);
$data_da_falta = addslashes($_GET["data_da_falta"]);
header("Location:lancamento_de_faltas.php?iddisciplina=$iddisciplina&idturma=$idturma&data_da_falta=$data_da_falta");
?>