<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface CategoriadestaqueDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Categoriadestaque 
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
 	 * @param categoriadestaque primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Categoriadestaque categoriadestaque
 	 */
	public function insert($categoriadestaque);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Categoriadestaque categoriadestaque
 	 */
	public function update($categoriadestaque);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTexto($value);

	public function queryByImagem($value);

	public function queryByLink($value);

	public function queryByAtivo($value);


	public function deleteByTexto($value);

	public function deleteByImagem($value);

	public function deleteByLink($value);

	public function deleteByAtivo($value);


}
?>