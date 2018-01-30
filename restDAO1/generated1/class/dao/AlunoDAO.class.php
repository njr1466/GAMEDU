<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:22
 */
interface AlunoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Aluno 
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
 	 * @param aluno primary key
 	 */
	public function delete($cpf);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Aluno aluno
 	 */
	public function insert($aluno);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Aluno aluno
 	 */
	public function update($aluno);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByMatricula($value);

	public function queryByCursoId($value);

	public function queryBySexo($value);

	public function queryByNascimento($value);

	public function queryByCampusId($value);

	public function queryByTelefone($value);

	public function queryByCelular($value);

	public function queryByEmail($value);

	public function queryByLinklattes($value);


	public function deleteByNome($value);

	public function deleteByMatricula($value);

	public function deleteByCursoId($value);

	public function deleteBySexo($value);

	public function deleteByNascimento($value);

	public function deleteByCampusId($value);

	public function deleteByTelefone($value);

	public function deleteByCelular($value);

	public function deleteByEmail($value);

	public function deleteByLinklattes($value);


}
?>