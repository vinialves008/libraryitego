<?php if(!class_exists('Rain\Tpl')){exit;}?><h1 class="container titulo-formulario">Avaliação do Livro</h1>
<div class="container">
  <form action="/crud/avaliacao/insert" method="POST">
  
  <div class="form-row">
    <div class="col">
      <label>Escolher Livro pelo patrimonio</label>
          <select type="text" name="idemprestimo" class="form-control" required>
            <option value="">Selecione o patrimônio a ser avaliado</option>
            <?php $counter1=-1;  if( isset($emprestimo) && ( is_array($emprestimo) || $emprestimo instanceof Traversable ) && sizeof($emprestimo) ) foreach( $emprestimo as $key1 => $value1 ){ $counter1++; ?>

              <option value="<?php echo htmlspecialchars( $value1["idemprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["patrimonio_idpatrimonio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            <?php } ?>

          </select>
    </div>
   </div>
   </div>

   <div class="container">

    <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineCheckbox1" name="comentario" value="Péssimo">
            <label class="form-check-label" for="inlineCheckbox1">Péssimo</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineCheckbox2" name="comentario" value="Ruim">
            <label class="form-check-label" for="inlineCheckbox2">Ruim</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineCheckbox3" name="comentario" value="Regular">
            <label class="form-check-label" for="inlineCheckbox3">Regular</label>
        </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineCheckbox3" name="comentario" value="Ótimo">
            <label class="form-check-label" for="inlineCheckbox3">Ótimo</label>
        </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="inlineCheckbox3" name="comentario" value="Excelente">
            <label class="form-check-label" for="inlineCheckbox3">Excelente</label>
        </div>

       
   </div>
   <div class="container">
       <button type="submit" class="btn btn-primary botao">Enviar</button>
    </div>
</form>

