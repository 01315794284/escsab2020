<?php
session_start();
include_once("conexao.php");
include_once("menu_admin.php");

$dia = date("d/m/Y");
$usuario_logado = $_SESSION['usuarioNome'];
$igreja = $_SESSION['usuarioIgreja'];

  //Consultas SQL 
include "sql/admin/adicionar/sql_cad_check.php";



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
<title>Apontamento</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Checkbox -->
<link rel="stylesheet" href="css/style.css">

<!-- Custom styles for this template -->
<link href="css/signin.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container theme-showcase" role="main">      
      <div class="page-header">
        <h1>Apontamento </h1>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" method="POST" action="processa/proc_check.php" autocomplete="off">


            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Casse</label>
              <div class="col-sm-10">
                <select class="form-control" name="classe">
                  <?php
                  while($linhas_classes = mysqli_fetch_assoc($resultado_classes2)){ ?>
                    <option value="<?php echo $linhas_classes['id_classes']; ?>"><?php echo $linhas_classes['numerodaclasse']; ?><?php echo " | "; ?><?php echo $linhas_classes['classe']; ?><?php echo " | "; ?><?php echo $linhas_classes['professor']; ?></option> <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <form class="form-horizontal">
             <div class="form-group">
              <label class="col-sm-2 control-label">Data do Apontamento</label>
              <div class="col-sm-10">
                <div class="input-group date">
                  <input type="text" class="form-control" name="dataapontamento" id="dataapontamento" value="<?php echo"$dia";  ?>">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
                

              </div>
            </div>


            <body role="document">
              <div class="container theme-showcase" role="main">      
                <div class="row">
                  <div class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Classe</th>
                          <th>Nome</th>
                          <th>id_presenca</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0;
                        while($linhas = mysqli_fetch_array($resultado)){ ?>
                          <tr>
                            <td><?php echo $linhas['classe']; ?></td>
                            <td><?php echo $linhas['nome']; ?></td>
                            <td><input type="checkbox" name="id_presenca<?php echo $i;  ?>" value="<?php echo $linhas['id_usuarios'] ?>"> </td>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $i++;} ?>
                  </tbody>
                </table>
              </div>
            </div>    
          </div>

          <input type="hidden" name="campos" value=" <?php echo "$i"; ?>">
          <input type="hidden" name="igreja" value=" <?php echo "$igreja"; ?>">
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('#dataapontamento').datepicker({  
      format: "dd/mm/yyyy",
      startView: 3, 
      language: "pt-BR",
      daysOfWeekDisabled : "0,1,2,3,4,5" , 
      maxViewMode : 0 , 
      todayHighlight: true,
      autoclose: true,
      clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
     });</script>
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="js/ie10-viewport-bug-workaround.js"></script>
   </body>
   </html>
