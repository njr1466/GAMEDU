<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface UsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuarios 
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
 	 * @param usuario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuarios usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuarios usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryBySobrenome($value);

	public function queryByEmail($value);

	public function queryBySexo($value);

	public function queryByUf($value);

	public function queryByCidade($value);

	public function queryByBairro($value);

	public function queryByTelefone($value);

	public function queryByIdFacebook($value);

	public function queryBySenha($value);

	public function queryByAtivo($value);


	public function deleteByNome($value);

	public function deleteBySobrenome($value);

	public function deleteByEmail($value);

	public function deleteBySexo($value);

	public function deleteByUf($value);

	public function deleteByCidade($value);

	public function deleteByBairro($value);

	public function deleteByTelefone($value);

	public function deleteByIdFacebook($value);

	public function deleteBySenha($value);

	public function deleteByAtivo($value);


}
?>