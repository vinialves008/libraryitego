<?php
namespace Controller\model;
use Controller\model\{Table , Endereco};
use Controller\util\Convert;
	/**
	* 
	*/
	class Usuario extends Table{
		
		private $idusuario;
		private $nome_usuario;
		private $cpf;
		private $dtnasc;
		private $email;
		private $telefone_fixo;
		private $telefone_celular;
		private $usuario_status;
		private $first_register;
		private $last_activation;
		private $endereco_idendereco;

		function __construct()
		{
			$this->nome_usuario = "";
			$this->endereco_idendereco = new Endereco();
		}


		public function getObject()
		{
			return get_object_vars($this);
		}

		public function getIdusuario(){
			return $this->idusuario;
		}
		public function getNome_usuario(){
			return $this->nome_usuario;
		}
		public function getCpf(){
			return $this->cpf;
		}
		public function getDtnasc(){
			return $this->dtnasc;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getTelefone_fixo(){
			return $this->telefone_fixo;
		}
		public function getTelefone_celular(){
			return $this->telefone_celular;
		}
		public function getUsuario_status(){
			return $this->usuario_status;
		}
		public function getFirst_register(){
			return $this->first_register;
		}
		public function getLast_activation(){
			return $this->last_activation;
		}
		public function getEndereco_idendereco(): Endereco{
			return $this->endereco_idendereco;
		}


		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
		}
		public function setNome_usuario($nome_usuario){
			$this->nome_usuario = $nome_usuario;
		}
		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
		public function setDtnasc($dtnasc){
			if (gettype($dtnasc) === "string") {
				$dtnasc = Convert::string_to_date($dtnasc);
			}
			$this->dtnasc = $dtnasc;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setTelefone_fixo($telefone_fixo){
			$this->telefone_fixo = $telefone_fixo;
		}
		public function setTelefone_celular($telefone_celular){
			$this->telefone_celular = $telefone_celular;
		}
		public function setUsuario_status($usuario_status){
			$this->usuario_status = $usuario_status;
		}
		public function setFirst_register($first_register){
			$this->first_register = $first_register;
		}
		public function setLast_activation($last_activation){
			$this->last_activation = $last_activation;
		}
		public function setEndereco_idendereco(Endereco $endereco_idendereco)
		{
		
				$this->endereco_idendereco = $endereco_idendereco;
			
		}
	}
?>