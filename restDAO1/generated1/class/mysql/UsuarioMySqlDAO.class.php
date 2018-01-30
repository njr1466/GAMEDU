<?php
/**
 * Class that operate on table 'usuario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
class UsuarioMySqlDAO implements UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuario WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($cpf){
		$sql = 'DELETE FROM usuario WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($cpf);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuario (perfil1, perfil2, perfil3, password, lastaccess, ativo, data_cadastro) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->perfil1);
		$sqlQuery->set($usuario->perfil2);
		$sqlQuery->set($usuario->perfil3);
		$sqlQuery->set($usuario->password);
		$sqlQuery->set($usuario->lastaccess);
		$sqlQuery->set($usuario->ativo);
		$sqlQuery->set($usuario->dataCadastro);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->cpf = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuario SET perfil1 = ?, perfil2 = ?, perfil3 = ?, password = ?, lastaccess = ?, ativo = ?, data_cadastro = ? WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->perfil1);
		$sqlQuery->set($usuario->perfil2);
		$sqlQuery->set($usuario->perfil3);
		$sqlQuery->set($usuario->password);
		$sqlQuery->set($usuario->lastaccess);
		$sqlQuery->set($usuario->ativo);
		$sqlQuery->set($usuario->dataCadastro);

		$sqlQuery->set($usuario->cpf);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPerfil1($value){
		$sql = 'SELECT * FROM usuario WHERE perfil1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPerfil2($value){
		$sql = 'SELECT * FROM usuario WHERE perfil2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPerfil3($value){
		$sql = 'SELECT * FROM usuario WHERE perfil3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM usuario WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLastaccess($value){
		$sql = 'SELECT * FROM usuario WHERE lastaccess = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM usuario WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCadastro($value){
		$sql = 'SELECT * FROM usuario WHERE data_cadastro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPerfil1($value){
		$sql = 'DELETE FROM usuario WHERE perfil1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPerfil2($value){
		$sql = 'DELETE FROM usuario WHERE perfil2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPerfil3($value){
		$sql = 'DELETE FROM usuario WHERE perfil3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM usuario WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastaccess($value){
		$sql = 'DELETE FROM usuario WHERE lastaccess = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM usuario WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCadastro($value){
		$sql = 'DELETE FROM usuario WHERE data_cadastro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuarioMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->cpf = $row['cpf'];
		$usuario->perfil1 = $row['perfil1'];
		$usuario->perfil2 = $row['perfil2'];
		$usuario->perfil3 = $row['perfil3'];
		$usuario->password = $row['password'];
		$usuario->lastaccess = $row['lastaccess'];
		$usuario->ativo = $row['ativo'];
		$usuario->dataCadastro = $row['data_cadastro'];

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
	 * @return UsuarioMySql 
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