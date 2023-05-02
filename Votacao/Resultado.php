<?php
    // Verificar se um voto foi enviado
    if (isset($_POST['opcao'])) {
        $opcao = $_POST['opcao'];

        // Abrir o arquivo de texto para salvar o voto
        $arquivo = fopen("votos.txt", "a");

        // Escrever o voto no arquivo
        fwrite($arquivo, $opcao . "\n");

        // Fechar o arquivo
        fclose($arquivo);

        echo "<b>Obrigado pelo seu voto!<br><br> Vote mais vezes para escolher quem vai sair da sua sala<b>";
    } else {
        echo "Por favor, escolha uma opção para votar.";
    }


    // Contar os votos em cada opção
    $votos_opcao1 = 0;
    $votos_opcao2 = 0;
    $votos_opcao3 = 0;
    $votos_opcao4 = 0;

    $arquivo = fopen("votos.txt", "r");

    while (!feof($arquivo)) {
        $linha = fgets($arquivo);

        if ($linha == "opcao1\n") {
            $votos_opcao1++;
        } elseif ($linha == "opcao2\n") {
            $votos_opcao2++;
        } elseif ($linha == "opcao3\n") {
            $votos_opcao4++;
        } elseif ($linha == "opcao4\n") {
            $votos_opcao4++;
        }
    }

    fclose($arquivo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Votação</title>
</head>
<body>
    <h1>Sistema de Votação</h1>
    <?php // Exibir os resultados da votação
    echo "João Vitor: " . $votos_opcao1 . " votos<br>";
    echo "Tatiane: " . $votos_opcao2 . " votos<br>";
    echo "Samuel: " . $votos_opcao3 . " votos<br>"; 
    echo "Mathues: " . $votos_opcao4 . " votos<br>";


    ?>

<button style="margin-top: 2px;"  onclick="window.location.href = 'delete.php'" class="btn btn-danger">Excluir Lista</button>
</body>
</html>

