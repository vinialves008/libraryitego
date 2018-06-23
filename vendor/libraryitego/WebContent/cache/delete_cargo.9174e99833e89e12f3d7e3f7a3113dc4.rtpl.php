<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<h1 class="titulo-formulario">Excluir Cargo</h1>
    <form id="formfuncionariocargo" action="/crud/funcionario/cargo/delete" method="POST">
        <div class="form-row">
            <div class="col col1">
              <label for="formGroupExampleInput">Nome do Cargo</label>
              <input type="text"  name="nome_cargo" id="nome_cargo" value="<?php echo htmlspecialchars( $nome_cargo, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
              <input type="hidden"  name="idcargo" id="idcargo" value="<?php echo htmlspecialchars( $idcargo, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" readonly="">
            </div>
       </div>

       <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-danger botao botaoexcluir">Excluir</button>
          </div>
       </div>
   
    </form>
</div>