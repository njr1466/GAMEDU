<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface EditalProgramaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EditalPrograma 
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
 	 * @param editalPrograma primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EditalPrograma editalPrograma
 	 */
	public function insert($editalPrograma);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EditalPrograma editalPrograma
 	 */
	public function update($editalPrograma);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitulo($value);

	public function queryByDataPublicacao($value);

	public function queryByDataInicio($value);

	public function queryByDataFim($value);

	public function queryByQtdanexos($value);

	public function queryByInicioPrograma($value);

	public function queryByFimPrograma($value);

	public function queryByQtdanexosprop($value);


	public function deleteByTitulo($value);

	public function deleteByDataPublicacao($value);

	public function deleteByDataInicio($value);

	public function deleteByDataFim($value);

	public function deleteByQtdanexos($value);

	public function deleteByInicioPrograma($value);

	public function deleteByFimPrograma($value);

	public function deleteByQtdanexosprop($value);


}
?>