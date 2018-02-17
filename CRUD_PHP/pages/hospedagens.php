<!DOCTYPE html>
<?php
  include ("../metodo/hospedagem/conectar-hospedagem.php");
  $grupo = selectAllHospedagens();
?>

<head>
  <meta charset="UTF-8">
  <title>Hospedagens</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>

<header>
    <h1>Lista de Hospedagens</h1>
</header>

<body>
  <div>
    <!-- <div class="box" style="float: left;"> -->
    <div class="box">
      <form name="inserir" action="../metodo/hospedagem/inserir-hospedagem.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar Hospedagem" name="inserir" /> 
     </form>
    </div>
    <div class="box">
     <form name="inserir" action="../metodo/hospedagem/busca-avancada-hospedagem.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar" action="../metodo/hospedagem/pesquisar-hospedagem.php" method="POST">
        <input type="text" name="pesquisar" class="form-control" maxlength="20" size="15" placeholder="Busca Rápida...">
        <button type="submit" class="btn btn-primary">Procurar</button>
      </form>
    </div>
  </div>
  
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
          <td><?=utf8_encode($hospedagens["nome"])?></td>
          <td><?=utf8_encode($hospedagens["tipo"])?></td>
          <td><?=utf8_encode($hospedagens["descricao"])?></td>
          <td><?=utf8_encode($hospedagens["valor_diaria"])?></td>
          <td><?=utf8_encode($hospedagens["logradouro"])?></td>
          <td><?=utf8_encode($hospedagens["bairro"])?></td>
          <td><?=utf8_encode($hospedagens["numero"])?></td>
          <td><?=utf8_encode($hospedagens["nome_fantasia"])?></td>
          <td><?=utf8_encode($hospedagens["cidnome"])?></td>
          <td>
            <form name="alterar-hospedagem" action="../metodo/hospedagem/alterar-hospedagem.php" method="POST">
              <input type="hidden" name="hospedagem_id" value="<?=$hospedagens["hospedagem_id"]?>" />
              <input type="image" width="30" src="../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-hospedagem" action="../metodo/hospedagem/conectar-hospedagem.php" method="POST">
              <input type="hidden" name="hospedagem_id" value="<?=$hospedagens["hospedagem_id"]?>" />
              <input type="hidden" name="acao" value="excluir-hospedagem" />
              <input type="image" width="30" src="../imgs/i-excluir.png">
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
