<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	
	<h1 class="titulo-formulario">Listar Editoras</h1>

	<table class="table">
    <thead>
      <tr>
        <th scope="col">NOME</th>
       
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($resulteditora) && ( is_array($resulteditora) || $resulteditora instanceof Traversable ) && sizeof($resulteditora) ) foreach( $resulteditora as $key1 => $value1 ){ $counter1++; ?>

      <tr>
      
        <td scope="row"><?php echo htmlspecialchars( $value1["nome_editora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
         <td><a href="/crud/livro/editora/<?php echo htmlspecialchars( $value1["ideditora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-warning botao">Editar</a></td>
         <td><a href="/crud/livro/editora/<?php echo htmlspecialchars( $value1["ideditora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="btn btn-danger botao">Excluir</a></td>
 
      </tr>
     <?php } ?>

    </tbody>
  </table>
</div>