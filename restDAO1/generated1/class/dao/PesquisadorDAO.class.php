<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface PesquisadorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pesquisador 
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
 	 * @param pesquisador primary key
 	 */
	public function delete($siape);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pesquisador pesquisador
 	 */
	public function insert($pesquisador);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pesquisador pesquisador
 	 */
	public function update($pesquisador);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCpf($value);

	public function queryByNome($value);

	public function queryByCargo($value);

	public function queryByTitulacao($value);

	public function queryBySexo($value);

	public function queryByRegime($value);

	public function queryByCampusId($value);

	public function queryByDepartamentoId($value);

	public function queryByTelefone($value);

	public function queryByCelular($value);

	public function queryByEmail1($value);

	public function queryByEmail2($value);

	public function queryByLinklattes($value);

	public function queryByAreaCodigo($value);


	public function deleteByCpf($value);

	public function deleteByNome($value);

	public function deleteByCargo($value);

	public function deleteByTitulacao($value);

	public function deleteBySexo($value);

	public function deleteByRegime($value);

	public function deleteByCampusId($value);

	public function deleteByDepartamentoId($value);

	public function deleteByTelefone($value);

	public function deleteByCelular($value);

	public function deleteByEmail1($value);

	public function deleteByEmail2($value);

	public function deleteByLinklattes($value);

	public function deleteByAreaCodigo($value);


}
?>