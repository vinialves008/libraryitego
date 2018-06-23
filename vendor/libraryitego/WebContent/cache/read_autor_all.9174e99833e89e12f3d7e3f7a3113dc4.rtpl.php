<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	
	<h1 class="titulo-formulario">Listar Autores</h1>

	<table class="table">
    <thead>
      <tr>
        <th scope="col">NOME</th>
        <th>AÇÃO</th>
       
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($resultautor) && ( is_array($resultautor) || $resultautor instanceof Traversable ) && sizeof($resultautor) ) foreach( $resultautor as $key1 => $value1 ){ $counter1++; ?>

      <tr>
      
        <td scope="row"><?php echo htmlspecialchars( $value1["nome_autor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
         <td><a href="/crud/livro/autor/<?php echo htmlspecialchars( $value1["idautor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-warning botao">Editar</a>
          <a href="/crud/livro/autor/<?php echo htmlspecialchars( $value1["idautor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger botao">Excluir</a></td>
 
      </tr>
     <?php } ?>

    </tbody>
  </table>
</div>