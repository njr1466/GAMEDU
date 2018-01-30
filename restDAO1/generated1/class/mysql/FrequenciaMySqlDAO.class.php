<?php
/**
 * Class that operate on table 'frequencia'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class FrequenciaMySqlDAO implements FrequenciaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return FrequenciaMySql 
	 */
	public function load($id, $propostaBolsaId){
		$sql = 'SELECT * FROM frequencia WHERE id = ?  AND proposta_bolsa_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($propostaBolsaId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM frequencia';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM frequencia ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param frequencia primary key
 	 */
	public function delete($id, $propostaBolsaId){
		$sql = 'DELETE FROM frequencia WHERE id = ?  AND proposta_bolsa_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($propostaBolsaId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FrequenciaMySql frequencia
 	 */
	public function insert($frequencia){
		$sql = 'INSERT INTO frequencia (mes, ano, pendente, id, proposta_bolsa_id) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($frequencia->mes);
		$sqlQuery->setNumber($frequencia->ano);
		$sqlQuery->set($frequencia->pendente);

		
		$sqlQuery->setNumber($frequencia->id);

		$sqlQuery->setNumber($frequencia->propostaBolsaId);

		$this->executeInsert($sqlQuery);	
		//$frequencia->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param FrequenciaMySql frequencia
 	 */
	public function update($frequencia){
		$sql = 'UPDATE frequencia SET mes = ?, ano = ?, pendente = ? WHERE id = ?  AND proposta_bolsa_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($frequencia->mes);
		$sqlQuery->setNumber($frequencia->ano);
		$sqlQuery->set($frequencia->pendente);

		
		$sqlQuery->setNumber($frequencia->id);

		$sqlQuery->setNumber($frequencia->propostaBolsaId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM frequencia';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMes($value){
		$sql = 'SELECT * FROM frequencia WHERE mes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAno($value){
		$sql = 'SELECT * FROM frequencia WHERE ano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPendente($value){
		$sql = 'SELECT * FROM frequencia WHERE pendente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMes($value){
		$sql = 'DELETE FROM frequencia WHERE mes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAno($value){
		$sql = 'DELETE FROM frequencia WHERE ano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPendente($value){
		$sql = 'DELETE FROM frequencia WHERE pendente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return FrequenciaMySql 
	 */
	protected function readRow($row){
		$frequencia = new Frequencia();
		
		$frequencia->id = $row['id'];
		$frequencia->mes = $row['mes'];
		$frequencia->ano = $row['ano'];
		$frequencia->propostaBolsaId = $row['proposta_bolsa_id'];
		$frequencia->pendente = $row['pendente'];

		return $frequencia;
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
	 * @return FrequenciaMySql 
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