<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Área</h1>
    <form id="formlivroarea" action="/crud/livro/area/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <label for="formGroupExampleInput">Nome da Área</label>
              <input type="text"  name="nome_area" id="nome_area" value="<?php echo htmlspecialchars( $nome_area, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
              <input type="hidden"  name="idarea" id="idarea" value="<?php echo htmlspecialchars( $idarea, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>