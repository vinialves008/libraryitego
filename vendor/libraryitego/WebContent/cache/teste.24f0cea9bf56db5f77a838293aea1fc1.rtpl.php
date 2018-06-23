<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Hello World!!</h1>
	<p>Meu nome é <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

</body>
</html>