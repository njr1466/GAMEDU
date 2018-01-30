<?php include 'VerificarSession.php'?>
<?php

	include 'Conexao.php';

$idusuario= $_GET["idusuario"];
$nomeusuario= $_GET["nomeusuario"];
		try{
		
		
		
		$stmt = $conexao->prepare("delete from usuario where idusuario = ?");

		 	 	   
		
		$stmt -> bindParam(1,$idusuario);    
		$stmt->execute(); 

/*  "pra quando for implementar usuario ligado a tabela usuario_disciplina"


		$stmt = $conexao->prepare("delete from usuario_disciplina where usuario_idusuario = ?");

		 	 	 		
		$stmt -> bindParam(1,$idusuario);    
		$stmt->execute();

		*/
		
	$_SESSION['erromatricula'] = "<b>Aluno ".$nomeusuario." Deletado com sucesso!</b>";
		echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Excluído&url=registrarusuario.php'
</script>"; 	
			
		
		}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}
		
?>
