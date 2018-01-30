<?php
/**
 * Class that operate on table 'plano_ativ_avaliacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class PlanoAtivAvaliacaoMySqlDAO implements PlanoAtivAvaliacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PlanoAtivAvaliacaoMySql 
	 */
	public function load($propostaBolsaId, $avaliadorId){
		$sql = 'SELECT * FROM plano_ativ_avaliacao WHERE proposta_bolsa_id = ?  AND avaliador_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($propostaBolsaId);
		$sqlQuery->setNumber($avaliadorId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM plano_ativ_avaliacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM plano_ativ_avaliacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param planoAtivAvaliacao primary key
 	 */
	public function delete($propostaBolsaId, $avaliadorId){
		$sql = 'DELETE FROM plano_ativ_avaliacao WHERE proposta_bolsa_id = ?  AND avaliador_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($propostaBolsaId);
		$sqlQuery->setNumber($avaliadorId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PlanoAtivAvaliacaoMySql planoAtivAvaliacao
 	 */
	public function insert($planoAtivAvaliacao){
		$sql = 'INSERT INTO plano_ativ_avaliacao (nota, comentario, data_envio_plano, data_avaliacao, proposta_bolsa_id, avaliador_id) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($planoAtivAvaliacao->nota);
		$sqlQuery->set($planoAtivAvaliacao->comentario);
		$sqlQuery->set($planoAtivAvaliacao->dataEnvioPlano);
		$sqlQuery->set($planoAtivAvaliacao->dataAvaliacao);

		
		$sqlQuery->setNumber($planoAtivAvaliacao->propostaBolsaId);

		$sqlQuery->setNumber($planoAtivAvaliacao->avaliadorId);

		$this->executeInsert($sqlQuery);	
		//$planoAtivAvaliacao->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PlanoAtivAvaliacaoMySql planoAtivAvaliacao
 	 */
	public function update($planoAtivAvaliacao){
		$sql = 'UPDATE plano_ativ_avaliacao SET nota = ?, comentario = ?, data_envio_plano = ?, data_avaliacao = ? WHERE proposta_bolsa_id = ?  AND avaliador_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($planoAtivAvaliacao->nota);
		$sqlQuery->set($planoAtivAvaliacao->comentario);
		$sqlQuery->set($planoAtivAvaliacao->dataEnvioPlano);
		$sqlQuery->set($planoAtivAvaliacao->dataAvaliacao);

		
		$sqlQuery->setNumber($planoAtivAvaliacao->propostaBolsaId);

		$sqlQuery->setNumber($planoAtivAvaliacao->avaliadorId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM plano_ativ_avaliacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNota($value){
		$sql = 'SELECT * FROM plano_ativ_avaliacao WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComentario($value){
		$sql = 'SELECT * FROM plano_ativ_avaliacao WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataEnvioPlano($value){
		$sql = 'SELECT * FROM plano_ativ_avaliacao WHERE data_envio_plano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAvaliacao($value){
		$sql = 'SELECT * FROM plano_ativ_avaliacao WHERE data_avaliacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNota($value){
		$sql = 'DELETE FROM plano_ativ_avaliacao WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComentario($value){
		$sql = 'DELETE FROM plano_ativ_avaliacao WHERE comentario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataEnvioPlano($value){
		$sql = 'DELETE FROM plano_ativ_avaliacao WHERE data_envio_plano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAvaliacao($value){
		$sql = 'DELETE FROM plano_ativ_avaliacao WHERE data_avaliacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PlanoAtivAvaliacaoMySql 
	 */
	protected function readRow($row){
		$planoAtivAvaliacao = new PlanoAtivAvaliacao();
		
		$planoAtivAvaliacao->propostaBolsaId = $row['proposta_bolsa_id'];
		$planoAtivAvaliacao->avaliadorId = $row['avaliador_id'];
		$planoAtivAvaliacao->nota = $row['nota'];
		$planoAtivAvaliacao->comentario = $row['comentario'];
		$planoAtivAvaliacao->dataEnvioPlano = $row['data_envio_plano'];
		$planoAtivAvaliacao->dataAvaliacao = $row['data_avaliacao'];

		return $planoAtivAvaliacao;
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
	 * @return PlanoAtivAvaliacaoMySql 
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