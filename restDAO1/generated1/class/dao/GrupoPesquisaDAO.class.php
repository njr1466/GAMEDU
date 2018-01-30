<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface GrupoPesquisaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GrupoPesquisa 
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
 	 * @param grupoPesquisa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GrupoPesquisa grupoPesquisa
 	 */
	public function insert($grupoPesquisa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GrupoPesquisa grupoPesquisa
 	 */
	public function update($grupoPesquisa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByLink($value);


	public function deleteByNome($value);

	public function deleteByLink($value);


}
?>