<?php include 'php/VerificarSession.php'?>
<?php
try{
	include 'Conexao.php';
	 $nome = $_POST['nomeusuario'];
	 $nomereduzido = $_POST['nomereduzido'];
	 $cpf= $_POST['cpfusuario'];
	 $senha = $_POST['senha'];
	 $tipousuario_idtipousuario = $_POST['tipousuario_idtipousuario'];
	


$stmt = $conexao->prepare("SELECT max(idusuario)max FROM usuario");
$stmt->execute();

	

		$resultado = $stmt->fetchAll();
		foreach($resultado as $linha){ 
		  $idusuario = $linha['max']+1;
		
		
		
		}

		
 








	//$descricao= $_POST['descricaousuario'];
	//$idtipousuario= $_POST['idtipousuario'];
	
		
//Cadastrar Usuarios na tabela 'usuario' e *ainda não* Disciplinas na tabela 'usuario_disciplina'
	//Inserir aluno	
$stmt = $conexao->prepare("insert into usuario(idusuario,nomeusuario,nomereduzido,cpfusuario,senha,tipousuario_idtipousuario) values (?,?,?,?,?,?)");
	

$stmt -> bindParam(1,$idusuario);	
$stmt -> bindParam(2,$nome);
$stmt -> bindParam(3,$nomereduzido);
$stmt -> bindParam(4,$cpf);
$stmt -> bindParam(5,$senha);
$stmt -> bindParam(6,$tipousuario_idtipousuario);
	
$stmt->execute(); 



//Busca o ID do aluno inserido

/*
$stmt = $conexao->prepare("SELECT tipousuario_idtipousuario FROM usuario WHERE idtipousuario = ?");

	$stmt -> bindParam(1,$idtipousuario);
		


		$stmt->execute();

		if($stmt->rowCount()<4){

	
		

		$resultado = $stmt->fetchAll();
		foreach($resultado as $linha){ 
		 $Idusuario = $linha['idusuario'];
		
		
		
		}

		}
 
	
	
 
for($i=0;$i<count($cpfusuario);$i++){
	
$stmt = $conexao->prepare("insert into aluno_disciplina(aluno_idaluno,disciplina_iddisciplina,disciplinaativo) values (?,?,1)");
$stmt -> bindParam(1,$Idaluno);
$stmt -> bindParam(2,$cpfusuario[$i]);

 $stmt->execute();
	
}



*/


 $_SESSION['erromatricula'] = "Aluno ".$Nome." cadastrado com sucesso!";
echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Cadastrado&url=registrarusuario.php'
</script>"; 
 
 
 
 




}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}
?>
