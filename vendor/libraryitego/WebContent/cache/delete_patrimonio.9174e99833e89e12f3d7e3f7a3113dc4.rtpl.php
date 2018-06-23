<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
<h1 class="titulo-formulario"><?php echo htmlspecialchars( $title, ENT_COMPAT, 'UTF-8', FALSE ); ?> Patrimônio</h1>
<form id="formturma" method="post" action="/crud/livro/patrimonio/<?php echo htmlspecialchars( $action, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">PATRIMÔNIO</th>
          <th scope="col">LIVRO</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo htmlspecialchars( $idpatrimonio, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $nome_livro, ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
        </tr>
        
      </tbody>
    </table>
        <div class="form-row">
        <div class="col">
            <input type="hidden"  id="idpatrimonio" name="idpatrimonio" value="<?php echo htmlspecialchars( $idpatrimonio, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
        </div>
    </div>
</form>
</div>