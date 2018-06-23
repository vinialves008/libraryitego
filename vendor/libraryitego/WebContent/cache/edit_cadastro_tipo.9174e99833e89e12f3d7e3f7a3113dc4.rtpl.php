<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_tipo_curso");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var nome_tipo = "<?php echo htmlspecialchars( $nome_tipo, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idtipo = "<?php echo htmlspecialchars( $idtipo, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#nome_tipo").val(nome_tipo);
			
			$("#formtipocurso").append('<input type="hidden" name="idtipo" id="idtipo">');
			$("#idtipo").val(idtipo);
		
	});

</script>