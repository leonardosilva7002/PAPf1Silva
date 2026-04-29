<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../IMAGES/F1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type="text/css" href="../../CSS/LojaProduto.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/NavBarLoja.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/ScrollBar.css">
    <link rel = "stylesheet" type="text/css" href="../../CSS/FooterLoja.css">
    <title>Produto</title>
    <?php
        include "../LigacaoBD.php";
        $sql = "SELECT * FROM lojanormal WHERE IDItem = '".$_GET['id']."';";
                
        $equipa = $conn->query($sql);
        
        if ($equipa) {
            $Equipa = [];
            while ($row = $equipa->fetch_assoc()) {
                $Equipa[] = $row;
            }
        } else {
            echo "Erro na consulta: ".$conn->error;
        }

        if(!empty($Equipa)){$Cat = $Equipa[0];}

        include "NavBarLoja.php";
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

<div class="Product">
<div class="container">
<div class="row">

<div class="col-4">
    <div class="ImgProduct">
        <?php
            foreach($Equipa as $produto){
                echo'<img src="../../IMAGES/ProdutosLojaNormal/'.utf8_encode($produto['NomeDaImagem']).'" alt="...">';
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
            foreach($Equipa as $produto){
                echo'<div class="col-12"><h3>'.utf8_encode($produto['Nome']).'</h3></div>
                <hr>';       
                echo'
                <div class="col-6">
                
                <div class="PraCarrinho">
                <h4 class="Valor">Valor: '.utf8_encode($produto['ValorEuro']).'€</h4>

                <select>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <a href="AddCarrinho.php?x='.$produto['IDItem'].'"><button class="ver">Adicionar</button></a>

                </div>

                </div>

                <div class="col-6">

                <h4>Descrição</h4>
                <p>'.$produto['Descricao'].'</p>
                
                </div>
                
                <hr>

                <div class="col-12">

                <h4>Política de Devolução</h4>
                <p>Você pode devolver o produto até 90 dias se não estiver satisfeito. Leia a nossa política de devolução completa para mais detalhes <a href="PD.php" class="aqui">Aqui</a>.</p>
                
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

<div class="col-12">
  <div class="Espaco"></div>
</div>

</div>
</div>
                <?php
                    $sqlCategorias = "SELECT * FROM lojanormal WHERE Categoria = '".$Cat['Categoria']."';";
                
                    $categoria = $conn->query($sqlCategorias);
                    
                    if ($categoria) {
                        $Categoria = [];
                        while ($row = $categoria->fetch_assoc()) {
                            $Categoria[] = $row;
                        }
                    } else {
                        echo "Erro na consulta: ".$conn->error;
                    }
                    
                    if(!empty($Categoria)){
                        $R1=$Categoria[0]; $R2=$Categoria[1]; $R3=$Categoria[2]; $R4=$Categoria[3];

                        echo'          
                        <div class="vermelhoCategoria">
                          <div class="corpoCategoria">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Produtos desta Categoria</h4>
                                    </div>
                                    <div class="col-3"><div class="cardOutros"><img src="../../IMAGES/ProdutosLojaNormal/'.utf8_encode($R1['NomeDaImagem']).'" alt=""></div></div>
                                    <div class="col-3"><div class="cardOutros"><img src="../../IMAGES/ProdutosLojaNormal/'.utf8_encode($R2['NomeDaImagem']).'" alt=""></div></div>
                                    <div class="col-3"><div class="cardOutros"><img src="../../IMAGES/ProdutosLojaNormal/'.utf8_encode($R3['NomeDaImagem']).'" alt=""></div></div>
                                    <div class="col-3"><div class="cardOutros"><img src="../../IMAGES/ProdutosLojaNormal/'.utf8_encode($R4['NomeDaImagem']).'" alt=""></div></div>
                                </div>
                            </div>
                          </div>
                        </div>
                                  ';
                    }
                ?>

<?php
    include "FooterLoja.php";
?>

<a href="javascript:history.back()" class="botao-flutuante" title="Voltar">
    ⮐
  </a>
</body>
</html>