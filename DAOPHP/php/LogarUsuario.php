<?php
session_start();
include 'Conexao.php';
	
$username = $_POST['cpf'];  
$senha = md5($_POST['senha']); 

$stmt = $conexao->query("select nomeusuario,idusuario from usuario where cpfusuario='$username' and senha='$senha'");

$contagem = $stmt->rowCount();

if ( $contagem == 1  ) {


	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){

	$_SESSION['nomeusuario'] =$linha["nomeusuario"];
    $_SESSION['idusuario'] = $linha["idusuario"];
	}

session_destroy($_SESSION['errologin']);


header('Location: ../dashboard.php');

  
}else{
$_SESSION['errologin'] = "Usuário ou senha inválido";
echo '<script>
			
			location.href="../index.php"	
		</script>';

}






?>