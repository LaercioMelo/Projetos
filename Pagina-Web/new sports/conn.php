<?php
try {
	$pdo = new PDO("mysql:host=localhost;dbname=newsports","root","");
} catch (Exception $e) {
	echo "Erro: ".$e->getMessage();
}

?>