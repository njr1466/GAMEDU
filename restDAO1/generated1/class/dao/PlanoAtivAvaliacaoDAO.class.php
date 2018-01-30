<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface PlanoAtivAvaliacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PlanoAtivAvaliacao 
	 */
	public function load($propostaBolsaId, $avaliadorId);

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
 	 * @param planoAtivAvaliacao primary key
 	 */
	public function delete($propostaBolsaId, $avaliadorId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PlanoAtivAvaliacao planoAtivAvaliacao
 	 */
	public function insert($planoAtivAvaliacao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PlanoAtivAvaliacao planoAtivAvaliacao
 	 */
	public function update($planoAtivAvaliacao);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNota($value);

	public function queryByComentario($value);

	public function queryByDataEnvioPlano($value);

	public function queryByDataAvaliacao($value);


	public function deleteByNota($value);

	public function deleteByComentario($value);

	public function deleteByDataEnvioPlano($value);

	public function deleteByDataAvaliacao($value);


}
?>