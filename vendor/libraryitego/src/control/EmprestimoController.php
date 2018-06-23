<?php 
namespace Controller\control;

use \Controller\model\{Emprestimo, Usuario};
use \Controller\dao\EmprestimoSql;
/**
* 
*/
class EmprestimoController extends CrudController
{
	
	public static function insert($table)
	{
		return parent::insert($table);
	}
	public function getDataToCpfUser($cpf)
	{
		$crud = new EmprestimoSql();
		return $crud->getDataToCpfUser($cpf);
	}
	public function getDataToIdPatrimonio($idpatrimonio)
	{
		$crud = new EmprestimoSql();
		return $crud->getDataToIdPatrimonio($idpatrimonio);
	}
	public function  searchEmprestimosAtivos($usuario){
		$crud = new EmprestimoSql();
		
		return $crud->getDataToEmprestimosAtivos($usuario);
	}
	
	public function getStatusEmprestimo($idusuario)
	{
		$usuario = new Usuario();
		
		$usuario->setIdusuario($idusuario);
		$status = 0;
		$sql = new EmprestimoSql();
		
		$qtdelivros = $sql->getQtdeLivros($idusuario);
		$multa = $sql->getMultasAtivas($idusuario);
		$statususuario = $this->select($usuario, true);
		
		$isaluno = $sql->isAluno($idusuario);
		if ($isaluno) {
			$isaluno = $this->verificaTurmasAtivas($idusuario);
			
		}
		
		if ($qtdelivros[0]['count(*)'] >= 2 || $multa[0]['count(*)'] === true || $isaluno === true) {
			
			$status = 0;
		}
		else{
			$status = 1;
		}
		$ret = array($status,$qtdelivros[0]['count(*)']);
		return $ret;
	}

	private function verificaTurmasAtivas($idusuario){
		$sql = new EmprestimoSql();
		$cursos = $sql->getTurmasAtivas($idusuario);

		if ($cursos >= 1) {
			return false;
		}
		else
		{
			return true;
		}
	}
}

 ?>