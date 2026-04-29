<?php
include "../../../../HTML/PHP/LigacaoBD.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $equipa = $_POST['equipa'];
    $categoria = $_POST['categoria'];
    $genIdade = $_POST['genIdade'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $nmImg = $_POST['nmImg'];

    // Guardar imagem
    if (isset($_FILES['imagem'])) {
        $nomeImagem = $_FILES['imagem']['name'];
        $tmpImagem = $_FILES['imagem']['tmp_name'];
        $destino = "../../../../HTML/IMAGES/ProdutosLojaNormal/" . basename($nomeImagem);

        move_uploaded_file($tmpImagem, $destino);
    }

    // Inserir na base de dados
    $sql = "INSERT INTO lojanormal (Nome, Equipa, Categoria, GeneroIdade, ValorEuro, Quantidade, Descricao, NomeDaImagem)
            VALUES ('$nome', '$equipa', '$categoria', '$genIdade', '$valor', '$quantidade', '$descricao', '$nmImg')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Produto adicionado com sucesso!'); window.location.href = 'PainelAdministrativo.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>
