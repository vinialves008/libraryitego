<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Editora</h1>
    <form id="formlivroeditora" action="/crud/livro/editora/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <label for="formGroupExampleInput">Nome da Editora</label>
              <input type="text"  name="nome_editora" id="nome_editora" value="<?php echo htmlspecialchars( $nome_editora, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
              <input type="hidden"  name="ideditora" id="ideditora" value="<?php echo htmlspecialchars( $ideditora, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>