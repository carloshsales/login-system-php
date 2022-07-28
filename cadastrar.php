<?php
	require('config/conect.php');
	$erro_geral = '';
	$erro_nome = '';
	$erro_email = '';
	$erro_senha = '';
	$erro_repete_senha = '';
	$erro_termo = '';

	if(isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['repete_senha'], $_POST['termos'])){
		$nome = limparPost($_POST['nome']);
		$email = limparPost($_POST['email']);
		$senha = $_POST['senha'];
		$repete_senha = $_POST['repete_senha'];
		$termos = $_POST['termos'];

		if(empty($nome) || empty($email) || empty($senha) || empty($repete_senha) || empty($termos)){
			$erro_geral = "Todos os campos são obrigatórios";
		}else{
			if(!preg_match("/^[a-zA-Z-' ]*$/",$nome)){
				$erro_nome = 'Só aceitamos Letras e Espaços em branco!';
			}

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$erro_email = "Email inválido!";
			}
			
			if(strlen($senha) < 6){
				$erro_senha = "Sua senha deve conter mais de 6 dígitos!";
			}
			
			if($repete_senha !== $senha){
				$erro_repete_senha = "Por favor repita a senha corretamente";
			}

			if($termos !== 'ok'){
				$erro_termo = "Checkbox DESATIVADO!";
			}
		}

	}


	function limparPost($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		
		return $data;
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
				<h2>Cadastrar</h2>

				<?php 
					if(strlen($erro_geral) > 0){
						echo "<div class='erro-geral animate__animated animate__slideInDown'>$erro_geral</div>";
					}
				?>
				<div >
					<div class="input-form">
						<img src="./assets/img/id-card.png" />
						<input
							type="text"
							name="nome"
							placeholder="Digite seu nome completo"
						/>
					</div>

					<?php 
						if(strlen($erro_nome) > 0){
							echo "<div class='erro'>$erro_nome</div>";
						}
					?>

				</div>

				<div>
					<div class="input-form">
						<img src="./assets/img/email.png" />
						<input
							type="email"
							name="email"
							placeholder="Digite seu email"
						/>
					</div>
					<?php 
						if(strlen($erro_email) > 0){
							echo "<div class='erro'>$erro_email</div>";
						}
					?>
				</div>

				<div>
					<div class="input-form">
						<img src="./assets/img/padlock.png" />
						<input
							type="password"
							name="senha"
							placeholder="Digite sua senha"
						/>
					</div>
					<?php 
						if(strlen($erro_senha) > 0){
							echo "<div class='erro'>$erro_senha</div>";
						}
					?>
				</div>

				<div>
					<div class="input-form">
						<img src="./assets/img/padlock.png" />
						<input
							type="password"
							name="repete_senha"
							placeholder="Repita sua senha"
						/>
					</div>
					<?php 
						if(strlen($erro_repete_senha) > 0){
							echo "<div class='erro'>$erro_repete_senha</div>";
						}
					?>
				</div>

				<div id="termo" class="input-form">
					<input type="checkbox" id="termos" name="termos" value="ok"/>
					<label for="termos">Ao se cadastrar você concorda com a nossa <a class="link-termo" href="#">Política de Privacidade</a> e os <a class="link-termo" href="#">Termos de Uso.</a></a></label>
					<?php 
						if(strlen($erro_termo) > 0){
							echo "<div class='erro'>$erro_termo</div>";
						}
					?>
				</div>

				<button class="button" type="submit">Cadastrar</button>

				<span class="cadastro-texto"
					>Já tenho cadastro, ir para <a href="index.php">Login</a></span
				>
			</form>
		</main>
		<footer>
			Criated by: Carlos Henrique from YouTube: Programação Web (Curso de
			PHP Completo)
		</footer>
	</body>
</html>