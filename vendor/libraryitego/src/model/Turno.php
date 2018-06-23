<?php 
namespace Controller\model;
use Controller\model\Table;

/**
 * 
 */
class Turno extends Table
{
	
	private $idturno;
	private $nome_turno;

	public function getObject()
	{
		return get_object_vars($this);
	}

	public function getIdturno(){
		return $this->idturno;
	}
	public function getNome_turno(){
		return $this->nome_turno;
	}
	
	public function setIdturno($idturno){
		$this->idturno = $idturno;
	}
	public function setNome_turno($nome_turno){
		$this->nome_turno = $nome_turno;
	}
}
 ?>