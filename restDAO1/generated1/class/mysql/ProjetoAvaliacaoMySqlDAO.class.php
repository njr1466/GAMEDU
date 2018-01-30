<?php
/**
 * Class that operate on table 'projeto_avaliacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class ProjetoAvaliacaoMySqlDAO implements ProjetoAvaliacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProjetoAvaliacaoMySql 
	 */
	public function load($projetoId, $avaliadorId){
		$sql = 'SELECT * FROM projeto_avaliacao WHERE projeto_id = ?  AND avaliador_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($projetoId);
		$sqlQuery->setNumber($avaliadorId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM projeto_avaliacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM projeto_avaliacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param projetoAvaliacao primary key
 	 */
	public function delete($projetoId, $avaliadorId){
		$sql = 'DELETE FROM projeto_avaliacao WHERE projeto_id = ?  AND avaliador_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($projetoId);
		$sqlQuery->setNumber($avaliadorId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProjetoAvaliacaoMySql projetoAvaliacao
 	 */
	public function insert($projetoAvaliacao){
		$sql = 'INSERT INTO projeto_avaliacao (nota, comentario, data_envio_projeto, data_avaliacao, projeto_id, avaliador_id) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($projetoAvaliacao->nota);
		$sqlQuery->set($projetoAvaliacao->comentario);
		$sqlQuery->set($projetoAvaliacao->dataEnvioProjeto);
		$sqlQuery->set($projetoAvaliacao->dataAvaliacao);

		
		$sqlQuery->setNumber($projetoAvaliacao->projetoId);

		$sqlQuery->setNumber($projetoAvaliacao->avaliadorId);

		$this->executeInsert($sqlQuery);	
		//$projetoAvaliacao->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProjetoAvaliacaoMySql projetoAvaliacao
 	 */
	public function update($projetoAvaliacao){
		$sql = 'UPDATE projeto_avaliacao SET nota = ?, comentario = ?, data_envio_projeto = ?, data_avaliacao = ? WHERE projeto_id = ?  AND avaliador_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($projetoAvaliacao->nota);
		$sqlQuery->set($projetoAvaliacao->comentario);
		$sqlQuery->set($projetoAvaliacao->dataEnvioProjeto);
		$sqlQuery->set($projetoAvaliacao->dataAvaliacao);

		
		$sqlQuery->setNumber($projetoAvaliacao->projetoId);

		$sqlQuery->setNumber($projetoAvaliacao->avaliadorId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM projeto_avaliacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNota($value){
		$sql = 'SELECT * FROM projeto_avaliacao WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComentario($value){
		$sql = 'SELECT * FROM projeto_avaliacao WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEnvioProjeto($value){
		$sql = 'SELECT * FROM projeto_avaliacao WHERE data_envio_projeto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAvaliacao($value){
		$sql = 'SELECT * FROM projeto_avaliacao WHERE data_avaliacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNota($value){
		$sql = 'DELETE FROM projeto_avaliacao WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComentario($value){
		$sql = 'DELETE FROM projeto_avaliacao WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEnvioProjeto($value){
		$sql = 'DELETE FROM projeto_avaliacao WHERE data_envio_projeto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAvaliacao($value){
		$sql = 'DELETE FROM projeto_avaliacao WHERE data_avaliacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProjetoAvaliacaoMySql 
	 */
	protected function readRow($row){
		$projetoAvaliacao = new ProjetoAvaliacao();
		
		$projetoAvaliacao->projetoId = $row['projeto_id'];
		$projetoAvaliacao->avaliadorId = $row['avaliador_id'];
		$projetoAvaliacao->nota = $row['nota'];
		$projetoAvaliacao->comentario = $row['comentario'];
		$projetoAvaliacao->dataEnvioProjeto = $row['data_envio_projeto'];
		$projetoAvaliacao->dataAvaliacao = $row['data_avaliacao'];

		return $projetoAvaliacao;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ProjetoAvaliacaoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>