<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface PesquisadorGrupoPesquisaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PesquisadorGrupoPesquisa 
	 */
	public function load($pesquisadorSiape, $grupoPesquisaId);

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
 	 * @param pesquisadorGrupoPesquisa primary key
 	 */
	public function delete($pesquisadorSiape, $grupoPesquisaId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PesquisadorGrupoPesquisa pesquisadorGrupoPesquisa
 	 */
	public function insert($pesquisadorGrupoPesquisa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PesquisadorGrupoPesquisa pesquisadorGrupoPesquisa
 	 */
	public function update($pesquisadorGrupoPesquisa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByConfirmado($value);


	public function deleteByConfirmado($value);


}
?>