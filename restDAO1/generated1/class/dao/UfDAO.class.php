<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface UfDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Uf 
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
 	 * @param uf primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Uf uf
 	 */
	public function insert($uf);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Uf uf
 	 */
	public function update($uf);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUf($value);


	public function deleteByUf($value);


}
?>