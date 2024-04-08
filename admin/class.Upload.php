<?php 
$url = $_SERVER["PHP_SELF"];
if(preg_match("#class.Upload.php#", "$url"))
{
header("Location: ../index.php");
}
 
 
class Upload
{
var $tipo;
var $nome;
var $tamanho;
 
function Upload()
{
//Criando objeto
}
 
function UploadArquivo($arquivo, $pasta, $tipos)
{ 
if(isset($arquivo))
{
	 $nomeOriginal = $arquivo["name"]; 
	 $nomeFinal = $nomeOriginal;
	 $tipo = strrchr($arquivo["name"],".");
	 $tamanho = $arquivo["size"];
	 
 $arquivoPermitido=true;
for($i=0;$i<=count($tipos);$i++)
{ 
	foreach ($tipos as $tipa)
	

 
if($arquivoPermitido==false)
{
echo "Extensão de arquivo não permitido!!";
exit;
}
 
if (move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeFinal))
{ 
$this->nome=$pasta . $nomeFinal;
$this->tipo=$tipo;
$this->tamanho=number_format($arquivo["size"]/1024, 2) . "KB";
return true; 
}else{ 
return false;
} 
}
} 

}
}
?>