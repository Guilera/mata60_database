<?php
  include ("conectar-cidade.php");
  $valor_buscar = $_POST['pesquisar-cidade'];
  $grupo = pesquisar_cidades( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Pesquisa</title>
  <h1>Resultado Cidades<br></h1>
  <!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
  <link rel="stylesheet" type="text/css" href="../../css/style2.css">
</head>

<body>
  
  <div>
    <div class="box">
      <h3>Resultados para <font color="0000FF"><?=$valor_buscar?></font> : <?=count($grupo)?></h3>
      <!-- <h3>Resultados para <i><?=$valor_buscar?></i> :</h3> -->
    </div>
    <div class="box" style="float: right;">
     <form name="voltar" action="../../pages/cidades.php">
        <input type="submit" value="Voltar" />
     </form>
    </div>
  </div>
  <br><br>

  <table class="responstable">

    <thead>
      <tr>
        <th width="300">Nome</th>
        <th width="300">Unidade Federativa</th>
        <th width="8"></th>
        <th width="8"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $cidades) { ?>
          
        <tr>
          <td><?=$cidades["nome"]?></td>
          <td><?=$cidades["ufnome"]?></td>
          <td>
            <form name="alterar-cidade" action="alterar-cidade.php" method="POST">
              <input type="hidden" name="cidade_id" value="<?=$cidades["cidade_id"]?>" />
              <input type="image" width="30" src="../../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-cidade" action="conectar-cidade.php" method="POST">
              <input type="hidden" name="cidade_id" value="<?=$cidades["cidade_id"]?>" />
              <input type="hidden" name="acao" value="excluir-cidade" />
              <input type="image" width="30" src="../../imgs/i-excluir.png">
              <!--<input type="submit" value="Excluir" name="excluir" />-->
            </form>
          </td>
        </tr>

      <?php 
      } ?>
      
    </tbody>
  </table>
    
  <?php
    function formatoData($data) {
      $array = explode("-", $data);
      $novaData = $array[2]."/".$array[1]."/".$array[0];
      return $novaData;
    }
  ?>
</body>

</html>