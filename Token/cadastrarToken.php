<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$matricula = $_POST['matricula'];
$senha = md5($_POST['senha']);
$token =  $_POST['id']; 

if($token==""){
	$token="Web";
}
//unlink('bloco1.txt');

$sqlBusca = "select * from aluno where matricula='$matricula' and alunoativo =1";
$stmtbusca = $conexao->prepare($sqlBusca);
$stmtbusca->execute(); 


if($stmtbusca->rowCount() >0){
echo 0;
}else{
$sql = "update aluno set token='$token',senha='$senha',alunoativo=1 where matricula='$matricula'";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 
echo 1;
} 








//$fp = fopen("bloco1.txt", "a");

// Escreve "exemplo de escrita" no bloco1.txt
//$escreve = fwrite($fp, $_POST['senha'].$sql);

// Fecha o arquivo
//fclose($fp); 


?>