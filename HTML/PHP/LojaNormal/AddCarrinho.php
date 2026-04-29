<?php
session_start();
include "../LigacaoBD.php";
$idProduto = $_REQUEST['x'];
$utilizador = $_SESSION['utilizador'];

$sql = "INSERT INTO carrinho (IDProd, utilizador) VALUES ('$idProduto', '$utilizador')";

$prod = $conn->query($sql);

echo'<meta http-equiv="refresh" content="0;url=http://localhost/SiteF1Test/HTML/PHP/lojaNormal/carrinho.php">';
?>