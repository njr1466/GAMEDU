<!doctype html>
<html lang="pt">
<head>
<?php include 'php/VerificarSession.php'?>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



  <title>IFPE - REGISTRAR DISCIPLINA/PROFESSOR</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

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
                    <a class="navbar-brand" href="#">Registrar Disciplina/Professor</a>
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
<br>
<form class="form-horizontal" method="POST" action="php/CadastrarDisciplinaProfessor.php" style="margin-left:-10%;">
    <div class="col-md-4 col-md-offset-3">
        <select id="idusuario" name="idusuario" class="form-control">
        <option> Selecione o professor...</option>
      <?php
      //Seleciona todos os professores e lista no form
      include 'php/Conexao.php';
      $stmt = $conexao->prepare("SELECT * FROM usuario ");
      $stmt->execute();

        if($stmt->rowCount()>0){

      
        

        $resultado = $stmt->fetchAll();
        foreach($resultado as $linha){ 
        ?>
         <option value="<?php echo $linha['idusuario']; ?>"><?php echo ($linha['nomeusuario']); ?></option>
       
       <?php
        }   
        }
        
     ?> 
       </select>

      <p></p>
      <div class="col-md-4 col-md-offset-3" >  
    <button id="singlebutton" type="submit" name="singlebutton"  style="margin-left:45%;"    class="btn btn-success">Buscar</button>  
    </div>
    </div>
</div>
</fieldset>


</form> 
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
