<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @post_insert=btc
 * @end_emprestimo=btc
 * @get_search_emprestimo_for_usuario=btc
 * @post_search_emprestimo_for_usuario=btc
 * @get_search_emprestimo_for_usuario_patrimonio=btc
 * @post_search_emprestimo_for_usuario_patrimonio=btc
 * @disabled_emprestimo=btc
 * @search_usuario_emprestimo_disabled=btc
 * @disabled_all_emprestimo=btc
 */
class EmprestimoRotas 
{
	public function list()
	{
		# code...
	}
	
	public function post_insert()
	{
		$rain = new RainTpl();
		$crud = new EmprestimoController();
		$emprestimo = new Emprestimo();
		$usuario = new Usuario();
		$patrimonio = new Patrimonio();

		$usuario->setIdusuario($_POST['idusuario']);
		$selectUsuario = $crud->select($usuario,true);

		if (!empty($selectUsuario)) {
		
			$i = 0;
			$res = array();

			for ($i=1; $i<=2 ; $i++) { 
				 
				if (isset($_POST["idpatrimonio$i"])) {
					
					$patrimonio->setIdpatrimonio($_POST["idpatrimonio$i"]);
					
					$emprestimo->setUsuario_idusuario($usuario);
					$emprestimo->setPatrimonio_idpatrimonio($patrimonio);

					$res[$i] = $crud->insert($emprestimo);
				}
			}
			
			switch (count($res[1])) {
				case 1:
					if (isset($res[2])) {
						
						switch (count($res[2])) {
							case 1:
								$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Empréstimo do livro ".$res[1][0]['nome_livro']." e do livro ".$res[2][0]['nome_livro']." foram realizados com sucesso para ".$res[1][0]['nome_usuario'].". Comprovante enviado para o email ".$res[1][0]['email']."." ,
									'resultado' => "success"
								) );
								break;

							case 0:
								$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Empréstimo do livro ".$res[1][0]['nome_livro']." funcionou!!! Falha ao realizar empréstimo do patrimônio ".$_POST['idpatrimonio2']." para ".$res[1][0]['nome_usuario'].". Comprovante do empréstimo do livro ".$res[1][0]['nome_livro']." enviado para o email ".$res[1][0]['email']."." ,
									'resultado' => "warning"
								) );
								break;
							
							default:
								$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Erro no sistema! Consultar lista de empréstimo." ,
									'resultado' => "danger"
								) );
								break;
						}
					}

					else{

						$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Empréstimo do livro ".$res[1][0]['nome_livro']." foi realizado com sucesso para ".$res[1][0]['nome_usuario'].". Comprovante enviado para o email ".$res[1][0]['email']."." ,
									'resultado' => "success"
						) );
					}
					
					break;
				case 0:

				if (isset($res[2])) {
						
						switch (count($res[2])) {
							case 1:

							$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Empréstimo do livro ".$res[2][0]['nome_livro']." funcionou!!! Falha ao realizar empréstimo do patrimônio ".$_POST['idpatrimonio1']." para ".$res[2][0]['nome_usuario'].". Comprovante do empréstimo do livro ".$res[2][0]['nome_livro']." enviado para o email ".$res[2][0]['email']."." ,
									'resultado' => "warning"
								) );
								break;

							case 0:
							$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Erro ao realizar os empréstimos dos patrimônios ".$_POST['idpatrimonio1']." e ".$_POST['idpatrimonio2']."." ,
									'resultado' => "danger"
								) );
								break;
							
							default:
							$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Erro no sistema! Consultar lista de empréstimo.",
									'resultado' => "danger"
								) );
								break;
						}
					}

					else{
						$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Erro ao cadastrar empréstimo do patrimonio ".$_POST['idpatrimonio1'],
									'resultado' => "danger"
								) );
					}
					

					break;
				
				default:
					$rain->setConteudo(array("mensagem"),array(
									'mensagem' => "Erro no sistema! Consultar lista de empréstimo.",
									'resultado' => "danger"
								) );
					break;
			}
		}
		else{

		}


	}

	
	public static function end_emprestimo($idemprestimo){

		$emprestimo = new Emprestimo();
		$crud = new EmprestimoController();
		$emprestimo->setIdemprestimo($idemprestimo);

		return $crud->update($emprestimo);

	}

	
	public function get_search_emprestimo_for_usuario()
	{
		$rain = new RainTpl();
		$rain->setConteudo(array("busca_usuario_emprestimo", "scripts_cadastro_usuario"),array(
			'action'=> "/crud/emprestimo/usuario/search"
		));	
	}

	
	public function post_search_emprestimo_for_usuario(){

		$rain = new RainTpl();
		$crud = new EmprestimoController();
		$res = $crud->getDataToCpfUser($_POST['cpf']);
		if (!empty($res)) {
			$status = $crud->getStatusEmprestimo($res[0]['idusuario']);
			$rain->setConteudo(array("resultado_usuario_emprestimo"), array(

				'cpf' => $res[0]['cpf'],
				'nome_usuario' => $res[0]['nome_usuario'],
				'dtnasc' => Convert::date_to_string($res[0]['dtnasc']),
				'status' => $status[0],
				'livrodisp' => $status[1],
				'idusuario' => $res[0]['idusuario']
				
				
			));
		}
		else{
			$rain->setConteudo(array("mensagem", "busca_usuario_emprestimo", "scripts_cadastro_usuario"), array(
				'mensagem' => 'Erro ao buscar resultado',
				'resultado' => 'danger'

	
			));

		}

	}

	
	public function get_search_emprestimo_for_usuario_patrimonio($idusuario){
		$rain = new RainTpl();
		$crud = new CrudController();
		$usuario = new Usuario();

		$usuario->setIdusuario($idusuario);
		$selectUsuario = $crud->select($usuario, true);
		$rain->setConteudo(array("busca_patrimonio_emprestimo"), array(

			'idusuario' => $selectUsuario[0]['idusuario'],
			'nome_usuario' => $selectUsuario[0]['nome_usuario']
		));	
	}

	
	public function post_search_emprestimo_for_usuario_patrimonio(){
		$rain = new RainTpl();
		$crud = new EmprestimoController();
		$patri = new Patrimonio();
		$usuario = new Usuario();
		$livro = new Livro();

		$usuario->setIdusuario($_POST['idusuario']);
		$selectUsuario = $crud->select($usuario, true);

		$patrimonio = array($_POST['idpatrimonio1'], $_POST['idpatrimonio2']);
		$res = array();
		foreach ($patrimonio as $key => $value) {
			if (!empty($value)) {
			
				$patri->setIdpatrimonio($value);
				$ret = $crud->select($patri, true, array($livro)); 
				
				$livro->setIdlivro($ret[0]['idlivro']);
				$selectLivro = $crud->select($livro, true, array(new Area(), new Editora()));
				
				$resultado = array_merge($ret[0], $selectLivro[0]);
				$res[$key] = $resultado;
						
			}
			
		}
		
		foreach ($res as $key => $value) {
			if ($res[$key]['patrimonio_status'] === "0") {
				unset($res[$key]);
			}
		}
		$rain->setConteudo(array("resultado_patrimonio_emprestimo"), array(

			'idusuario' => $selectUsuario[0]['idusuario'],
			'nome_usuario' => $selectUsuario[0]['nome_usuario'],
			'patrimonio' => $res,
			'idusuario' => $selectUsuario[0]['idusuario']

		));
	}

	
	public function disabled_emprestimo($idemprestimo){

		$rain = new RainTpl();

		$res = \ViewController\view\routers\EmprestimoRotas::end_emprestimo($idemprestimo);
		if (!empty($res)) {
			foreach ($res as $keys => $values) {
				foreach ($values as $key => $value) {
				if ($key == 'data_devolucao' || $key == 'data_emprestimo') {
					
					$res["$keys"]["$key"] = Convert::date_to_string($value);
				}
			}
			}
			$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo","scripts_cadastro_usuario"),array(
				'mensagem' => "Empréstimo encerrado com sucesso!",
				'resultado' => "success",
				'nome_usuario' => $res[0]['nome_usuario'],
				'cpf' => $res[0]['cpf'],
				'data_devolucao' => $res[0]['data_devolucao'],
				'emprestimo' => $res
			) );
		}

		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao encerrar empréstimo",
				'resultado' => "danger"
			) );
		}
	}

	
	public function search_usuario_emprestimo_disabled(){

		$usuario = new Usuario();
		$rain = new RainTpl();
		$crud = new EmprestimoController();

		$selectUsuario = $crud->getDataToCpfUser($_POST['cpf']);
		

		unset($selectUsuario[0]['endereco_idendereco']);
		$usuario = $rain->setTable($selectUsuario[0],$usuario);
		$res = $crud->searchEmprestimosAtivos($usuario);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "resultado_emprestimos_usuario_ativos"), array(
				'mensagem' => "Empréstimos ativos do usuário ".$res[0]['nome_usuario']." e portador do CPF ".$res[0]['cpf'],
				'resultado' => "success",

				'patrimonio' => $res


			));
		
		}else{
			$rain->setConteudo(array("mensagem","busca_usuario_emprestimo", "scripts_cadastro_usuario"),array(
			'action'=> "/crud/emprestimo/usuario/disabled/search",
			'mensagem' => "Não foram encontrados empréstimos para este CPF ".$_POST['cpf'],
			'resultado' => "danger"
		));
		}		
	}
	
	
	public function disabled_all_emprestimo(){

		$rain = new RainTpl();
		$crud = new EmprestimoController();
		$Emprestimo = new Emprestimo();

		$res = array();
		foreach ($_POST as $key => $value){ 
					
				array_push($res, \ViewController\view\routers\EmprestimoRotas::end_emprestimo($value));
		}
		foreach ($res as $key => $value) {
			if (empty($value)) {
				unset($res["$key"]);
			}
		}
		if (count($res) == count($_POST)) {
			foreach ($res as $keys => $values) {
				foreach ($values as $chave => $valor) {
					foreach ($valor as $key => $value) {
						if ($key == 'data_devolucao' || $key == 'data_emprestimo') {
							
							$res["$keys"]["$chave"]["$key"] = Convert::date_to_string($value);
						}
					}
				}
			}
			$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo_all","scripts_cadastro_usuario"),array(
				'mensagem' => "Empréstimos encerrados com sucesso!",
				'resultado' => "success",
				'nome_usuario' => $res[0][0]['nome_usuario'],
				'cpf' => $res[0][0]['cpf'],
				'data_devolucao' => $res[0][0]['data_devolucao'],
				'emprestimo' => $res
			) );
		}
		else{

			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao encerrar todos os empréstimos. Verifique a lista dos empréstimos!",
				'resultado' => "danger"
				
			) );

		}
	}


}

 ?>