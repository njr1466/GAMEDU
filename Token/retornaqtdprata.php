<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idaluno = $_POST["id"];




$sql = "select atividade.* from atividade,atividade_nota where atividade.id = atividade_nota.atividade_idatividade and atividade_nota.aluno_idaluno=$idaluno";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 
$retorno=0;
$qtdouro=0;
$qtdprata=0;
$qtdbronze=0;

 if($stmt->rowCount() >0){
$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$idatividade= $linha["id"];
		$sql1 = "select ( @row_number:=@row_number + 1) AS num, n.notamaxima,n.aluno_idaluno from (select * from (select max(atividade_nota.nota)notamaxima,atividade_nota.aluno_idaluno,atividade.semestre_idsemestre from(SELECT @row_number:=0)as t, atividade_nota, atividade where atividade.id = atividade_nota.atividade_idatividade and atividade_nota.atividade_idatividade = $idatividade and atividade.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1) semestre)) group by atividade_nota.atividade_idatividade, atividade_nota.id order by atividade_nota.nota desc)nota)n order by n.notamaxima desc,n.aluno_idaluno";
		$stmt1 = $conexao->prepare($sql1);
		$stmt1->execute(); 


			if($stmt1->rowCount() > 0){
				$resultado1 = $stmt1->fetchAll();

				foreach($resultado1 as $linha1){

					if(($linha1["aluno_idaluno"] == $idaluno)&&($linha1["num"]==1)){
						$qtdouro = $qtdouro + 1;	
					
					}

					if(($linha1["aluno_idaluno"] == $idaluno)&&($linha1["num"]==2)){
						$qtdprata = $qtdprata + 1;	
					
					}

					if(($linha1["aluno_idaluno"] == $idaluno)&&($linha1["num"]==3)){
						$qtdbronze = $qtdbronze + 1;	
					
					}
				}
		    }


		
	}





 }





 $sql2 = " 
select resultado.* from (select ( @row_number:=@row_number + 1) AS num,total.*   from (select selecao.* from (select sum(nota)pontos,aluno.nomealuno,aluno.idaluno,(select turma_idturma from aluno_turma where aluno_turma.aluno_idaluno = aluno.idaluno)codturma,atividade.semestre_idsemestre,(select t.turnoturma from aluno_turma at,turma t where at.turma_idturma = t.idturma and at.aluno_idaluno= aluno.idaluno )turma from atividade_nota, atividade, aluno,(SELECT @row_number:=0)as t where atividade.id = atividade_nota.atividade_idatividade and aluno.idaluno = atividade_nota.aluno_idaluno and atividade.semestre_idsemestre = (select semestre.id from semestre where ativo=1 ) group by aluno.nomealuno ORDER BY `pontos` desc) selecao where selecao.codturma=(select turma_idturma from aluno_turma where aluno_turma.aluno_idaluno = $idaluno ) group by selecao.nomealuno ORDER BY selecao.pontos desc, selecao.nomealuno)as total) as resultado where resultado.idaluno=$idaluno
";


$stmt2 = $conexao->prepare($sql2);
$stmt2->execute(); 
$qtdpontos=0;

 if($stmt2->rowCount() >0){
 $resultado2 = $stmt2->fetchAll();
  	foreach($resultado2 as $linha2){
		$qtdpontos= $linha2["num"]."º - ".($linha2["pontos"]*1000);

	}

 }




echo $retorno = $qtdouro.','.$qtdprata.','.$qtdbronze.','.$qtdpontos;


?>