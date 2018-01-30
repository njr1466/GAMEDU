<!doctype html>
<html lang="pt">
<head>
<?php include 'php/VerificarSession.php'?>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<script type="text/javascript" src="js/paginador.js"></script>

	<title>IFPE - REGISTRAR USUARIO</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<link href="css/listar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
	
	


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	  <!--    Formatar Dados de Inputs  -->
<script language="JavaScript" src="js/FormatarDados.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<?php include 'menu.php'?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Registrar Usuario</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                              <?php echo $_SESSION['nomeusuario']; ?>
                            </a>
                        </li>
                        
                        <li>
                            <a href="php/Sair.php">
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!--CONTEUDO AQUI -->
<form class="form-horizontal" method="post" action="php/CadastrarUsuario.php" >
<fieldset>

<!-- Form Name -->
<legend> </legend>
<!-- Erros gerados no cadastro/alteração-->
<?php 

if(isset($_SESSION['erromatricula'])){
	echo "<center><h4 style='color:red;'>".$_SESSION['erromatricula']."</h4></center>";
											
											unset( $_SESSION['erromatricula'] );
											
										}


?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomeusuario">Nome completo</label>  
  <div class="col-md-5">
  <input id="nomeusuario" name="nomeusuario" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomereduzido">Nome reduzido</label>  
  <div class="col-md-4">
  <input id="nomereduzido" name="nomereduzido" type="text" placeholder="" class="form-control input-md" required="" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpfusuario">CPF</label>  
  <div class="col-md-3">
  <input id="cpfusuario" name="cpfusuario" type="text" placeholder="sem pontos ou traços" class="form-control input-md" required="" maxlength="11">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Senha</label>  
  <div class="col-md-4">
  <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="" >
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipousuario_idtipousuario">Tipo de Usuário</label>
  <div class="col-md-2">
  <select name="tipousuario_idtipousuario" id="tipousuario_idtipousuario" class="form-control" >
	<option >Escolha... </option>
	<option value="1" > Professor</option>
	<option value="2" > Técnico</option>
	<option value="3" > Administrador</option>
  </select>	
  </div>
</div>



</fieldset>




<!-- -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
    

    <div class="form-group">
           
            <div class="col-sm-5">
			
             
<div class="form-group">
<div class="col-sm-5">

 <input type="submit" style="margin-left:250%;margin-top:15%;" class="btn btn-primary btn-success" value="Cadastrar">     
	  </div>      
	  </div>
	  </div>
          </div>
		  
		  </form>
		  <form class="form-horizontal" action="php/CadastrarUsuario.php">


</fieldset>
</form>

        </div></div><?php
//Lista usuario
 if(isset($_GET['disciplinaList'])){
?>


 <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista de usuarios</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    
                  </div>
                </div>
              </div>
			  <?php                      
			  include 'php/Conexao.php';
$stmt = $conexao->prepare("SELECT * FROM `usuario`");

 $DisciplinaList = $_GET['disciplinaList'];
$stmt -> bindParam(1,$DisciplinaList);
$stmt->execute();

if($stmt->rowCount() >0){
			  
			  ?>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list" id="conteudo">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th></th>
                        
						<th>Nome</th>
						<th>Cpf </th>
						
                    </tr> 
                  </thead>
				  <?php 
				  	}	

	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
				  ?>
                  <tbody>
                          <tr>
                            <td align="center">
                              <a class="btn btn-success"  href="php/alterarUsuario.php?idusuario=<?php echo $linha['idusuario']; ?>"><em class="fa fa-pencil"></em></a>
                              <a target="_blank" id="Clique<?php echo $linha["idusuario"]; ?>" class="btn btn-danger" ><em class="fa fa-trash"></em></a>
                           <div id="escondido<?php echo $linha["idusuario"]; ?>" style="display:none;">
						   Tem certeza que deseja deletar esse Usuario? <?php echo ($linha["nomeusuario"]); ?> ? <br>
    <a  id="Clique" class="btn btn-success" href="php/deletarUsuario.php?idusuario=<?php echo $linha['idusuario']; ?>&nomeusuario=<?php echo $linha['nomeusuario']; ?>"><em class="fa fa-check"></em></a>
</div>
<script>
$( "#Clique<?php echo $linha["idusuario"]; ?>" ).click(function() {
  $("#escondido<?php echo $linha["idusuario"]; ?>").css("display","block");
});
 </script>
						   
						   </td>
                            <td class="hidden-xs"><?php echo $linha["idusuario"]; ?></td>
                            <td><?php echo ($linha["cpfusuario"]); ?></td>
                           
							  <td><?php echo ($linha["nomeusuario"]); ?></td>
							    <td><?php echo ($linha["cpfusuario"]); ?></td>
							<!-- <td><?php if(($linha["alunoativo"]) == 1){
					echo "Sim";		}else{ echo "Não";}								?></td> -->
                          </tr>
                        </tbody>
						<?php 
						} 
						?>
                </table>
				<table id="paginador" border="1">
			
		</table>
            
              </div>
            
            </div>

</div></div></div>
 
<?php											
 }else{
	 
?>



 <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista de Usuarios</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    
                  </div>
                </div>
              </div>
			  <?php                      
			  include 'php/Conexao.php';
$stmt = $conexao->prepare("SELECT * FROM usuario");

$stmt->execute();

if($stmt->rowCount() >0){
			  
			  ?>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list" id="conteudo">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">ID</th>
                        <th>CPF</th>
			<th>Nome</th>
			<th>Ativo</th>
      <th>Tipo</th>
						
                    </tr> 
                  </thead>
				  <?php 
				  	}	

	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
				  ?>
                  <tbody>
                          <tr>
                            <td align="center">
                              <a class="btn btn-success"  href="php/alterarUsuario.php?idusuario=<?php echo $linha['idusuario']; ?>"><em class="fa fa-pencil"></em></a>
                              <a target="_blank" id="Clique<?php echo $linha["idusuario"]; ?>" class="btn btn-danger" ><em class="fa fa-trash"></em></a>
                           <div id="escondido<?php echo $linha["idusuario"]; ?>" style="display:none;">
						   Tem certeza que deseja deletar o Usuário <?php echo ($linha["nomeusuario"]); ?> ? <br>
    <a  id="Clique" class="btn btn-success" href="php/deletarUsuario.php?idusuario=<?php echo $linha['idusuario']; ?>&nomeusuario=<?php echo $linha['nomeusuario']; ?>"><em class="fa fa-check"></em></a>
</div>
<script>
$( "#Clique<?php echo $linha["idusuario"]; ?>" ).click(function() {
  $("#escondido<?php echo $linha["idusuario"]; ?>").css("display","block");
});
 </script>
						   
						   </td>
                            <td class="hidden-xs"><?php echo $linha["idusuario"]; ?></td>
                            <td><?php echo ($linha["cpfusuario"]); ?></td>
			    <td><?php echo ($linha["nomeusuario"]); ?></td>
							    
							<td><?php if(($linha["usuarioativo"]) == 1){
          echo "Sim";   }else{ echo "Não";}               ?></td> 


              <td><?php if(($linha["tipousuario_idtipousuario"]) == 1){
          echo "Professor";   }
                      elseif (($linha["tipousuario_idtipousuario"]) == 2) {
          echo "Técnico";}
                      else{echo "Administrador";}               ?>          
              </td>
                          </tr>
                        </tbody>
						<?php 
						} 
						?>
                </table>
				<table id="paginador" border="1">
			
		</table>
            
              </div>
            
            </div>

</div></div></div>

	 
<?php	 
 }

        
?>

        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	

</html>
