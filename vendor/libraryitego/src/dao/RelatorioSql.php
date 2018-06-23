<?php 
namespace Controller\dao;
	/**
	* 
	*/
	class RelatorioSql extends Sql
	{
		public function select($table, $bool = false, $join = array(),$count = false,$condicao = array()){

			$colunas = "";
			$q = "SELECT  ";

			if ($count) {
				$colunas = " COUNT(*) ";

			}
			else{

				$colunas =" ".$table->getColumnNames()." ";
			}
			$q .= $colunas." FROM ".$table->getTableName()." ";

			if (!empty($join)) {
				$q .= $this->setJoin($join);
			}
			if ($bool) {
				$q .= " WHERE ";
				if (empty($condicao)) {
					$q .= $table->getTableKeyName(). " = '".$table->getPK()."'";
				}
				else{
					foreach ($condicao as $key => $value) {
						$q .= $key." = '".$value."';";
					}
				}
			}
			var_dump($q);
			return $this->executeSql($q);


		}
		private function setJoin($variables = array(), $res = "")
		{	

			foreach ($variables as $keys => $values) {
				if (is_array($values)) {
					foreach ($values as $key => $value) {
						$res .= " INNER JOIN ".$key." on ".$keys.".".$key."_id".$key." = ".$key.".id".$key." ";
					}
					$res .= $this->setJoin($values,$res);
				}
				return $res;
			}
		}
	
	}
 ?>