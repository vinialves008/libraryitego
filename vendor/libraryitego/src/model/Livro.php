<?php
namespace Controller\model;
use Controller\model\{Table,Area,Editora};
	/**
	create table livro( idlivro int AUTO_INCREMENT not null primary key, 
	isbn text not null, 
	titulo text not null, 
	autor text not null, 
	editora text not null )
	*/
	class Livro extends Table{
		
		private $idlivro;
		private $isbn;
		private $nome_livro;
		private $ano_livro;
		private $edicao;
		private $assunto;
		private $livro_status;
		private $area_idarea;
		private $editora_ideditora;

		function __construct()
		{
			$this->editora_ideditora = new Editora();
			$this->area_idarea = new Area();

		}

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdlivro(){
			return $this->idlivro;
		}
		public function getIsbn(){
			return $this->isbn;
		}
		public function getNome_livro(){
			return $this->nome_livro;
		}
		public function getAno_livro(){
			return $this->ano_livro;
		}
		public function getEdicao(){
			return $this->edicao;
		}
		public function getAssunto(){
			return $this->assunto;
		}
		public function getLivro_status(){
			return $this->livro_status;
		}
		public function getArea_idarea(): Area{
			return $this->area_idarea;
		}
		public function getEditora_ideditora(): Editora{
			return $this->editora_ideditora;
		}


		public function setIdlivro($idlivro)
		{
			$this->idlivro = $idlivro;
		}
		public function setIsbn($isbn){
			$this->isbn = $isbn;
		}
		public function setNome_livro($nome_livro){
			$this->nome_livro = $nome_livro;
		}
		public function setAno_livro($ano_livro){
			$this->ano_livro = $ano_livro;
		}
		public function setEdicao($edicao){
			$this->edicao = $edicao;
		}
		public function setAssunto($assunto){
			$this->assunto = $assunto;
		}
		public function setLivro_status($livro_status){
			$this->livro_status = $livro_status;
		}
		public function setArea_idarea(Area $area_idarea){
			$this->area_idarea = $area_idarea;
		}
		public function setEditora_ideditora(Editora $editora_ideditora){
			$this->editora_ideditora = $editora_ideditora;
		}
		
	}
?>