<?php
/**
 * Class that operate on table 'empresas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class EmpresasMySqlDAO implements EmpresasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EmpresasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM empresas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM empresas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM empresas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param empresa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM empresas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EmpresasMySql empresa
 	 */
	public function insert($empresa){
		$sql = 'INSERT INTO empresas (empresa, cnpj, inscricao, endereco, bairro, cidade, cep, uf, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($empresa->empresa);
		$sqlQuery->set($empresa->cnpj);
		$sqlQuery->set($empresa->inscricao);
		$sqlQuery->set($empresa->endereco);
		$sqlQuery->set($empresa->bairro);
		$sqlQuery->setNumber($empresa->cidade);
		$sqlQuery->set($empresa->cep);
		$sqlQuery->set($empresa->uf);
		$sqlQuery->set($empresa->email);
		$sqlQuery->set($empresa->senha);

		$id = $this->executeInsert($sqlQuery);	
		$empresa->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EmpresasMySql empresa
 	 */
	public function update($empresa){
		$sql = 'UPDATE empresas SET empresa = ?, cnpj = ?, inscricao = ?, endereco = ?, bairro = ?, cidade = ?, cep = ?, uf = ?, email = ?, senha = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($empresa->empresa);
		$sqlQuery->set($empresa->cnpj);
		$sqlQuery->set($empresa->inscricao);
		$sqlQuery->set($empresa->endereco);
		$sqlQuery->set($empresa->bairro);
		$sqlQuery->setNumber($empresa->cidade);
		$sqlQuery->set($empresa->cep);
		$sqlQuery->set($empresa->uf);
		$sqlQuery->set($empresa->email);
		$sqlQuery->set($empresa->senha);

		$sqlQuery->setNumber($empresa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM empresas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByEmpresa($value){
		$sql = 'SELECT * FROM empresas WHERE empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCnpj($value){
		$sql = 'SELECT * FROM empresas WHERE cnpj = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInscricao($value){
		$sql = 'SELECT * FROM empresas WHERE inscricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEndereco($value){
		$sql = 'SELECT * FROM empresas WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM empresas WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM empresas WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCep($value){
		$sql = 'SELECT * FROM empresas WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUf($value){
		$sql = 'SELECT * FROM empresas WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM empresas WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM empresas WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByEmpresa($value){
		$sql = 'DELETE FROM empresas WHERE empresa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCnpj($value){
		$sql = 'DELETE FROM empresas WHERE cnpj = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInscricao($value){
		$sql = 'DELETE FROM empresas WHERE inscricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEndereco($value){
		$sql = 'DELETE FROM empresas WHERE endereco = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM empresas WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM empresas WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCep($value){
		$sql = 'DELETE FROM empresas WHERE cep = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUf($value){
		$sql = 'DELETE FROM empresas WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM empresas WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM empresas WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EmpresasMySql 
	 */
	protected function readRow($row){
		$empresa = new Empresa();
		
		$empresa->id = $row['id'];
		$empresa->empresa = $row['empresa'];
		$empresa->cnpj = $row['cnpj'];
		$empresa->inscricao = $row['inscricao'];
		$empresa->endereco = $row['endereco'];
		$empresa->bairro = $row['bairro'];
		$empresa->cidade = $row['cidade'];
		$empresa->cep = $row['cep'];
		$empresa->uf = $row['uf'];
		$empresa->email = $row['email'];
		$empresa->senha = $row['senha'];

		return $empresa;
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
	 * @return EmpresasMySql 
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