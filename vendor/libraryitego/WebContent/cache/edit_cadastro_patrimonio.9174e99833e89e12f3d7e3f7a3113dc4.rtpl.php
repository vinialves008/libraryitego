<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Patrimônio do Livro</h1>
<form id="formlivropatrimonio" method="post" action="/crud/livro/patrimonio/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>">	
	
	<div class="form-row">
	<div class="col col1">
	     <label for="formGroupExampleInput">Patrimônio do Livro</label>
	     <input type="number" name="idpatrimonio" id="idpatrimonio" class="form-control" required>
	    
 	</div>
    	
	</div>
	<div>
			<button type="submit" class="btn btn-primary botao">Enviar</button>
	</div>
</form>
</div>
<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			
			var idpatrimonio = "<?php echo htmlspecialchars( $idpatrimonio, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#idpatrimonio").val(idpatrimonio);

			$("#formlivropatrimonio").append('<input type="hidden" name="patrimonioantigo" id="patrimonioantigo">');
			$("#patrimonioantigo").val(idpatrimonio);
		
	});

</script>