<?php 

	require_once 'vendor/autoload.php';
	use \Slim\Slim;
	use \ViewController\{RainTpl,RelatorioRainTpl};
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController,RelatorioController};
	use \Controller\util\{Convert, Retorno};



	$app = new Slim();

	//ROTAS TURMA_HAS_ALUNO//
	$app->get("/crud/aluno/:idaluno/matriculas/:inicio/:limite/read", function($idaluno,$inicio,$limite){

		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::list_matricula_aluno($idaluno,$inicio, $limite);
	});

	$app->get("/crud/turma/:idturma/matriculas/:inicio/:limite/read", function($idturma,$inicio,$limite){

		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::list_matricula_turma($idturma,$inicio, $limite);
	});

	$app->get("/crud/matricula/:inicio/:limite/read", function($inicio,$limite){

		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::listall($inicio, $limite);
	});

	$app->get("/crud/turma/aluno/matricula/:idaluno/:idturma/insert",function ($idaluno,$idturma)
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::get_insert($idaluno,$idturma);
	});

	$app->get("/crud/turma/aluno/:matricula/matricula/update",function ($matricula)
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::get_update($matricula);
	});
	$app->get("/crud/turma/aluno/:matricula/matricula/delete",function ($matricula)
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::get_delete($matricula);
	});

	$app->post("/crud/turma/aluno/matricula/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::post_delete();
	});

	$app->post("/crud/turma/aluno/insert",function ()
	{
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::search_post_insert();
	});

	$app->get("/crud/turma/matricula/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		$rain = new RainTpl();
		$rain->setConteudo(array("busca_turma_has_aluno"));
	});

	$app->post("/crud/turma/aluno/matricula/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::post_insert();
	});

	$app->post("/crud/turma/aluno/matricula/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma_has_Aluno');
		\ViewController\view\routers\TurmaHasAlunoRotas::post_update();
	});


	//ROTAS VALOR MULTA//

	$app->get("/crud/multa/valor/:idvalor/update",function ($idvalor)
	{	
		$reflection = new ReflectionClass('\Controller\model\Valor');
		\ViewController\view\routers\ValorRotas::get_update($idvalor);
	});

	$app->get("/crud/multa/valor/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Valor');
		\ViewController\view\routers\ValorRotas::get_insert();
	});

	$app->post("/crud/multa/valor/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Valor');
		\ViewController\view\routers\ValorRotas::post_insert();
	});

	//ROTAS TURMA//

	$app->get("/crud/curso/:idcurso/turmas/:inicio/:limite/read", function($idcurso,$inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::list($idcurso,$inicio, $limite);
	});
	
	$app->get("/crud/curso/turmas/:inicio/:limite/read", function($inicio,$limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::listall($inicio,$limite);
	});

	$app->get("/crud/curso/:idturma/turma/update", function($idturma)
	{
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::get_update($idturma);
	});

	$app->get("/crud/curso/turma/:idturma/delete",function ($idturma)
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::get_delete($idturma);
	});

	$app->post("/crud/curso/turma/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::post_delete();
	});

	$app->post("/crud/curso/turma/update", function()
	{
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::post_update();
	});

	$app->get("/crud/curso/turma/:idcurso/insert",function($idcurso)
	{
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::get_insert($idcurso);
	});

	$app->post("/crud/curso/turma/insert", function()
	{
		$reflection = new ReflectionClass('\Controller\model\Turma');
		\ViewController\view\routers\TurmaRotas::post_insert();
	});

	//ROTAS USUARIO/ALUNO/FUNCIONARIO//

	$app->post("/crud/usuario/:action",function($action)
	{
		$reflection = new ReflectionClass('\Controller\model\Usuario');
		\ViewController\view\routers\UsuarioRotas::post_update_or_insert($action);
	});

	$app->get("/crud/usuario/insert",function()
	{
		$reflection = new ReflectionClass('\Controller\model\Usuario');
		\ViewController\view\routers\UsuarioRotas::get_insert();
	});

	$app->get("/crud/usuario/funcionario/:idfuncionario/update", function ($idfuncionario){
		
		$reflection = new ReflectionClass('\Controller\model\Usuario');
		\ViewController\view\routers\FuncionarioRotas::get_update($idfuncionario);
	});

	$app->get("/crud/usuario/aluno/:idaluno/update",function ($idaluno)
	{	
		$reflection = new ReflectionClass('\Controller\model\Usuario');
		\ViewController\view\routers\AlunoRotas::get_update($idaluno);
	});

	//ROTAS TURNO//

	$app->get("/crud/turma/turno/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::listall($inicio,$limite);
	});

	$app->get("/crud/turma/turno/:idturno/update",function ($idturno)
	{	
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::get_update($idturno);
	});

	$app->get("/crud/turma/turno/:idturno/delete",function ($idturno)
	{	
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::get_delete($idturno);
	});

	$app->post("/crud/turma/turno/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::post_delete();
	});

	$app->post("/crud/turma/turno/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::post_update();
	});

	$app->get("/crud/turma/turno/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::get_insert();
	});

	$app->post("/crud/turma/turno/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Turno');
		\ViewController\view\routers\TurnoRotas::post_insert();
	});

	//ROTAS EDITORA//

	$app->get("/crud/livro/editora/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::listall($inicio,$limite);	
	});

	$app->get("/crud/livro/editora/:ideditora/update",function ($ideditora)
	{	
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::get_update($ideditora);
	});

	$app->get("/crud/livro/editora/:ideditora/delete",function ($ideditora)
	{	
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::get_delete($ideditora);
	});

	$app->post("/crud/livro/editora/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::post_delete();
	});

	$app->post("/crud/livro/editora/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::post_update();	
	});

	$app->get("/crud/livro/editora/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::get_insert();
	});

	$app->post("/crud/livro/editora/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Editora');
		\ViewController\view\routers\EditoraRotas::post_insert();
	});

	//ROTAS ÁREA//	

	$app->get("/crud/livro/area/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/livro/area/:idarea/update",function ($idarea)
	{	
		$reflection = new ReflectionClass('\Controller\model\Area');
		\ViewController\view\routers\AreaRotas::get_update($idarea);
	});

	$app->get("/crud/livro/area/:idarea/delete",function ($idarea)
	{	
		$reflection = new ReflectionClass('\Controller\model\Area');
		\ViewController\view\routers\AreaRotas::get_delete($idarea);
	});

	$app->post("/crud/livro/area/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Area');
		\ViewController\view\routers\AreaRotas::post_delete();
	});

	$app->post("/crud/livro/area/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Area');
		\ViewController\view\routers\AreaRotas::post_update();
	});

	$app->get("/crud/livro/area/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Area');
		\ViewController\view\routers\AreaRotas::get_insert();
	});

	$app->post("/crud/livro/area/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Area');
		\ViewController\view\routers\AreaRotas::post_insert();
	});

	//ROTAS AUTOR//

	$app->get("/crud/livro/autor/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::listall($inicio,$limite);	
	});

	$app->get("/crud/livro/autor/:idautor/update",function ($idautor)
	{	
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::get_update($idautor);
	});

	$app->get("/crud/livro/autor/:idautor/delete",function ($idautor)
	{	
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::get_delete($idautor);
	});

	$app->post("/crud/livro/autor/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::post_delete();
	});

	$app->post("/crud/livro/autor/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::post_update();
	});

	$app->get("/crud/livro/autor/insert", function()
	{
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::get_insert();
	});
	
	$app->post("/crud/livro/autor/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Autor');
		\ViewController\view\routers\AutorRotas::post_insert();
	});

	//ROTAS CARGO//

	$app->get("/crud/funcionario/cargo/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::listall($inicio,$limite);
	});

	$app->get("/crud/funcionario/cargo/:idcargo/update",function ($idcargo)
	{	
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::get_update($idcargo);
	});

	$app->get("/crud/funcionario/cargo/:idcargo/delete",function ($idcargo)
	{	
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::get_delete($idcargo);
	});

	$app->post("/crud/funcionario/cargo/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::post_delete();
	});

	$app->post("/crud/funcionario/cargo/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::post_update();
	});

	$app->get("/crud/funcionario/cargo/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::get_insert();
	});
	$app->post("/crud/funcionario/cargo/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Cargo');
		\ViewController\view\routers\CargoRotas::post_insert();
	});

	//ROTAS FORMACAO//

	$app->get("/crud/funcionario/formacao/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::listall($inicio,$limite);
	});

	$app->get("/crud/funcionario/formacao/:idformacao/update",function ($idformacao)
	{	
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::get_update($idformacao);
	});

	$app->get("/crud/funcionario/formacao/:idformacao/delete",function ($idformacao)
	{	
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::get_delete($idformacao);
	});

	$app->post("/crud/funcionario/formacao/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::post_delete();
	});

	$app->post("/crud/funcionario/formacao/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::post_update();
	});

	$app->get("/crud/funcionario/formacao/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::get_insert();
	});
	$app->post("/crud/funcionario/formacao/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Formacao');
		\ViewController\view\routers\FormacaoRotas::post_insert();
	});

	//ROTAS TIPO//

	$app->get("/crud/curso/tipo/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::listall($inicio, $limite);
	});

	$app->post("/crud/curso/tipo/update", function ()
	{
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::post_update();
	});

	$app->get("/crud/curso/tipo/:idtipo/update", function ($idtipo)
	{
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::get_update($idtipo);
	});

	$app->get("/crud/curso/tipo/:idtipo/delete",function ($idtipo)
	{	
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::get_delete($idtipo);
	});

	$app->post("/crud/curso/tipo/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::post_delete();
	});

	$app->get("/crud/curso/tipo/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::get_insert();
	});

	$app->post("/crud/curso/tipo/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Tipo');
		\ViewController\view\routers\TipoRotas::post_insert();	
	});

	//ROTAS PATRIMONIO//

	$app->get("/crud/livro/:idlivro/patrimonio/:inicio/:limite/read", function($idlivro,$inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::list($idlivro,$inicio,$limite);
	});
	
	$app->get("/crud/livro/patrimonio/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::listall($inicio,$limite);
	});
	
	$app->get("/crud/livro/patrimonio/:idpatrimonio/update", function($idpatrimonio)
	{
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::get_update($idpatrimonio);
	});

	$app->get("/crud/livro/patrimonio/:idlivro/insert",function($idlivro)
	{
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::get_insert($idlivro);
	});

	$app->get("/crud/livro/patrimonio/:idpatrimonio/delete",function ($idpatrimonio)
	{	
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::get_delete($idpatrimonio);
	});

	$app->post("/crud/livro/patrimonio/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::post_delete();
	});

	$app->post("/crud/livro/patrimonio/insert", function()
	{
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::post_insert();
	});

	$app->post("/crud/livro/patrimonio/update", function()
	{
		$reflection = new ReflectionClass('\Controller\model\Patrimonio');
		\ViewController\view\routers\PatrimonioRotas::post_update();
	});

	//ROTAS LIVRO//

	$app->get("/crud/livro/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::listall($inicio,$limite);
	});

	$app->get("/crud/livro/:idlivro/update",function ($idlivro)
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::get_update($idlivro);
	});

	$app->get("/crud/livro/:idlivro/delete",function ($idivro)
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::get_delete($idivro);
	});

	$app->post("/crud/livro/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::post_delete();
	});
	
	$app->get("/crud/livro/search",function()
	{
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\livroRotas::get_search_livro();
	});

	$app->post("/crud/livro/search",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::post_search_livro();
	});

	$app->post("/crud/livro/update",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::post_update();
	});
	
	$app->get("/crud/livro/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::get_insert();
	});

	$app->post("/crud/livro/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro');
		\ViewController\view\routers\LivroRotas::post_insert();
	});

	//ROTAS CURSO//

	$app->get("/crud/curso/:inicio/:limite/read", function($inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::listall($inicio, $limite);
	});

	$app->get("/crud/curso/:idcurso/update",function ($idcurso)
	{	
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::get_update($idcurso);
	});

	$app->get("/crud/curso/:idcurso/delete",function ($idcurso)
	{	
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::get_delete($idcurso);
	});

	$app->post("/crud/curso/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::post_delete();
	});
	
	$app->post("/crud/curso/update", function()
	{
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::post_update();
	});

	$app->get("/crud/curso/search",function ()
	{
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::get_search_curso();
	});

	$app->post("/crud/curso/search",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::post_search_curso();
	});
	
	$app->get("/crud/curso/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::get_insert();
	});

	$app->post("/crud/curso/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Curso');
		\ViewController\view\routers\CursoRotas::post_insert();
	});

	//ROTAS LIVRO_HAS_AUTOR//

	$app->get("/crud/livro/:idlivro/autores/:inicio/:limite/read", function($idlivro,$inicio, $limite)
	{
		$reflection = new ReflectionClass('\Controller\model\Livro_has_Autor');
		\ViewController\view\routers\LivroHasAutorRotas::list($idlivro,$inicio, $limite);
	});

	$app->get("/crud/livro/:idlivro/autor/insert", function($idlivro)
	{
		$reflection = new ReflectionClass('\Controller\model\Livro_has_Autor');
		\ViewController\view\routers\LivroHasAutorRotas::get_insert($idlivro);
	});

	$app->get("/crud/livro/:idlivro/autores/:idautor/delete",function ($idlivro,$idautor)
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro_has_Autor');
		\ViewController\view\routers\LivroHasAutorRotas::get_delete($idlivro,$idautor);
	});

	$app->post("/crud/livro/autores/delete",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro_has_Autor');
		\ViewController\view\routers\LivroHasAutorRotas::post_delete();
	});

	$app->post("/crud/livro/autores/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Livro_has_Autor');
		\ViewController\view\routers\LivroHasAutorRotas::post_insert();
	});

	//ROTAS EMPRÉSTIMO//

	$app->get("/crud/emprestimo/usuario/:idemprestimo/disabled", function ($idemprestimo)
	{
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::disabled_emprestimo($idemprestimo);
	});


	$app->get("/crud/emprestimo/:idusuario/usuario/patrimonio/search",function ($idusuario)
	{	
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::get_search_emprestimo_for_usuario_patrimonio($idusuario);
		
	});

	$app->post("/crud/emprestimo/usuario/disabled/all", function(){

		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::disabled_all_emprestimo();
		
	});

	$app->post("/crud/emprestimo/usuario/patrimonio/search",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::post_search_emprestimo_for_usuario_patrimonio();
	});

	  $app->get("/crud/emprestimo/usuario/disabled/search",function ()
	{	
		$rain = new RainTpl();
		$rain->setConteudo(array("busca_usuario_emprestimo", "scripts_cadastro_usuario"),array(
			'action'=> "/crud/emprestimo/usuario/disabled/search"
		));		
	});

	 $app->post("/crud/emprestimo/usuario/disabled/search",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::search_usuario_emprestimo_disabled();
		
	});

	$app->get("/crud/emprestimo/usuario/search",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::get_search_emprestimo_for_usuario();
	});

	$app->post("/crud/emprestimo/usuario/search",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::post_search_emprestimo_for_usuario();
	});


	$app->post("/crud/emprestimo/insert",function ()
	{	
		$reflection = new ReflectionClass('\Controller\model\Emprestimo');
		\ViewController\view\routers\EmprestimoRotas::post_insert();
	});
	

	
	$app->get("/crud/avaliacao/insert",function ()
	{	
		$rain = new RainTpl();
		$crud = new CrudController();
		$avali = new Avaliacao();
		$avaliacao = $crud->select($avali);
		$emprestimo = new Emprestimo();
		$emprestimo = $crud->select($emprestimo);
		$rain->setConteudo(array("avaliacao"), array(
			'emprestimo' => $emprestimo,
			'action' => 'insert',
			'title' => 'Cadastrar'

			));	
	});

	$app->post("/crud/avaliacao/insert",function ()
	{	
		$rain = new RainTpl();
		$avaliacao =  new Avaliacao();
		$emprestimo = new Emprestimo();
		
		$avaliacao = $rain->setTable($_POST, $avaliacao);
		$emprestimo = $rain->setTable($_POST, $emprestimo);
		
		$avaliacao->setEmprestimo_idemprestimo($emprestimo);

		$crud = new AvaliacaoController();
		$res = $crud->insert($avaliacao);


		if (!empty($res)) {
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Avaliação realizada com sucesso!",
				'resultado' => "success"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao realizar avaliação",
				'resultado' => "danger"
			) );
			
		}

	});


	$app->get("/",function ()
	{	
		session_start();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("index"));	
	});

	$app->get("/pdf",function ()
	{
	 $data = array(
	 	'turma_has_aluno' => array(
	 		'aluno' => array(
	 			'usuario' => array(
	 				'endereco' => array()
	 			)
	 		),
	 		'turma' => array(
	 			'curso' => array(
	 				'tipo' => array()
	 			),
	 			'turno' => array()
	 		)
	 	)

	 );	

	 $relatorio = new RelatorioController();
	 $res = $relatorio->select(new Turma_has_Aluno(),false,$data);
	 /*$rain = new RelatorioRainTpl();
	 $html = $rain->setConteudo(array('header','total_livros','total_emprestimos','footer'), array(

	 	'qtdeLivros' => "245",
	 	'qtdeEmprestimos' => "125"
	 ));
	 $mpdf = new \Mpdf\Mpdf(); 
	 $mpdf->SetDisplayMode('fullpage');
	 $css = file_get_contents("vendor/libraryitego/WebContent/viewRelatorio/css/estilo.css");
	 $mpdf->WriteHTML($css,1);
	 $mpdf->WriteHTML($html,2);
	 $mpdf->Output();
 */
		var_dump($res);
	});

	$app->get("/teste",function ()
	{	
		session_start();
		$_SESSION['acesso'] = 2;

		//session_destroy();
	});




	$app->run();


 ?>