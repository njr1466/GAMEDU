<?php
/**
 * Class that operate on table 'bairros'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class BairrosMySqlDAO implements BairrosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BairrosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bairros WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bairros';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bairros ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bairro primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM bairros WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BairrosMySql bairro
 	 */
	public function insert($bairro){
		$sql = 'INSERT INTO bairros (id_cidade, bairro) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($bairro->idCidade);
		$sqlQuery->set($bairro->bairro);

		$id = $this->executeInsert($sqlQuery);	
		$bairro->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BairrosMySql bairro
 	 */
	public function update($bairro){
		$sql = 'UPDATE bairros SET id_cidade = ?, bairro = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($bairro->idCidade);
		$sqlQuery->set($bairro->bairro);

		$sqlQuery->setNumber($bairro->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bairros';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCidade($value){
		$sql = 'SELECT * FROM bairros WHERE id_cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM bairros WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCidade($value){
		$sql = 'DELETE FROM bairros WHERE id_cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM bairros WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BairrosMySql 
	 */
	protected function readRow($row){
		$bairro = new Bairro();
		
		$bairro->id = $row['id'];
		$bairro->idCidade = $row['id_cidade'];
		$bairro->bairro = $row['bairro'];

		return $bairro;
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
	 * @return BairrosMySql 
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