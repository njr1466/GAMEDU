<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface EmpresasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Empresas 
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
 	 * @param empresa primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Empresas empresa
 	 */
	public function insert($empresa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Empresas empresa
 	 */
	public function update($empresa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEmpresa($value);

	public function queryByCnpj($value);

	public function queryByInscricao($value);

	public function queryByEndereco($value);

	public function queryByBairro($value);

	public function queryByCidade($value);

	public function queryByCep($value);

	public function queryByUf($value);

	public function queryByEmail($value);

	public function queryBySenha($value);


	public function deleteByEmpresa($value);

	public function deleteByCnpj($value);

	public function deleteByInscricao($value);

	public function deleteByEndereco($value);

	public function deleteByBairro($value);

	public function deleteByCidade($value);

	public function deleteByCep($value);

	public function deleteByUf($value);

	public function deleteByEmail($value);

	public function deleteBySenha($value);


}
?>