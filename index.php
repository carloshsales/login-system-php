<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./assets/css/style.css" />
		<title>Login Page</title>
	</head>
	<body>
		<header>
			<h1>Login page</h1>
		</header>
		<main>
			<form method="post">
				<h2>Login</h2>

				<div class="input-form">
					<img src="./assets/img/email.png" />
					<input
						type="email"
						name="email"
						placeholder="Digite seu nome completo" required
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
