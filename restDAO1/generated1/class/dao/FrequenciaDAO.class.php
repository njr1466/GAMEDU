<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface FrequenciaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Frequencia 
	 */
	public function load($id, $propostaBolsaId);

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
 	 * @param frequencia primary key
 	 */
	public function delete($id, $propostaBolsaId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Frequencia frequencia
 	 */
	public function insert($frequencia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Frequencia frequencia
 	 */
	public function update($frequencia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMes($value);

	public function queryByAno($value);

	public function queryByPendente($value);


	public function deleteByMes($value);

	public function deleteByAno($value);

	public function deleteByPendente($value);


}
?>