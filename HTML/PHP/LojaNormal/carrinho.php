<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../../CSS/CarrinhoLojaNormal.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/NavBarLoja.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/ScrollBar.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/FooterLoja.css">
    <title>Carrinho</title>
    <?php
    session_start();
    include "../LigacaoBD.php";
    include "NavBarLoja.php";

    $user = $_SESSION['utilizador'];

    $sql = "SELECT lojanormal.* FROM carrinho JOIN lojanormal  ON carrinho.IDProd = lojanormal.IDItem WHERE carrinho.utilizador = '$user'";

    $carrinho = $conn->query($sql);
        
        if ($carrinho) {
            $Carrinho = [];
            while ($row = $carrinho->fetch_assoc()) {
                $Carrinho[] = $row;
            }
        } else {
            echo "Erro na consulta: ".$conn->error;
        }

        $ValorTotal = 0;
    ?>
</head>
<body>
<div class="sectionForNavbar" id="section"></div>

<div class="container">
    <div class="row">

        <div class="col-12">
          <div class="Espaco"></div>
        </div>
        
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-8">
            <div class="areaDados">
                <div class="container">
                    <div class="row">
                <?php
                    foreach($Carrinho as $cart){
                        echo'
                        <div class="col-4">
                            <img src="../../IMAGES/ProdutosLojaNormal/'.$cart['NomeDaImagem'].'" alt="prod">
                        </div>
                        <div class="col-7">
                            <h4>'.$cart['Nome'].'</h4>
                            <h5>Valor: '.$cart['ValorEuro'].'€</h5>
                        </div>
                        <div class="col-1">
                            <a href="RemoveFromCart.php?id='.$cart['IDItem'].'"><img src="../../IMAGES/icons/delete.webp" alt="apagar"></a>
                        </div>
                        <hr>
                        ';

                        $ValorTotal += $cart['ValorEuro'];
                    }
                ?>
                </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="titulo">
                <h4>Sumário do pedido</h4>
            </div>
            <div class="fundoBranco">
                <?php
                    echo "Valor total dos produtos: ".$ValorTotal."€";
                ?>
            </div>
            <div class="areaButton">
                <button onclick="window.location.href='ProcessoPagamento.php'" class="mais">Comprar</button>
            </div>
            <div class="iconsPagDisp">
                <img src="../../IMAGES/Icons/metPag.png" alt="icons">
            </div>
        </div>

    </div>
</div>

    <a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
        ⮐
    </a>
</body>
</html>