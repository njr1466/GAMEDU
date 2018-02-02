<?php

include '../generated/include_dao.php';
include '../autenticacao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->response()->header('Access-Control-Allow-Origin: *'); 
$app->response()->header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS'); 
$app->response()->header('Access-Control-Allow-Headers: X-Requested-With, content-type, X-Token, x-token');


$app->get('/load/:id','load');
$app->get('/loadAlunoDisciplina/:id','loadAlunoDisciplina');
$app->get('/queryAll/','queryAll');
$app->get('/queryAllOrderBy/:orderColumn','queryAllOrderBy');
$app->post('/insert/','insert');
$app->post('/update/','update');
$app->delete('/delete/:id','delete');

$app->run();

	 /**
	 * LISTA OS DADOS DE ACORDO COM O ID INFORMADO
	 */
        function load($id){
		    
           if(!autenticacao::autenticar()){
                echo json_encode("error");
           }else{
                $aluno = DAOFactory::getAlunoDAO()->load($id);
                echo json_encode($aluno);
       
           }
	}

	/**
	 * LISTA OS ALUNOS DA DISCIPLINA REQUERIDA
	 */
        function loadAlunoDisciplina($id){
		    
           if(!autenticacao::autenticar()){
                echo json_encode("error");
           }else{
                $aluno = DAOFactory::getAlunoDAO()->loadAlunoDisciplina($id);
                echo json_encode($aluno);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    
            $aluno = DAOFactory::getAlunoDAO()->queryAll();
     
	       echo json_encode($aluno);
	  
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $aluno = DAOFactory::getAlunoDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($aluno);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $aluno = DAOFactory::getAlunoDAO()->delete($id);
	        echo utf8_encode("{'registro exclu�do com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $aluno = json_decode($request->getBody());
                $aluno = DAOFactory::getAlunoDAO()->insert($aluno);
                echo json_encode($aluno);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $aluno = json_decode($request->getBody());
                $aluno = DAOFactory::getAlunoDAO()->update($aluno);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
