<?php
header('Access-Control-Allow-Origin: *'); 
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idaluno = $_POST["id"];


$sql = "select resultado.* from (select ( @row_number:=@row_number + 1) AS num,total.*   from (select selecao.* from (select sum(nota)pontos,aluno.nomealuno,aluno.idaluno,(select turma_idturma from aluno_turma where aluno_turma.aluno_idaluno = aluno.idaluno)codturma,atividade.semestre_idsemestre,(select t.turnoturma from aluno_turma at,turma t where at.turma_idturma = t.idturma and at.aluno_idaluno= aluno.idaluno )turma from atividade_nota, atividade, aluno,(SELECT @row_number:=0)as t where atividade.id = atividade_nota.atividade_idatividade and aluno.idaluno = atividade_nota.aluno_idaluno and atividade.semestre_idsemestre = (select semestre.id from semestre where ativo=1 ) group by aluno.nomealuno ORDER BY `pontos` desc) selecao where selecao.codturma=(select turma_idturma from aluno_turma where aluno_turma.aluno_idaluno = 1453 ) group by selecao.nomealuno ORDER BY selecao.pontos desc, selecao.nomealuno)as total) as resultado where resultado.idaluno=$idaluno
";


$stmt = $conexao->prepare($sql);
$stmt->execute(); 
$retorno=0;

 if($stmt->rowCount() >0){
 $resultado = $stmt->fetchAll();
  	foreach($resultado as $linha){
		$retorno= $linha["num"]."º - ".($linha["pontos"]*1000);

	}


    echo $retorno;
 }else{
 	echo 0;
 } 


?>