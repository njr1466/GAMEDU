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
                $pesquisador = DAOFactory::getPesquisadorDAO()->load($id);
                echo json_encode($pesquisador);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $pesquisador = DAOFactory::getPesquisadorDAO()->queryAll();
	        echo json_encode($pesquisador);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $pesquisador = DAOFactory::getPesquisadorDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($pesquisador);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $pesquisador = DAOFactory::getPesquisadorDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $pesquisador = json_decode($request->getBody());
                $pesquisador = DAOFactory::getPesquisadorDAO()->insert($pesquisador);
                echo json_encode($pesquisador);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $pesquisador = json_decode($request->getBody());
                $pesquisador = DAOFactory::getPesquisadorDAO()->update($pesquisador);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
