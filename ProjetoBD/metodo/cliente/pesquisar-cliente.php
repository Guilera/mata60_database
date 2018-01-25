<?php
  include ("../conectar.php");
  $valor_buscar = $_POST['pesquisar-cliente'];
  $grupo = pesquisar_clientes( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Agenda</title>
  <h1>Agenda Pessoal<br></h1>
  <!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
  <link rel="stylesheet" type="text/css" href="../../css/style2.css">
</head>

<body>
  
  <div>
    <div class="box">
      <h3>Resultados para <font color="0000FF"><?=$valor_buscar?></font> :</h3>
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
        <th width="550">Nome</th>
        <th width="250">País Origem</th>
        <th width="150">Data Nascimento</th>
        <th id="thButton">Editar</th>
        <th id="thButton">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $clientes) { ?>
          
        <tr>
          <td><?=$clientes["nome_completo"]?></td>
          <td><?=$clientes["pais"]?></td>
          <td><?=formatoData($clientes["data_nasc"])?></td>
          <td>
            <form name="alterar-cliente" action="../metodo/cliente/alterar-cliente.php" method="POST">
              <input type="hidden" name="cliente_id" value="<?=$clientes["cliente_id"]?>" />
              <input type="submit" value="Editar" name="editar" />  
            </form>
          </td>
          <td>
            <form name="excluir-cliente" action="../metodo/conectar.php" method="POST">
              <input type="hidden" name="cliente_id" value="<?=$clientes["cliente_id"]?>" />
              <input type="hidden" name="acao" value="excluir-cliente" />
              <input type="submit" value="Excluir" name="excluir" />  
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