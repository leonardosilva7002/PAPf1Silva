<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/telaPrincipal.css">
    <link rel = "stylesheet" type="text/css" href="../../HTML/CSS/ScrollBar.css">
    <link rel = "stylesheet" type="text/css" href="LojaNormal/CSS/navBar.css">

    <?php
        include "../HTML/Navbar.html";
    ?>

    <title>Seleção</title>
</head>
<body>

<div class="sectionForNavbar" id="section"></div>

    <div class="container">
    <div class="row">

    <div class="col-12"><div class="Espaco"></div><h2>Secções disponíveis</h2></div>
    
    <div class="col-3">
    <a href="Noticias/PHP/PainelAdministrativo.php">
        <div class="cardSeccao">
        <div class="image">
            <img src="../IMAGES/noticias.png" alt="...">
        </div>
        <div class="descricao">
            <h3>Noticias</h3>
        </div>
        </div>
    </a>
    </div>
    <div class="col-3">
    <a href="Pilotos/PHP/PainelAdministrativo.php">
        <div class="cardSeccao">
        <div class="image">
            <img src="../IMAGES/pilotos.png" alt="...">
        </div>
        <div class="descricao">
            <h3>Pilotos</h3>
        </div>
        </div>
    </a>
    </div>
    <div class="col-3">
    <a href="Equipas/PHP/PainelAdministrativo.php">
        <div class="cardSeccao">
        <div class="image">
            <img src="../IMAGES/equipas.png" alt="...">
        </div>
        <div class="descricao">
            <h3>Equipas</h3>
        </div>
        </div>
    </a>
    </div>
    <div class="col-3">
        <a href="LojaNormal/PHP/PainelAdministrativo.php">
        <div class="cardSeccao">
        <div class="image">
            <img src="../IMAGES/lojaNormal.png" alt="...">
        </div>
        <div class="descricao">
            <h3>Loja</h3>
        </div>
        </div>
    </a>
    </div>
    </div>
    </div>
</body>
</html>