<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Equipas.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/PagPrincipal.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
</head>
<hr style="margin: 0%;">

<?php
        include "LigacaoBD.php";
        $sql = "SELECT 
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
                
        $utilizadores = $conn->query($sql);
        //$Utilizadores = $utilizadores -> fetch_all(MYSQLI_ASSOC);

    if ($utilizadores) {
        $Utilizadores = [];
        while ($row = $utilizadores->fetch_assoc()) {
            $Utilizadores[] = $row;
        }
    } else {
        echo "Erro na consulta: ".$conn->error;
    }
    include "../Navbar.html";
    ?>
    
<div class="sectionForNavbar" id="section">

</div>

<div class="container">
  <div class="row">

    <div class="col-12">
        <h1>Equipas</h1>
    </div>

        <?php
            $pos = 1;
            foreach($Utilizadores as $uti)
            {
                echo'
        <div class="col-xl-6 col-12">
            <div class="equipas">
                <div class="card c'.$pos.'">
                        <div class="posicao">
                        <h1 class="d1">'.$pos.'º</h1>
                        <h1 class="d2">'.utf8_encode($uti['Pontos']).' Pts</h1>
                    </div>
                        <div class="nome">
                        <h2 class="d3">'.utf8_encode($uti['Nome']).'</h2>
                        <img src="../IMAGES/Icons/'.utf8_encode($uti['Carro']).'.avif" class="d4">
                    </div>
                        <div class="plts">
                        <div class="P1">
                            <h3 classe="p1">'.utf8_encode($uti['Piloto1']).'</h3>
                            <img src="../IMAGES/IconPlts/'.utf8_encode($uti['Piloto1']).'.avif" classe="p2">
                        </div>
                        <div class="P2">
                            <h3 classe="p1">'.utf8_encode($uti['Piloto2']).'</h3>
                            <img src="../IMAGES/IconPlts/'.utf8_encode($uti['Piloto2']).'.avif" classe="p2">
                        </div>
                    </div>
                        <div class="carro">
                            <img src="../IMAGES/Carros/'.utf8_encode($uti['Carro']).'.png">
                    </div>
                    <a href="InfEquipa.php?id='.$uti['IDEquipa'].'"><button class="mais">Ver equipa</button></a>
                </div>
            </div>
        </div>';

                $pos++;
            }
        ?>
        <div class="col-12">
  <div class="Espaco"></div>
</div>
  </div>
</div>
<?php
            include "footer.php";
        ?>

    <a href="PagPrincipal.php" class="botao-flutuante" title="Voltar">⮐</a>
</body>
</html>