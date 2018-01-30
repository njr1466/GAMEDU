<?php
/**
 * Class that operate on table 'patrocinador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class PatrocinadorMySqlDAO implements PatrocinadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PatrocinadorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM patrocinador WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM patrocinador';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM patrocinador ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param patrocinador primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM patrocinador WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PatrocinadorMySql patrocinador
 	 */
	public function insert($patrocinador){
		$sql = 'INSERT INTO patrocinador (imagem, datainicial, datafinal, acessos, qtd_acessos) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($patrocinador->imagem);
		$sqlQuery->set($patrocinador->datainicial);
		$sqlQuery->set($patrocinador->datafinal);
		$sqlQuery->setNumber($patrocinador->acessos);
		$sqlQuery->setNumber($patrocinador->qtdAcessos);

		$id = $this->executeInsert($sqlQuery);	
		$patrocinador->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PatrocinadorMySql patrocinador
 	 */
	public function update($patrocinador){
		$sql = 'UPDATE patrocinador SET imagem = ?, datainicial = ?, datafinal = ?, acessos = ?, qtd_acessos = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($patrocinador->imagem);
		$sqlQuery->set($patrocinador->datainicial);
		$sqlQuery->set($patrocinador->datafinal);
		$sqlQuery->setNumber($patrocinador->acessos);
		$sqlQuery->setNumber($patrocinador->qtdAcessos);

		$sqlQuery->setNumber($patrocinador->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM patrocinador';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM patrocinador WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatainicial($value){
		$sql = 'SELECT * FROM patrocinador WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatafinal($value){
		$sql = 'SELECT * FROM patrocinador WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAcessos($value){
		$sql = 'SELECT * FROM patrocinador WHERE acessos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdAcessos($value){
		$sql = 'SELECT * FROM patrocinador WHERE qtd_acessos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByImagem($value){
		$sql = 'DELETE FROM patrocinador WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatainicial($value){
		$sql = 'DELETE FROM patrocinador WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatafinal($value){
		$sql = 'DELETE FROM patrocinador WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAcessos($value){
		$sql = 'DELETE FROM patrocinador WHERE acessos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdAcessos($value){
		$sql = 'DELETE FROM patrocinador WHERE qtd_acessos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PatrocinadorMySql 
	 */
	protected function readRow($row){
		$patrocinador = new Patrocinador();
		
		$patrocinador->id = $row['id'];
		$patrocinador->imagem = $row['imagem'];
		$patrocinador->datainicial = $row['datainicial'];
		$patrocinador->datafinal = $row['datafinal'];
		$patrocinador->acessos = $row['acessos'];
		$patrocinador->qtdAcessos = $row['qtd_acessos'];

		return $patrocinador;
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
	 * @return PatrocinadorMySql 
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