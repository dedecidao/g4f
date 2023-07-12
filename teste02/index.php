<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste 02 G4F</title>
</head>
<style>
    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 
        'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 
        'Open Sans', 
        'Helvetica Neue', sans-serif;
        text-align: center;
    }

    h1 {
        color: #333;
    }

    .numero {
        margin-bottom: 5px;
    }
</style>

<body>
    <h1>Procura Tabela ASCII</h1>
    <h2 style="display: inline-block;">Candidato: André Luís Araujo</h2>
    <img src="https://img.shields.io/badge/Status-Em%20Andamento-yellow" alt="Status do Projeto" style=position:relative;>

    
    <div id="resultado"></div>

    <button onclick="window.location.reload();" style='background-color: #4CAF50; color: white;font-size: 16px; border-radius: 4px; border: none; cursor:pointer;padding: 10px' >Executar</button> 

    <?php 
    //temporizador
    $tempo_inicial = microtime(true);
    //input
    $arrCharsAscii = array();
    $arrCharsAscii = range(',', '|');
    $totalElementos = count($arrCharsAscii);

    //code
    $elRemovido = array_splice($arrCharsAscii, rand(0, count($arrCharsAscii) - 1), 1);
    $somaEsperada = $totalElementos * ($totalElementos + 1) / 2; //formula da soma de PA
    $somaAtual = array_sum(array_map('ord',$arrCharsAscii)); 
    $elFaltante = $somaEsperada - $somaAtual;
    //pause
    $tempo_final = microtime(true);
    $tempo = $tempo_final - $tempo_inicial;
    //output
    echo '<h3>Elementos da tabela ASCII:</h3>';
    foreach ($arrCharsAscii as $key => $value) {
        echo "<span class='numero'>$value</span>";
    }
    echo "<h3>Elemento removido: <span style='color: red;'>$elRemovido[0]</span></h3>";
    echo "<h3>Tempo de execução: <span style='color: red;'>" . number_format($tempo, 6) . "</span> segundos</h3>";

     ?>
</body>


</html>