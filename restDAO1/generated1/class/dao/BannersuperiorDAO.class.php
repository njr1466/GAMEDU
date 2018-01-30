<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface BannersuperiorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bannersuperior 
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
 	 * @param bannersuperior primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bannersuperior bannersuperior
 	 */
	public function insert($bannersuperior);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bannersuperior bannersuperior
 	 */
	public function update($bannersuperior);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTexto1($value);

	public function queryByTexto2($value);

	public function queryByImagem($value);

	public function queryByLink($value);

	public function queryByBotao($value);

	public function queryByDatadecriacao($value);

	public function queryByDatainicial($value);

	public function queryByDatafinal($value);


	public function deleteByTexto1($value);

	public function deleteByTexto2($value);

	public function deleteByImagem($value);

	public function deleteByLink($value);

	public function deleteByBotao($value);

	public function deleteByDatadecriacao($value);

	public function deleteByDatainicial($value);

	public function deleteByDatafinal($value);


}
?>