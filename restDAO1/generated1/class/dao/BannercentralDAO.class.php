<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface BannercentralDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bannercentral 
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
 	 * @param bannercentral primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bannercentral bannercentral
 	 */
	public function insert($bannercentral);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bannercentral bannercentral
 	 */
	public function update($bannercentral);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByImagem($value);

	public function queryByLink($value);

	public function queryByDatacriacao($value);

	public function queryByDatainicial($value);

	public function queryByDatafinal($value);


	public function deleteByImagem($value);

	public function deleteByLink($value);

	public function deleteByDatacriacao($value);

	public function deleteByDatainicial($value);

	public function deleteByDatafinal($value);


}
?>