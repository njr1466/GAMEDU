<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface CursoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Curso 
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
 	 * @param curso primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Curso curso
 	 */
	public function insert($curso);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Curso curso
 	 */
	public function update($curso);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>