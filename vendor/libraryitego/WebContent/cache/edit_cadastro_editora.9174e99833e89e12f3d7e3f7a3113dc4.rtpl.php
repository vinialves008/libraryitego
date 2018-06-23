<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_editora");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var nome_editora = "<?php echo htmlspecialchars( $nome_editora, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var ideditora = "<?php echo htmlspecialchars( $ideditora, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#nome_editora").val(nome_editora);
			
			$("#formlivroeditora").append('<input type="hidden" name="ideditora" id="ideditora">');
			$("#ideditora").val(ideditora);
		
	});

</script>