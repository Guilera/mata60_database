<!DOCTYPE html>
<?php
  include ("../metodo/evento/conectar-evento.php");
  $grupo = selectAlleventos();
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
      <form name="inserir" action="../metodo/evento/inserir-evento.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar Evento" name="inserir" /> 
     </form>
    </div>
    <div class="box">
     <form name="inserir" action="../metodo/evento/busca-avancada-evento.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar" action="../metodo/evento/pesquisar-evento.php" method="POST">
        <input type="text" name="pesquisar" class="form-control" maxlength="20" size="15" placeholder="Busca Rápida...">
        <button type="submit" class="btn btn-primary">Procurar</button>
      </form>
    </div>
  </div>
  
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
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $eventos) { ?>
          
        <tr>
          <td><?=utf8_encode($eventos["nome"])?></td>
          <td><?=utf8_encode($eventos["tipo"])?></td>
          <td><?=utf8_encode($eventos["descricao"])?></td>
          <td><?=utf8_encode($eventos["data_hora"])?></td>
          <td><?=utf8_encode($eventos["valor"])?></td>
          <td><?=utf8_encode($eventos["logradouro"])?></td>
          <td><?=utf8_encode($eventos["anuncnome"])?></td>
          <td><?=utf8_encode($eventos["cidnome"])?></td>
          <td>
            <form name="alterar-evento" action="../metodo/evento/alterar-evento.php" method="POST">
              <input type="hidden" name="hospedagem_id" value="<?=$eventos["evento_id"]?>" />
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
    
  <?php
    function formatoData($data) {
      $array = explode("-", $data);
      $novaData = $array[2]."/".$array[1]."/".$array[0];
      return $novaData;
    }
  ?>
</body>

</html>
