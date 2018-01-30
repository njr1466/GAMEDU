<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface PropostaBolsaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PropostaBolsa 
	 */
	public function load($id, $projetoId, $editalProgramaId, $alunoCpf);

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
 	 * @param propostaBolsa primary key
 	 */
	public function delete($id, $projetoId, $editalProgramaId, $alunoCpf);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PropostaBolsa propostaBolsa
 	 */
	public function insert($propostaBolsa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PropostaBolsa propostaBolsa
 	 */
	public function update($propostaBolsa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricao($value);

	public function queryByBolsistabia($value);

	public function queryByPrograma($value);

	public function queryByTipobolsa($value);

	public function queryByNota($value);

	public function queryByStatus($value);

	public function queryByDataSubmissao($value);

	public function queryByPesquisadorOrientador($value);

	public function queryByCoorientador($value);

	public function queryByOrientadorBia($value);


	public function deleteByDescricao($value);

	public function deleteByBolsistabia($value);

	public function deleteByPrograma($value);

	public function deleteByTipobolsa($value);

	public function deleteByNota($value);

	public function deleteByStatus($value);

	public function deleteByDataSubmissao($value);

	public function deleteByPesquisadorOrientador($value);

	public function deleteByCoorientador($value);

	public function deleteByOrientadorBia($value);


}
?>