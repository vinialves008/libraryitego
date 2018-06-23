<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Autor <?php echo htmlspecialchars( $nome_autor, ENT_COMPAT, 'UTF-8', FALSE ); ?> do livro <?php echo htmlspecialchars( $nome_livro, ENT_COMPAT, 'UTF-8', FALSE ); ?>?</h1>
    <form id="formlivrohasautor" action="/crud/livro/autores/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <input type="hidden"  name="idlivro" id="idlivro" value="<?php echo htmlspecialchars( $idlivro, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" >
              <input type="hidden"  name="idautor" id="idautor" value="<?php echo htmlspecialchars( $idautor, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>