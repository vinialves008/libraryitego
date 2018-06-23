<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Tipo de Curso</h1>
    <form id="formcursotipo" action="/crud/curso/tipo/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <label for="formGroupExampleInput">Tipo</label>
              <input type="text"  name="nome_tipo" id="nome_tipo" value="<?php echo htmlspecialchars( $nome_tipo, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
              <input type="hidden"  name="idtipo" id="idtipo" value="<?php echo htmlspecialchars( $idtipo, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>