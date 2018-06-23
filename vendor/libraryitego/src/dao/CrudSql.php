<?php 
namespace Controller\dao;

//use Controller\dao\Sql;
use \Controller\util\Retorno;
use \PDO;
/**
* 
*/
class CrudSql extends Sql
{
	/*public function insert($table)
	{
		
		$q = "INSERT INTO ".$table->getTableName()."(".$table->getColumnNamesNotNull().") values(".$table->getToArrayKeyValuesNotNull().");";
		//echo $q;
		$this->query($q, $table->getToArrayValuesNotNull());

	}*/
	
	public function delete($table)
	{
		$q = "DELETE FROM ".$table->getTableName()." where ".$table->getTableKeyName()." = :ID;";

		$values = array(

			':ID' => $table->getPK()
		);
				
			$this->query($q, $values);
			
		//$q2 = "SELECT * FROM ".$table->getTableName()." where ".$table->getTableKeyName()." = :ID;";

			$res = $this->select($table,true);
		
			if (empty($res)) {
				$ret = new Retorno(true, "O registro foi excluído com sucesso!");
				return $ret ;
			}
			else{
				$ret = new Retorno(false, "Erro ao excluir registro da tabela!");
				return $ret;
			}
					
			
		
	}
	public function select($table, $bool = false, $join = array())
	{
		$nome_das_colunas = $table->getColumnNames();
		
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$nome_das_colunas .= "," . $value->getColumnNames();
			}
		}


		$q = "SELECT ".$nome_das_colunas." FROM ". $table->getTableName();
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$q .= " inner join ". $value->getTableName(). " on ". $table->getTableName().".". $value->getTableName()."_". $value->getTableKeyName()." = ". $value->getTableName().".". $value->getTableKeyName();
			}
		}
		if ($bool) {
			$q .= " WHERE ".$table->getTableKeyName(). " = ".$table->getPK();
		}	
		
		$res = $this->query($q);
		
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	/*public function update($table)
	{
		$q = "UPDATE ".$table->getTableName() ." SET ".$table->getUpdateSetValuesNotNull($table)." WHERE ".$table->getTableKeyName(). " = ".$table->getPK().";";

		$arrayupdate = $table->getToArrayUpdateValuesNotNull($table);
		//print_r($arrayupdate);
		$this->query($q, $arrayupdate);
	}*/

}


?>