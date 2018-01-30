<?php
/**
 * Class that operate on table 'aluno'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-13 14:32
 */
class AlunoMySqlDAO implements AlunoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AlunoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aluno WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM aluno ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param aluno primary key
 	 */
	public function delete($cpf){
		$sql = 'DELETE FROM aluno WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($cpf);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlunoMySql aluno
 	 */
	public function insert($aluno){
		
          
                $sql = 'INSERT INTO aluno (cpf, nome, matricula, curso_id, sexo, nascimento, campus_id, telefone, celular, email, linklattes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
                $sqlQuery->set($aluno->cpf);
		$sqlQuery->set($aluno->nome);
		$sqlQuery->set($aluno->matricula);
		$sqlQuery->setNumber($aluno->cursoId);
		$sqlQuery->set($aluno->sexo);
		$sqlQuery->set($aluno->nascimento);
		$sqlQuery->setNumber($aluno->campusId);
		$sqlQuery->set($aluno->telefone);
		$sqlQuery->set($aluno->celular);
		$sqlQuery->set($aluno->email);
		$sqlQuery->set($aluno->linklattes);
                $id = $this->executeInsert($sqlQuery);	
		$aluno->cpf = $id;
		return $sqlQuery;
           

		
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlunoMySql aluno
 	 */
	public function update($aluno){
		$sql = 'UPDATE aluno SET nome = ?, matricula = ?, curso_id = ?, sexo = ?, nascimento = ?, campus_id = ?, telefone = ?, celular = ?, email = ?, linklattes = ? WHERE cpf = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aluno->nome);
		$sqlQuery->set($aluno->matricula);
		$sqlQuery->setNumber($aluno->cursoId);
		$sqlQuery->set($aluno->sexo);
		$sqlQuery->set($aluno->nascimento);
		$sqlQuery->setNumber($aluno->campusId);
		$sqlQuery->set($aluno->telefone);
		$sqlQuery->set($aluno->celular);
		$sqlQuery->set($aluno->email);
		$sqlQuery->set($aluno->linklattes);

		$sqlQuery->set($aluno->cpf);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM aluno WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMatricula($value){
		$sql = 'SELECT * FROM aluno WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCursoId($value){
		$sql = 'SELECT * FROM aluno WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySexo($value){
		$sql = 'SELECT * FROM aluno WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNascimento($value){
		$sql = 'SELECT * FROM aluno WHERE nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCampusId($value){
		$sql = 'SELECT * FROM aluno WHERE campus_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefone($value){
		$sql = 'SELECT * FROM aluno WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCelular($value){
		$sql = 'SELECT * FROM aluno WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM aluno WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinklattes($value){
		$sql = 'SELECT * FROM aluno WHERE linklattes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM aluno WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMatricula($value){
		$sql = 'DELETE FROM aluno WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCursoId($value){
		$sql = 'DELETE FROM aluno WHERE curso_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySexo($value){
		$sql = 'DELETE FROM aluno WHERE sexo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNascimento($value){
		$sql = 'DELETE FROM aluno WHERE nascimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCampusId($value){
		$sql = 'DELETE FROM aluno WHERE campus_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefone($value){
		$sql = 'DELETE FROM aluno WHERE telefone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCelular($value){
		$sql = 'DELETE FROM aluno WHERE celular = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM aluno WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinklattes($value){
		$sql = 'DELETE FROM aluno WHERE linklattes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AlunoMySql 
	 */
	protected function readRow($row){
		$aluno = new Aluno();
		
		$aluno->cpf = $row['cpf'];
		$aluno->nome = $row['nome'];
		$aluno->matricula = $row['matricula'];
		$aluno->cursoId = $row['curso_id'];
		$aluno->sexo = $row['sexo'];
		$aluno->nascimento = $row['nascimento'];
		$aluno->campusId = $row['campus_id'];
		$aluno->telefone = $row['telefone'];
		$aluno->celular = $row['celular'];
		$aluno->email = $row['email'];
		$aluno->linklattes = $row['linklattes'];

		return $aluno;
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
	 * @return AlunoMySql 
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