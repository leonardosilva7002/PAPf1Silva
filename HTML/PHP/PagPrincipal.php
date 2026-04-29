<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/PagPrincipal.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Equipas.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/MidSection.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/LojaSection.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Calendario.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/F1UnlockedSection.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Bilhetes.css">
    <title>Página principal</title>
</head>
<body>
<?php
        session_start();
        include "LigacaoBD.php";

        mysqli_set_charset($conn, "utf8");

        $sqlEquipas = "SELECT 
                    sitef2.equipas.IDEquipa,
                    sitef2.equipas.Nome,
                    sitef2.equipas.Pontos,
                    sitef2.equipas.Carro,
                    CONCAT(piloto1.PNome, ' ', piloto1.SNome) AS Piloto1,
                    CONCAT(piloto2.PNome, ' ', piloto2.SNome) AS Piloto2
                FROM 
                    sitef2.equipas
                INNER JOIN 
                    sitef2.pilotos piloto1 ON sitef2.equipas.ID1Plt = piloto1.ID
                INNER JOIN 
                    sitef2.pilotos piloto2 ON sitef2.equipas.ID2Plt = piloto2.ID
                ORDER BY 
                    sitef2.equipas.Pontos DESC
                LIMIT 1000";
                
        $equipas = $conn->query($sqlEquipas);
        $Equipas = $equipas -> fetch_all(MYSQLI_ASSOC);
    ?>
    <?php
        //include "LigacaoBD.php";
        include "../Navbar.html";
        $sql = "SELECT * FROM `sitef2`.`pilotos` ORDER BY `CPontos` DESC LIMIT 1000";
        $utilizadores = $conn->query($sql);
        $Utilizadores = $utilizadores -> fetch_all(MYSQLI_ASSOC);
    ?>
    <?php
        $sqlNews = "SELECT * FROM `sitef2`.`noticias` ORDER BY `DataNot` DESC LIMIT 3";
        $noticias = $conn->query($sqlNews);
        $Noticias = $noticias -> fetch_all(MYSQLI_ASSOC);
    ?>

<main class="hero">
<div class="content-overlay">
          <h1>Bem-vindo!</h1>
          <p>Notícias, calendário de corridas, resultados ao vivo e muito mais. O seu guia completo para acompanhar cada curva e ultrapassagem.</p>
      </div>
</main>

    <!--<div class="main">
      <img src="../IMAGES/F1MainFull.jpg" class="mainImage" alt="Imagem Principal">
      <div class="content-overlay">
          <h1>Bem-vindo!</h1>
          <p>Notícias, calendário de corridas, resultados ao vivo e muito mais. O seu guia completo para acompanhar cada curva e ultrapassagem.</p>
          <button class="scroll-button" onclick="scrollToSection()">Explore Mais</button>
      </div>
    </div>-->
    
<div class="container">
  <div class="row">

    <div class="col-12"><h2>Notícias Destacadas</h2></div>

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
    <div class="col-12"><button onclick="window.location.href='NoticiasCompletas.php'" class="mais">Ver mais</button></div>

    <!--<div class="col-lg-6 col-12">
    <div class="cardPrincipal">
        <div class="content">
            <h2>Notícias</h2>
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../IMAGES/Norris.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color: black; background: white; box-shadow: 0 0px 35px rgba(0,0,0,9); border-radius: 13px;">
                      <h5><b>Lando Norris</b></h5>
                      <p><b>Ganha a sua primeira corrida em Miami de 2024!</b></p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="../IMAGES/Ocon.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color: black; background: white; box-shadow: 0 0px 35px rgba(0,0,0,9); border-radius: 13px;">
                      <h5><b>'What a race'</b></h5>
                      <p><b>Ocon ficou muito feliz por ter marcado o primeiro ponto da temporada para a Alpine em Miami</b></p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="../IMAGES/Verstappen.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="color: black; background: white; box-shadow: 0 0px 35px rgba(0,0,0,9); border-radius: 13px;">
                      <h5><b>Verstappen</b></h5>
                      <p><b>Admite que não pôde fazer nada para impedir de 'voar' Norris enquanto o holandês elogia o rival pela primeira vitória na F1</b></p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <div class="mateus"></div>
        </div>
    </div>
    </div>
    <div class="col-lg-6 col-12">
      <div class="cardSecundario">
        <div class="content">
          <h2>Introdução</h2>
          <p>A Fórmula 1 é mais do que um desporto – é um espetáculo de velocidade, tecnologia e emoção que cativa milhões de fãs em todo o mundo. Neste site, celebramos cada curva, cada ultrapassagem e cada momento de adrenalina que define o campeonato mais prestigiado do automobilismo.

Aqui encontrarás tudo o que precisas para acompanhar o fascinante mundo da F1: desde as últimas notícias e resultados ao vivo até às histórias de bastidores, análises detalhadas e curiosidades que te aproximam ainda mais deste universo vibrante.

Seja para reviver os momentos históricos das lendas do passado, acompanhar as estrelas do presente ou descobrir os avanços tecnológicos que moldam o futuro das pistas, este é o lugar certo para os verdadeiros fãs de Fórmula 1.

Prepara-te para acelerar connosco e mergulhar num mundo onde cada milésimo de segundo conta!</p>
        </div>
      </div>
    </div>-->
  </div>
</div>

<?php
    include 'MidSection.php';

    //include'Equipas.php';

    //include'Footer.php';
?>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-12">
      <div class="cardSecundario">
        <div class="pontos">
          <h2>Liderança dos Pilotos</h2>
<?php
        if(isset($Utilizadores) && count($Utilizadores) >= 5) {
          echo '<button class="piloto">1º '.$Utilizadores[0]['Nome'].'<div class="pt">'.$Utilizadores[0]['CPontos'].'</div></button>
          <button class="piloto">2º '.$Utilizadores[1]['Nome'].'<div class="pt">'.$Utilizadores[1]['CPontos'].'</div></button>
          <button class="piloto">3º '.$Utilizadores[2]['Nome'].'<div class="pt">'.$Utilizadores[2]['CPontos'].'</div></button>
          <button class="piloto">4º '.$Utilizadores[3]['Nome'].'<div class="pt">'.$Utilizadores[3]['CPontos'].'</div></button>
          <button class="piloto">5º '.$Utilizadores[4]['Nome'].'<div class="pt">'.$Utilizadores[4]['CPontos'].'</div></button>';
      } else {
          echo "Não há dados suficientes para exibir os cinco primeiros pilotos.";
      }
?>
        <button onclick="window.location.href='TabelaPontos.php'" class="mais">Ver tudo</button>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-12">
  <div class="cardSecundario">
      <div class="pontos">
      <h2>Liderança das Equipas</h2>
<?php
        if(isset($Equipas) && count($Equipas) >= 5) {
          echo '<button class="piloto">1º '.$Equipas[0]['Nome'].'<div class="pt">'.$Equipas[0]['Pontos'].'</div></button>
          <button class="piloto">2º '.$Equipas[1]['Nome'].'<div class="pt">'.$Equipas[1]['Pontos'].'</div></button>
          <button class="piloto">3º '.$Equipas[2]['Nome'].'<div class="pt">'.$Equipas[2]['Pontos'].'</div></button>
          <button class="piloto">4º '.$Equipas[3]['Nome'].'<div class="pt">'.$Equipas[3]['Pontos'].'</div></button>
          <button class="piloto">5º '.$Equipas[4]['Nome'].'<div class="pt">'.$Equipas[4]['Pontos'].'</div></button>';
      } else {
          echo "Não há dados suficientes para exibir as cinco primeiras equipas.";
      }
?>
        <button onclick="window.location.href='equipas.php'" class="mais">Ver tudo</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include "../LojaSection.html";
include "Calendario.php";
include "F1UnlockedSection.php";
include "Bilhetes.php";
include "footer.php";
?>
</body>
</html>

<script>
    function scrollToSection() {
        document.getElementById('section').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>