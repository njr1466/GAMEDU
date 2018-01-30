<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AlunoDAO
	 */
	public static function getAlunoDAO(){
		return new AlunoMySqlExtDAO();
	}

	/**
	 * @return AreaDAO
	 */
	public static function getAreaDAO(){
		return new AreaMySqlExtDAO();
	}

	/**
	 * @return AvaliadorDAO
	 */
	public static function getAvaliadorDAO(){
		return new AvaliadorMySqlExtDAO();
	}

	/**
	 * @return CampusDAO
	 */
	public static function getCampusDAO(){
		return new CampusMySqlExtDAO();
	}

	/**
	 * @return CursoDAO
	 */
	public static function getCursoDAO(){
		return new CursoMySqlExtDAO();
	}

	/**
	 * @return DepartamentoDAO
	 */
	public static function getDepartamentoDAO(){
		return new DepartamentoMySqlExtDAO();
	}

	/**
	 * @return EditalProgramaDAO
	 */
	public static function getEditalProgramaDAO(){
		return new EditalProgramaMySqlExtDAO();
	}

	/**
	 * @return FrequenciaDAO
	 */
	public static function getFrequenciaDAO(){
		return new FrequenciaMySqlExtDAO();
	}

	/**
	 * @return GrandeareaDAO
	 */
	public static function getGrandeareaDAO(){
		return new GrandeareaMySqlExtDAO();
	}

	/**
	 * @return GrupoPesquisaDAO
	 */
	public static function getGrupoPesquisaDAO(){
		return new GrupoPesquisaMySqlExtDAO();
	}

	/**
	 * @return PerfilDAO
	 */
	public static function getPerfilDAO(){
		return new PerfilMySqlExtDAO();
	}

	/**
	 * @return PesquisadorDAO
	 */
	public static function getPesquisadorDAO(){
		return new PesquisadorMySqlExtDAO();
	}

	/**
	 * @return PesquisadorGrupoPesquisaDAO
	 */
	public static function getPesquisadorGrupoPesquisaDAO(){
		return new PesquisadorGrupoPesquisaMySqlExtDAO();
	}

	/**
	 * @return PlanoAtivAvaliacaoDAO
	 */
	public static function getPlanoAtivAvaliacaoDAO(){
		return new PlanoAtivAvaliacaoMySqlExtDAO();
	}

	/**
	 * @return ProjetoDAO
	 */
	public static function getProjetoDAO(){
		return new ProjetoMySqlExtDAO();
	}

	/**
	 * @return ProjetoAvaliacaoDAO
	 */
	public static function getProjetoAvaliacaoDAO(){
		return new ProjetoAvaliacaoMySqlExtDAO();
	}

	/**
	 * @return ProjetoPesquisadorDAO
	 */
	public static function getProjetoPesquisadorDAO(){
		return new ProjetoPesquisadorMySqlExtDAO();
	}

	/**
	 * @return PropostaBolsaDAO
	 */
	public static function getPropostaBolsaDAO(){
		return new PropostaBolsaMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}


}
?>