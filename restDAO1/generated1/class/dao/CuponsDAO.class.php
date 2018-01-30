<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface CuponsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Cupons 
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
 	 * @param cupon primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Cupons cupon
 	 */
	public function insert($cupon);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Cupons cupon
 	 */
	public function update($cupon);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdOferta($value);

	public function queryByIdCliente($value);

	public function queryByData($value);

	public function queryByNumero($value);

	public function queryByDataUso($value);

	public function queryByInformacoes($value);


	public function deleteByIdOferta($value);

	public function deleteByIdCliente($value);

	public function deleteByData($value);

	public function deleteByNumero($value);

	public function deleteByDataUso($value);

	public function deleteByInformacoes($value);


}
?>