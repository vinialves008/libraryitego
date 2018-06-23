<?php 

namespace Controller\model;
use Controller\model\{Table, Valor, Emprestimo};


	class Multa extends Table{
		
		private $idmulta;
		private $situacao;
		private $valor_idvalor;
		private $emprestimo_idemprestimo;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdmulta(){
			return $this->idmulta;
		}
		public function getSituacao(){
			return $this->situacao;
		}
		public function getValor_idvalor():Valor{
			return $this->valor_idvalor;
		}
		public function getEmprestimo_idemprestimo():Emprestimo{
			return $this->emprestimo_idemprestimo;
		}

		public function setIdmulta($idmulta)
		{
			$this->idmulta = $idmulta;
		}
		public function setSituacao($situacao){
			$this->situacao = $situacao;
		}
		public function setValor_idvalor(Valor $idvalor)
		{
			$this->valor_idvalor = $idvalor;
		}
		public function setEmprestimo_idemprestimo(Emprestimo $emprestimo){
			$this->emprestimo_idemprestimo = $emprestimo;
		}




	}

 ?>
 