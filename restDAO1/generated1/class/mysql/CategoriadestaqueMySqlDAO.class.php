<?php
/**
 * Class that operate on table 'categoriadestaque'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class CategoriadestaqueMySqlDAO implements CategoriadestaqueDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategoriadestaqueMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categoriadestaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categoriadestaque';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categoriadestaque ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categoriadestaque primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM categoriadestaque WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategoriadestaqueMySql categoriadestaque
 	 */
	public function insert($categoriadestaque){
		$sql = 'INSERT INTO categoriadestaque (texto, imagem, link, ativo) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categoriadestaque->texto);
		$sqlQuery->set($categoriadestaque->imagem);
		$sqlQuery->set($categoriadestaque->link);
		$sqlQuery->setNumber($categoriadestaque->ativo);

		$id = $this->executeInsert($sqlQuery);	
		$categoriadestaque->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategoriadestaqueMySql categoriadestaque
 	 */
	public function update($categoriadestaque){
		$sql = 'UPDATE categoriadestaque SET texto = ?, imagem = ?, link = ?, ativo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categoriadestaque->texto);
		$sqlQuery->set($categoriadestaque->imagem);
		$sqlQuery->set($categoriadestaque->link);
		$sqlQuery->setNumber($categoriadestaque->ativo);

		$sqlQuery->setNumber($categoriadestaque->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categoriadestaque';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTexto($value){
		$sql = 'SELECT * FROM categoriadestaque WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM categoriadestaque WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM categoriadestaque WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM categoriadestaque WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTexto($value){
		$sql = 'DELETE FROM categoriadestaque WHERE texto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagem($value){
		$sql = 'DELETE FROM categoriadestaque WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM categoriadestaque WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM categoriadestaque WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategoriadestaqueMySql 
	 */
	protected function readRow($row){
		$categoriadestaque = new Categoriadestaque();
		
		$categoriadestaque->id = $row['id'];
		$categoriadestaque->texto = $row['texto'];
		$categoriadestaque->imagem = $row['imagem'];
		$categoriadestaque->link = $row['link'];
		$categoriadestaque->ativo = $row['ativo'];

		return $categoriadestaque;
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
	 * @return CategoriadestaqueMySql 
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