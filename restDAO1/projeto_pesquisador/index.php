<?php

include '../generated/include_dao.php';
include '../autenticacao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/load/:id','load');
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
                $projetoPesquisador = DAOFactory::getProjetoPesquisadorDAO()->load($id);
                echo json_encode($projetoPesquisador);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $projetoPesquisador = DAOFactory::getProjetoPesquisadorDAO()->queryAll();
	        echo json_encode($projetoPesquisador);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $projetoPesquisador = DAOFactory::getProjetoPesquisadorDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($projetoPesquisador);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $projetoPesquisador = DAOFactory::getProjetoPesquisadorDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $projetoPesquisador = json_decode($request->getBody());
                $projetoPesquisador = DAOFactory::getProjetoPesquisadorDAO()->insert($projetoPesquisador);
                echo json_encode($projetoPesquisador);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $projetoPesquisador = json_decode($request->getBody());
                $projetoPesquisador = DAOFactory::getProjetoPesquisadorDAO()->update($projetoPesquisador);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
