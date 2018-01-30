<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface PatrocinadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Patrocinador 
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
 	 * @param patrocinador primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Patrocinador patrocinador
 	 */
	public function insert($patrocinador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Patrocinador patrocinador
 	 */
	public function update($patrocinador);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByImagem($value);

	public function queryByDatainicial($value);

	public function queryByDatafinal($value);

	public function queryByAcessos($value);

	public function queryByQtdAcessos($value);


	public function deleteByImagem($value);

	public function deleteByDatainicial($value);

	public function deleteByDatafinal($value);

	public function deleteByAcessos($value);

	public function deleteByQtdAcessos($value);


}
?>