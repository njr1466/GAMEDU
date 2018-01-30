<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuario 
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
	public function delete($cpf);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuario usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuario usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPerfil1($value);

	public function queryByPerfil2($value);

	public function queryByPerfil3($value);

	public function queryByPassword($value);

	public function queryByLastaccess($value);

	public function queryByAtivo($value);

	public function queryByDataCadastro($value);


	public function deleteByPerfil1($value);

	public function deleteByPerfil2($value);

	public function deleteByPerfil3($value);

	public function deleteByPassword($value);

	public function deleteByLastaccess($value);

	public function deleteByAtivo($value);

	public function deleteByDataCadastro($value);


}
?>