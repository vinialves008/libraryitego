<?php 

namespace Controller\model;
use Controller\model\Table;


	class Formacao extends Table{
		
		private $idformacao;
		private $nome_formacao;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdformacao(){
			return $this->idformacao;
		}
		public function getNome_formacao(){
			return $this->nome_formacao;
		}

		public function setIdformacao($idformacao)
		{
			$this->idformacao = $idformacao;
		}
		public function setNome_formacao($nome_formacao){
			$this->nome_formacao = $nome_formacao;
		}




	}

 ?>
 