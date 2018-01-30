<?php
/**
 * Class that operate on table 'area'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class AreaMySqlDAO implements AreaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AreaMySql 
	 */
	public function load($codigo, $grandeareaCodigo){
		$sql = 'SELECT * FROM area WHERE codigo = ?  AND grandearea_codigo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigo);
		$sqlQuery->setNumber($grandeareaCodigo);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM area';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM area ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param area primary key
 	 */
	public function delete($codigo, $grandeareaCodigo){
		$sql = 'DELETE FROM area WHERE codigo = ?  AND grandearea_codigo = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($codigo);
		$sqlQuery->setNumber($grandeareaCodigo);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AreaMySql area
 	 */
	public function insert($area){
		$sql = 'INSERT INTO area (nome, codigo, grandearea_codigo) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($area->nome);

		
		$sqlQuery->setNumber($area->codigo);

		$sqlQuery->setNumber($area->grandeareaCodigo);

		$this->executeInsert($sqlQuery);	
		//$area->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AreaMySql area
 	 */
	public function update($area){
		$sql = 'UPDATE area SET nome = ? WHERE codigo = ?  AND grandearea_codigo = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($area->nome);

		
		$sqlQuery->setNumber($area->codigo);

		$sqlQuery->setNumber($area->grandeareaCodigo);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM area';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM area WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM area WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AreaMySql 
	 */
	protected function readRow($row){
		$area = new Area();
		
		$area->codigo = $row['codigo'];
		$area->nome = $row['nome'];
		$area->grandeareaCodigo = $row['grandearea_codigo'];

		return $area;
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
	 * @return AreaMySql 
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