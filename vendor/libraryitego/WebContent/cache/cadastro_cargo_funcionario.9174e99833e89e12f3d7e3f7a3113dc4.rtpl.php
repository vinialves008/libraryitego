<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> cargos dos funcionários</h1>
<form id="formcargofuncionario" action="/crud/funcionario/cargo/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">

	
	<div class="form-row">
	    <div class="col col1">
	      
	      <label for="formGroupExampleInput">Nome do Cargo</label>
	      <input type="text" id="nome_cargo" name="nome_cargo" class="form-control" placeholder="Digite um cargo" required>
	    </div>
	</div>
	<button type="submit" class="btn btn-primary botao">Enviar</button>
</div>


</form>