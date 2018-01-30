<?php
/**
 * Class that operate on table 'grupo_pesquisa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class GrupoPesquisaMySqlDAO implements GrupoPesquisaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return GrupoPesquisaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM grupo_pesquisa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM grupo_pesquisa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM grupo_pesquisa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param grupoPesquisa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM grupo_pesquisa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GrupoPesquisaMySql grupoPesquisa
 	 */
	public function insert($grupoPesquisa){
		$sql = 'INSERT INTO grupo_pesquisa (nome, link) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($grupoPesquisa->nome);
		$sqlQuery->set($grupoPesquisa->link);

		$id = $this->executeInsert($sqlQuery);	
		$grupoPesquisa->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param GrupoPesquisaMySql grupoPesquisa
 	 */
	public function update($grupoPesquisa){
		$sql = 'UPDATE grupo_pesquisa SET nome = ?, link = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($grupoPesquisa->nome);
		$sqlQuery->set($grupoPesquisa->link);

		$sqlQuery->setNumber($grupoPesquisa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM grupo_pesquisa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM grupo_pesquisa WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM grupo_pesquisa WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM grupo_pesquisa WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM grupo_pesquisa WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return GrupoPesquisaMySql 
	 */
	protected function readRow($row){
		$grupoPesquisa = new GrupoPesquisa();
		
		$grupoPesquisa->id = $row['id'];
		$grupoPesquisa->nome = $row['nome'];
		$grupoPesquisa->link = $row['link'];

		return $grupoPesquisa;
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
	 * @return GrupoPesquisaMySql 
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