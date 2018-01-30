<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface AvaliadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Avaliador 
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
 	 * @param avaliador primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Avaliador avaliador
 	 */
	public function insert($avaliador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Avaliador avaliador
 	 */
	public function update($avaliador);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCpf($value);

	public function queryByNome($value);

	public function queryByEmail($value);

	public function queryByTitulacao($value);

	public function queryByTipo($value);

	public function queryByAreaCodigo($value);

	public function queryByDataCadastro($value);

	public function queryByAtivo($value);


	public function deleteByCpf($value);

	public function deleteByNome($value);

	public function deleteByEmail($value);

	public function deleteByTitulacao($value);

	public function deleteByTipo($value);

	public function deleteByAreaCodigo($value);

	public function deleteByDataCadastro($value);

	public function deleteByAtivo($value);


}
?>