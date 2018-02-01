<!DOCTYPE html>
<?php
  include ("../metodo/conectar.php");
  //$grupo = selectAllPessoa();
?>

<head>
  <meta charset="UTF-8">
  <title>Eventos</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>

<header>
    <h1>Lista de Eventos</h1>
</header>

<body>
  <div>
    <!-- <div class="box" style="float: left;"> -->
    <div class="box">
      <form name="inserir" action="metodo/inserir.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar Evento" name="inserir" /> 
     </form>
    </div>
    <div class="box">
     <form name="inserir" action="metodo/busca-avancada.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar" action="metodo/pesquisar.php" method="POST">
        <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" maxlength="20" size="15" placeholder="Busca Rápida...">
        <button type="submit" class="btn btn-primary">Procurar</button>
      </form>
    </div>
  </div>
  
  <table class="responstable">

    <thead>
      <tr>
        <th>Nome</th>
        <th>País Origem</th>
        <th>Data Nascimento</th>
        <th id="thButton">Editar</th>
        <th id="thButton">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $eventos) { ?>
          
        <tr>
          <td><?=$pessoa["nome"]?></td>
          <td><?=$pessoa["pais"]?></td>
          <td><?=formatoData($pessoa["nascimento"])?></td>
          <td>
            <form name="alterar" action="metodo/alterar.php" method="POST">
              <input type="hidden" name="id_pessoa" value="<?=$pessoas["id_pessoa"]?>" />
              <input type="submit" value="Editar" name="editar" />  
            </form>
          </td>
          <td>
            <form name="excluir" action="metodo/conectar.php" method="POST">
              <input type="hidden" name="id_pessoa" value="<?=$pessoas["id_pessoa"]?>" />
              <input type="hidden" name="acao" value="excluir" />
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
