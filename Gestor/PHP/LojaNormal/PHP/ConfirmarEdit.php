<?php
include "../../../../HTML/PHP/LigacaoBD.php";

if (
    isset($_REQUEST['valor']) &&
    isset($_REQUEST['nome']) &&
    isset($_REQUEST['nmImg']) &&
    isset($_REQUEST['equipa']) &&
    isset($_REQUEST['descricao']) &&
    isset($_REQUEST['genIdade']) &&
    isset($_REQUEST['quantidade']) &&
    isset($_REQUEST['categoria']) &&
    isset($_REQUEST['id'])
) {
    $id = $_REQUEST['id'];

    $sql = "UPDATE lojanormal SET 
        ValorEuro = '".$_REQUEST['valor']."',
        Nome = '".$_REQUEST['nome']."',
        NomeDaImagem = '".$_REQUEST['nmImg']."',
        Equipa = '".$_REQUEST['equipa']."',
        Descricao = '".$_REQUEST['descricao']."',
        GeneroIdade = '".$_REQUEST['genIdade']."',
        Quantidade = '".$_REQUEST['quantidade']."',
        Categoria = '".$_REQUEST['categoria']."'
        WHERE IDItem = '".$id."'";

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
    <link rel = "stylesheet" type="text/css" href="../CSS/ConfirmEditProd.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Confirm</title>
</head>
<body>
    <div class="centro">
        <img src="../../../IMAGES/confirm.png" alt="confirm">
        <h2>O produto foi atualizado com sucesso!</h2>
    </div>

  <script>
    setTimeout(function() {
      window.location.href = "http://localhost/SiteF1Test/Gestor/PHP/LojaNormal/PHP/PainelAdministrativo.php";
    }, 2000);
  </script>
</body>
</html>