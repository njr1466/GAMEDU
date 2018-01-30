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
                $planoAtivAvaliacao = DAOFactory::getPlanoAtivAvaliacaoDAO()->load($id);
                echo json_encode($planoAtivAvaliacao);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $planoAtivAvaliacao = DAOFactory::getPlanoAtivAvaliacaoDAO()->queryAll();
	        echo json_encode($planoAtivAvaliacao);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $planoAtivAvaliacao = DAOFactory::getPlanoAtivAvaliacaoDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($planoAtivAvaliacao);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $planoAtivAvaliacao = DAOFactory::getPlanoAtivAvaliacaoDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $planoAtivAvaliacao = json_decode($request->getBody());
                $planoAtivAvaliacao = DAOFactory::getPlanoAtivAvaliacaoDAO()->insert($planoAtivAvaliacao);
                echo json_encode($planoAtivAvaliacao);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $planoAtivAvaliacao = json_decode($request->getBody());
                $planoAtivAvaliacao = DAOFactory::getPlanoAtivAvaliacaoDAO()->update($planoAtivAvaliacao);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
