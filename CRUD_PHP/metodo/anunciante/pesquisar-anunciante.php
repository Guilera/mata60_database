<?php
  include ("conectar-anunciante.php");
  $valor_buscar = $_POST['pesquisar-anunciante'];
  $grupo = pesquisar_anunciantes( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Search</title>
  <h1>Results Advertisers<br></h1>
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
     <form name="voltar" action="../../pages/anunciantes.php">
        <input type="submit" value="Voltar" />
     </form>
    </div>
  </div>
  <br><br>

  <table class="responstable">

    <thead>
      <tr>
        <th width="160">Business Name</th>
        <th width="130">Username</th>
        <th width="150">CNPJ</th>
        <th width="140">Service</th>
        <th width="140">Homepage</th>
        <th width="100">Phone</th>
        <th width="8"></th>
        <th width="8"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $anunciantes) { ?>
          
        <tr>
          <td><?=$anunciantes["nome_fantasia"]?></td>
          <td><?=$anunciantes["username"]?></td>
          <td><?=$anunciantes["cnpj"]?></td>
          <td><?=$anunciantes["tipo_de_servico"]?></td>
          <td><?=$anunciantes["homepage"]?></td>
          <td><?=$anunciantes["telefone"]?></td>
          <td>
            <form name="alterar-anunciante" action="alterar-anunciante.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?=$anunciantes["usuario_id"]?>" />
              <input type="image" width="30" src="../../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-anunciante" action="conectar-anunciante.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?=$anunciantes["usuario_id"]?>" />
              <input type="hidden" name="acao" value="excluir-anunciante" />
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