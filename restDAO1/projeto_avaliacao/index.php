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
                $projetoAvaliacao = DAOFactory::getProjetoAvaliacaoDAO()->load($id);
                echo json_encode($projetoAvaliacao);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $projetoAvaliacao = DAOFactory::getProjetoAvaliacaoDAO()->queryAll();
	        echo json_encode($projetoAvaliacao);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $projetoAvaliacao = DAOFactory::getProjetoAvaliacaoDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($projetoAvaliacao);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $projetoAvaliacao = DAOFactory::getProjetoAvaliacaoDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $projetoAvaliacao = json_decode($request->getBody());
                $projetoAvaliacao = DAOFactory::getProjetoAvaliacaoDAO()->insert($projetoAvaliacao);
                echo json_encode($projetoAvaliacao);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $projetoAvaliacao = json_decode($request->getBody());
                $projetoAvaliacao = DAOFactory::getProjetoAvaliacaoDAO()->update($projetoAvaliacao);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
