<?php
  include ("conectar-hospedagem.php");
  $valor_buscar = $_POST['pesquisar-hospedagem'];
  $grupo = pesquisar_hospedagens( $valor_buscar );
?>

<head>
  <meta charset="UTF-8">
  <title>Pesquisa</title>
  <h1>Resultado Hospedagens<br></h1>
  <!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
  <link rel="stylesheet" type="text/css" href="../../css/style2.css">
</head>

<body>
  
  <div>
    <div class="box">
      <h3>Resultados para <font color="0000FF"><?=$valor_buscar?></font> : <?=count($grupo)?></h3>
    </div>
    <div class="box" style="float: right;">
     <form name="voltar" action="../../pages/hospedagens.php">
        <input type="submit" value="Voltar" />
     </form>
    </div>
  </div>
  <br><br>

  <table class="responstable">

    <thead>
      <tr>
        <th width="100">Nome</th>
        <th width="70">Tipo</th>
        <th width="180">Descricao</th>
        <th width="60">Valor Diária</th>
        <th width="130">Logradouro</th>
        <th width="110">Bairro</th>
        <th width="60">Número</th>
        <th width="130">Anunciante</th>
        <th width="120">Cidade</th>
        <th width="8"></th>
        <th width="8"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $hospedagens) { ?>
          
        <tr>
          <td><?=$hospedagens["nome"]?></td>
          <td><?=$hospedagens["tipo"]?></td>
          <td><?=$hospedagens["descricao"]?></td>
          <td><?=$hospedagens["valor_diaria"]?></td>
          <td><?=$hospedagens["logradouro"]?></td>
          <td><?=$hospedagens["bairro"]?></td>
          <td><?=$hospedagens["numero"]?></td>
          <td><?=$hospedagens["nome_fantasia"]?></td>
          <td><?=$hospedagens["cidnome"]?></td>
          <td>
            <form name="alterar-hospedagem" action="alterar-hospedagem.php" method="POST">
              <input type="hidden" name="hospedagem_id" value="<?=$hospedagens["hospedagem_id"]?>" />
              <input type="image" width="30" src="../../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-hospedagem" action="conectar-hospedagem.php" method="POST">
              <input type="hidden" name="hospedagem_id" value="<?=$hospedagens["hospedagem_id"]?>" />
              <input type="hidden" name="acao" value="excluir-hospedagem" />
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