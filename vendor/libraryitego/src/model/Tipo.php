<?php 

namespace Controller\model;
use Controller\model\Table;


	class Tipo extends Table{
		
		private $idtipo;
		private $nome_tipo;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdtipo(){
			return $this->idtipo;
		}
		public function getNome_tipo(){
			return $this->nome_tipo;
		}

		public function setIdtipo($idtipo)
		{
			$this->idtipo = $idtipo;
		}
		public function setNome_tipo($nome_tipo){
			$this->nome_tipo = $nome_tipo;
		}




	}

 ?>
 