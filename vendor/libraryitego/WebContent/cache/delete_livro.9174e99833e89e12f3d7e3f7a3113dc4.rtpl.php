<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Livro</h1>
<form id="formturma" method="post" action="/crud/livro/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ISBN</th>
          <th scope="col">LIVRO</th>
          <th scope="col">ANO</th>
          <th scope="col">ASSUNTO</th>
          <th scope="col">EDIÇÃO</th>
          <th scope="col">EDITORA</th>
          <th scope="col">ÁREA</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo htmlspecialchars( $isbn, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $nome_livro, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $ano_livro, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $assunto, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $edicao, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $nome_editora, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $nome_area, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        </tr>
        
      </tbody>
    </table>
        <div class="form-row">
        <div class="col">
            <input type="hidden"  id="idlivro" name="idlivro" value="<?php echo htmlspecialchars( $idlivro, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
        </div>
    </div>
</form>
</div>