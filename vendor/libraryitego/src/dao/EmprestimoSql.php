<?php 
namespace Controller\dao;
/**
* 
*/
class EmprestimoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_emprestimo_insert(:PATRIMONIO, :USUARIO);";
			$values = array(
				':PATRIMONIO' => $table->getPatrimonio_idpatrimonio()->getIdpatrimonio(),
				':USUARIO' => $table->getUsuario_idusuario()->getIdusuario()
			);
			
			return $this->executeSql($q, $values);
		}

	public function update($table)
	{
		$q = "CALL sp_devolucao_emprestimo_update(:ID);";
		$values = array(
			':ID'=> $table->getIdemprestimo()
			
		);
		
		return $this->executeSql($q, $values);
	}	

	public function getDataToCpfUser($cpf)
		{
			//$q = "CALL sp_usuario_getidtocpf( :CPF);";
			$q = "select idusuario, cpf, nome_usuario, dtnasc from usuario 
   				  where cpf = :CPF ;";
			 $values = array(

			 	':CPF' => $cpf
			 );
			 return $this->executeSql($q, $values);

		}	

	public function getDataToIdPatrimonio($idpatrimonio)
		{
			$q = "select idpatrimonio, nome_livro, nome_editora from patrimonio
			inner join livro on patrimonio.livro_idlivro = livro.idlivro 
			inner join editora on livro.editora_ideditora = editora.ideditora 
   			where patrimonio.idpatrimonio = :IDPATRIMONIO ;";
			 $values = array(

			 	':IDPATRIMONIO' => $idpatrimonio
			 );
			 return $this->executeSql($q, $values);
		}	

	public function getQtdeLivros($idusuario)
	{
		$q = "select count(*) from emprestimo where usuario_idusuario = :ID and (data_devolucao = '' or data_devolucao is null);";

		$values = array(
			':ID' => $idusuario
		);
		return $this->executeSql($q,$values);
	}	

	public function getMultasAtivas($idusuario)
	{
		$q = 	"select count(*) from multa inner join emprestimo 
				on multa.emprestimo_idemprestimo = emprestimo.idemprestimo
				where emprestimo.usuario_idusuario = :ID and multa.situacao = true;";
		
		$values = array(

			':ID' => $idusuario
		);
		return $this->executeSql($q,$values);
	}

	public function isAluno($idusuario)
	{
		$q = "select idaluno from aluno where usuario_idusuario = :ID;";

		$values = array(

			':ID' => $idusuario
		);

		$res = $this->executeSql($q,$values);

		if ($res === null || $res != 0) {
			return true;
		}
		else{
			return false;
		}

	}

	public function getTurmasAtivas($idusuario)
	{
		$q = "select count(*) from turma_has_aluno 
				inner join turma on turma_has_aluno.turma_idturma = turma.idturma
				inner join aluno on turma_has_aluno.aluno_idaluno = aluno.idaluno 
				where aluno.usuario_idusuario = :ID 
				and turma.data_inicio <= now() and turma.data_termino >= now();";

		$values = array(

			':ID' => $idusuario
		);

		return $this->executeSql($q,$values);
	}
	public function getDataToEmprestimosAtivos($usuario){

		$q = "select * from emprestimo 
		inner join patrimonio on emprestimo.patrimonio_idpatrimonio = patrimonio.idpatrimonio
		inner join livro on patrimonio.livro_idlivro = livro.idlivro
		inner join usuario on emprestimo.usuario_idusuario = usuario.idusuario
		where (data_devolucao is null or data_devolucao = '')and usuario_idusuario = :ID;";

		$values = array(

			':ID' => $usuario->getIdusuario()
		);

		return $this->executeSql($q,$values);
	}

	

}


 ?>