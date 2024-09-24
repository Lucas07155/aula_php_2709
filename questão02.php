<!--Desenvolvido por Lucas De Carvalho Praxedes-->
  <!--Professor: Luís Alberto Pires de Oliveira-->
  <!--Lista de exercício PHP 27/09/24-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão02</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <form method="POST">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <label for="aluno<?= $i ?>">Nome do Aluno <?= $i ?>:</label>
            <input type="text" name="nomes[]" required>
            <label for="nota<?= $i ?>">Nota do Aluno <?= $i ?>:</label>
            <input type="number" name="notas[]" step="0.01" required>
            <br>
        <?php endfor; ?>
        <br>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomes = $_POST['nomes'];
        $notas = $_POST['notas'];
        $somaNotas = 0;
        $maiorNota = 0;
        $alunoMaiorNota = '';
        for ($i = 0; $i < 10; $i++) {
            $somaNotas += $notas[$i];

            if ($notas[$i] > $maiorNota) {
                $maiorNota = $notas[$i];
                $alunoMaiorNota = $nomes[$i];
            }
        }
        $mediaNotas = $somaNotas / 10;
        echo "<h2>Resultados</h2>";
        echo "- Média de notas da classe: " . number_format($mediaNotas, 2, ',', '.') . "<br>";
        echo "- Aluno com maior nota: $alunoMaiorNota com nota " . number_format($maiorNota, 2, ',', '.') . "<br>";
    }
    ?>
</body>
</html>
