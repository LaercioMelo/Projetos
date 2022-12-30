<!DOCTYPE html>
<html>
<head>
	<title>Faça login para continuar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="logo.png">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body{
			font-family: sans-serif;
			background: #f1f1f1;
		}
		.form{
			width: 400px;
			padding: 10px 0;
			background: #fff;
			margin: 20px auto;
			border-radius: 3px;
			box-shadow: 0 1px 1px rgb(214, 214, 214);
			padding: 30px 10px;
		}
		.wrap{
			padding: 10px 40px;
			position: relative;
		}
		.form input{
			display: block;
			width: 100%;
			padding: 11px;
			box-sizing: border-box;
			border: 1px solid ;
			border-radius: 3px;
			transition: box-shadow 0.3s ease;
		}
		.form input, .form button{
			font-family: inherit;
			font-size: 1rem;
			outline: none;
		}
		.form button{
			width: 100%;
			padding: 11px;
			border: 1px solid #ff8c00;
			border-radius: 3px;
			background: #ff8c00;
			color: #fff;
			border-bottom: 3px solid #ff4500;
			cursor: pointer;
			transition: background 0.3s ease;
		}
		.form button:hover{
			background: #ff8c00;
		}
		.form button:active{
			border-bottom: 0;
			margin-top: 3px;
		}
		.flex{
			display: flex;
		}
		.flex img{
			margin-right: 10px;
		}
		.flex h2{
			display: flex;
			align-items: center;
			font-size: 1.4rem;
		}
		.wrap a{
			text-decoration: none;
			color: #ff8c00;
		}
		.error{
			background: red;
			padding: 13px;
			border-radius: 3px;
			color: #fff;
			position: relative;
			display: none;
		}
		.error p{
			max-width: 285px;
		}
		.error span{
			display: flex;
			position: absolute;
			right: 13px;
			top: 1px;
			height: 43px;
			align-items: center;
			font-weight: bold;
			cursor: pointer;
		}
	</style>
	<script type="text/javascript">
		window.onload = function(){
			document.querySelector('.error p').innerHTML = 'error';
		}
	</script>
</head>
<body>
	<?php
	require_once 'conn.php';
	if (count($_POST)) {
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		if (empty($email) || empty($pwd)) {
			echo "Preencha todos os campos!";
		}else{
			$sql = "SELECT id, nome FROM users WHERE email = :email AND password = :pass";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':email', $email);
			$stmt->bindValue(':pass', md5($pwd));
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				session_start();
				$data = $stmt->fetch();
				$id = $data['id'];
				$nome = $data['nome'];
				$_SESSION['id'] = $id;
				if (isset($_GET['go'])) {
					header('Location: '.$_GET['go']);
				}else{
					header('Location: menu principal.html');
				}
			}else{
				echo "<script>window.onload = function(){document.querySelector('.error').style.display = 'block'; document.querySelector('.error p').innerHTML = 'Email ou senha incorretos.'}</script>";
			}
		}
	}
	?>
	<form method="post" class="form" autocomplete="off">
		<div class="wrap flex">
			<img src="logo.png" width="70px">
			<h2>Olá! digite seus dados de login:</h2>
		</div>
		<div class="wrap">
			<input type="email" name="email" placeholder="E-mail" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
		</div>
		<div class="wrap">
			<input type="password" name="pwd" placeholder="Senha" value="<?php echo (isset($_POST['pwd'])) ? $_POST['pwd'] : '' ?>">
		</div>
		<div class="wrap">
			<button>Entrar</button>
		</div>
		<div class="wrap">
			<a href="formulario.html">Criar conta</a>
		</div>
		<div class="wrap">
			<div class="error">
				<p></p>
				<span>&times;</span>
			</div>
		</div>
	</form>
</body>
</html>