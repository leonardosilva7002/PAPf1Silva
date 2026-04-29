<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "LigacaoBD.php";
    $utilizadores = $conn->query("SELECT * FROM pilotos WHERE ID = ".$_REQUEST['id']);
    $uti = $utilizadores -> fetch_all(MYSQLI_ASSOC);

    $id = $_REQUEST['id'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    <title>PerfilPiloto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/PerfilPiloto.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
</head>
<body>
<div class="sectionForNavbar" id="section"></div>
<?php
    include "../Navbar.html";

    switch($id){
        case ($id == 1 || $id == 2):
            $cor = '1C2536';
            break;
        case ($id == 3 || $id == 4):
            $cor = 'D72933';
            break;
        case ($id == 5 || $id == 6):
            $cor = 'FE9B3D';
            break;
        case ($id == 7 || $id == 10):
            $cor = '2A3137';
            break;
        case ($id == 8 || $id == 9):
            $cor = '068383';
            break;
        case ($id == 11 || $id == 12):
            $cor = '22335D';
            break;
        case ($id == 13 || $id == 14):
            $cor = '51A2D0';
            break;
        case ($id == 15 || $id == 16):
            $cor = '8AD98D';
            break;
        case ($id == 17 || $id == 18):
            $cor = 'D2D2D4';
            break;
        case ($id == 19 || $id == 20):
            $cor = '436DB4';
            break;
    }

    foreach ($uti as $utilizador) {
    echo'
    
    <div class="container">
    <div class="row">
        <div class="col-5">
            <div class="fundoPlt">
                <img src="../IMAGES/IconPlts/'.utf8_encode($utilizador['Nome']).'.avif" alt="Piloto">
                <div class="vermelhoPlt">
                    <div class="corpoPlt">
                        <div class="numCty">
                            <div class="n"><h3>'.utf8_encode($utilizador['Numero']).'</h3></div>
                            <div class="c"><img src="../IMAGES/BandeirasPlts/'.utf8_encode($utilizador['Country']).'.avif" alt="Cty"></div>
                        </div>
                        <div class="nome">
                            <h2>'.utf8_encode($utilizador['Nome']).'</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="fundo">
            <img src="../IMAGES/IconsInfEquips/'.utf8_encode($utilizador['Equipa']).'.avif">
                <table>
                <tr>
                   <td><b>Equipa</b></td>
                   <td>'.utf8_encode($utilizador['Equipa']).'</td>
                </tr>
                <tr>
                   <td><b>País</b></td>
                   <td>'.utf8_encode($utilizador['Country']).'</td>
                </tr>
                <tr>
                   <td><b>Pontos</b></td>
                   <td>'.utf8_encode($utilizador['TPontos']).'</td>
                </tr>
                <tr>
                   <td><b>Campeonatos Mundiais</b></td>
                   <td>'.utf8_encode($utilizador['WChamp']).'</td>
                </tr>
                <tr>
                   <td><b>Data de Nascimento</b></td>
                   <td>'.utf8_encode($utilizador['DataNasc']).'</td>
                </tr>
                <tr>
                   <td><b>Onde nasceu</b></td>
                   <td>'.utf8_encode($utilizador['SNasc']).'</td>
                </tr>
            </table>
            </div>
        </div>    
    ';
    }
?>

        <div class="col-12">
            <div class="biografia">
                <h2>Biografia</h2>
                <div class="divisao">
                    <div class="a1">
                        <div class="borda">
                            <?php
                                echo '<img src="../IMAGES/BIOSPlts/'.$utilizador['Nome'].'.webp" alt="Plt">';
                            ?>
                        </div>
                    </div>
                    <div class="a2">
                    <?php
                        include "Bios/".$utilizador['Nome'].".html";
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="Espaco"></div>
        </div>
    </div>
</div>

<?php
    include 'Footer.php';
?>

 <a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>