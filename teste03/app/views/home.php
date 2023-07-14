<?php 



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/style.css">
    </head>
    <body>
    <div class="container">
    <div class="tv-program">
      <h2>Próximo programa de TV</h2>
      <p>Nome do programa: <strong id='proxprograma'></strong></p>
      <p>Horário de exibição: <strong id='proxhorario'></strong></p>
      <p>Gênero: <strong id='proxgenero'></strong></p>
      <p>Dia da semana: <strong id='proxdia'></strong></p>
    </div>

    <div class="form-container">
      <h2>Selecionar série</h2>
      <form id='formBuscaHorarioSerie'>
        <select>
          <option value="">Selecione uma série</option>
          <option value="serie1">Série 1</option>
          <option value="serie2">Série 2</option>
          <option value="serie3">Série 3</option>
        </select>
        <p>Horário de exibição da série: <span id="horario-exibicao"></span></p>
        <button type="">Enviar</button>
      </form>
    </div>
  </div>
        
        <script src="../../js/script.js"></script>

    </body>
</html>