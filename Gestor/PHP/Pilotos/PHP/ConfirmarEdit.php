<?php
include "../../../../HTML/PHP/LigacaoBD.php";

if (
    isset($_REQUEST['nome']) &&
    isset($_REQUEST['equipa']) &&
    isset($_REQUEST['pais']) &&
    isset($_REQUEST['numero']) &&
    isset($_REQUEST['data']) &&
    isset($_REQUEST['tPontos']) &&
    isset($_REQUEST['cm']) &&
    isset($_REQUEST['cPontos']) &&
    isset($_REQUEST['cn']) &&
    isset($_REQUEST['id'])
) {
    $id = $_REQUEST['id'];

    $sql = "UPDATE pilotos SET 
        Nome = '".$_REQUEST['nome']."',
        Equipa = '".$_REQUEST['equipa']."',
        Country = '".$_REQUEST['pais']."',
        Numero = '".$_REQUEST['numero']."',
        DataNasc = '".$_REQUEST['data']."',
        TPontos = '".$_REQUEST['tPontos']."',
        WChamp = '".$_REQUEST['cm']."',
        CPontos = '".$_REQUEST['cPontos']."',
        SNasc = '".$_REQUEST['cn']."'
        WHERE ID = '".$id."'";

    $update = $conn->query($sql);

    if ($update) {
        echo "PainelAdministrativo.php";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
} else {
    echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/ConfirmEditPilot.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Confirm</title>
</head>
<body>
    <div class="centro">
        <img src="../../../IMAGES/confirm.png" alt="confirm">
        <h2>O piloto foi atualizado com sucesso!</h2>
    </div>

  <script>
    setTimeout(function() {
      window.location.href = "http://localhost/SiteF1Test/Gestor/PHP/Pilotos/PHP/PainelAdministrativo.php";
    }, 2000);
  </script>
</body>
</html>