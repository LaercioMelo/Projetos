<?php
session_start();
if (isset($_SESSION['id'])) {
    header('Location: finalização de compra.html');
}else{
    header('Location: login.php?go=finalização de compra.html');
}
?>