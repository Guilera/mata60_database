<?php
  include ("conectar-evento.php");
  $valor_buscar = $_POST['pesquisar-evento'];
  $grupo = pesquisar_eventos( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Pesquisa</title>
  <h1>Resultado Eventos<br></h1>
  <!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
  <link rel="stylesheet" type="text/css" href="../../css/style2.css">
</head>

<body>
  
  <div>
    <div class="box">
      <h3>Resultados para <font color="0000FF"><?=$valor_buscar?></font> : <?=count($grupo)?></h3>
    </div>
    <div class="box" style="float: right;">
     <form name="voltar" action="../../pages/eventos.php">
        <input type="submit" value="Voltar" />
     </form>
    </div>
  </div>
  <br><br>

  <table class="responstable">

    <thead>
      <tr>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Data-Hora</th>
        <th>Valor</th>
        <th>Logradouro</th>
        <th>Anunciantes</th>
        <th>Cidade</th>
        <th width="8"></th>
        <th width="8"></th>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $eventos) { ?>
          
        <tr>
          <td><?=$eventos["nome"]?></td>
          <td><?=$eventos["tipo"]?></td>
          <td><?=$eventos["descricao"]?></td>
          <td><?=$eventos["data_hora"]?></td>
          <td><?=$eventos["valor"]?></td>
          <td><?=$eventos["logradouro"]?></td>
          <td><?=$eventos["anuncnome"]?></td>
          <td><?=$eventos["cidnome"]?></td>
          <td>
            <form name="alterar-evento" action="../metodo/evento/alterar-evento.php" method="POST">
              <input type="hidden" name="evento_id" value="<?=$eventos["evento_id"]?>" />
              <input type="image" width="30" src="../imgs/i-editar.png">
            </form>
          </td>
          <td>
            <form name="excluir-evento" action="../metodo/evento/conectar-evento.php" method="POST">
              <input type="hidden" name="evento_id" value="<?=$eventos["evento_id"]?>" />
              <input type="hidden" name="acao" value="excluir-evento" />
              <input type="image" width="30" src="../imgs/i-excluir.png">
            </form>
          </td>
        </tr>

      <?php 
      } ?>
      
    </tbody>
  </table>
</body>

</html>