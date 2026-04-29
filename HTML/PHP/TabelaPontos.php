<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    <title>Tabela dos Pontos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/TabelaPontos.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
</head>
<body>
<?php
    include "LigacaoBD.php";
    $utilizadores = $conn->query("SELECT * FROM pilotos ORDER BY `CPontos` DESC LIMIT 1000");
    $uti = $utilizadores -> fetch_all(MYSQLI_ASSOC);

    include "../Navbar.html";
?>
<div class="sectionForNavbar" id="section"></div>

<!--<div class="container">
  <div class="row">
    <div class="col-lg-6 col-12">
        <div class="cardTabela">
            <div class="tabela">
                <table class="table">
                    <th></th>
                    <th>Nome</th>
                    <th>Equipa</th>
                    <th>Pontos</th>
                    <th></th>
                    <?php
                        $x = 1;
                        foreach($uti as $utilizador)
                        {
                            /*echo'<tr>
                            <td>'.$x.'º</td>
                            <td><b>'.utf8_encode($utilizador['Nome']).'</b></td>
                            <td>'.utf8_encode($utilizador['Equipa']).'</td>
                            <td>'.utf8_encode($utilizador['CPontos']).'</td>
                            <td><a href="PerfilPiloto.php?id='.$utilizador['ID'].'"><button class="mais">Detalhes</button></a></td>
                            </tr>';
                            $x++;*/
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
      <div class="mvp">
        <table class="table table-hover">
              <th colspan="2"><h2>Pilotos com mais pontos</h2></th>-->
              
              <div class="container">
              <div class="row">
                <div class="col-12">
                  <h1>Pilotos</h1>
                </div>
              </div>
              </div>

              <div class="vermelho">
                <div class="corpo">

                </div>
              </div>

              <div class="container">
              <div class="row">

              <div class="col-12">
              <div class="top5">
              <?php
                if (!empty($uti)) {
                    /*$primeiroPiloto = $uti[0];
                    echo '<tr>
                            <td>' . utf8_encode($primeiroPiloto['Nome']) . '</td>
                            <td><img src="../IMAGES/' . utf8_encode($primeiroPiloto['Nome']) . '.avif" alt="" class="pilotoMVP"></td>
                          </tr>';
                    
                    $segundoPiloto = $uti[1];
                    echo '<tr>
                            <td>' . utf8_encode($segundoPiloto['Nome']) . '</td>
                            <td><img src="../IMAGES/' . utf8_encode($segundoPiloto['Nome']) . '.avif" alt="" class="pilotoMVP"></td>
                          </tr>';

                    $terceiroPiloto = $uti[2];
                    echo '<tr>
                            <td>' . utf8_encode($terceiroPiloto['Nome']) . '</td>
                            <td><img src="../IMAGES/' . utf8_encode($terceiroPiloto['Nome']) . '.avif" alt="" class="pilotoMVP"></td>
                          </tr>';*/

                          $P1 = $uti[0];$P2 = $uti[1];$P3 = $uti[2];$P4 = $uti[3];$P5 = $uti[4];

                    echo'
                    
                    <div class="container2">
                      <div class="card">
                        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($P1['ID']).'.avif" onclick="window.location.href=\'PerfilPiloto.php?id=' . $P1['ID'] . '\'">
                      </div>
                      <div class="card">
                        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($P2['ID']).'.avif" onclick="window.location.href=\'PerfilPiloto.php?id=' . $P2['ID'] . '\'">
                      </div>
                      <div class="card">
                        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($P3['ID']).'.avif" onclick="window.location.href=\'PerfilPiloto.php?id=' . $P3['ID'] . '\'">
                      </div>
                      <div class="card">
                        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($P4['ID']).'.avif" onclick="window.location.href=\'PerfilPiloto.php?id=' . $P4['ID'] . '\'">
                      </div>
                      <div class="card">
                        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($P5['ID']).'.avif" onclick="window.location.href=\'PerfilPiloto.php?id=' . $P5['ID'] . '\'">
                      </div>
                    </div>
                    
                    ';
                }
              ?>
          </div>
          </div>

          </div>
          </div>

          <div class="vermelho">
                <div class="corpo">
                  
                </div>
              </div>

          <div class="container">
          <div class="row">

          <div class="col-12">
            <div class="Espaco1"></div>
          </div>
          
          <?php
            $x = 6;
              foreach (array_slice($uti, 5) as $piloto) {
                  echo '
                        
                  <div class="col-lg-3 col-md-4 col-6">
                      <div class="cardPlt" onclick="window.location.href=\'PerfilPiloto.php?id=' . $piloto['ID'] . '\'">
                        <div class="Pt">
                          <div class="p1">'.$x.'º</div>
                          <div class="p2">'.$piloto['CPontos'].' Pts</div>
                        </div>
                        <hr>
                        <div class="Nm">
                          <div class="n1">'.$piloto['PNome'].'<br><b><h5>'.$piloto['SNome'].'</h5></b></div>
                          <div class="n2"><img src="../IMAGES/BandeirasPlts/'.$piloto['Country'].'.avif" alt="bandeira"></div>
                        </div>
                        <hr>
                        <div class="Imag">
                          <div class="i1"></div>
                          <div class="i2"><img src="../IMAGES/IconPlts/'.$piloto['Nome'].'.avif" alt="piloto"></div>
                        </div>
                      </div>
                  </div>
                  
                  ';
                  $x++;
              }
          ?>

<div class="col-12">
  <div class="Espaco"></div>
</div>

          </div>
          </div>
        <!--</table>
      </div>
    </div>
  </div>
</div>-->
<?php
    include 'Footer.php';
?>

<a href="PagPrincipal.php" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>