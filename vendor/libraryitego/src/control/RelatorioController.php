<?php 
namespace Controller\control;
use Controller\dao\RelatorioSql;
	/**
	* 
	*/
	class RelatorioController extends Controller
	{
		
		public function select($table, $bool = false, $join = array(),$count = false, $condicao = array()){

			$crud = new RelatorioSql();
			return $crud->select($table, $bool, $join,$count,$condicao);
		}
	}
 ?>