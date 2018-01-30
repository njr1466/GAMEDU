<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface PerfilDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Perfil 
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
 	 * @param perfil primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Perfil perfil
 	 */
	public function insert($perfil);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Perfil perfil
 	 */
	public function update($perfil);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);


	public function deleteByName($value);


}
?>