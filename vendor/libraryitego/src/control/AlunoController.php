<?php 
namespace Controller\control;

use Controller\dao\CrudSql;
//use Controller\dao\UsuarioSql;

/**
* 
*/
class AlunoController extends CrudController
{
	public static function insert($aluno)
	{
		
		return parent::insert($aluno);	
	}
}
	
?>
