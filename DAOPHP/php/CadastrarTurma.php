<?php
try{
	include 'Conexao.php';


    $Nome= $_POST["nome"]; 
	$Periodo= $_POST["periodo"]; 
	$Turno= $_POST["turno"]; 
	$NomeX= $Nome . " - " . $Periodo;
    







	
$stmt = $conexao->prepare("insert into turma(nometurma,turnoturma) values (?,?)");
	
	

	$stmt -> bindParam(1,$NomeX);
	$stmt -> bindParam(2,$Turno);


	


$stmt->execute(); 



echo '<script>
			alert("Cadastro Realizado com Sucesso!");
			location.href="../registrarturmas.php"	
		</script>';
	


  
	}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
 


} 
	


?>