<?php 

namespace Controller\model;
use Controller\model\{Table,Usuario};


	class Senha extends Table{
		
		private $idsenha;
		private $senha_usuario;
		private $data_cadastro;
		private $usuario_idusuario;

		function __construct()
		{
			$this->usuario_idusuario = new Usuario();
		}

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdsenha(){
			return $this->idsenha;
		}
		public function getSenha_usuario(){
			return $this->senha_usuario;
		}
		public function getUsuario_idusuario(): Usuario{
			return $this->usuario_idusuario;
		}
		public function getData_cadastro(){
			return $this->data_cadastro;
		}

		public function setIdsenha($idsenha)
		{
			$this->idsenha = $idsenha;
		}
		public function setUsuario_idusuario(Usuario $usuario){
			$this->usuario_idusuario = $usuario;
		}
		public function setSenha_usuario($senha){
			$this->senha_usuario = $senha;
		}
		public function setData_cadastro($data_cadastro)
		{
			$this->data_cadastro = $data_cadastro;
		}



	}

 ?>
 