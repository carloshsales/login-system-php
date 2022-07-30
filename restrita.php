<?php
    require('config/conect.php');

    $sql = $pdo->prepare('SELECT * FROM usuario WHERE token = ? LIMIT 1'); 
    $sql->execute(Array());
    
    
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Restrita</title>
	</head>

	<body>
		<header>
			<h1>Alguma coisa aqui para ser o titulo</h1>
		</header>
	</body>
</html>
