<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
interface OfertasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Ofertas 
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
 	 * @param oferta primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Ofertas oferta
 	 */
	public function insert($oferta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Ofertas oferta
 	 */
	public function update($oferta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByIdCategoria($value);

	public function queryByPromocao($value);

	public function queryByPromocaocompleta($value);

	public function queryByValorantigo($value);

	public function queryByValor($value);

	public function queryByDesconto($value);

	public function queryByQtd($value);

	public function queryByInicioCupom($value);

	public function queryByDatainicial($value);

	public function queryByDatafinal($value);

	public function queryByDescricao($value);

	public function queryByFoto1($value);

	public function queryByFoto2($value);

	public function queryByFoto3($value);

	public function queryByPatrocinador($value);

	public function queryByMapa($value);

	public function queryByAtivo($value);

	public function queryByPrincipal($value);

	public function queryByPrincipalcategoria($value);

	public function queryByDatacriacao($value);

	public function queryByObservacao($value);


	public function deleteByIdCliente($value);

	public function deleteByIdCategoria($value);

	public function deleteByPromocao($value);

	public function deleteByPromocaocompleta($value);

	public function deleteByValorantigo($value);

	public function deleteByValor($value);

	public function deleteByDesconto($value);

	public function deleteByQtd($value);

	public function deleteByInicioCupom($value);

	public function deleteByDatainicial($value);

	public function deleteByDatafinal($value);

	public function deleteByDescricao($value);

	public function deleteByFoto1($value);

	public function deleteByFoto2($value);

	public function deleteByFoto3($value);

	public function deleteByPatrocinador($value);

	public function deleteByMapa($value);

	public function deleteByAtivo($value);

	public function deleteByPrincipal($value);

	public function deleteByPrincipalcategoria($value);

	public function deleteByDatacriacao($value);

	public function deleteByObservacao($value);


}
?>