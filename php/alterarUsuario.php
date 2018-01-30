<?php include 'VerificarSession.php'?>
<?php


include 'Conexao.php';


try{
$stmt = $conexao->prepare("select * from usuario where idusuario = ?");


$idusuario= $_GET["idusuario"]; 

$stmt->bindValue(1,$idusuario);

$stmt->execute();
$resultado = $stmt->fetchAll();





	

foreach($resultado as $linha){


?>
<html>
<head>
		<meta charset="utf-8">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<title>Alterar Professor</title>

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>

<nav class="navbar navbar-default navbar-fixed" style="background-color:#228B22;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Alterar Professor</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                              <?php echo $_SESSION['nomeusuario']; ?>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="../dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
                                    Home
                                    
                              </a>
                              
                        </li>
                        <li>
                            <a href="Sair.php">
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<form class="form-horizontal" method="POST" action="updateUsuario.php?idusuario=<?php echo $idusuario; ?>" style="margin-left:-10%;">
<fieldset>

<!-- Form Name -->
<legend> </legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomeusuario">Nome Completo</label>  
  <div class="col-md-5">
  <input id="nomeusuario" name="nomeusuario" type="text" placeholder="" value="<?php echo $linha['nomeusuario'] ?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->  
<div class="form-group">
  <label class="col-md-4 control-label" for="nomereduzido">Nome reduzido</label>  
  <div class="col-md-4">
  <input id="nomereduzido" name="nomereduzido" type="text" placeholder=""  value="<?php echo $linha['nomereduzido'] ?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpfusuario">CPF</label>  
  <div class="col-md-4">
  <input id="cpfusuario" name="cpfusuario" type="text" placeholder=""  value="<?php echo $linha['cpfusuario'] ?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipousuario_idtipousuario">Tipo de Usuário</label>
  <div class="col-md-2">
  <select name="tipousuario_idtipousuario" class="form-control"
   >
  <option >Escolha... </option>
  <option value="1" <?php if(($linha["tipousuario_idtipousuario"]) == 1){ echo "selected";}?> > Professor</option>
  <option value="2" <?php if(($linha["tipousuario_idtipousuario"]) == 2){ echo "selected";}?>> Técnico</option>
  <option value="3" <?php if(($linha["tipousuario_idtipousuario"]) == 3){ echo "selected";}?>> Administrador</option>
  </select> 
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="cpf">Disciplinas</label>  
  <div class="col-md-8">
<!-- Select Basic -->
<?php
  //Seleciona todas disciplinas e lista no form
  $stmt = $conexao->prepare("SELECT * FROM disciplina");

		$stmt->execute();

		if($stmt->rowCount()>0){

	
		
$i=0;
		$resultado = $stmt->fetchAll();
		foreach($resultado as $linha){ 
		$stmt2 = $conexao->prepare("SELECT * FROM usuario_disciplina WHERE usuario_idusuario=? and disciplina_iddisciplina=?;");
		$stmt2 -> bindParam(1,$idusuario);
		$stmt2 -> bindParam(2,$linha['iddisciplina']);
		$stmt2->execute();
		if($stmt2->rowCount()>0){
	   echo "<fieldset class='col-sm-6'><label>
      <input type='checkbox' value=".$linha['iddisciplina']." name='disciplinas[]' checked style='background-color=red;' />
      <span style='font-size:18px'>".($linha['descricaodisciplina'])."</span>
   </label></fieldset>";
		}else{
		echo "<fieldset class='col-sm-6'><label>
      <input type='checkbox' value=".$linha['iddisciplina']." name='disciplinas[]'  />
      <span style='font-size:18px'>".($linha['descricaodisciplina'])."</span>
   </label></fieldset>";

		
		}
   
		}
		
		}
  
  

  
?> 
  </div>
</div>

<button id="singlebutton" name="singlebutton"  style="margin-left:45%;"    class="btn btn-success">Alterar</button>
</fieldset>
</form>
	

		

</body>
</html> 
<?php
}
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
} 

?>