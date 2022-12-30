<?php
require_once '../conn.php';
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
if (($email == "")||($senha == "")) {
	echo "<script>alert('Preencha todos os campos');</script>";
	echo "<script>location.href='../login/';</script>";
}else{
	$sql = $pdo->prepare("SELECT id, nome FROM data WHERE email = :e AND senha = :s");
	$sql->bindValue(":e",$email);
	$sql->bindValue(":s",$senha);
	$sql->execute();
	if ($sql->rowCount() > 0) {
		session_start();
		$data = $sql->fetch();
		$_SESSION["id"] = $data["id"];
		$_SESSION["nome"] = $data["nome"];
		echo "<script>location.href='../menu principal.html';</script>";
	}else{
		echo "<script>alert('Login ou senha incorretos');</script>";
		echo "<script>location.href='../login/';</script>";
	}
}
?>