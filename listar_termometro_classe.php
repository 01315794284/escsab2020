<?php
session_start();
include_once("conexao.php");
include_once("menu_admin.php");


//Recebendo Parâmetros
$classe					= filter_input(INPUT_POST, 'numerodaclasse', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);
$dataapontamento = explode("/", $dataapontamento2); 
$dataapontamento = $dataapontamento[2].$dataapontamento[1].$dataapontamento[0];


	//Consultas SQL 
include "sql/admin/listar/sql_listar_termometro_classe.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="Sloan">
  <link rel="icon" href="imagens/es.ico">

  <title>Termometro Classe</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>

  <!-- DATA -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="css/table-blue.css" rel="stylesheet">

  <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
  <script src="js/bootstrap-datepicker.min.js"></script> 
  <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
</head>

<body>
  <div class="container theme-showcase" role="main">      
    <div class="page-header">
     
     <h3>Nova Consulta <a href="pesq_termometro_classe.php"><img src="imagens/adda.png">
      <form class="form-horizontal" method="POST" action="imprimir_termometro_classe.php" autocomplete="off">
       <input type="hidden" value="<?php echo "$dataapontamento"; ?>" name="dataapontamento" >
       <input type="hidden" value="<?php echo "$classe"; ?>" name="classe" >
       <button type="submit" class="btn btn-info">Imprimir</button>
     </form>
   </a>
 </h3>
</div>

<body role="document">
  <div class="container theme-showcase" role="main">      
    <div class="row">
     <div class="col-md-12">


      <?php 
      $valordeoferta = $valor_oferta;
//echo "--------oferta sabado---------- $ofertasabado";

			//Cálculos - Exceto QTD Estudos Bíblicos		
      $total_estudo = (($estudosabado *100)/$qtd_alunos_total);
      $total_encontro = (($encontrosabado*100)/$qtd_alunos_total);
      $total_presenca = (($presencasabado*100)/$qtd_alunos_total);
      $total_contato = (($contatosabado*100)/$qtd_alunos_total);
      $total_estudosbiblicos = (($estudosbiblicossabado*100)/$qtd_alunos_total);
      $total_acao = (($acaosabado*100)/$qtd_alunos_total);
      $total_qtdofertas = (($ofertasabado*100)/$valordeoferta);
      ?>	
      <html>
      <head>
        <style>
          table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }

          td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
          }

          tr:nth-child(even) {
            background-color: #CBE2F1;
          }
        </style>
      </head>
      <body>
        <h1><center>  Classe:<?php echo " $numerodaclasse | "; echo "$classe | "; echo "Data: $dataapontamento2 | ";  echo "$professor" ;?> </center></h1>
        <!-- Tabela com Resultados  -->
        <h3><img src="imagens/termometro.png" class="img-responsive" ></h3>
        <div class="container theme-showcase" role="main">      
          <table style="width:100%">
            <tr>
              <th>Item</th>
              <th>%</th> 
              <th>QTD</th> 
              <th>Realidade</th> 
            </tr>
            <tr>
              <td>Estudaram a Licao Diariamente</td>
              <td><?php echo ceil($total_estudo)."%<br>";?></td>
              <td><?php echo "$estudosabado/$qtd_alunos_total";?></td>
              <td><?php if ($total_estudo <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudo >= 26 and $total_estudo <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudo >= 51 and $total_estudo <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
            </td>
          </tr>
          <tr>
            <td>Membros Presentes</td>
            <td><?php echo ceil($total_presenca)."%<br>";?></td>
            <td><?php echo "$presencasabado/$qtd_alunos_total";?></td>

            <td><?php if ($total_presenca <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_presenca >= 26 and $total_presenca <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_presenca >= 51 and $total_presenca <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
          </td>
        </tr>
        <td>Realizacao de Acoes Solidarias</td>
        <td><?php echo ceil($total_acao)."%<br>";?></td>
        <td><?php echo "$acaosabado/$qtd_alunos_total";?></td>

        <td><?php if ($total_acao <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_acao >= 26 and $total_acao <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_acao >= 51 and $total_acao <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
      </td>
    </tr>
    <tr>
      <td>Encontro Extra Classe</td>
      <td><?php echo ceil($total_encontro)."%<br>";?></td>
      <td><?php echo "$encontrosabado/$qtd_alunos_total";?></td>

      <td><?php if ($total_encontro <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_encontro >= 26 and $total_encontro <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_encontro >= 51 and $total_encontro <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
    </td>
  </tr>
  <tr>
    <td>Contatos Missionarios</td>
    <td><?php echo ceil($total_contato)."%<br>";?></td>
    <td><?php echo "$contatosabado/$qtd_alunos_total";?></td>

    <td><?php if ($total_contato <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_contato >= 26 and $total_contato <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_contato >= 51 and $total_contato <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
  </td>
</tr>
<tr>
  <td>Membros Dando Estudos Biblicos</td>
  <td><?php echo ceil($total_estudosbiblicos)."%<br>";?></td>
  <td><?php echo "$estudosbiblicossabado/$qtd_alunos_total";?></td>

  <td><?php if ($total_estudosbiblicos <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 26 and $total_estudosbiblicos <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 51 and $total_estudosbiblicos <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
</td>
</tr>
<tr>
  <td>Ofertas</td>
  <td><?php echo ceil($total_qtdofertas)."%<br>";?></td>
  <td><?php echo "$ofertasabado";?></td>

  <td><?php if ($total_qtdofertas <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 26 and $total_qtdofertas <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 51 and $total_qtdofertas <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
</td>
</tr>
</table>

<!-- Valores Retornados da Consulta do Banco  -->
<table style="width:100%">
  
  <tr>
    <td>Visitantes Adventistas</td>
    <td><?php echo "$adventista_sabado";?></td>
  </tr>
  <tr>
    <td>Visitantes Nao Adventistas</td>
    <td><?php echo "$naoadventista_sabado";?></td>
  </tr>
  
</table>
<div class="container theme-showcase" role="main">    
  <div class="page-header">
    <h3>
      <form class="form-horizontal" method="POST" action="listar_apontamento.php" autocomplete="off">
        <center><button type="submit" class="btn btn-warning">Editar Apontamento</button> </center>
      </form>
    </h3>
  </div>
</div>



</body>
</html>
</div>    
</div>
<div class="container theme-showcase" role="main">    
  <div class="page-header">
    <h3><form class="form-horizontal" method="POST" action="imprimir_termometro_geral.php" autocomplete="off">
     <input type="hidden" value="<?php echo "$dataapontamento"; ?>" name="dataapontamento" >
     <button type="submit" class="btn btn-success">Imprimir</button> 
   </form>
 </a>
</h3>
</div>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/docs.min.js"></script>
      <script src="js/ckeditor/ckeditor.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>

    <?php
    
