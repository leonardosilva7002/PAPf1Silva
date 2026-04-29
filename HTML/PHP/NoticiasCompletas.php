<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/NoticiasComp.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
    <title>Noticias</title>
</head>
<body>

<?php
        include "../Navbar.html";
        include "LigacaoBD.php";

        $sqlNews = "SELECT * FROM `sitef2`.`noticias` ORDER BY `DataNot` DESC";
        $noticias = $conn->query($sqlNews);
        $Noticias = $noticias -> fetch_all(MYSQLI_ASSOC);
?>

<div class="sectionForNavbar" id="section"></div>

<div class="container">
  <div class="row">

    <div class="col-12"><h2>Notícias</h2></div>

    <?php
    foreach ($Noticias as $news) {
      echo'
        <div class="col-12 col-md-6 col-lg-4">
          <div class="data">
            <pre><b>'.utf8_encode($news['DataNot']).'</b></pre>
          </div>
          <div class="imgNoticia">
            <img src="../IMAGES/Noticias/'.utf8_encode($news['ImgNot']).'.avif" alt="...">
          </div>
          <div class="noticia">
            <p><b>NEWS</b></p>
            <p>'.$news['Noticia'].'</p>
          </div>
        </div>
      ';
    }
    ?>    
</div>
</div>
    <?php
        include "footer.php";
    ?>

    <a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>