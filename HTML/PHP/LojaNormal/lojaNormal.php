<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../IMAGES/F1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../../CSS/LojaNormalStart.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/NavBarLoja.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/FooterLoja.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/ScrollBar.css">
    <title>Loja</title>
    <?php
        include '../LigacaoBD.php';
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
                    sitef2.equipas.Nome ASC
                LIMIT 1000";
                
        $equipas = $conn->query($sqlEquipas);
        $Equipas = $equipas -> fetch_all(MYSQLI_ASSOC);

        include "NavBarLoja.php";
    ?>
</head>
<body>
<main class="hero">
<div class="content-overlay">
          <h1>Bem-vindo!</h1>
          <p>Veja os produtos que a sua equipa favorita vende mais abaixo. Aprovei-te!</p>
          <a href="#" onclick="lojaInf()" class="botao-flutuante-loja" title="descer">
            <button onclick="lojaInf()">⭣</button>
          </a>
      </div>
</main>

<div class="container">
  <div class="row">
    <div class="col-12">
        <h2 class="titulo">Género / Idade</h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="cardPrincipal">
            <img src="../../IMAGES/EquipsLojaNormal/homem.png" alt="homem">
            <hr>
            <div class="botao"><a href="lojaGeneroIdade.php?generoidade=Homem"><button class="ver">Homens</button></a></div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="cardPrincipal">
            <img src="../../IMAGES/EquipsLojaNormal/mulher.png" alt="mulhers">
            <hr>
            <div class="botao"><a href="lojaGeneroIdade.php?generoidade=Mulher"><button class="ver">Mulheres</button></a></div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="cardPrincipal">
            <img src="../../IMAGES/EquipsLojaNormal/crianca.png" alt="crianca">
            <hr>
            <div class="botao"><a href="lojaGeneroIdade.php?generoidade=Crianca"><button class="ver">Crianças</button></a></div>
        </div>
    </div>

  </div>
</div>

<div class="vermelho" id="sectionComprar">
<div class="corpo">
    <div class="imagemLoja">

    </div>
    <div class="areaButao">
        <h2>Veja todos os produtos disponíveis!</h2>
        <a href="lojaEquipa.php"><button class="mais">Comprar agora</button></a>
    </div>
</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
        <div class="infLojaSuperior">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="imagem"></div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h2 class="tituloNasDivs">Loja de Memórias</h2>
                        <p>Explore um universo dedicado aos apaixonados pelo automobilismo! Na nossa loja de memorabilia, encontrará uma coleção exclusiva de miniaturas de carros icónicos, capacetes autênticos, vestuário oficial e peças históricas que marcaram os momentos mais emocionantes da Fórmula 1.<br>
                            Cada item foi selecionado para capturar a essência e a paixão da velocidade, permitindo-lhe levar para casa um pedaço da história do desporto motorizado. Seja para recordar os seus pilotos favoritos ou para colecionar relíquias únicas, aqui encontrará o presente perfeito para fãs e entusiastas.<br>
                            Descubra a adrenalina e a emoção da Fórmula 1 na nossa loja – um lugar onde o passado, o presente e o futuro da corrida se encontram.
                        </p>
                        <a href="../LojaSuperior/LojaSuperior.php"><button class="mais">Ver Loja de Memórias</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<?php
    include "FooterLoja.php";
?>
    <a href="carrinho.php" class="botao-flutuante-carrinho" title="carrinho">
        <img src="../../IMAGES/Icons/carrinho.webp" alt="carrinho">
    </a>
<a href="../PagPrincipal.php" class="botao-flutuante" title="Voltar">
    <img src="../../IMAGES/Icons/home.png" alt="casa" class="home">
  </a>
</body>
</html>

<script>
    function lojaInf() {
        document.getElementById('sectionComprar').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>