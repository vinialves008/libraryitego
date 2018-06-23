<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @get_insert=btc
 * @post_insert=btc
 * @get_update=btc
 * @post_update=btc
 * @get_delete=btc
 * @post_delete=btc
 * @listall=btc
 */
class CargoRotas 
{

	
	public function get_insert()
	{
		
		$rain = new RainTpl();
		$rain->setConteudo(array("cadastro_cargo_funcionario"), array(
			'action' => 'insert',
			'title' => 'Cadastrar'

		));	
	}

	
	public function post_insert()
	{
		$rain = new RainTpl();
		$cargo = new Cargo();
		$cargo = $rain->setTable($_POST, $cargo);
		$crud = new CargoController();
		$res = $crud->insert($cargo);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem" ,"cadastro_cargo_funcionario" ),array(
				'mensagem' => "Cargo cadastrado com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar cargo",
				'resultado' => "danger"
			) );
			
		}
	}

	
	public function get_update($idcargo)
	{
		$rain = new RainTpl();
		$crud = new CrudController();
		$cargo = new Cargo();
		$cargo->setIdcargo($idcargo);
		$selectCargo = $crud->select($cargo, true);
		$cargo->setNome_cargo($selectCargo[0]['nome_cargo']);
		$cargo->setNivel($selectCargo[0]['nivel']);
		$rain->setConteudo(array("edit_cadastro_cargo_funcionario"),
			array(
				'nome_cargo' => $cargo->getNome_cargo(),
				'nivel' => $cargo->getNivel(),
				'idcargo' => $cargo->getIdcargo(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$rain = new RainTpl();
		$cargo = new Cargo();
		$cargo = $rain->setTable($_POST, $cargo);
		$crud = new CargoController();
		$res = $crud->update($cargo);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Cargo editado com sucesso!",
				'resultado' => "success"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao editar cargo",
				'resultado' => "danger"
			) );
			
		}
	}

	
	public function listall($inicio,$limite)
	{
		
		$rain = new RainTpl();
		$crud = new CargoController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'idcargo'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Cargo(),$list);
		

		$rain->setConteudo(array("read_cargo", "pagination"), array(

			'resultcargo' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'cargo'
		));
	}

	
	public function post_delete(){

		$rain = new RainTpl();
		$crud = new CargoController();

		$cargo = new Cargo();
		$cargo = $rain->setTable($_POST, $cargo);
		
		$res = $crud->delete($cargo);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "cargo",
				'linklista' => "/crud/funcionario/cargo/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "cargo",
				'linklista' => "/crud/funcionario/cargo/0/10/read"
			) );
			
		}
	}
	
	
	public function get_delete($idcargo){

		$rain = new RainTpl();
		$crud = new CargoController();
		$cargo = new Cargo();
		
		$cargo->setIdcargo($idcargo);
		$selectautor = $crud->select($cargo, true);
		
		if (!empty($selectautor)) {
			
			$rain->setConteudo(array("delete_cargo","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_cargo' => $selectautor[0]['nome_cargo'],
				'idcargo' => $selectautor[0]['idcargo']
				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Cargo!",
			'resultado' => "danger"

		));

	}			
}

 ?>