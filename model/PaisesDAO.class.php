<?php

class PaisesDAO extends Conexao {
	function __construct() {
		try	{
			parent::__construct();
		} catch (PDOException  $e) {
			print $e->getMessage();
		}
	}

	function listar($filtro=null,$pagina=1,$resultados=null) {
		$inicio = $resultados!=null?$resultados*($pagina-1):0;
		$sql_limit = $resultados!=null?"LIMIT {$inicio},{$resultados}":'';
		$sql_filtro=$filtro!=null?"WHERE paisNome LIKE '{$filtro}%'":'';
		try {
			$sql = $this->conexao->query("SELECT * FROM pais {$sql_filtro} $sql_limit");
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		} catch(SQLException $e){
			echo $e->getMessage();
		}
	}

	function rowCount($filtro=null){
		$sql_filtro=$filtro!=null?"WHERE paisNome LIKE '{$filtro}%'":'';
		try {
			$sql = $this->conexao->query("SELECT * FROM pais {$sql_filtro}");
			return $sql->rowCount();
		} catch(SQLException $e){
			echo $e->getMessage();
		}
	}
}

?>