	<?php include 'php/VerificarSession.php';
    echo $_SESSION['tipousuario'];?>

    <div class="sidebar-wrapper">
            <div class="logo">
                <center><img src="assets/img/ifpec.png" style="height:100px;width:100px"></center>
            </div>
            

            <ul class="nav">
               <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
            </li> 
            <?php if( $_SESSION['tipousuario']==3){?>
                <li>
                    <a href="registrarusuario.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Registrar Usuário</p>
                    </a>
                </li>
                
				<li>
                    <a href="registrarturmas.php">
                        <i class="pe-7s-study"></i>
                        <p>Registrar Turmas</p>
                    </a>
                </li>
                <li>
                    <a href="registrardisciplinas.php">
                        <i class="pe-7s-id"></i>
                        <p>Registrar Disciplinas</p>
                    </a>
                </li>
                <li>
                    <a href="registrardisciplina_professor.php">
                        <i class="pe-7s-wallet"></i>
                        <p>Disciplina/Professor</p>
                    </a>
                </li>
<?php }?>
                <li>
                    <a href="registraralunos.php">
                        <i class="pe-7s-users"></i>
                        <p>Registrar Alunos</p>
                    </a>
                </li>

                <li>
                    <a href="consultarRanking.php">
                        <i class="pe-7s-graph1"></i>
                        <p>Ranking de Pontuação</p>
                    </a>
                </li>

                

  
				
                <li>
                    <a href="registraratividades.php">
                        <i class="pe-7s-note2"></i>
                        <p>Registrar Atividades</p>
                    </a>
                </li>
              
                <li>
                    <a href="feedback.php">
                        <i class="pe-7s-mail-open-file"></i>
                        <p>Enviar Feedback</p>
                    </a>
                </li>
               
                <li>
                    <a href="notificacoes.php">
                        <i class="pe-7s-mail"></i>
                        <p>Enviar Notificação</p>
                    </a>
                </li>
                <li>
                    <a href="minhasnotificacoes.php">
                        <i class="pe-7s-phone"></i>
                        <p>Minhas Notificações</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>
