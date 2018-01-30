<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface ProjetoPesquisadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ProjetoPesquisador 
	 */
	public function load($pesquisadorSiape, $projetoId);

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
 	 * @param projetoPesquisador primary key
 	 */
	public function delete($pesquisadorSiape, $projetoId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProjetoPesquisador projetoPesquisador
 	 */
	public function insert($projetoPesquisador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProjetoPesquisador projetoPesquisador
 	 */
	public function update($projetoPesquisador);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEhcoordenador($value);

	public function queryByDataInscricao($value);

	public function queryByAtivo($value);

	public function queryByDataSaida($value);


	public function deleteByEhcoordenador($value);

	public function deleteByDataInscricao($value);

	public function deleteByAtivo($value);

	public function deleteByDataSaida($value);


}
?>