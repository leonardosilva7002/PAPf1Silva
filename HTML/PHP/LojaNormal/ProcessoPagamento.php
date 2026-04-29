<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../../CSS/ProcessoPagamento.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/NavBarLoja.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/ScrollBar.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/FooterLoja.css">
    <title>Processo de Pagamento</title>
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
    $ValorTotalProds = 0;
    $Shipping = 8.45;

    foreach($Carrinho as $cart){
        $ValorTotalProds += $cart['ValorEuro'];
        $ValorTotal += $cart['ValorEuro'];
    }

    $ValorTotal += $Shipping;
    ?>
</head>
<body>
<div class="sectionForNavbar" id="section"></div>

<div class="container">
    <div class="row">

        <div class="col-12">
          <div class="Espaco"></div>
        </div>
        
        <div class="col-12">
            <h2>Selecionar método de Pagamento</h2>
        </div>

        <div class="col-8">
            <div class="mbwaydiv">
                <img src="../../IMAGES/Icons/MBWay.png" alt="MBWay-icon">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Número de Telemóvel" aria-label="Numero" aria-describedby="button-addon2">
                    <button onclick="window.location.href='Pagar.php'" class="mais">Mandar</button>
                </div>
            </div>

            <div class="crdtcd">
                <img src="../../IMAGES/Icons/CrdCard.png" alt="CrdCard-icon">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Número do cartão" aria-label="Numero Card" aria-describedby="button-addon2">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="MM/YY" aria-label="MMYY">
                    <input type="text" class="form-control" placeholder="CVV" aria-label="CVV">
                </div>
                <button onclick="window.location.href='Pagar.php'" class="mais">Completar Pedido</button>
            </div>
        </div>

        <div class="col-4">
            <div class="titulo">
                <h4>Sumário do pedido</h4>
            </div>
            <div class="fundoBranco">
                <?php
                    echo "Valor total dos produtos: ".$ValorTotalProds."€ <br>";
                    echo "Shipping:  ".$Shipping."€<br><br>";
                    echo "Valor total do pedido: ".$ValorTotal."€";
                ?>
            </div>
        </div>
    </div>
</div>

    <a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
        ⮐
    </a>
</body>
</html>