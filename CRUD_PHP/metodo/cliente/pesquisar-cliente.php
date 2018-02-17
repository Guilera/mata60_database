<?php
  include ("conectar-cliente.php");
  $valor_buscar = $_POST['pesquisar-cliente'];
  $grupo = pesquisar_clientes( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Pesquisa</title>
  <h1>Resultado Clientes<br></h1>
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
     <form name="voltar" action="../../pages/clientes.php">
        <input type="submit" value="Voltar" />
     </form>
    </div>
  </div>
  <br><br>

  <table class="responstable">

    <thead>
      <tr>
        <th width="400">Nome</th>
        <th width="300">Usuário</th>
        <th width="250">País Origem</th>
        <th width="150">Data Nascimento</th>
        <th width="8"></th>
        <th width="8"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $clientes) { ?>
          
        <tr>
          <td><?=$clientes["nome_completo"]?></td>
          <td><?=$clientes["username"]?></td>
          <td><?=$clientes["pais"]?></td>
          <td><?=formatoData($clientes["data_nasc"])?></td>
          <td>
            <form name="alterar-cliente" action="alterar-cliente.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?=$clientes["usuario_id"]?>" />
              <input type="image" width="30" src="../../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-cliente" action="conectar-cliente.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?=$clientes["usuario_id"]?>" />
              <input type="hidden" name="acao" value="excluir-cliente" />
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