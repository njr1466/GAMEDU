<?php
/**
 * Class that operate on table 'pesquisador'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-13 14:32
 */
class PesquisadorMySqlDAO implements PesquisadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PesquisadorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pesquisador WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pesquisador';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pesquisador ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pesquisador primary key
 	 */
	public function delete($siape){
		$sql = 'DELETE FROM pesquisador WHERE siape = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($siape);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PesquisadorMySql pesquisador
 	 */
	public function insert($pesquisador){
		$sql = 'INSERT INTO pesquisador (siape,cpf, nome, cargo, titulacao, sexo, regime, campus_id, departamento_id, telefone, celular, email1, email2, linklattes, area_codigo) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
                $sqlQuery->set($pesquisador->siape);
		$sqlQuery->set($pesquisador->cpf);
		$sqlQuery->set($pesquisador->nome);
		$sqlQuery->set($pesquisador->cargo);
		$sqlQuery->set($pesquisador->titulacao);
		$sqlQuery->set($pesquisador->sexo);
		$sqlQuery->set($pesquisador->regime);
		$sqlQuery->setNumber($pesquisador->campus_id);
		$sqlQuery->setNumber($pesquisador->departamento);
		$sqlQuery->set($pesquisador->telefone);
		$sqlQuery->set($pesquisador->celular);
		$sqlQuery->set($pesquisador->email1);
		$sqlQuery->set($pesquisador->email2);
		$sqlQuery->set($pesquisador->linklattes);
		$sqlQuery->set($pesquisador->areaCodigo);

		$id = $this->executeInsert($sqlQuery);	
		$pesquisador->siape = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PesquisadorMySql pesquisador
 	 */
	public function update($pesquisador){
		$sql = 'UPDATE pesquisador SET cpf = ?, nome = ?, cargo = ?, titulacao = ?, sexo = ?, regime = ?, campus_id = ?, departamento_id = ?, telefone = ?, celular = ?, email1 = ?, email2 = ?, linklattes = ?, area_codigo = ? WHERE siape = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pesquisador->cpf);
		$sqlQuery->set($pesquisador->nome);
		$sqlQuery->set($pesquisador->cargo);
		$sqlQuery->set($pesquisador->titulacao);
		$sqlQuery->set($pesquisador->sexo);
		$sqlQuery->set($pesquisador->regime);
		$sqlQuery->setNumber($pesquisador->campusId);
		$sqlQuery->setNumber($pesquisador->departamentoId);
		$sqlQuery->set($pesquisador->telefone);
		$sqlQuery->set($pesquisador->celular);
		$sqlQuery->set($pesquisador->email1);
		$sqlQuery->set($pesquisador->email2);
		$sqlQuery->set($pesquisador->linklattes);
		$sqlQuery->set($pesquisador->areaCodigo);

		$sqlQuery->set($pesquisador->siape);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pesquisador';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCpf($value){
		$sql = 'SELECT * FROM pesquisador WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM pesquisador WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCargo($value){
		$sql = 'SELECT * FROM pesquisador WHERE cargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulacao($value){
		$sql = 'SELECT * FROM pesquisador WHERE titulacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexo($value){
		$sql = 'SELECT * FROM pesquisador WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegime($value){
		$sql = 'SELECT * FROM pesquisador WHERE regime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCampusId($value){
		$sql = 'SELECT * FROM pesquisador WHERE campus_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDepartamentoId($value){
		$sql = 'SELECT * FROM pesquisador WHERE departamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM pesquisador WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM pesquisador WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail1($value){
		$sql = 'SELECT * FROM pesquisador WHERE email1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail2($value){
		$sql = 'SELECT * FROM pesquisador WHERE email2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinklattes($value){
		$sql = 'SELECT * FROM pesquisador WHERE linklattes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAreaCodigo($value){
		$sql = 'SELECT * FROM pesquisador WHERE area_codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCpf($value){
		$sql = 'DELETE FROM pesquisador WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM pesquisador WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCargo($value){
		$sql = 'DELETE FROM pesquisador WHERE cargo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulacao($value){
		$sql = 'DELETE FROM pesquisador WHERE titulacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexo($value){
		$sql = 'DELETE FROM pesquisador WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegime($value){
		$sql = 'DELETE FROM pesquisador WHERE regime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCampusId($value){
		$sql = 'DELETE FROM pesquisador WHERE campus_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDepartamentoId($value){
		$sql = 'DELETE FROM pesquisador WHERE departamento_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM pesquisador WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM pesquisador WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail1($value){
		$sql = 'DELETE FROM pesquisador WHERE email1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail2($value){
		$sql = 'DELETE FROM pesquisador WHERE email2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinklattes($value){
		$sql = 'DELETE FROM pesquisador WHERE linklattes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAreaCodigo($value){
		$sql = 'DELETE FROM pesquisador WHERE area_codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PesquisadorMySql 
	 */
	protected function readRow($row){
		$pesquisador = new Pesquisador();
		
		$pesquisador->siape = $row['siape'];
		$pesquisador->cpf = $row['cpf'];
		$pesquisador->nome = $row['nome'];
		$pesquisador->cargo = $row['cargo'];
		$pesquisador->titulacao = $row['titulacao'];
		$pesquisador->sexo = $row['sexo'];
		$pesquisador->regime = $row['regime'];
		$pesquisador->campusId = $row['campus_id'];
		$pesquisador->departamentoId = $row['departamento_id'];
		$pesquisador->telefone = $row['telefone'];
		$pesquisador->celular = $row['celular'];
		$pesquisador->email1 = $row['email1'];
		$pesquisador->email2 = $row['email2'];
		$pesquisador->linklattes = $row['linklattes'];
		$pesquisador->areaCodigo = $row['area_codigo'];

		return $pesquisador;
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
	 * @return PesquisadorMySql 
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