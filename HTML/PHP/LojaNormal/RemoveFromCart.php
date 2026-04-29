<?php
include "../LigacaoBD.php";

    $sql = "DELETE FROM carrinho WHERE IDProd = '".$_GET['id']."'";

    $update = $conn->query($sql);
?>

<script>
    setTimeout(function() {
        window.location.href = "http://localhost/SiteF1Test/HTML/PHP/LojaNormal/carrinho.php";
    }, 0);
</script>