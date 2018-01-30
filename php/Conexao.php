<?php


	try{
	$conexao = new PDO('mysql:host=localhost;dbname=profes11_mobile','profes11_mobile','bill1466',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
 

} 


?>