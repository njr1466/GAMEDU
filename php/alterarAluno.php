<?php include 'VerificarSession.php'?>
<?php


include 'Conexao.php';


try{
$stmt = $conexao->prepare("select aluno.*, aluno_turma.* from aluno,aluno_turma where aluno.idaluno = aluno_turma.aluno_idaluno and aluno.idaluno = ?");


$idaluno= $_GET["idaluno"]; 

$stmt->bindValue(1,$idaluno);

$stmt->execute();
$resultado = $stmt->fetchAll();
	
foreach($resultado as $linha){
$idturma = $linha['turma_idturma'];

?>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <title>Alterar Aluno</title>

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
  <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" >
  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
                    <a class="navbar-brand" href="#">Alterar Aluno</a>
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
<form class="form-horizontal" method="POST" action="updateAluno.php?idaluno=<?php echo $idaluno; ?>" style="margin-left:-10%;">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome Aluno</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="" value="<?php echo $linha['nomealuno'] ?>" class="form-control input-md" required="">
   
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Ativo</label>
   <label class="switch">
   <input type="checkbox" value="1" name='ativo[]'
      <?php
        if ($linha['alunoativo']== 1) {
          echo "checked";
        }
        else{

        }
      ?>    
    >
  <span class="slider round"></span>
</label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf">Matrícula</label>  
  <div class="col-md-4">
  <input id="cpf" name="matricula"  maxlength="13" type="text" placeholder=""  value="<?php echo $linha['matricula'] ?>" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="turma">Turma</label>
  <div class="col-md-4">
    <select id="turma" name="turma" class="form-control">
      <?php
  include 'php/Conexao.php';
  $stmt = $conexao->prepare("SELECT * FROM turma ");
  $stmt->execute();
  
    $resultado = $stmt->fetchAll();
    foreach($resultado as $linha){ 
    ?>
     <option value="<?php echo $linha['idturma']; ?>" <?php if($idturma ==$linha['idturma']){echo "selected";}?>><?php echo ($linha['nometurma']); ?> <?php echo ($linha['turnoturma']); ?>       
     </option>
   
<?php
}   
?>
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
		$stmt2 = $conexao->prepare("SELECT * FROM aluno_disciplina WHERE aluno_idaluno=? and disciplina_iddisciplina=?;");
		$stmt2 -> bindParam(1,$idaluno);
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

<button id="singlebutton" name="singlebutton"  style="margin-left:45%;"   class="btn btn-success">Alterar</button>
</fieldset>
</form>
	
<?php
}
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
} 

?>
		

</body>
</html> 
