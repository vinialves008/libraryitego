<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_formacao_funcionario");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var nome_formacao = "<?php echo htmlspecialchars( $nome_formacao, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idformacao = "<?php echo htmlspecialchars( $idformacao, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#nome_formacao").val(nome_formacao);
			
			$("#formformacaofuncionario").append('<input type="hidden" name="idformacao" id="idformacao">');
			$("#idformacao").val(idformacao);
		
	});

</script>