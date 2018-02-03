<?php


include 'Conexao.php';
  
try{

$idusuario= $_GET['idusuario']; 
$nomereduzido=$_POST["nomereduzido"];
$Disciplinas= $_POST["disciplinas"]; 

//Deleta todos os Registros em usuario_disciplina
$stmt = $conexao->prepare("DELETE FROM usuario_disciplina WHERE usuario_idusuario =?");
$stmt -> bindParam(1,$idusuario);
$stmt->execute();

//Registra todas disciplinas selecionadas na tebela usuario_disciplina
for($i=0;$i<count($Disciplinas);$i++){
	
$stmt1 = $conexao->prepare("insert into usuario_disciplina(usuario_idusuario,disciplina_iddisciplina) values (?,?)");
$stmt1 -> bindParam(1,$idusuario);
$stmt1 -> bindParam(2,$Disciplinas[$i]);

 $stmt1->execute();


//Update na tabela usuario
$stmt2 = $conexao->prepare("UPDATE usuario SET nomereduzido=? WHERE idusuario= ?");
$stmt2 -> bindParam(1,$nomereduzido);
$stmt2 -> bindParam(2,$idusuario);

$stmt2->execute(); 


}

if($stmt->rowCount() >0){
	echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Alterado&url=registrardisciplinas.php'
</script>";
		
	}else{
	 echo '<script>
			alert("Não foi possivel alterar usuario.");
			location.href="../registrardisciplinas.php"
		</script>';
	}
	
	
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();

}

?>
