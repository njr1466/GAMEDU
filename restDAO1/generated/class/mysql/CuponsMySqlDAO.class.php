<?php
/**
 * Class that operate on table 'cupons'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-11 14:45
 */
class CuponsMySqlDAO implements CuponsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CuponsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cupons WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cupons';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cupons ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cupon primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cupons WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CuponsMySql cupon
 	 */
	public function insert($cupon){
		$sql = 'INSERT INTO cupons (id_oferta, id_cliente, data, numero, data_uso, informacoes) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cupon->idOferta);
		$sqlQuery->setNumber($cupon->idCliente);
		$sqlQuery->set($cupon->data);
		$sqlQuery->setNumber($cupon->numero);
		$sqlQuery->set($cupon->dataUso);
		$sqlQuery->set($cupon->informacoes);

		$id = $this->executeInsert($sqlQuery);	
		$cupon->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CuponsMySql cupon
 	 */
	public function update($cupon){
		$sql = 'UPDATE cupons SET id_oferta = ?, id_cliente = ?, data = ?, numero = ?, data_uso = ?, informacoes = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cupon->idOferta);
		$sqlQuery->setNumber($cupon->idCliente);
		$sqlQuery->set($cupon->data);
		$sqlQuery->setNumber($cupon->numero);
		$sqlQuery->set($cupon->dataUso);
		$sqlQuery->set($cupon->informacoes);

		$sqlQuery->setNumber($cupon->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cupons';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdOferta($value){
		$sql = 'SELECT * FROM cupons WHERE id_oferta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM cupons WHERE id_cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM cupons WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumero($value){
		$sql = 'SELECT * FROM cupons WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataUso($value){
		$sql = 'SELECT * FROM cupons WHERE data_uso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInformacoes($value){
		$sql = 'SELECT * FROM cupons WHERE informacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdOferta($value){
		$sql = 'DELETE FROM cupons WHERE id_oferta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM cupons WHERE id_cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM cupons WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumero($value){
		$sql = 'DELETE FROM cupons WHERE numero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataUso($value){
		$sql = 'DELETE FROM cupons WHERE data_uso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInformacoes($value){
		$sql = 'DELETE FROM cupons WHERE informacoes = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CuponsMySql 
	 */
	protected function readRow($row){
		$cupon = new Cupon();
		
		$cupon->id = $row['id'];
		$cupon->idOferta = $row['id_oferta'];
		$cupon->idCliente = $row['id_cliente'];
		$cupon->data = $row['data'];
		$cupon->numero = $row['numero'];
		$cupon->dataUso = $row['data_uso'];
		$cupon->informacoes = $row['informacoes'];

		return $cupon;
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
	 * @return CuponsMySql 
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