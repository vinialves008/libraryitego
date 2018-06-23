<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Autor</h1>
    <form id="formlivroarea" action="/crud/livro/autor/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <label for="formGroupExampleInput">Nome do Autor</label>
              <input type="text"  name="nome_autor" id="nome_autor" value="<?php echo htmlspecialchars( $nome_autor, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
              <input type="hidden"  name="idautor" id="idautor" value="<?php echo htmlspecialchars( $idautor, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>