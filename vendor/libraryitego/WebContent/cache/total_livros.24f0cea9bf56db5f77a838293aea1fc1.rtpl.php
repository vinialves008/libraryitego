<?php if(!class_exists('Rain\Tpl')){exit;}?>	<table>
		<thead>
			<tr>
				<th>Total de Livros da Biblioteca</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo htmlspecialchars( $qtdeLivros, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			</tr>
		</tbody>
		
	</table>


