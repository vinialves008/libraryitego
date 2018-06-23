<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_turno");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var nome_turno = "<?php echo htmlspecialchars( $nome_turno, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idturno = "<?php echo htmlspecialchars( $idturno, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#nome_turno").val(nome_turno);
			
			$("#formturmaturno").append('<input type="hidden" name="idturno" id="idturno">');
			$("#idturno").val(idturno);
		
	});

</script>