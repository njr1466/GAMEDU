<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface ProjetoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Projeto 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param projeto primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Projeto projeto
 	 */
	public function insert($projeto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Projeto projeto
 	 */
	public function update($projeto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByDataInicio($value);

	public function queryByDataFim($value);

	public function queryByEhfomento($value);

	public function queryByNota($value);

	public function queryByStatus($value);

	public function queryByAreaCodigo($value);


	public function deleteByTitulo($value);

	public function deleteByDataInicio($value);

	public function deleteByDataFim($value);

	public function deleteByEhfomento($value);

	public function deleteByNota($value);

	public function deleteByStatus($value);

	public function deleteByAreaCodigo($value);


}
?>