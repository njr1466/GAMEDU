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
                $propostaBolsa = DAOFactory::getPropostaBolsaDAO()->load($id);
                echo json_encode($propostaBolsa);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $propostaBolsa = DAOFactory::getPropostaBolsaDAO()->queryAll();
	        echo json_encode($propostaBolsa);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $propostaBolsa = DAOFactory::getPropostaBolsaDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($propostaBolsa);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $propostaBolsa = DAOFactory::getPropostaBolsaDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $propostaBolsa = json_decode($request->getBody());
                $propostaBolsa = DAOFactory::getPropostaBolsaDAO()->insert($propostaBolsa);
                echo json_encode($propostaBolsa);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $propostaBolsa = json_decode($request->getBody());
                $propostaBolsa = DAOFactory::getPropostaBolsaDAO()->update($propostaBolsa);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
