<?php

	include 'Conexao.php';

		try{
		$stmt = $conexao->prepare("delete from disciplina where iddisciplina = ?");

		$iddisciplina= $_GET["iddisciplina"]; 	 	   
		
		$stmt -> bindParam(1,$iddisciplina);    
		$stmt->execute(); 

		
			 echo '<script>
						
						location.href="../registrardisciplinas.php"
					</script>';
			

		}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}

		
?>