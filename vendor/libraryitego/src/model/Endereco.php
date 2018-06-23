<?php
namespace Controller\model;
use Controller\model\Table;


	class Endereco extends Table{
		
		private $idendereco;
		private $rua;
		private $complemento;
		private $numero;
		private $bairro;
		private $cep;
		private $cidade;
		private $estado;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdendereco(){
			return $this->idendereco;
		}
		public function getRua(){
			return $this->rua;
		}
		public function getComplemento(){
			return $this->complemento;
		}
		public function getNumero(){
			return $this->numero;
		}
		public function getBairro(){
			return $this->bairro;
		}
		public function getCep(){
			return $this->cep;
		}
		public function getCidade(){
			return $this->cidade;
		}
		public function getEstado(){
			return $this->estado;
		}


		public function setIdendereco($idendereco)
		{
			$this->idendereco = $idendereco;
		}
		public function setRua($rua){
			$this->rua = $rua;
		}
		public function setComplemento($complemento){
			$this->complemento = $complemento;
		}
		public function setNumero($numero){
			$this->numero = $numero;
		}
		public function setBairro($bairro){
			$this->bairro = $bairro;
		}
		public function setCep($cep){
			$this->cep = $cep;
		}
		public function setCidade($cidade){
			$this->cidade = $cidade;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}
	}
?>