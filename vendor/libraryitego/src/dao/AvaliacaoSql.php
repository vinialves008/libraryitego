<?php 
namespace Controller\dao;

/**
* 
*/
class AvaliacaoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_avaliacao_insert(:COMENTARIO, :EMPRESTIMO);";
			$values = array(
				':COMENTARIO' => $table->getComentario(),
				':EMPRESTIMO' => $table->getEmprestimo_idemprestimo()->getIdemprestimo()
			);
			
			return $this->executeSql($q, $values);
		}	
}

 ?>