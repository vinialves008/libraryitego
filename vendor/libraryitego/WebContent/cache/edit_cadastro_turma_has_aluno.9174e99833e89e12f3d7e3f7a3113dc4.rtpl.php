<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_turma_has_aluno");?>
<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var idaluno = "<?php echo htmlspecialchars( $idaluno, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idturma = "<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var matricula = "<?php echo htmlspecialchars( $matricula, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#idaluno").val(idaluno);
			$("#idturma").val(idturma);
			$("#matricula").val(matricula);

			
			

	});

</script>