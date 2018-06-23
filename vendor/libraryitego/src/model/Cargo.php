<?php 

namespace Controller\model;
use Controller\model\Table;


	class Cargo extends Table{
		
		private $idcargo;
		private $nome_cargo;
		private $nivel;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdcargo(){
			return $this->idcargo;
		}
		public function getNome_cargo(){
			return $this->nome_cargo;
		}
		public function getNivel(){
			return $this->nivel;
		}

		public function setIdcargo($idcargo)
		{
			$this->idcargo = $idcargo;
		}
		public function setNome_cargo($nome_cargo){
			$this->nome_cargo = $nome_cargo;
		}
		public function setNivel($nivel){
			$this->nivel = $nivel;
		}




	}

 ?>
 