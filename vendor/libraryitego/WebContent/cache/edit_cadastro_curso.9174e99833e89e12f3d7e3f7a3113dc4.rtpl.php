<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("cadastro_curso");?>

<script type="text/javascript">
	
	
	$( document ).ready(function() {
		
			var nome_curso = "<?php echo htmlspecialchars( $nome_curso, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var carga_horaria = "<?php echo htmlspecialchars( $carga_horaria, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var vagas = "<?php echo htmlspecialchars( $vagas, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idtipo = "<?php echo htmlspecialchars( $idtipo, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
			var idcurso = "<?php echo htmlspecialchars( $idcurso, ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		
			$("#nome_curso").val(nome_curso);
			$("#carga_horaria").val(carga_horaria);
			$("#vagas").val(vagas);
			$("#idtipo").val(idtipo);
			
			$("#formcurso").append('<input type="hidden" name="idcurso" id="idcurso">');
			$("#idcurso").val(idcurso);
		
	});

</script>