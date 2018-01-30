<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface ProjetoAvaliacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ProjetoAvaliacao 
	 */
	public function load($projetoId, $avaliadorId);

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
 	 * @param projetoAvaliacao primary key
 	 */
	public function delete($projetoId, $avaliadorId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProjetoAvaliacao projetoAvaliacao
 	 */
	public function insert($projetoAvaliacao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProjetoAvaliacao projetoAvaliacao
 	 */
	public function update($projetoAvaliacao);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNota($value);

	public function queryByComentario($value);

	public function queryByDataEnvioProjeto($value);

	public function queryByDataAvaliacao($value);


	public function deleteByNota($value);

	public function deleteByComentario($value);

	public function deleteByDataEnvioProjeto($value);

	public function deleteByDataAvaliacao($value);


}
?>