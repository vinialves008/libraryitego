<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="tabela">
	<table>
		<thead>
			<tr>
				<th>Total de Empréstimos</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo htmlspecialchars( $qtdeEmprestimos, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			</tr>
		</tbody>
		
	</table>
</div>
