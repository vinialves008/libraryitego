<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> editora</h1>
<form id="formlivroeditora" action="/crud/livro/editora/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">


	<div class="form-row">
	    <div class="col col1">
	      <label for="formGroupExampleInput">Nome</label>
	      <input type="text" name="nome_editora" id="nome_editora" class="form-control" placeholder="Digite o nome da editora" required>
	    
	    </div>
	</div>

	<button type="submit" class="btn btn-primary botao">Enviar</button>
</div>


</form>