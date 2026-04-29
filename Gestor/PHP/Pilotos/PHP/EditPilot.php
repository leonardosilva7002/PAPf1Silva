<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/EditPilot.css">
    <link rel = "stylesheet" type="text/css" href="../../../CSS/navBar.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Editar</title>
    <?php
        include "../../../../HTML/PHP/LigacaoBD.php";
        $sql = "SELECT * FROM pilotos WHERE ID = '".$_GET['id']."';";
                
        $piloto = $conn->query($sql);
        
        if ($piloto) {
            $Piloto = [];
            while ($row = $piloto->fetch_assoc()) {
                $Piloto[] = $row;
            }
        } else {
            echo "Erro na consulta: ".$conn->error;
        }

        include '../../../HTML/NavBar.html';
    ?>
</head>
<body>
    <div class="sectionForNavbar"></div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="Espaco"></div>
            </div>

            <div class="col-12">

        <div class="cardProduct">
            <div class="container">
            <div class="row">

                <div class="col-4">
                    <div class="ImgProduct">
                        <?php
                            foreach($Piloto as $imgPilot){
                                echo'<img src="../../../../HTML/IMAGES/PilotosInfEquips/'.utf8_encode($imgPilot['ID']).'.avif" alt="...">';
                            }
                        ?>
                    </div>
                </div>
                
                <div class="col-8">
                    <div class="InfProduct">
                    <div class="corpo">
                        <div class="container">
                        <div class="row">
                            <?php
                                foreach($Piloto as $infPilot){
                                    echo'
                                        <div class="col-12">
                                        <h4>Nome</h4>
                                            <input type="text" name="nome" id="nome" value="'.$infPilot['Nome'].'">
                                        </div>
                                        <div class="col-6">
                                        <h4>Equipa</h4>
                                            <input type="text" name="equipa" id="equipa" value="'.$infPilot['Equipa'].'">
                                        </div>
                                        <div class="col-6">
                                        <h4>País</h4>
                                            <input type="text" name="pais" id="pais" value="'.$infPilot['Country'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Número</h4>
                                            <input type="number" name="numero" id="numero" value="'.$infPilot['Numero'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Data de Nasc</h4>
                                            <input type="text" name="data" id="data" value="'.$infPilot['DataNasc'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Total de Pontos</h4>
                                            <input type="number" name="TPontos" id="TPontos" value="'.$infPilot['TPontos'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Campeonatos Mundiais</h4>
                                            <input type="number" name="CM" id="CM" value="'.$infPilot['WChamp'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Pontos Campeonato</h4>
                                            <input type="number" name="CPontos" id="CPontos" value="'.$infPilot['CPontos'].'">
                                        </div>
                                        <div class="col-4">
                                        <h4>Cidade natal</h4>
                                            <input type="text" name="CN" id="CN" value="'.$infPilot['SNasc'].'">
                                        </div>
                                        <div class="col-4">
                                            <a href="DelPilot.php?id='.$infPilot['ID'].'"><button class="eliminar">Eliminar</button></a>
                                        </div>
                                        <div class="col-4">
                                            <button class="cancelar" onclick="javascript:history.back()">Cancelar</button>
                                        </div>
                                        <div class="col-4">
                                            <input type="button" value="Confirmar" class="confirm">
                                        </div>
                                    ';
                                }
                            ?>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>
        </div>
    </div>

<script>
  function Edit() {

    var id = new URLSearchParams(window.location.search).get("id");

    var nome = document.getElementById("nome").value;
    var equipa = document.getElementById("equipa").value;
    var pais = document.getElementById("pais").value;
    var numero = document.getElementById("numero").value;
    var data = document.getElementById("data").value;
    var tPontos = document.getElementById("TPontos").value;
    var cm = document.getElementById("CM").value;
    var cPontos = document.getElementById("CPontos").value;
    var cn = document.getElementById("CN").value;

    fetch('ConfirmarEdit.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `id=${encodeURIComponent(id)}&nome=${encodeURIComponent(nome)}&equipa=${encodeURIComponent(equipa)}&pais=${encodeURIComponent(pais)}&numero=${encodeURIComponent(numero)}&data=${encodeURIComponent(data)}&tPontos=${encodeURIComponent(tPontos)}&cm=${encodeURIComponent(cm)}&cPontos=${encodeURIComponent(cPontos)}&cn=${encodeURIComponent(cn)}`
    })
    .then(response => response.text())
    .then(data => {
      if (data.includes("PainelAdministrativo.php")) {
        window.location.href = "http://localhost/SiteF1Test/Gestor/PHP/pilotos/PHP/ConfirmarEdit.php";
      } else {
        alert("Erro ao atualizar: " + data);
      }
    })
    .catch(error => console.error('Erro:', error));
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.confirm').addEventListener('click', function (event) {
      event.preventDefault();
      Edit();
    });
  });
</script>

</body>
</html>