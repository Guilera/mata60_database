<?php
  include ("conectar-ponto_turistico.php");
  $valor_buscar = $_POST['pesq-ponto_turistico'];
  $grupo = pesquisar_pontos_turisticos( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Pesquisa</title>
  <h1>Resultado Pontos Turísticos<br></h1>
  <link rel="stylesheet" type="text/css" href="../../css/style2.css">
</head>

<body>
  
  <div>
    <div class="box">
      <h3>Resultados para <font color="0000FF"><?=$valor_buscar?></font> : <?=count($grupo)?></h3>
      <!-- <h3>Resultados para <i><?=$valor_buscar?></i> :</h3> -->
    </div>
    <div class="box" style="float: right;">
     <form name="voltar" action="../../pages/pontos_turisticos.php">
        <input type="submit" value="Voltar" />
     </form>
    </div>
  </div>
  <br><br>

  <table class="responstable">

    <thead>
      <tr>
        <th width="200">Nome</th>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Logradouro</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $pontos_turisticos) { ?>
          
        <tr>
          <td><?=$pontos_turisticos["nome"]?></td>
          <td><?=$pontos_turisticos["tipo"]?></td>
          <td><?=$pontos_turisticos["descricao"]?></td>
          <td><?=$pontos_turisticos["logradouro"]?></td>
          <td><?=$pontos_turisticos["bairro"]?></td>
          <td><?=$pontos_turisticos["cidnome"]?></td>
          <td>
            <form name="alterar-ponto_turistico" action="alterar-ponto_turistico.php" method="POST">
              <input type="hidden" name="ponto_turistico_id" value="<?=$pontos_turisticos["ponto_turistico_id"]?>" />
              <input type="image" width="30" src="../../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-ponto_turistico" action="conectar-ponto_turistico.php" method="POST">
              <input type="hidden" name="ponto_turistico_id" value="<?=$pontos_turisticos["ponto_turistico_id"]?>" />
              <input type="hidden" name="acao" value="excluir-ponto_turistico" />
              <input type="image" width="30" src="../../imgs/i-excluir.png">
              <!--<input type="submit" value="Excluir" name="excluir" />-->
            </form>
          </td>
        </tr>

      <?php 
      } ?>
      
    </tbody>
  </table>
</body>

</html>