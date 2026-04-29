<?php
include "LigacaoBD.php";

$comand = "INSERT INTO utilizadores(Nome, Email, Passe) 
    SELECT '".$_REQUEST['utilizador']."','".$_REQUEST['email']."','".$_REQUEST['passe']."'";
    
    $query = $conn -> query($comand);

    if ($query === TRUE){
        echo"Record updated successfully";
    } else {
        echo "Error updating record: ".$conn -> error;
    }
    
    header("Location: http://localhost/SiteF1Test/HTML/PHP/login.php")
?>