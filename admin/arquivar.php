<?php
require_once "../classes/conecta.class.php";
    $tipo=addslashes($_POST['tipo']);
    $mensagem=addslashes($_POST['mensagem']);
    $data=date('Y/m/d');
    $sql = "INSERT INTO tbaviso (tipo,mensagem,data)
              VALUES (:tipo, :mensagem, :data);";
    $stmt = Conecta::abrirConexao()->prepare($sql);          
    $stmt->bindValue(':tipo',$tipo);
    $stmt->bindValue(':mensagem',$mensagem);
    $stmt->bindValue(':data',$data);
              
   	if ($stmt->execute()){
		  header("Location:home.php");
		}else{
			echo "erro";
		}
?>