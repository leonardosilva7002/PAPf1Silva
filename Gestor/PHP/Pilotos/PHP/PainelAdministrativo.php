<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/PainelAdministrativo.css">
    <link rel = "stylesheet" type="text/css" href="../../../CSS/navBar.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Pilotos</title>

    <?php
        include "../../../../HTML/PHP/LigacaoBD.php";
        $sql = "SELECT * FROM pilotos ORDER BY sitef2.pilotos.Equipa ASC LIMIT 1000;";

        $pilotos = $conn->query($sql);
        
        if ($pilotos) {
            $Pilotos = [];
            while ($row = $pilotos->fetch_assoc()) {
                $Pilotos[] = $row;
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
                <a href="AddPilot.php">
                <div class="adicionar">
                    <img src="../../../IMAGES/circuloAdicionar.png" alt="+">
                    <h2>Adicionar Piloto</h2>
                </div>
                </a>
                <div class="Espaco"></div>
            </div>

            <div class="col-12"><h2>Todos os pilotos</h2></div>

            <div class="col-12">
                <div class="fundoBranco">
                    <div class="container">
                        <div class="row">
                            <?php
                                foreach($Pilotos as $pilot){
                                    echo'<div class="col-12 col-sm-4 col-xl-3">
                                            <div class="cardProduct">
                                                <img src="../../../../HTML/IMAGES/PilotosInfEquips/'.utf8_encode($pilot['ID']).'.avif" alt="produto">
                                                <hr>
                                                <button onclick="window.location.href=\'EditPilot.php?id=' . $pilot['ID'] . '\'" class="editar">Editar</button>
                                                <button onclick="window.location.href=\'DelPilot.php?id=' . $pilot['ID'] . '\'" class="eliminar">Eliminar</button>
                                            </div>
                                        </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>