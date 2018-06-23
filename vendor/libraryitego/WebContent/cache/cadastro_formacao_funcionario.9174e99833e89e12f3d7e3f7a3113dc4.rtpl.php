<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Formações dos Funcionários</h1>
<form id="formformacaofuncionario" action="/crud/funcionario/formacao/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">

	
	<div class="form-row">
	    <div class="col col1">
	      
	      <label for="formGroupExampleInput">Nome da Formação</label>
	      <input type="text" id="nome_formacao" name="nome_formacao" class="form-control" placeholder="Digite uma formação" required>
	    </div>
		
	</div>
	<button type="submit" class="btn btn-primary botao">Enviar</button>
</div>


</form>