<?php
/**
 * Class that operate on table 'proposta_bolsa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-13 14:32
 */
class PropostaBolsaMySqlDAO implements PropostaBolsaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PropostaBolsaMySql 
	 */
	public function load($id, $projetoId, $editalProgramaId, $alunoCpf){
		$sql = 'SELECT * FROM proposta_bolsa WHERE id = ?  AND projeto_id = ?  AND edital_programa_id = ?  AND aluno_cpf = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($projetoId);
		$sqlQuery->setNumber($editalProgramaId);
		$sqlQuery->setNumber($alunoCpf);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM proposta_bolsa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM proposta_bolsa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param propostaBolsa primary key
 	 */
	public function delete($id, $projetoId, $editalProgramaId, $alunoCpf){
		$sql = 'DELETE FROM proposta_bolsa WHERE id = ?  AND projeto_id = ?  AND edital_programa_id = ?  AND aluno_cpf = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		$sqlQuery->setNumber($projetoId);
		$sqlQuery->setNumber($editalProgramaId);
		$sqlQuery->setNumber($alunoCpf);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PropostaBolsaMySql propostaBolsa
 	 */
	public function insert($propostaBolsa){
		$sql = 'INSERT INTO proposta_bolsa (descricao, bolsistabia, programa, tipobolsa, nota, status, data_submissao, pesquisador_orientador, coorientador, orientador_bia, id, projeto_id, edital_programa_id, aluno_cpf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($propostaBolsa->descricao);
		$sqlQuery->set($propostaBolsa->bolsistabia);
		$sqlQuery->set($propostaBolsa->programa);
		$sqlQuery->set($propostaBolsa->tipobolsa);
		$sqlQuery->set($propostaBolsa->nota);
		$sqlQuery->set($propostaBolsa->status);
		$sqlQuery->set($propostaBolsa->dataSubmissao);
		$sqlQuery->set($propostaBolsa->pesquisadorOrientador);
		$sqlQuery->set($propostaBolsa->coorientador);
		$sqlQuery->set($propostaBolsa->orientadorBia);

		
		$sqlQuery->setNumber($propostaBolsa->id);

		$sqlQuery->setNumber($propostaBolsa->projetoId);

		$sqlQuery->setNumber($propostaBolsa->editalProgramaId);

		$sqlQuery->setNumber($propostaBolsa->alunoCpf);

		$this->executeInsert($sqlQuery);	
		//$propostaBolsa->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PropostaBolsaMySql propostaBolsa
 	 */
	public function update($propostaBolsa){
		$sql = 'UPDATE proposta_bolsa SET descricao = ?, bolsistabia = ?, programa = ?, tipobolsa = ?, nota = ?, status = ?, data_submissao = ?, pesquisador_orientador = ?, coorientador = ?, orientador_bia = ? WHERE id = ?  AND projeto_id = ?  AND edital_programa_id = ?  AND aluno_cpf = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($propostaBolsa->descricao);
		$sqlQuery->set($propostaBolsa->bolsistabia);
		$sqlQuery->set($propostaBolsa->programa);
		$sqlQuery->set($propostaBolsa->tipobolsa);
		$sqlQuery->set($propostaBolsa->nota);
		$sqlQuery->set($propostaBolsa->status);
		$sqlQuery->set($propostaBolsa->dataSubmissao);
		$sqlQuery->set($propostaBolsa->pesquisadorOrientador);
		$sqlQuery->set($propostaBolsa->coorientador);
		$sqlQuery->set($propostaBolsa->orientadorBia);

		
		$sqlQuery->setNumber($propostaBolsa->id);

		$sqlQuery->setNumber($propostaBolsa->projetoId);

		$sqlQuery->setNumber($propostaBolsa->editalProgramaId);

		$sqlQuery->setNumber($propostaBolsa->alunoCpf);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM proposta_bolsa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBolsistabia($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE bolsistabia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrograma($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE programa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipobolsa($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE tipobolsa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataSubmissao($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE data_submissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPesquisadorOrientador($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE pesquisador_orientador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCoorientador($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE coorientador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrientadorBia($value){
		$sql = 'SELECT * FROM proposta_bolsa WHERE orientador_bia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricao($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBolsistabia($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE bolsistabia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrograma($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE programa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipobolsa($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE tipobolsa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataSubmissao($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE data_submissao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPesquisadorOrientador($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE pesquisador_orientador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCoorientador($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE coorientador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrientadorBia($value){
		$sql = 'DELETE FROM proposta_bolsa WHERE orientador_bia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PropostaBolsaMySql 
	 */
	protected function readRow($row){
		$propostaBolsa = new PropostaBolsa();
		
		$propostaBolsa->id = $row['id'];
		$propostaBolsa->projetoId = $row['projeto_id'];
		$propostaBolsa->editalProgramaId = $row['edital_programa_id'];
		$propostaBolsa->alunoCpf = $row['aluno_cpf'];
		$propostaBolsa->descricao = $row['descricao'];
		$propostaBolsa->bolsistabia = $row['bolsistabia'];
		$propostaBolsa->programa = $row['programa'];
		$propostaBolsa->tipobolsa = $row['tipobolsa'];
		$propostaBolsa->nota = $row['nota'];
		$propostaBolsa->status = $row['status'];
		$propostaBolsa->dataSubmissao = $row['data_submissao'];
		$propostaBolsa->pesquisadorOrientador = $row['pesquisador_orientador'];
		$propostaBolsa->coorientador = $row['coorientador'];
		$propostaBolsa->orientadorBia = $row['orientador_bia'];

		return $propostaBolsa;
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
	 * @return PropostaBolsaMySql 
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