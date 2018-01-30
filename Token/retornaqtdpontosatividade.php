<?php
header('HTTP/1.1 200' );
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, WCTrustedToken, userId, WCToken, PersonalizationID, AUTHUSER, Primarynum');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idaluno = $_POST["id"];



$qtd=0;
$sql = "select atividade.*,DATE_FORMAT(atividade.data,'%e/%m')datas from atividade,atividade_nota where atividade.id = atividade_nota.atividade_idatividade and atividade_nota.aluno_idaluno=$idaluno";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 
$retorno="";
$retornodata="";
$retornogeral="";


 if($stmt->rowCount() >0){
$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$idatividade= $linha["id"];
		$dataAtividade = $linha["datas"];
		$sql1 = "select * from atividade_nota where atividade_nota.atividade_idatividade = $idatividade and atividade_nota.aluno_idaluno= $idaluno order by id";
		$stmt1 = $conexao->prepare($sql1);
		$stmt1->execute(); 


			if($stmt1->rowCount() >0){
				$resultado1 = $stmt1->fetchAll();

				foreach($resultado1 as $linha1){

					if($qtd==0){
						$retorno = $linha1["nota"]*100	;
						$retornodata = $dataAtividade;
						$qtd = 1;
					}else{
						$retorno.= ",".$linha1["nota"]*100	;
						$retornodata.= ",".$dataAtividade;
					}
				}
		    }


		
	}

    echo $retorno.":".$retornodata;
 }else{
 	echo 0;
 } 


?>