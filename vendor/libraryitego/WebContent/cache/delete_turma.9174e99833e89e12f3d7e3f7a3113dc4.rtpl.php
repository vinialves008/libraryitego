<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Turma</h1>
<form id="formturma" method="post" action="/crud/curso/turma/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">CÓDIGO DA TURMA</th>
	      <th scope="col">NOME DO CURSO</th>
	      <th scope="col">TIPO DO CURSO</th>
	      <th scope="col">TURNO</th>
	      <th scope="col">INÍCIO</th>
	       <th scope="col">PREVISÃO DE TÉRMINO</th>

	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td><?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $nome_curso, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $nome_tipo, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $nome_turno, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $data_inicio, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	      <td><?php echo htmlspecialchars( $data_termino, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
	    </tr>
	    
	  </tbody>
	</table>
		<div class="form-row">
    	<div class="col">
    		<input type="hidden"  id="idturma" name="idturma" value="<?php echo htmlspecialchars( $idturma, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			<button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
		</div>
	</div>
</form>
</div>


