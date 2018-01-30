<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface AdminDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Admin 
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
 	 * @param admin primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Admin admin
 	 */
	public function insert($admin);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Admin admin
 	 */
	public function update($admin);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsuario($value);

	public function queryBySenha($value);


	public function deleteByUsuario($value);

	public function deleteBySenha($value);


}
?>