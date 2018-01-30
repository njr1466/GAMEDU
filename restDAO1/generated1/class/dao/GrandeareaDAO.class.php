<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface GrandeareaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Grandearea 
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
 	 * @param grandearea primary key
 	 */
	public function delete($codigo);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Grandearea grandearea
 	 */
	public function insert($grandearea);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Grandearea grandearea
 	 */
	public function update($grandearea);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>