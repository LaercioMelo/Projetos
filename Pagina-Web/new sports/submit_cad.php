<?php
require_once 'conn.php';
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = md5($_POST["password"]);
$cep = $_POST["cep"];
$tel = $_POST["tel"];
$data_nasc = $_POST["data_nasc"];
$cpf = $_POST["cpf"];
$name_card = $_POST['name_card'];
$num_card = $_POST['num_card'];
$data_venc = $_POST['data_venc'];
$secure_code = $_POST['secure_code'];
$band = $_POST['band'];
if (($nome == "")||($email == "")||($senha == "")||($cep == "")||($tel == "")||($data_nasc == "") ||($cpf == "")||($name_card == "")||($num_card == "")||($data_venc == "")||($secure_code == "")||($band == "")) {
	echo "<script>alert('Preencha todos os campos');</script>";
	echo "<script>location.href='formulario.html';</script>";
}else{
	$sql = $pdo->prepare("SELECT id FROM users WHERE email = :e");
	$sql->bindValue(":e",$email);
	$sql->execute();
	if ($sql->rowCount() > 0) {
		echo "<script>alert('Esse email já foi cadastrado, faça login.');</script>";
		echo "<script>location.href='formulario.html';</script>";
	}else{
		$sql = $pdo->prepare("INSERT INTO users(nome, email , password, cep, tel, date_nasc, cpf, name_card, num_card, data_venc_card, secure_code, band) VALUES (:nome, :email, :password, :cep, :tel, :data_nasc, :cpf, :name_card, :num_card, :data_venc, :secure_code, :band)");
		$sql->bindValue(":nome",$nome);
		$sql->bindValue(":email",$email);
		$sql->bindValue(":password",$senha);
		$sql->bindValue(":cep",$cep);
		$sql->bindValue(":tel",$tel);
		$sql->bindValue(":data_nasc",$data_nasc);
		$sql->bindValue(":cpf",$cpf);
		$sql->bindValue(":name_card", $name_card);
		$sql->bindValue(":num_card", $num_card);
		$sql->bindValue(":data_venc", $data_venc);
		$sql->bindValue(":secure_code", $secure_code);
		$sql->bindValue(":band", $band);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$sql = $pdo->prepare("SELECT id, nome FROM users WHERE email = :e AND password = :s");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",$senha);
			$sql->execute();
			if ($sql->rowCount() > 0) {
				session_start();
				$data = $sql->fetch();
				$_SESSION["id"] = $data["id"];
				$_SESSION["nome"] = $data["nome"];
				echo "<script>location.href='../cad_sucesso.html/'<script>";
					echo "<script>alert('Seu cadastro foi realizado com sucesso!');</script>";
			}
		}else{
			echo "<script>alert('Não foi possível cadastrar');</script>";
			echo $sql->errorInfo()[2];
		}
	}
}
?>