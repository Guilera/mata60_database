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
      <form name="pesquisar-evento" action="../metodo/evento/pesquisar-evento.php" method="POST">
        <input type="text" name="pesquisar-evento" class="form-control" maxlength="20" size="15" placeholder="Busca Rápida...">
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
          <td><?=$eventos["nome"]?></td>
          <td><?=$eventos["tipo"]?></td>
          <td><?=$eventos["descricao"]?></td>
          <td><?=$eventos["data_hora"]?></td>
          <td><?=$eventos["valor"]?></td>
          <td><?=$eventos["logradouro"]?></td>
          <td><?=$eventos["anuncnome"]?></td>
          <td><?=$eventos["cidnome"]?></td>
          <td>
            <form name="alterar-evento" action="../metodo/evento/alterar-evento.php" method="POST">
              <input type="hidden" name="evento_id" value="<?=$eventos["evento_id"]?>" />
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
</body>

</html>
