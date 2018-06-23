<?php 

namespace Controller\model;
use Controller\model\{Table,Livro,Autor};


	class Livro_has_Autor extends Table{
		
		private $livro_idlivro;
		private $autor_idautor;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getLivro_idlivro(): Livro{
			return $this->livro_idlivro;
		}
		public function getAutor_idautor(): Autor{
			return $this->autor_idautor;
		}

		public function setLivro_idlivro(Livro $livro)
		{
			$this->livro_idlivro = $livro;
		}
		public function setAutor_idautor(Autor $autor){
			$this->autor_idautor = $autor;
		}




	}

 ?>
 