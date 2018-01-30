<?php
/**
 * Class that operate on table 'avaliador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class AvaliadorMySqlDAO implements AvaliadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AvaliadorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM avaliador WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM avaliador';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM avaliador ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param avaliador primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM avaliador WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AvaliadorMySql avaliador
 	 */
	public function insert($avaliador){
		$sql = 'INSERT INTO avaliador (cpf, nome, email, titulacao, tipo, area_codigo, data_cadastro, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($avaliador->cpf);
		$sqlQuery->set($avaliador->nome);
		$sqlQuery->set($avaliador->email);
		$sqlQuery->set($avaliador->titulacao);
		$sqlQuery->set($avaliador->tipo);
		$sqlQuery->set($avaliador->areaCodigo);
		$sqlQuery->set($avaliador->dataCadastro);
		$sqlQuery->set($avaliador->ativo);

		$id = $this->executeInsert($sqlQuery);	
		$avaliador->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AvaliadorMySql avaliador
 	 */
	public function update($avaliador){
		$sql = 'UPDATE avaliador SET cpf = ?, nome = ?, email = ?, titulacao = ?, tipo = ?, area_codigo = ?, data_cadastro = ?, ativo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($avaliador->cpf);
		$sqlQuery->set($avaliador->nome);
		$sqlQuery->set($avaliador->email);
		$sqlQuery->set($avaliador->titulacao);
		$sqlQuery->set($avaliador->tipo);
		$sqlQuery->set($avaliador->areaCodigo);
		$sqlQuery->set($avaliador->dataCadastro);
		$sqlQuery->set($avaliador->ativo);

		$sqlQuery->setNumber($avaliador->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM avaliador';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM avaliador WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM avaliador WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM avaliador WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulacao($value){
		$sql = 'SELECT * FROM avaliador WHERE titulacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipo($value){
		$sql = 'SELECT * FROM avaliador WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAreaCodigo($value){
		$sql = 'SELECT * FROM avaliador WHERE area_codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCadastro($value){
		$sql = 'SELECT * FROM avaliador WHERE data_cadastro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM avaliador WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCpf($value){
		$sql = 'DELETE FROM avaliador WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM avaliador WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM avaliador WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulacao($value){
		$sql = 'DELETE FROM avaliador WHERE titulacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipo($value){
		$sql = 'DELETE FROM avaliador WHERE tipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAreaCodigo($value){
		$sql = 'DELETE FROM avaliador WHERE area_codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCadastro($value){
		$sql = 'DELETE FROM avaliador WHERE data_cadastro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM avaliador WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AvaliadorMySql 
	 */
	protected function readRow($row){
		$avaliador = new Avaliador();
		
		$avaliador->id = $row['id'];
		$avaliador->cpf = $row['cpf'];
		$avaliador->nome = $row['nome'];
		$avaliador->email = $row['email'];
		$avaliador->titulacao = $row['titulacao'];
		$avaliador->tipo = $row['tipo'];
		$avaliador->areaCodigo = $row['area_codigo'];
		$avaliador->dataCadastro = $row['data_cadastro'];
		$avaliador->ativo = $row['ativo'];

		return $avaliador;
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
	 * @return AvaliadorMySql 
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