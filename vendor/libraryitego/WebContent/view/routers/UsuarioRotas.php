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
 * @post_update_or_insert=btc
 */
class UsuarioRotas 
{
	
	public function get_insert()
	{
		$crud = new CrudController();
		$formacao = new Formacao();
		$cargo = new Cargo();

		$carg = $crud->select($cargo);
		$form = $crud->select($formacao);
		

		$rain = new RainTpl();
		$rain->setConteudo(array("cadastro","scripts_cadastro_usuario"),
			array(
				'formacao' => $form,
				'cargo' => $carg,
				'action' => 'insert',
				'title' => 'Cadastrar'
			) 
		);
	}
	
	
	public function post_update_or_insert($action)
	{
		$tipo = ucfirst($_POST['tipo_usuario']);

		$rain = new RainTpl();
		$class = "Controller\model\\".$tipo;
		$usr = new $class();
		//$usr = new {$class}();
		$usuario = new Usuario();
		$end = new Endereco();
		$senha = new Senha();

		
		$usr = $rain->setTable($_POST, $usr);
		$usuario = $rain->setTable($_POST, $usuario);
		$end = $rain->setTable($_POST, $end);
		$usuario->setEndereco_idendereco($end);
		$senha = $rain->setTable($_POST, $senha);
		
		$usr->setUsuario_idusuario($usuario);

		if (strcmp($_POST['tipo_usuario'], "funcionario") === 0) {
			$formacao = new Formacao();
			$cargo = new Cargo();
			$carg = $rain->setTable($_POST, $cargo);
			$form = $rain->setTable($_POST, $formacao);

			$usr->setFormacao_idformacao($form);
			$usr->setCargo_idcargo($carg);
			
		}

		$classController = "Controller\control\\".$tipo . "Controller";
		$crud = new $classController();
		$res = $crud->{$action}($usr);
	
		if (strcmp($action, "insert") === 0) {	
		
			if (!empty($res)) {
				$usuario->setIdusuario($res[0]['usuario_idusuario']);
				
				$senha->setUsuario_idusuario($usuario);
				$senha->setData_cadastro($res[0]['first_register']);

				$senhaController = new SenhaController();
		
				unset($res);
				$res = $senhaController->insert($senha);
			
				if (!empty($res)) {
					$rain->setConteudo(array("mensagem"),array(
					'mensagem' => "Usuário cadastrado com sucesso",
					'resultado' => "success",
					'title' => 'Cadastrar',
					'action' => 'insert'
			) );
				}
				else{

					$rain->setConteudo(array("mensagem", "cadastro", "scripts_cadastro_usuario"),array(
					'mensagem' => "Erro ao cadastrar Usuário",
					'resultado' => "danger",
					'title' => 'Cadastrar',
					'action' => 'insert'
				));
					
				}
			}else{
					$rain->setConteudo(array("mensagem", "cadastro", "scripts_cadastro_usuario"),array(
					'mensagem' => "Erro ao cadastrar Usuário",
					'resultado' => "danger",
					'title' => 'Cadastrar',
					'action' => 'insert'
				));
			}
		}
		else{
			if (!empty($res)) {
				

				$array_usuario = array(
				
				'idusuario' => $res[0]['idusuario'],
				'nome_usuario' => $res[0]['nome_usuario'],
				'cpf' => $res[0]['cpf'],
				'email' => $res[0]['email'],
				'telefone_fixo' => $res[0]['telefone_fixo'],
				'telefone_celular' => $res[0]['telefone_celular'],
				'dtnasc' => Convert::date_to_string($res[0]['dtnasc']),

				'idendereco' =>$res[0]['idendereco'],
				'rua' => $res[0]['rua'],
				'complemento' => $res[0]['complemento'],
				'numero' => $res[0]['numero'],
				'bairro' =>$res[0]['bairro'],
				'cep' => $res[0]['cep'],
				'cidade' =>$res[0]['cidade'],
				'estado' => $res[0]['estado'],
				
				'action' => 'update',
				'title' => 'Editar'
			);
				if ($tipo === 'Funcionario') {

					$array_usuario_funcionario = array(
						'idfuncionario' => $res[0]['idfuncionario'],
						'formacao' => $crud->select(new Formacao()),
						'idformacao' => $res[0]['formacao_idformacao'],
						'cargo' => $crud->select(new Cargo()),
						'idcargo' => $res[0]['cargo_idcargo']
					);
					$array_usuario_result = array_merge($array_usuario, $array_usuario_funcionario);
				}
				else{
					$array_usuario_aluno = array(
						'idaluno' => $res[0]['idaluno']
						
					);
					$array_usuario_result = array_merge($array_usuario, $array_usuario_aluno);


				}
				$array_usuario_result  = array_merge($array_usuario_result, array(
					'mensagem' => "Usuário editado com sucesso",
					'resultado' => "success",
					'title' => 'Editar',
					'action' => 'update'

				));
				$rain->setConteudo(array("mensagem", "edit_cadastro_".strtolower($tipo), "scripts_cadastro_usuario"), $array_usuario_result);
			}
			else{
				$rain->setConteudo(array("mensagem", "edit_cadastro_".strtolower($tipo), "scripts_cadastro_usuario"),array(
					'mensagem' => "Erro ao editar Usuário",
					'resultado' => "danger",
					'title' => 'Editar',
					'action' => 'update'

				));
			}
		}

	}
}

 ?>