<?php
session_start();
include_once("conexao.php");
include_once("menu_admin.php");

$data = date("Y-m-d");
$usuario_logado = $_SESSION['usuarioNome'];
$igreja = $_SESSION['usuarioIgreja'];

  //Consultas SQL 
include "sql/admin/adicionar/sql_cad_usuario_visitante.php";

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

  <title>Cadastrar Visitante</title>

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
  <link rel="stylesheet" href="css/data-1.css">
  <script src="js/site/data-2.js"></script>
  <script src="js/site/data-3.js"></script>

  <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
  <script src="js/bootstrap-datepicker.min.js"></script> 
  <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
</head>

<body>

  <div class="container theme-showcase" role="main">      
    <div class="page-header">
      <h1>Cadastrar Visitante</h1>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="processa/proc_cad_usuario_visitante.php" autocomplete="off">
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nome*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nome" required="">
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Observacao</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="observacao" >
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Endereco</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="endereco">
            </div>
          </div>

          <form class="form-horizontal">
           <div class="form-group">
            <label class="col-sm-2 control-label">Data de Nascimento</label>
            <div class="col-sm-10">
              <div class="input-group date">
                <input type="text" class="form-control" name="datanascimento" id="datanascimento" >
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>

            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telefone1"  >
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Gostaria de Uma Visita*</label>
            <div class="col-sm-10">
              <select class="form-control" name="visita" required="">
                <option value="sim">Sim</option>
                <option value="nao">Nao</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Gostaria de Oracao*</label>
            <div class="col-sm-10">
              <select class="form-control" name="oracao" required="">
                <option value="sim">Sim</option>
                <option value="nao">Nao</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Interesse em Estudo Biblico*</label>
            <div class="col-sm-10">
              <select class="form-control" name="estudobiblico" required="">
                <option value="sim">Sim</option>
                <option value="nao">Nao</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Classe que Cadastrou</label>
            <div class="col-sm-10">
              <select class="form-control" name="numerodaclasse" required="">
                <?php

                while($linhas_classe = mysqli_fetch_assoc($resultado_classe2)){ ?>
                  <option required="" value="<?php echo $linhas_classe['numerodaclasse']; ?>"><?php echo $linhas_classe['numerodaclasse']; ?>
                  <?php echo "|"; ?>
                  <?php echo  $linhas_classe['classe']; ?>
                  <?php echo "|"; ?>
                  <?php echo  $linhas_classe['professor']; ?></option> <?php
                }
                ?>
              </select>
            </div>
          </div>

          <input type="hidden" name="datacadastro" id="datacadastro" value="<?php echo"$dia";  ?>">

          <input type="hidden" name="igreja" value=" <?php echo "$igreja"; ?>">
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- /container -->

  <script type="text/javascript">
    $('#datanascimento').datepicker({  
      format: "dd/mm/yyyy",
      startView: 3, 
      language: "pt-BR",
      autoclose: true,
      clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
     });</script>

     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="js/ie10-viewport-bug-workaround.js"></script>
   </body>
   </html>
