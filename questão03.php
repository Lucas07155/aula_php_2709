<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--Professor: Luís Alberto Pires de Oliveira-->
  <!--Lista de exercício PHP 27/09/24-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 03</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Números</h1>
    <form method="POST">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <label for="numero<?= $i ?>">Número <?= $i ?>:</label>
            <input type="number" name="numeros[]" required>
            <br>
        <?php endfor; ?>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeros = $_POST['numeros'];
        $contagemNegativos = 0;
        $contagemPositivos = 0;
        $contagemPares = 0;
        $contagemImpares = 0;
        foreach ($numeros as $numero) {
            if ($numero < 0) {
                $contagemNegativos++;
            } elseif ($numero > 0) {
                $contagemPositivos++;
            }
            if ($numero % 2 == 0) {
                $contagemPares++;
            } else {
                $contagemImpares++;
            }
        }
        echo "<h2>Resultados</h2>";
        echo "- Quantidade de números negativos: $contagemNegativos<br>";
        echo "- Quantidade de números positivos: $contagemPositivos<br>";
        echo "- Quantidade de números pares: $contagemPares<br>";
        echo "- Quantidade de números ímpares: $contagemImpares<br>";
    }
    ?>
</body>
</html>
