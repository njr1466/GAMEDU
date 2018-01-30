<?php
/**
 * Class that operate on table 'bannersuperior'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class BannersuperiorMySqlDAO implements BannersuperiorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BannersuperiorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bannersuperior WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bannersuperior';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bannersuperior ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bannersuperior primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM bannersuperior WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BannersuperiorMySql bannersuperior
 	 */
	public function insert($bannersuperior){
		$sql = 'INSERT INTO bannersuperior (texto1, texto2, imagem, link, botao, datadecriacao, datainicial, datafinal) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannersuperior->texto1);
		$sqlQuery->set($bannersuperior->texto2);
		$sqlQuery->set($bannersuperior->imagem);
		$sqlQuery->set($bannersuperior->link);
		$sqlQuery->set($bannersuperior->botao);
		$sqlQuery->set($bannersuperior->datadecriacao);
		$sqlQuery->set($bannersuperior->datainicial);
		$sqlQuery->set($bannersuperior->datafinal);

		$id = $this->executeInsert($sqlQuery);	
		$bannersuperior->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BannersuperiorMySql bannersuperior
 	 */
	public function update($bannersuperior){
		$sql = 'UPDATE bannersuperior SET texto1 = ?, texto2 = ?, imagem = ?, link = ?, botao = ?, datadecriacao = ?, datainicial = ?, datafinal = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannersuperior->texto1);
		$sqlQuery->set($bannersuperior->texto2);
		$sqlQuery->set($bannersuperior->imagem);
		$sqlQuery->set($bannersuperior->link);
		$sqlQuery->set($bannersuperior->botao);
		$sqlQuery->set($bannersuperior->datadecriacao);
		$sqlQuery->set($bannersuperior->datainicial);
		$sqlQuery->set($bannersuperior->datafinal);

		$sqlQuery->setNumber($bannersuperior->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bannersuperior';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTexto1($value){
		$sql = 'SELECT * FROM bannersuperior WHERE texto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTexto2($value){
		$sql = 'SELECT * FROM bannersuperior WHERE texto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM bannersuperior WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM bannersuperior WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBotao($value){
		$sql = 'SELECT * FROM bannersuperior WHERE botao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatadecriacao($value){
		$sql = 'SELECT * FROM bannersuperior WHERE datadecriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatainicial($value){
		$sql = 'SELECT * FROM bannersuperior WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatafinal($value){
		$sql = 'SELECT * FROM bannersuperior WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTexto1($value){
		$sql = 'DELETE FROM bannersuperior WHERE texto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTexto2($value){
		$sql = 'DELETE FROM bannersuperior WHERE texto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagem($value){
		$sql = 'DELETE FROM bannersuperior WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM bannersuperior WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBotao($value){
		$sql = 'DELETE FROM bannersuperior WHERE botao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatadecriacao($value){
		$sql = 'DELETE FROM bannersuperior WHERE datadecriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatainicial($value){
		$sql = 'DELETE FROM bannersuperior WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatafinal($value){
		$sql = 'DELETE FROM bannersuperior WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BannersuperiorMySql 
	 */
	protected function readRow($row){
		$bannersuperior = new Bannersuperior();
		
		$bannersuperior->id = $row['id'];
		$bannersuperior->texto1 = $row['texto1'];
		$bannersuperior->texto2 = $row['texto2'];
		$bannersuperior->imagem = $row['imagem'];
		$bannersuperior->link = $row['link'];
		$bannersuperior->botao = $row['botao'];
		$bannersuperior->datadecriacao = $row['datadecriacao'];
		$bannersuperior->datainicial = $row['datainicial'];
		$bannersuperior->datafinal = $row['datafinal'];

		return $bannersuperior;
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
	 * @return BannersuperiorMySql 
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