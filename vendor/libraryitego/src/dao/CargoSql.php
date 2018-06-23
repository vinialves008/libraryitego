<?php 
namespace Controller\dao;
/**
* 
*/
class CargoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_cargo_insert(:NOME);";
			$values = array(
				':NOME' => $table->getNome_cargo()
				

			);
			
			return $this->executeSql($q, $values);
		}	
			public function update($table)
		{
		$q = "CALL sp_cargo_update(:ID,:NOME);";
		$values = array(
			':ID'=> $table->getIdcargo(),
			':NOME' => $table->getNome_cargo()
		);
		
		return $this->executeSql($q, $values);
		}		
}

 ?>