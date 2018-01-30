<?php
/**
 * Class that operate on table 'bannercentral'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-11 14:45
 */
class BannercentralMySqlDAO implements BannercentralDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BannercentralMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bannercentral WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bannercentral';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bannercentral ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bannercentral primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM bannercentral WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BannercentralMySql bannercentral
 	 */
	public function insert($bannercentral){
		$sql = 'INSERT INTO bannercentral (imagem, link, datacriacao, datainicial, datafinal) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannercentral->imagem);
		$sqlQuery->set($bannercentral->link);
		$sqlQuery->set($bannercentral->datacriacao);
		$sqlQuery->set($bannercentral->datainicial);
		$sqlQuery->set($bannercentral->datafinal);

		$id = $this->executeInsert($sqlQuery);	
		$bannercentral->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BannercentralMySql bannercentral
 	 */
	public function update($bannercentral){
		$sql = 'UPDATE bannercentral SET imagem = ?, link = ?, datacriacao = ?, datainicial = ?, datafinal = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannercentral->imagem);
		$sqlQuery->set($bannercentral->link);
		$sqlQuery->set($bannercentral->datacriacao);
		$sqlQuery->set($bannercentral->datainicial);
		$sqlQuery->set($bannercentral->datafinal);

		$sqlQuery->setNumber($bannercentral->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bannercentral';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM bannercentral WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM bannercentral WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatacriacao($value){
		$sql = 'SELECT * FROM bannercentral WHERE datacriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatainicial($value){
		$sql = 'SELECT * FROM bannercentral WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatafinal($value){
		$sql = 'SELECT * FROM bannercentral WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByImagem($value){
		$sql = 'DELETE FROM bannercentral WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM bannercentral WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatacriacao($value){
		$sql = 'DELETE FROM bannercentral WHERE datacriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatainicial($value){
		$sql = 'DELETE FROM bannercentral WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatafinal($value){
		$sql = 'DELETE FROM bannercentral WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BannercentralMySql 
	 */
	protected function readRow($row){
		$bannercentral = new Bannercentral();
		
		$bannercentral->id = $row['id'];
		$bannercentral->imagem = $row['imagem'];
		$bannercentral->link = $row['link'];
		$bannercentral->datacriacao = $row['datacriacao'];
		$bannercentral->datainicial = $row['datainicial'];
		$bannercentral->datafinal = $row['datafinal'];

		return $bannercentral;
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
	 * @return BannercentralMySql 
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