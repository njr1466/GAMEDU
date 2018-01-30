<?php
/**
 * Class that operate on table 'edital_programa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-13 14:32
 */
class EditalProgramaMySqlDAO implements EditalProgramaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EditalProgramaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM edital_programa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM edital_programa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM edital_programa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param editalPrograma primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM edital_programa WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EditalProgramaMySql editalPrograma
 	 */
	public function insert($editalPrograma){
		$sql = 'INSERT INTO edital_programa (titulo, data_publicacao, data_inicio, data_fim, qtdanexos, inicio_programa, fim_programa, qtdanexosprop) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($editalPrograma->titulo);
		$sqlQuery->set($editalPrograma->dataPublicacao);
		$sqlQuery->set($editalPrograma->dataInicio);
		$sqlQuery->set($editalPrograma->dataFim);
		$sqlQuery->setNumber($editalPrograma->qtdanexos);
		$sqlQuery->set($editalPrograma->inicioPrograma);
		$sqlQuery->set($editalPrograma->fimPrograma);
		$sqlQuery->setNumber($editalPrograma->qtdanexosprop);

		$id = $this->executeInsert($sqlQuery);	
		$editalPrograma->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EditalProgramaMySql editalPrograma
 	 */
	public function update($editalPrograma){
		$sql = 'UPDATE edital_programa SET titulo = ?, data_publicacao = ?, data_inicio = ?, data_fim = ?, qtdanexos = ?, inicio_programa = ?, fim_programa = ?, qtdanexosprop = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($editalPrograma->titulo);
		$sqlQuery->set($editalPrograma->dataPublicacao);
		$sqlQuery->set($editalPrograma->dataInicio);
		$sqlQuery->set($editalPrograma->dataFim);
		$sqlQuery->setNumber($editalPrograma->qtdanexos);
		$sqlQuery->set($editalPrograma->inicioPrograma);
		$sqlQuery->set($editalPrograma->fimPrograma);
		$sqlQuery->setNumber($editalPrograma->qtdanexosprop);

		$sqlQuery->set($editalPrograma->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM edital_programa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM edital_programa WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataPublicacao($value){
		$sql = 'SELECT * FROM edital_programa WHERE data_publicacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicio($value){
		$sql = 'SELECT * FROM edital_programa WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFim($value){
		$sql = 'SELECT * FROM edital_programa WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdanexos($value){
		$sql = 'SELECT * FROM edital_programa WHERE qtdanexos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInicioPrograma($value){
		$sql = 'SELECT * FROM edital_programa WHERE inicio_programa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFimPrograma($value){
		$sql = 'SELECT * FROM edital_programa WHERE fim_programa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtdanexosprop($value){
		$sql = 'SELECT * FROM edital_programa WHERE qtdanexosprop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM edital_programa WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataPublicacao($value){
		$sql = 'DELETE FROM edital_programa WHERE data_publicacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicio($value){
		$sql = 'DELETE FROM edital_programa WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFim($value){
		$sql = 'DELETE FROM edital_programa WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdanexos($value){
		$sql = 'DELETE FROM edital_programa WHERE qtdanexos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInicioPrograma($value){
		$sql = 'DELETE FROM edital_programa WHERE inicio_programa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFimPrograma($value){
		$sql = 'DELETE FROM edital_programa WHERE fim_programa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtdanexosprop($value){
		$sql = 'DELETE FROM edital_programa WHERE qtdanexosprop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EditalProgramaMySql 
	 */
	protected function readRow($row){
		$editalPrograma = new EditalPrograma();
		
		$editalPrograma->id = $row['id'];
		$editalPrograma->titulo = $row['titulo'];
		$editalPrograma->dataPublicacao = $row['data_publicacao'];
		$editalPrograma->dataInicio = $row['data_inicio'];
		$editalPrograma->dataFim = $row['data_fim'];
		$editalPrograma->qtdanexos = $row['qtdanexos'];
		$editalPrograma->inicioPrograma = $row['inicio_programa'];
		$editalPrograma->fimPrograma = $row['fim_programa'];
		$editalPrograma->qtdanexosprop = $row['qtdanexosprop'];

		return $editalPrograma;
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
	 * @return EditalProgramaMySql 
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