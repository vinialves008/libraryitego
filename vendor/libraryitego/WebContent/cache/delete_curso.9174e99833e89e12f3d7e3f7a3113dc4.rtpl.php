<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Curso</h1>
<form id="formcurso" method="post" action="/crud/curso/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">NOME DO CURSO</th>
	      <th scope="col">TIPO DO CURSO</th>
	      <th scope="col">CARGA HORÁRIA</th>
	      <th scope="col">VAGAS</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td><?php echo htmlspecialchars( $nome_curso, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $nome_tipo, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $carga_horaria, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $vagas, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	    </tr>
	    
	  </tbody>
	</table>
		<div class="form-row">
    	<div class="col">
    		<input type="hidden"  id="idcurso" name="idcurso" value="<?php echo htmlspecialchars( $idcurso, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			<button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
		</div>
	</div>
</form>
</div>