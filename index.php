<?php 
		require('config/conect.php');
		require('modules/functions.php');	
?>

<?php
	if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
		$email = limparPost($_POST['email']);
		$senha = limparPost($_POST['password']);
		$senha_cript = sha1($senha);

		$sql = $pdo->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
		$sql->execute(Array($email, $senha_cript));
		
		$usuario = $sql->fetch(PDO::FETCH_ASSOC);

		if($usuario){
			$token = sha1(uniqid().date("d-m-Y-H-i-s"));
			$sql = $pdo->prepare("UPDATE usuario SET token = ? WHERE email = ? AND senha = ?");
			if($sql->execute(Array($token, $email, $senha_cript))){
				$_SESSION['token'] = $token;
				header("Location: restrita.php");
			}
		}else{
			$erro_login = "Usuário ou senha incorreto";
			$_GET['result']='erro';
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./assets/css/style.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		<title>Login Page</title>
	</head>
	<body>
		<header>
			<h1>Login page</h1>
		</header>
		<main>
			<form method="post">
				<h2>Login</h2>

				<?php 
					if(isset($_GET['result']) && ($_GET['result'] == 'ok')){
						echo '<div class="sucesso animate__animated animate__slideInDown">Cadastrado com sucesso!</div>';
					}
					if(isset($erro_login)){
						echo "<div class='erro-geral animate__animated animate__slideInDown'>$erro_login</div>";
					}
				?>
				<div class="input-form">
					<img src="./assets/img/email.png" />
					<input
						type="email"
						name="email"
						placeholder="Digite seu email" required
					/>
				</div>

				<div class="input-form">
					<img src="./assets/img/padlock.png" />
					<input
						type="password"
						name="password"
						placeholder="Digite sua senha" required
					/>
				</div>

				<button class="button" type="submit">Login</button>

				<span class="cadastro-texto"
					>Ainda não tenho
					<a href="cadastrar.php">cadastro!</a></span
				>
			</form>
		</main>
		<footer>
			Criated by: Carlos Henrique from YouTube: Programação Web (Curso de
			PHP Completo)
		</footer>
	</body>
</html>
