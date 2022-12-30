<!DOCTYPE html>
<html>
<head>
	<title>Submit form</title>
	<meta charset="utf-8">
	<style type="text/css">
		*{
	margin:0;
	padding: 0;
}
.bar{
	height: 250px;
	background: #003366;
}
.logo{
	position: relative;
}
.logo img{
	width: 80px;
}
.logo span{
	color: #fff;
	font-size: 60px;
	position: relative;
	bottom: 10px;
}
.box{
	position: absolute;
	width: 780px;
	height: 500px;
	box-shadow: 0 0 5px silver;
	background: #fff;
	top: 100px;
	left: 28%;
	border-radius: 10px;
	border: 1px solid silver;
}
.txt{
	position: relative;
	left: 25px;
}
.txt span{
	margin:80px;
	font-size: 30px;
	position: relative;
	top: 130px;
    left: 10px;
    font-family: sans-serif;
    width: 900px;
}
.txt p{
	margin:100px;
	font-size: 30px;
	position: relative;
	font-family: sans-serif;
	width: 900px;
	right: 23px;
	bottom: 85px;
}
.txt section{
	margin:100px;
	font-size: 30px;
	position: relative;
	bottom: 175px;
	font-family: sans-serif;
	width: 900px;
	right: 13px;
}
.btn{
	margin:100px;
}
.btn a{
	text-decoration: none;
	color: #fff;
	background: #003366;
	padding: 15px;
	border-radius: 10px;
	box-shadow: 0 0 20px silver;
	font-size: 20px;
	position: relative;
	bottom: 120px;
	left: 260px;
}
.icon{
	position: absolute;
	margin-left: 300px;
	bottom: 80px;
}
.icon img{
	width: 200px;
}

	</style>
</head>
<body>
	<?php
	$nome = $_POST['user'];
	?>
<div class="bar">
	<div class="logo">
		<img src="img/logo.png"><span>Mundo Geek</span>
	</div>
<div class="box">
	<div class="txt">
		<span>Cadastro concluido com sucesso! <p>Seja bem vindo <?php echo "<b>$nome</b>";?> !</p></span>
		<section>Seu pedido chegará em até 35 dias.</section>
	</div>
	<div class="icon">
		<img src="img/gifVerificado.gif">
	</div>
<div class="btn">
	<a href="http://localhost/Site_Jao/">Voltar</a>
</div>
</div>
</body>
</html>