<?php 

namespace Controller\control;

use Controller\dao\CrudSql;
//use Controller\dao\UsuarioSql;

/**
* 
*/
class FuncionarioController extends CrudController
{

	public static function insert($table)
	{
		
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->insert($table);
	}
	
}
?>