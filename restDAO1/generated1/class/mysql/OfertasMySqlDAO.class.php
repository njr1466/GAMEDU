<?php
/**
 * Class that operate on table 'ofertas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-12-19 13:18
 */
class OfertasMySqlDAO implements OfertasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return OfertasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ofertas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ofertas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ofertas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param oferta primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ofertas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param OfertasMySql oferta
 	 */
	public function insert($oferta){
		$sql = 'INSERT INTO ofertas (id_cliente, id_categoria, promocao, promocaocompleta, valorantigo, valor, desconto, qtd, inicio_cupom, datainicial, datafinal, descricao, foto1, foto2, foto3, patrocinador, mapa, ativo, principal, principalcategoria, datacriacao, observacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oferta->idCliente);
		$sqlQuery->setNumber($oferta->idCategoria);
		$sqlQuery->set($oferta->promocao);
		$sqlQuery->set($oferta->promocaocompleta);
		$sqlQuery->set($oferta->valorantigo);
		$sqlQuery->set($oferta->valor);
		$sqlQuery->setNumber($oferta->desconto);
		$sqlQuery->setNumber($oferta->qtd);
		$sqlQuery->setNumber($oferta->inicioCupom);
		$sqlQuery->set($oferta->datainicial);
		$sqlQuery->set($oferta->datafinal);
		$sqlQuery->set($oferta->descricao);
		$sqlQuery->set($oferta->foto1);
		$sqlQuery->set($oferta->foto2);
		$sqlQuery->set($oferta->foto3);
		$sqlQuery->set($oferta->patrocinador);
		$sqlQuery->set($oferta->mapa);
		$sqlQuery->setNumber($oferta->ativo);
		$sqlQuery->setNumber($oferta->principal);
		$sqlQuery->setNumber($oferta->principalcategoria);
		$sqlQuery->set($oferta->datacriacao);
		$sqlQuery->set($oferta->observacao);

		$id = $this->executeInsert($sqlQuery);	
		$oferta->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param OfertasMySql oferta
 	 */
	public function update($oferta){
		$sql = 'UPDATE ofertas SET id_cliente = ?, id_categoria = ?, promocao = ?, promocaocompleta = ?, valorantigo = ?, valor = ?, desconto = ?, qtd = ?, inicio_cupom = ?, datainicial = ?, datafinal = ?, descricao = ?, foto1 = ?, foto2 = ?, foto3 = ?, patrocinador = ?, mapa = ?, ativo = ?, principal = ?, principalcategoria = ?, datacriacao = ?, observacao = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($oferta->idCliente);
		$sqlQuery->setNumber($oferta->idCategoria);
		$sqlQuery->set($oferta->promocao);
		$sqlQuery->set($oferta->promocaocompleta);
		$sqlQuery->set($oferta->valorantigo);
		$sqlQuery->set($oferta->valor);
		$sqlQuery->setNumber($oferta->desconto);
		$sqlQuery->setNumber($oferta->qtd);
		$sqlQuery->setNumber($oferta->inicioCupom);
		$sqlQuery->set($oferta->datainicial);
		$sqlQuery->set($oferta->datafinal);
		$sqlQuery->set($oferta->descricao);
		$sqlQuery->set($oferta->foto1);
		$sqlQuery->set($oferta->foto2);
		$sqlQuery->set($oferta->foto3);
		$sqlQuery->set($oferta->patrocinador);
		$sqlQuery->set($oferta->mapa);
		$sqlQuery->setNumber($oferta->ativo);
		$sqlQuery->setNumber($oferta->principal);
		$sqlQuery->setNumber($oferta->principalcategoria);
		$sqlQuery->set($oferta->datacriacao);
		$sqlQuery->set($oferta->observacao);

		$sqlQuery->setNumber($oferta->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ofertas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM ofertas WHERE id_cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCategoria($value){
		$sql = 'SELECT * FROM ofertas WHERE id_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPromocao($value){
		$sql = 'SELECT * FROM ofertas WHERE promocao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPromocaocompleta($value){
		$sql = 'SELECT * FROM ofertas WHERE promocaocompleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValorantigo($value){
		$sql = 'SELECT * FROM ofertas WHERE valorantigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByValor($value){
		$sql = 'SELECT * FROM ofertas WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDesconto($value){
		$sql = 'SELECT * FROM ofertas WHERE desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQtd($value){
		$sql = 'SELECT * FROM ofertas WHERE qtd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByInicioCupom($value){
		$sql = 'SELECT * FROM ofertas WHERE inicio_cupom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatainicial($value){
		$sql = 'SELECT * FROM ofertas WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatafinal($value){
		$sql = 'SELECT * FROM ofertas WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM ofertas WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto1($value){
		$sql = 'SELECT * FROM ofertas WHERE foto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto2($value){
		$sql = 'SELECT * FROM ofertas WHERE foto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFoto3($value){
		$sql = 'SELECT * FROM ofertas WHERE foto3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPatrocinador($value){
		$sql = 'SELECT * FROM ofertas WHERE patrocinador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMapa($value){
		$sql = 'SELECT * FROM ofertas WHERE mapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAtivo($value){
		$sql = 'SELECT * FROM ofertas WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrincipal($value){
		$sql = 'SELECT * FROM ofertas WHERE principal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrincipalcategoria($value){
		$sql = 'SELECT * FROM ofertas WHERE principalcategoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatacriacao($value){
		$sql = 'SELECT * FROM ofertas WHERE datacriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByObservacao($value){
		$sql = 'SELECT * FROM ofertas WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM ofertas WHERE id_cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCategoria($value){
		$sql = 'DELETE FROM ofertas WHERE id_categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPromocao($value){
		$sql = 'DELETE FROM ofertas WHERE promocao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPromocaocompleta($value){
		$sql = 'DELETE FROM ofertas WHERE promocaocompleta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValorantigo($value){
		$sql = 'DELETE FROM ofertas WHERE valorantigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByValor($value){
		$sql = 'DELETE FROM ofertas WHERE valor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesconto($value){
		$sql = 'DELETE FROM ofertas WHERE desconto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQtd($value){
		$sql = 'DELETE FROM ofertas WHERE qtd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByInicioCupom($value){
		$sql = 'DELETE FROM ofertas WHERE inicio_cupom = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatainicial($value){
		$sql = 'DELETE FROM ofertas WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatafinal($value){
		$sql = 'DELETE FROM ofertas WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM ofertas WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto1($value){
		$sql = 'DELETE FROM ofertas WHERE foto1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto2($value){
		$sql = 'DELETE FROM ofertas WHERE foto2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto3($value){
		$sql = 'DELETE FROM ofertas WHERE foto3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPatrocinador($value){
		$sql = 'DELETE FROM ofertas WHERE patrocinador = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMapa($value){
		$sql = 'DELETE FROM ofertas WHERE mapa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAtivo($value){
		$sql = 'DELETE FROM ofertas WHERE ativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrincipal($value){
		$sql = 'DELETE FROM ofertas WHERE principal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrincipalcategoria($value){
		$sql = 'DELETE FROM ofertas WHERE principalcategoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatacriacao($value){
		$sql = 'DELETE FROM ofertas WHERE datacriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByObservacao($value){
		$sql = 'DELETE FROM ofertas WHERE observacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return OfertasMySql 
	 */
	protected function readRow($row){
		$oferta = new Oferta();
		
		$oferta->id = $row['id'];
		$oferta->idCliente = $row['id_cliente'];
		$oferta->idCategoria = $row['id_categoria'];
		$oferta->promocao = $row['promocao'];
		$oferta->promocaocompleta = $row['promocaocompleta'];
		$oferta->valorantigo = $row['valorantigo'];
		$oferta->valor = $row['valor'];
		$oferta->desconto = $row['desconto'];
		$oferta->qtd = $row['qtd'];
		$oferta->inicioCupom = $row['inicio_cupom'];
		$oferta->datainicial = $row['datainicial'];
		$oferta->datafinal = $row['datafinal'];
		$oferta->descricao = $row['descricao'];
		$oferta->foto1 = $row['foto1'];
		$oferta->foto2 = $row['foto2'];
		$oferta->foto3 = $row['foto3'];
		$oferta->patrocinador = $row['patrocinador'];
		$oferta->mapa = $row['mapa'];
		$oferta->ativo = $row['ativo'];
		$oferta->principal = $row['principal'];
		$oferta->principalcategoria = $row['principalcategoria'];
		$oferta->datacriacao = $row['datacriacao'];
		$oferta->observacao = $row['observacao'];

		return $oferta;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return OfertasMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>