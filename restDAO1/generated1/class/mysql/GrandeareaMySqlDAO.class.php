<?php
/**
 * Class that operate on table 'grandearea'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class GrandeareaMySqlDAO implements GrandeareaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GrandeareaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM grandearea WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM grandearea';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM grandearea ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param grandearea primary key
 	 */
	public function delete($codigo){
		$sql = 'DELETE FROM grandearea WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($codigo);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GrandeareaMySql grandearea
 	 */
	public function insert($grandearea){
		$sql = 'INSERT INTO grandearea (nome) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($grandearea->nome);

		$id = $this->executeInsert($sqlQuery);	
		$grandearea->codigo = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GrandeareaMySql grandearea
 	 */
	public function update($grandearea){
		$sql = 'UPDATE grandearea SET nome = ? WHERE codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($grandearea->nome);

		$sqlQuery->set($grandearea->codigo);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM grandearea';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM grandearea WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM grandearea WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GrandeareaMySql 
	 */
	protected function readRow($row){
		$grandearea = new Grandearea();
		
		$grandearea->codigo = $row['codigo'];
		$grandearea->nome = $row['nome'];

		return $grandearea;
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
	 * @return GrandeareaMySql 
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