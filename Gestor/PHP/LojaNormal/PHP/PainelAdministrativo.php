<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../CSS/PainelAdministrativo.css">
    <link rel = "stylesheet" type="text/css" href="../CSS/navBar.css">
    <link rel = "stylesheet" type="text/css" href="../../../../HTML/CSS/ScrollBar.css">
    <title>Loja</title>

    <?php
        include "../../../../HTML/PHP/LigacaoBD.php";
        $sql = "SELECT * FROM lojanormal ORDER BY sitef2.lojanormal.Equipa ASC LIMIT 1000;";

        $produto = $conn->query($sql);
        
        if ($produto) {
            $Produto = [];
            while ($row = $produto->fetch_assoc()) {
                $Produto[] = $row;
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
        <a href="AddProd.php">
        <div class="adicionar">
            <img src="../../../IMAGES/circuloAdicionar.png" alt="+">
            <h2>Adicionar Produto</h2>
        </div>
        </a>
        <div class="Espaco"></div>
    </div>

    <div class="col-12"><h2>Todos os produtos</h2></div>

    <div class="col-12">
        <div class="filtroEquipa">
            <div class="container">
                <div class="row">
                    <div class="col-2"><button class="equipa" onclick="Alpine()">Alpine</button></div>
                    <div class="col-2"><button class="equipa" onclick="AstMar()">Aston Martin</button></div>
                    <div class="col-2"><button class="equipa" onclick="Ferrari()">Ferrari</button></div>
                    <div class="col-2"><button class="equipa" onclick="Haas()">Haas</button></div>
                    <div class="col-2"><button class="equipa" onclick="KS()">Kick Sauber</button></div>
                    <div class="col-2"><button class="equipa" onclick="McLaren()">McLaren</button></div>
                    <div class="col-2"><button class="equipa" onclick="Mercedes()">Mercedes</button></div>
                    <div class="col-2"><button class="equipa" onclick="RB()">RB</button></div>
                    <div class="col-2"><button class="equipa" onclick="RedBull()">Red Bull</button></div>
                    <div class="col-2"><button class="equipa" onclick="Williams()">Williams</button></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="fundoBranco">
            <div class="container">
                <div class="row">

    <?php
                $sqlAlpine = "SELECT * FROM lojanormal WHERE Equipa = 'Alpine' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $alpine = $conn->query($sqlAlpine);
        
                if ($alpine) {
                    $Alpine = [];
                    while ($row = $alpine->fetch_assoc()) {
                        $Alpine[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionAlpine'>Alpine</h3><hr class='linhaTitulo'>";

                foreach($Alpine as $produtosAlpine){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosAlpine['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosAlpine['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosAlpine['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosAlpine['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlAstonMartin = "SELECT * FROM lojanormal WHERE Equipa = 'Aston Martin' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $astonMartin = $conn->query($sqlAstonMartin);
        
                if ($astonMartin) {
                    $AstonMartin = [];
                    while ($row = $astonMartin->fetch_assoc()) {
                        $AstonMartin[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionAstMar'>Aston Martin</h3><hr class='linhaTitulo'>";

                foreach($AstonMartin as $produtosAstonMartin){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosAstonMartin['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosAstonMartin['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosAstonMartin['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosAstonMartin['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlFerrari = "SELECT * FROM lojanormal WHERE Equipa = 'Ferrari' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $ferrari = $conn->query($sqlFerrari);
        
                if ($ferrari) {
                    $Ferrari = [];
                    while ($row = $ferrari->fetch_assoc()) {
                        $Ferrari[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionFerrari'>Ferrari</h3><hr class='linhaTitulo'>";

                foreach($Ferrari as $produtosFerrari){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosFerrari['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosFerrari['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosFerrari['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosFerrari['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlHaas = "SELECT * FROM lojanormal WHERE Equipa = 'Haas' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $haas = $conn->query($sqlHaas);
        
                if ($haas) {
                    $Haas = [];
                    while ($row = $haas->fetch_assoc()) {
                        $Haas[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionHaas'>Haas</h3><hr class='linhaTitulo'>";

                foreach($Haas as $produtosHaas){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosHaas['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosHaas['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosHaas['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosHaas['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlKickSauber = "SELECT * FROM lojanormal WHERE Equipa = 'Kick Sauber' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $kickSauber = $conn->query($sqlKickSauber);
        
                if ($kickSauber) {
                    $KickSauber = [];
                    while ($row = $kickSauber->fetch_assoc()) {
                        $KickSauber[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionKS'>Kick Sauber</h3><hr class='linhaTitulo'>";

                foreach($KickSauber as $produtosKickSauber){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosKickSauber['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosKickSauber['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosKickSauber['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosKickSauber['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlMcLaren = "SELECT * FROM lojanormal WHERE Equipa = 'McLaren' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $mclaren = $conn->query($sqlMcLaren);
        
                if ($mclaren) {
                    $McLaren = [];
                    while ($row = $mclaren->fetch_assoc()) {
                        $McLaren[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionMcLaren'>McLaren</h3><hr class='linhaTitulo'>";

                foreach($McLaren as $produtosMcLaren){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosMcLaren['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosMcLaren['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosMcLaren['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosMcLaren['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlMercedes = "SELECT * FROM lojanormal WHERE Equipa = 'Mercedes' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $mercedes = $conn->query($sqlMercedes);
        
                if ($mercedes) {
                    $Mercedes = [];
                    while ($row = $mercedes->fetch_assoc()) {
                        $Mercedes[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionMercedes'>Mercedes</h3><hr class='linhaTitulo'>";

                foreach($Mercedes as $produtosMercedes){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosMercedes['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosMercedes['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosMercedes['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosMercedes['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlRB = "SELECT * FROM lojanormal WHERE Equipa = 'RB' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $rb = $conn->query($sqlRB);
        
                if ($rb) {
                    $RB = [];
                    while ($row = $rb->fetch_assoc()) {
                        $RB[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionRB'>RB</h3><hr class='linhaTitulo'>";

                foreach($RB as $produtosRB){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosRB['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosRB['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosRB['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosRB['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlRedBull = "SELECT * FROM lojanormal WHERE Equipa = 'Red Bull' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $redbull = $conn->query($sqlRedBull);
        
                if ($redbull) {
                    $RedBull = [];
                    while ($row = $redbull->fetch_assoc()) {
                        $RedBull[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionRedBull'>Red Bull</h3><hr class='linhaTitulo'>";

                foreach($RedBull as $produtosRedBull){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosRedBull['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosRedBull['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosRedBull['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosRedBull['IDItem'] . '\'" class="eliminar">Eliminar</button>
                        </div>
                    </div>';
                }

                $sqlWilliams = "SELECT * FROM lojanormal WHERE Equipa = 'Williams' ORDER BY sitef2.lojanormal.Nome ASC LIMIT 1000;";

                $williams = $conn->query($sqlWilliams);
        
                if ($williams) {
                    $Williams = [];
                    while ($row = $williams->fetch_assoc()) {
                        $Williams[] = $row;
                    }
                } else {
                    echo "Erro na consulta: ".$conn->error;
                }

                echo"<h3 id='sectionWilliams'>Williams</h3><hr class='linhaTitulo'>";

                foreach($Williams as $produtosWilliams){
                    echo'<div class="col-12 col-sm-4 col-xl-3">
                        <div class="cardProduct">
                            <img src="../../../../HTML/IMAGES/ProdutosLojaNormal/'.utf8_encode($produtosWilliams['NomeDaImagem']).'" alt="produto" onclick="window.location.href=\'produto.php?id=' . $produtosWilliams['IDItem'] . '\'">
                            <hr>
                            <button onclick="window.location.href=\'EditProd.php?id=' . $produtosWilliams['IDItem'] . '\'" class="editar">Editar</button>
                            <button onclick="window.location.href=\'DelProd.php?id=' . $produtosWilliams['IDItem'] . '\'" class="eliminar">Eliminar</button>
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

    <a href="../../telaPrincipal.php" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>

<script>
    function Alpine() {
        document.getElementById('sectionAlpine').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function AstMar() {
        document.getElementById('sectionAstMar').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function Ferrari() {
        document.getElementById('sectionFerrari').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function Haas() {
        document.getElementById('sectionHaas').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function KS() {
        document.getElementById('sectionKS').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function McLaren() {
        document.getElementById('sectionMcLaren').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function Mercedes() {
        document.getElementById('sectionMercedes').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function RB() {
        document.getElementById('sectionRB').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function RedBull() {
        document.getElementById('sectionRedBull').scrollIntoView({
            behavior: 'smooth'
        });
    }
    function Williams() {
        document.getElementById('sectionWilliams').scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>