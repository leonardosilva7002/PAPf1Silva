<?php
session_start();
include "LigacaoBD.php";

$sql = "SELECT * FROM utilizadores WHERE Nome='".$_REQUEST['utilizador']."' AND Passe='".$_REQUEST['passe']."'";

    $utilizadores = $conn->query($sql);

    $Utilizadores = $utilizadores -> fetch_all(MYSQLI_ASSOC);

	if (mysqli_num_rows( $utilizadores ) > 0) {
        $_SESSION['utilizador'] = $_REQUEST['utilizador'];
        echo'<meta http-equiv="refresh" content="0;url=http://localhost/SiteF1Test/HTML/PHP/PagPrincipal.php">';
    }
    else{
        echo'<meta http-equiv="refresh" content="0;url=http://localhost/SiteF1Test/HTML/PHP/login.php">';
    }
?>