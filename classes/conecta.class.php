<?php
	class Conecta {
	//atributo da classe
	public static $conn;
	//método da classe
	public static function abrirConexao(){
	if (!isset (self::$conn)){
	self::$conn = new PDO('mysql:host=localhost;
	dbname=wpinfor09', 'root', '', array
	(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8"));
	}
	return self::$conn;
	 }
	}
?>