<?php 
namespace Controller\control;

use Controller\dao\CrudSql;

//use Controller\dao\UsuarioSql;

/**
* 
*/
class CrudController extends Controller
{

	public static function select($table, $bool = false, $join = array())
	{
		$crud = new CrudSql();
		return $crud->select($table, $bool, $join);
	}
	public static function insert($table)
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->insert($table);
	}
	public static function delete($table)
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->delete($table);
	}
	public static function update($table)
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->update($table);
	}
	public function read($table, $busca = array('inicio' => 0, 'limite' => 10, 'ordem' => ''), $join = array(), $where = array())
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->read($table,$busca, $join, $where);
	}
	
}
	
?>
