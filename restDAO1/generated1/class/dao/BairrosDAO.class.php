<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface BairrosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bairros 
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
 	 * @param bairro primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bairros bairro
 	 */
	public function insert($bairro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bairros bairro
 	 */
	public function update($bairro);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCidade($value);

	public function queryByBairro($value);


	public function deleteByIdCidade($value);

	public function deleteByBairro($value);


}
?>