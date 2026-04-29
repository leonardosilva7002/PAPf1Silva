<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../IMAGES/F1.png">
    <title>Informação das equipas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/InfEquipas.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/Footer.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/NavBar.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/ScrollBar.css">
  </head>
<body>
    <?php
        include "LigacaoBD.php";
        include "../Navbar.html";

        $sql = "SELECT * FROM Equipas WHERE IDEquipa = ".$_GET['id']."";
                
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
    ?>
<div class="sectionForNavbar" id="section">

</div>

    <div class="container">
  <div class="row">
    <div class="col-xl-6 col-12">
        <div class="infDeEquips">
          <?php
            foreach($Utilizadores as $uti){
              echo'
              <table class="table">
                <thead>
                  <tr>
                    <td scope="col">
                      <img src="../IMAGES/IconsInfEquips/'.utf8_encode($uti['Nome']).'.avif">
                    </td>
                    <td scope="col">
                        <a href="">Perfil ano por ano</a>
                        <br>
                        <a href="">Produtos oficiais</a>
                    </td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">
                      <b>Nome Completo da Equipa</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['FullTeamName']).'
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">
                      <b>Base</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['Base']).'
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">
                      <b>Chefe de Equipa</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['ChefeEquipa']).'
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">
                      <b>Chefe Tecnico</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['ChefeTecnico']).'
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">
                      <b>Unidade de Energia</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['UnidadeEnergia']).'
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">
                      <b>Primeira Entrada da Equipa</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['EntPrimEquipa']).'
                    </td>
                  </tr>
                  <tr>
                    <td scope="row">
                      <b>Campeonatos Mundiais</b>
                    </td>
                    <td>
                      '.utf8_encode($uti['CampsMund']).'
                    </td>
                  </tr>
                </tbody>
              </table>
              ';

              $sqlPiloto1 = "SELECT * FROM pilotos WHERE ID = ".$uti['ID1Plt']."";

              $Piloto1 = $conn->query($sqlPiloto1);
              $InfPiloto1 = $Piloto1 -> fetch_all(MYSQLI_ASSOC);
      
              $sqlPiloto2 = "SELECT * FROM pilotos WHERE ID = ".$uti['ID2Plt']."";
      
              $Piloto2 = $conn->query($sqlPiloto2);
              $InfPiloto2 = $Piloto2 -> fetch_all(MYSQLI_ASSOC);

            }
          ?>
        </div>
    </div>
    <?php
      echo'
      <div class="col-xl-6 col-12">
      <div class="secPlts">
      <div class="baseImg">
        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($uti['ID1Plt']).'.avif" alt="plt1" class="i1 imgPlt">
        <img src="../IMAGES/PilotosInfEquips/'.utf8_encode($uti['ID2Plt']).'.avif" alt="plt2" class="i2 imgPlt">
      </div>
      <div class="baseInf">
      <div class="p1">
      ';
      foreach($InfPiloto1 as $Inf1){
        echo'<b><h1>'.$Inf1['Numero'].'</h1></b>
        <p>'.$Inf1['Nome'].'</p>';
      }
      echo'</div>
      <div class="p2">
      ';
      foreach($InfPiloto2 as $Inf2){
        echo'<b><h1>'.$Inf2['Numero'].'</h1></b>
        <p>'.$Inf2['Nome'].'</p>';
      }
      echo'</div>
      </div>
      </div>
      </div>
      ';
    ?>

<div class="col-12">
  <div class="Espaco"></div>
</div>

<div class="col-12">
  <div class="infToda">
    <h1>Em Perfil</h1>
      <?php
      foreach($Utilizadores as $uti){
        include "InformacaoEquipas/".utf8_encode($uti['Nome']).".html";
      }
      ?>
    <a href="">Ano por ano</a>
  </div>
</div>
  </div>
</div>

<?php
  include "Footer.php";
?>

<a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>