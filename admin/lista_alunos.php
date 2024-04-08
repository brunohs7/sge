<?php
//pega os dados do formulário via GET
$iddisciplina = addslashes($_GET["iddisciplina"]);
$idturma = addslashes($_GET["idturma"]);
$n_bimestre = addslashes($_GET["n_bimestre"]);
$etapa = addslashes($_GET["etapa"]);
header("Location:lancamento_de_notas.php?iddisciplina=$iddisciplina&idturma=$idturma&n_bimestre=$n_bimestre&etapa=$etapa");
?>