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
    <!--<div class="box">
     <form name="inserir" action="../metodo/hospedagem/busca-avancada-hospedagem.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>-->
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar-hospedagem" action="../metodo/hospedagem/pesquisar-hospedagem.php" method="POST">
        <input type="text" name="pesq-hospedagem" maxlength="20" size="15" placeholder="Busca Rápida...">
        <input type="submit" onclick="JavaScript:return validateSearch();" value="Procurar" />
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

<script type="text/javascript">
  function validateSearch() {
    var a=document.forms["pesquisar-hospedagem"]["pesq-hospedagem"].value;

    if (a=="") {
      alert("O campo não deve estar vazio.");
      return (false);
    }
  }
</script>