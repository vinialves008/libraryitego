<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Formação</h1>
    <form id="formfuncionarioformacao" action="/crud/funcionario/formacao/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <label for="formGroupExampleInput">Formação</label>
              <input type="text"  name="nome_formacao" id="nome_formacao" value="<?php echo htmlspecialchars( $nome_formacao, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
              <input type="hidden"  name="idformacao" id="idformacao" value="<?php echo htmlspecialchars( $idformacao, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>