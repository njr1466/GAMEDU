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
                $grupoPesquisa = DAOFactory::getGrupoPesquisaDAO()->load($id);
                echo json_encode($grupoPesquisa);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $grupoPesquisa = DAOFactory::getGrupoPesquisaDAO()->queryAll();
	        echo json_encode($grupoPesquisa);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $grupoPesquisa = DAOFactory::getGrupoPesquisaDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($grupoPesquisa);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $grupoPesquisa = DAOFactory::getGrupoPesquisaDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $grupoPesquisa = json_decode($request->getBody());
                $grupoPesquisa = DAOFactory::getGrupoPesquisaDAO()->insert($grupoPesquisa);
                echo json_encode($grupoPesquisa);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $grupoPesquisa = json_decode($request->getBody());
                $grupoPesquisa = DAOFactory::getGrupoPesquisaDAO()->update($grupoPesquisa);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
