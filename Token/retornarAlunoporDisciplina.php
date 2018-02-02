<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$iddisciplina = $_POST["idDisciplina"];




$sql = "SELECT * FROM `aluno` INNER JOIN aluno_disciplina on aluno.idaluno = aluno_disciplina.aluno_idaluno 
where aluno_disciplina.disciplina_iddisciplina = ? order by nomealuno";
$stmt = $conexao->prepare($sql);
$stmt -> bindParam(1,$iddisciplina);
$stmt->execute(); 

if($stmt->rowCount() >0){
$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$retorno []= 'nome:'.$linha["nomealuno"];
	}

    echo json_encode($retorno);
 }else{
 	echo 0;
 } 


?>