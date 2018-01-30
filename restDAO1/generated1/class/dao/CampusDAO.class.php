<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface CampusDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Campus 
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
 	 * @param campu primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Campus campu
 	 */
	public function insert($campu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Campus campu
 	 */
	public function update($campu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCampus($value);

	public function queryByEstado($value);


	public function deleteByCampus($value);

	public function deleteByEstado($value);


}
?>