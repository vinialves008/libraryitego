<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	
	<h1 class="titulo-formulario">Listar Tipos de Cursos</h1>

	<table class="table">
    <thead>
      <tr>
        <th scope="col">TIPO DE CURSO</th>
        <th>AÇÃO</th>
       
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($resulttipo) && ( is_array($resulttipo) || $resulttipo instanceof Traversable ) && sizeof($resulttipo) ) foreach( $resulttipo as $key1 => $value1 ){ $counter1++; ?>

      <tr>
      
        <td scope="row"><?php echo htmlspecialchars( $value1["nome_tipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
         <td><a href="/crud/curso/tipo/<?php echo htmlspecialchars( $value1["idtipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-warning botao">Editar</a>
          <a href="/crud/curso/tipo/<?php echo htmlspecialchars( $value1["idtipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger botao">Excluir</a>
         </td>
 
      </tr>
     <?php } ?>

    </tbody>
  </table>
</div>