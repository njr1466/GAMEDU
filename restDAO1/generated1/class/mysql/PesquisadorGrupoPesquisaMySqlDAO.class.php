<?php
/**
 * Class that operate on table 'pesquisador_grupo_pesquisa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class PesquisadorGrupoPesquisaMySqlDAO implements PesquisadorGrupoPesquisaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PesquisadorGrupoPesquisaMySql 
	 */
	public function load($pesquisadorSiape, $grupoPesquisaId){
		$sql = 'SELECT * FROM pesquisador_grupo_pesquisa WHERE pesquisador_siape = ?  AND grupo_pesquisa_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pesquisadorSiape);
		$sqlQuery->setNumber($grupoPesquisaId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pesquisador_grupo_pesquisa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pesquisador_grupo_pesquisa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pesquisadorGrupoPesquisa primary key
 	 */
	public function delete($pesquisadorSiape, $grupoPesquisaId){
		$sql = 'DELETE FROM pesquisador_grupo_pesquisa WHERE pesquisador_siape = ?  AND grupo_pesquisa_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pesquisadorSiape);
		$sqlQuery->setNumber($grupoPesquisaId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PesquisadorGrupoPesquisaMySql pesquisadorGrupoPesquisa
 	 */
	public function insert($pesquisadorGrupoPesquisa){
		$sql = 'INSERT INTO pesquisador_grupo_pesquisa (confirmado, pesquisador_siape, grupo_pesquisa_id) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pesquisadorGrupoPesquisa->confirmado);

		
		$sqlQuery->setNumber($pesquisadorGrupoPesquisa->pesquisadorSiape);

		$sqlQuery->setNumber($pesquisadorGrupoPesquisa->grupoPesquisaId);

		$this->executeInsert($sqlQuery);	
		//$pesquisadorGrupoPesquisa->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PesquisadorGrupoPesquisaMySql pesquisadorGrupoPesquisa
 	 */
	public function update($pesquisadorGrupoPesquisa){
		$sql = 'UPDATE pesquisador_grupo_pesquisa SET confirmado = ? WHERE pesquisador_siape = ?  AND grupo_pesquisa_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pesquisadorGrupoPesquisa->confirmado);

		
		$sqlQuery->setNumber($pesquisadorGrupoPesquisa->pesquisadorSiape);

		$sqlQuery->setNumber($pesquisadorGrupoPesquisa->grupoPesquisaId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pesquisador_grupo_pesquisa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByConfirmado($value){
		$sql = 'SELECT * FROM pesquisador_grupo_pesquisa WHERE confirmado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByConfirmado($value){
		$sql = 'DELETE FROM pesquisador_grupo_pesquisa WHERE confirmado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PesquisadorGrupoPesquisaMySql 
	 */
	protected function readRow($row){
		$pesquisadorGrupoPesquisa = new PesquisadorGrupoPesquisa();
		
		$pesquisadorGrupoPesquisa->pesquisadorSiape = $row['pesquisador_siape'];
		$pesquisadorGrupoPesquisa->grupoPesquisaId = $row['grupo_pesquisa_id'];
		$pesquisadorGrupoPesquisa->confirmado = $row['confirmado'];

		return $pesquisadorGrupoPesquisa;
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
	 * @return PesquisadorGrupoPesquisaMySql 
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