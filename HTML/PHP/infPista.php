<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/InfPista.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
    <?php
        include "LigacaoBD.php";
        $sql = "SELECT * FROM pistas WHERE Imagem = '".$_GET['imagem']."';";
                
        $equipa = $conn->query($sql);
        
        if ($equipa) {
            $Equipa = [];
            while ($row = $equipa->fetch_assoc()) {
                $Equipa[] = $row;
            }
        } else {
            echo "Erro na consulta: ".$conn->error;
        }

        include "../NavBar.html";
    ?>
    <title>Informação da Pista</title>
</head>
<body>
<div class="sectionForNavbar" id="section"></div>

<div class="container">
    <div class="row">
        <?php
            foreach($Equipa as $infs){
                echo'
                <div class="col-12">
            <h2>'.utf8_encode($infs['Nome']).'</h2>
        </div>
        <div class="col-12">
            <div class="informacao">
            <div class="container">
            <div class="row">
                <div class="col-8"><img src="../IMAGES/Pistas/Inf/'.$infs['Imagem'].'.avif" alt="..."></div>
                <div class="col-4">
                    <div class="detalhes">
                        <div class="Parte1">
                            <div class="d1"><h4>Primeiro GP</h4><h2>'.utf8_encode($infs['PrimeiroGP']).'</h2></div>
                            <div class="d2"><h4>Nº Voltas</h4><h2>'.utf8_encode($infs['NumeroVoltas']).'</h2></div>
                        </div>
                        <hr>
                        <div class="Parte1">
                            <div class="d1"><h4>Tamanho do Circuito</h4><h2>'.utf8_encode($infs['TamanhoCircuito']).'</h2></div>
                            <div class="d2"><h4>Distançia do Circuito</h4><h2>'.utf8_encode($infs['DistanciaCorrida']).'</h2></div>
                        </div>
                        <hr>
                        <h4>Melhor Tempo</h4><h2>'.utf8_encode($infs['MelhorVolta']).'</h2><p>'.utf8_encode($infs['PilotoMelhorVolta']).'</p>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
                ';
            }
        ?>
        <div class="col-12">
            <div class="Espaco"></div>
        </div>
        
        <div class="col-12">
            <div class="curiosidades">
                <?php include 'Curiosidades/'.$_GET['imagem'].'.html'; ?>
            </div>
        </div>

        <div class="col-12">
            <div class="Espaco"></div>
        </div>
    </div>
</div>

<?php
            include "Footer.php"
        ?>

<a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>