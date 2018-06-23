<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_turma");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
			

			var nome_turno = "<?php echo htmlspecialchars( $nome_turno, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idturma = "<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>";	
			var idturno = "<?php echo htmlspecialchars( $idturno, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idcurso = "<?php echo htmlspecialchars( $idcurso, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var nome_curso = "<?php echo htmlspecialchars( $nome_curso, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var data_inicio = "<?php echo htmlspecialchars( $data_inicio, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var data_termino = "<?php echo htmlspecialchars( $data_termino, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			
			$("#idturno").val(idturno);		
			$("#nome_turno").val(nome_turno);
			$("#data_inicio").val(data_inicio);
			$("#data_termino").val(data_termino);
			$("#idcurso").val(idcurso);
			$("#nome_curso").val(nome_curso);
			
			$("#formturma").append('<input type="hidden" name="idturma" id="idturma">');
			$("#idturma").val(idturma);
		
	});

</script>