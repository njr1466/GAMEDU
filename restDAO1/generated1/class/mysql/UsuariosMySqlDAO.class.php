<?php
/**
 * Class that operate on table 'usuarios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class UsuariosMySqlDAO implements UsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuariosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM usuarios WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuariosMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuarios (nome, sobrenome, email, sexo, uf, cidade, bairro, telefone, id_facebook, senha, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nome);
		$sqlQuery->set($usuario->sobrenome);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->sexo);
		$sqlQuery->set($usuario->uf);
		$sqlQuery->set($usuario->cidade);
		$sqlQuery->set($usuario->bairro);
		$sqlQuery->set($usuario->telefone);
		$sqlQuery->set($usuario->idFacebook);
		$sqlQuery->set($usuario->senha);
		$sqlQuery->setNumber($usuario->ativo);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuariosMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuarios SET nome = ?, sobrenome = ?, email = ?, sexo = ?, uf = ?, cidade = ?, bairro = ?, telefone = ?, id_facebook = ?, senha = ?, ativo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->nome);
		$sqlQuery->set($usuario->sobrenome);
		$sqlQuery->set($usuario->email);
		$sqlQuery->set($usuario->sexo);
		$sqlQuery->set($usuario->uf);
		$sqlQuery->set($usuario->cidade);
		$sqlQuery->set($usuario->bairro);
		$sqlQuery->set($usuario->telefone);
		$sqlQuery->set($usuario->idFacebook);
		$sqlQuery->set($usuario->senha);
		$sqlQuery->setNumber($usuario->ativo);

		$sqlQuery->setNumber($usuario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM usuarios WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySobrenome($value){
		$sql = 'SELECT * FROM usuarios WHERE sobrenome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM usuarios WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexo($value){
		$sql = 'SELECT * FROM usuarios WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUf($value){
		$sql = 'SELECT * FROM usuarios WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCidade($value){
		$sql = 'SELECT * FROM usuarios WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBairro($value){
		$sql = 'SELECT * FROM usuarios WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM usuarios WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdFacebook($value){
		$sql = 'SELECT * FROM usuarios WHERE id_facebook = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM usuarios WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM usuarios WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM usuarios WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySobrenome($value){
		$sql = 'DELETE FROM usuarios WHERE sobrenome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM usuarios WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexo($value){
		$sql = 'DELETE FROM usuarios WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUf($value){
		$sql = 'DELETE FROM usuarios WHERE uf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCidade($value){
		$sql = 'DELETE FROM usuarios WHERE cidade = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBairro($value){
		$sql = 'DELETE FROM usuarios WHERE bairro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM usuarios WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFacebook($value){
		$sql = 'DELETE FROM usuarios WHERE id_facebook = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM usuarios WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM usuarios WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuariosMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->id = $row['id'];
		$usuario->nome = $row['nome'];
		$usuario->sobrenome = $row['sobrenome'];
		$usuario->email = $row['email'];
		$usuario->sexo = $row['sexo'];
		$usuario->uf = $row['uf'];
		$usuario->cidade = $row['cidade'];
		$usuario->bairro = $row['bairro'];
		$usuario->telefone = $row['telefone'];
		$usuario->idFacebook = $row['id_facebook'];
		$usuario->senha = $row['senha'];
		$usuario->ativo = $row['ativo'];

		return $usuario;
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
	 * @return UsuariosMySql 
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