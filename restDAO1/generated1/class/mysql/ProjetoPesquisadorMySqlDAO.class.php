<?php
/**
 * Class that operate on table 'projeto_pesquisador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class ProjetoPesquisadorMySqlDAO implements ProjetoPesquisadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProjetoPesquisadorMySql 
	 */
	public function load($pesquisadorSiape, $projetoId){
		$sql = 'SELECT * FROM projeto_pesquisador WHERE pesquisador_siape = ?  AND projeto_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pesquisadorSiape);
		$sqlQuery->setNumber($projetoId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM projeto_pesquisador';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM projeto_pesquisador ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param projetoPesquisador primary key
 	 */
	public function delete($pesquisadorSiape, $projetoId){
		$sql = 'DELETE FROM projeto_pesquisador WHERE pesquisador_siape = ?  AND projeto_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($pesquisadorSiape);
		$sqlQuery->setNumber($projetoId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProjetoPesquisadorMySql projetoPesquisador
 	 */
	public function insert($projetoPesquisador){
		$sql = 'INSERT INTO projeto_pesquisador (ehcoordenador, data_inscricao, ativo, data_saida, pesquisador_siape, projeto_id) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($projetoPesquisador->ehcoordenador);
		$sqlQuery->set($projetoPesquisador->dataInscricao);
		$sqlQuery->set($projetoPesquisador->ativo);
		$sqlQuery->set($projetoPesquisador->dataSaida);

		
		$sqlQuery->setNumber($projetoPesquisador->pesquisadorSiape);

		$sqlQuery->setNumber($projetoPesquisador->projetoId);

		$this->executeInsert($sqlQuery);	
		//$projetoPesquisador->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProjetoPesquisadorMySql projetoPesquisador
 	 */
	public function update($projetoPesquisador){
		$sql = 'UPDATE projeto_pesquisador SET ehcoordenador = ?, data_inscricao = ?, ativo = ?, data_saida = ? WHERE pesquisador_siape = ?  AND projeto_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($projetoPesquisador->ehcoordenador);
		$sqlQuery->set($projetoPesquisador->dataInscricao);
		$sqlQuery->set($projetoPesquisador->ativo);
		$sqlQuery->set($projetoPesquisador->dataSaida);

		
		$sqlQuery->setNumber($projetoPesquisador->pesquisadorSiape);

		$sqlQuery->setNumber($projetoPesquisador->projetoId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM projeto_pesquisador';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEhcoordenador($value){
		$sql = 'SELECT * FROM projeto_pesquisador WHERE ehcoordenador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInscricao($value){
		$sql = 'SELECT * FROM projeto_pesquisador WHERE data_inscricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM projeto_pesquisador WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataSaida($value){
		$sql = 'SELECT * FROM projeto_pesquisador WHERE data_saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEhcoordenador($value){
		$sql = 'DELETE FROM projeto_pesquisador WHERE ehcoordenador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInscricao($value){
		$sql = 'DELETE FROM projeto_pesquisador WHERE data_inscricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM projeto_pesquisador WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataSaida($value){
		$sql = 'DELETE FROM projeto_pesquisador WHERE data_saida = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProjetoPesquisadorMySql 
	 */
	protected function readRow($row){
		$projetoPesquisador = new ProjetoPesquisador();
		
		$projetoPesquisador->pesquisadorSiape = $row['pesquisador_siape'];
		$projetoPesquisador->projetoId = $row['projeto_id'];
		$projetoPesquisador->ehcoordenador = $row['ehcoordenador'];
		$projetoPesquisador->dataInscricao = $row['data_inscricao'];
		$projetoPesquisador->ativo = $row['ativo'];
		$projetoPesquisador->dataSaida = $row['data_saida'];

		return $projetoPesquisador;
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
	 * @return ProjetoPesquisadorMySql 
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