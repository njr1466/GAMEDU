<?php

	include 'Conexao.php';

		try{
		$stmt = $conexao->prepare("delete from turma where idturma = ?");

		$idturma= $_GET["idturma"]; 	 	   
		
		$stmt -> bindParam(1,$idturma);    
		$stmt->execute(); 

		
			 echo '<script>
						
						location.href="../registrarturmas.php"
					</script>';
			

		}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}

		
?>