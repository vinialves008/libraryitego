<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
  <a href="/crud/matricula/0/10/read" class="btn btn-success">Voltar para lista de matrículas</a>
  <h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">MATRÍCULA</th>
        <th>ALUNO</th>
        <th>CURSO</th>
        <th>TIPO</th>
        <th>TURNO</th>
        <th>INÍCIO</th>
        <th>TÉRMINO</th>
        
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($resultturmahasaluno) && ( is_array($resultturmahasaluno) || $resultturmahasaluno instanceof Traversable ) && sizeof($resultturmahasaluno) ) foreach( $resultturmahasaluno as $key1 => $value1 ){ $counter1++; ?>
        <tr>
            <td scope="row"><?php echo htmlspecialchars( $value1["matricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome_usuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome_curso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome_tipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome_turno"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["data_inicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["data_termino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
