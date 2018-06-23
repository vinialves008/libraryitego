<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Tipos de Cursos</h1>
<form id="formtipocurso" action="/crud/curso/tipo/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">

	
	<div class="form-row">
	    <div class="col col1">
	      <label for="formGroupExampleInput">Tipo do Curso</label>
	      <input type="text" id="nome_tipo" name="nome_tipo" class="form-control" placeholder="Digite o tipo de curso oferecido pela instituição" required>
	    
	    </div>
	</div>
	<button type="submit" class="btn btn-primary botao">Enviar</button>
	</div>


</form>