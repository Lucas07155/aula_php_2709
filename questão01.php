 <!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--Professor: Luís Alberto Pires de Oliveira-->
  <!--Lista de exercício PHP 27/09/24-->

  <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão01</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form method="POST">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="produto<?= $i ?>">Nome do produto <?= $i ?>:</label>
            <input type="text" name="produtos[]" required>
            <label for="preco<?= $i ?>">Preço do produto <?= $i ?>:</label>
            <input type="number" name="precos[]" step="0.01" required>
            <br>
        <?php endfor; ?>
        <br>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produtos = $_POST['produtos'];
        $precos = $_POST['precos'];
        $contagemInferior50 = 0;
        $produtosEntre50e100 = [];
        $somaAcima100 = 0;
        $contagemAcima100 = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($precos[$i] < 50) {
                $contagemInferior50++;
            } elseif ($precos[$i] >= 50 && $precos[$i] <= 100) {
                $produtosEntre50e100[] = $produtos[$i];
            } elseif ($precos[$i] > 100) {
                $somaAcima100 += $precos[$i];
                $contagemAcima100++;
            }
        }
        echo "<h2>Resultados</h2>";
        echo "- Quantidade de produtos com preço inferior a R$50,00: $contagemInferior50<br>";
        echo "- Produtos com preço entre R$50,00 e R$100,00: " . implode(", ", $produtosEntre50e100) . "<br>";
        if ($contagemAcima100 > 0) {
            $mediaAcima100 = $somaAcima100 / $contagemAcima100;
            echo "- Média dos preços dos produtos com preço superior a R$100,00: R$" . number_format($mediaAcima100, 2, ',', '.') . "<br>";
        } else {
            echo "- Nenhum produto com preço superior a R$100,00.<br>";
        }
    }
    ?>
</body>
</html>
