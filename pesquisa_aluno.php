
<?php
	if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
		session_start();}
		$dia = date("d/m/Y");
		$usuario_logado = $_SESSION['usuarioNome'];
		$igreja = $_SESSION['usuarioIgreja'];


		include_once("conexao.php");
		include_once("menu_admin.php");
	
		$pesquisar = filter_input(INPUT_POST, 'pesquisar', FILTER_SANITIZE_STRING);
		
		if($pesquisar){
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
			$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$resultado=mysqli_query($conn, "SELECT * FROM usuarios WHERE igreja = $igreja && nome LIKE '%$nome%'");
			$linhas=mysqli_num_rows($resultado);
		} 
		else {
			echo "Aluno Não Encontrado";
			header('listar_aluno.php');
		}
		  //Consultas SQL 
include "sql/admin/listar/sql_listar_aluno.php";
		
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
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

			<link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
			<script src="js/bootstrap-datepicker.min.js"></script> 
			<script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>

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
			<h1>Resultado da Pesquisa <a href="listar_aluno.php"><img src="imagens/addv.png"></a></h1>
		</div>
		<body role="document">
			<div class="container theme-showcase" role="main">      
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Classe</th>
									<th>Acoes</th>
								</tr>
							</thead>
							<tbody>
								<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
									<tr>
										<!--				<td><?php echo $linhas['id_usuarios']; ?></td>-->
										<td><?php echo $linhas['nome']; ?></td>
					<!--				<td><?php echo $linhas['login']; ?></td>
									<td><?php echo $linhas['email']; ?></td>
									<td><?php echo $linhas['endereco']; ?></td>
									<td><?php echo $linhas['datanascimento']; ?></td>
									<td><?php echo $linhas['databatismo']; ?></td>-->
									<td><?php echo $linhas['telefone1']; ?></td>
									<td><?php echo $linhas['classe']; ?></td>
									<!--				<td><?php echo $linhas['niveis_acesso_id']; ?></td>-->

									
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_usuarios']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_usuarios']; ?>" 
										data-whatevernome="<?php echo $linhas['nome']; ?>"  
										data-whateveremail="<?php echo $linhas['email']; ?>"
										data-whateverlogin="<?php echo $linhas['login']; ?>"
										data-whateversenha="<?php echo $linhas['senha']; ?>"
										data-whateverendereco="<?php echo $linhas['endereco']; ?>"
										data-whateverdatanascimento="<?php echo $linhas['datanascimento']; ?>"
										data-whateverdatabatismo="<?php echo $linhas['databatismo']; ?>"
										data-whatevertelefone1="<?php echo $linhas['telefone1']; ?>"
										data-whatevertelefone2="<?php echo $linhas['telefone2']; ?>"
										data-whateverclasse="<?php echo $linhas['classe']; ?>"
										data-whateverniveis_acesso_id="<?php echo $linhas['niveis_acesso_id']; ?>"
										>Editar</button>
										
										<a href="processa/apagar_usuario_aluno.php?id_usuarios=<?php echo $linhas['id_usuarios']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_usuarios']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_usuarios']; ?></p>
												<b>Nome</b>: <?php echo $linhas['nome']; ?></p>
												<b>Email: </b>: <?php echo $linhas['email']; ?></p>
												<b>login:</b>: <?php echo $linhas['login']; ?></p>
												<b>Senha:</b>: <?php echo $linhas['senha']; ?></p>
												<b>Endereco</b>: <?php echo $linhas['endereco']; ?></p>
												<b>Data de Nascimento</b>: <?php echo $linhas['datanascimento']; ?></p>
												<b>Data de Batismo</b>: <?php echo $linhas['databatismo']; ?></p>
												<b>Telefone</b>: <?php echo $linhas['telefone1']; ?></p>
												<b>Telefone</b>: <?php echo $linhas['telefone2']; ?></p>
												<b>Classe</b>: <?php echo $linhas['classe']; ?></p>
												<b>Nivel de Acesso</b>: <?php echo $linhas['niveis_acesso_id']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>		
		</div>
		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ModalLabel">Alunos</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_usuario_aluno.php" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="recipient-email" class="control-label">Email:</label>
								<input name="email" type="text" class="form-control" id="recipient-email">
							</div>
							<div class="form-group">
								<label for="recipient-login" class="control-label">Login:</label>
								<input name="login" type="text" class="form-control" id="recipient-login">
							</div>
							<div class="form-group">
								<label for="recipient-senha" class="control-label">Senha:</label>
								<input name="senha" type="text" class="form-control" id="recipient-senha">
							</div>
							<div class="form-group">
								<label for="recipient-endereco" class="control-label">Endereco:</label>
								<input name="endereco" type="text" class="form-control" id="recipient-endereco">
							</div>
							<div class="form-group">
								<label for="recipient-datanascimento" class="control-label">Data de Nascimento:</label>
								<input name="datanascimento" type="date" class="form-control" id="recipient-datanascimento">
							</div>
							<div class="form-group">
								<label for="recipient-databatismo" class="control-label">Data de Batismo:</label>
								<input name="databatismo" type="date" class="form-control" id="recipient-databatismo">
							</div>
							<div class="form-group">
								<label for="recipient-telefone1" class="control-label">Telefone 1:</label>
								<input name="telefone1" type="text" class="form-control" id="recipient-telefone1">
							</div>
							<div class="form-group">
								<label for="recipient-telefone2" class="control-label">Telefone 2:</label>
								<input name="telefone2" type="text" class="form-control" id="recipient-telefone2">
							</div>
							
							<div class="form-group">
								<label for="recipient-classe" class="control-label">Classe:</label>
								<select name="classe" type="text" class="form-control" id="recipient-classe">
									<?php
									//$result_classe = "SELECT * FROM classes WHERE igreja ORDER BY id_classes";
									//$resultado_classe2 = mysqli_query($conn, $result_classe);
									$result_classe = "SELECT * FROM classes ORDER BY id_classes";
									$resultado_classe2 = mysqli_query($conn, $result_classe);
									while($linhas_classe = mysqli_fetch_assoc($resultado_classe2)){ ?>
										<option required="" value="<?php echo $linhas_classe['id_classes']; ?>"><?php echo $linhas_classe['id_classes']; ?><?php echo " | "; ?><?php echo $linhas_classe['classe']; ?><?php echo " | "; ?><?php echo $linhas_classe['professor']; ?></option> <?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
									<label for="recipient-niveis_acesso_id" class="control-label">Nivel de Acesso*</label>
										<select class="form-control" name="niveis_acesso_id">
											<option value="2">Aluno</option>
											<option value="1">Professor</option>
											<option value="3">Admin</option>
										</select>
								</div>

							<input name="id_usuarios" type="hidden" id="id_usuarios">
							
							<!--Ações-->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-success">Alterar</button>
							</div>
						</form>
					</div>			  
				</div>
			</div>
		</div>



		<script type="text/javascript">
			$('#Modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientemail = button.data('whateveremail')
				//var recipientemail = button.data('whatever')
				var recipientlogin = button.data('whateverlogin')
				var recipientsenha = button.data('whateversenha')
				var recipientendereco = button.data('whateverendereco')
				var recipientdatanascimento = button.data('whateverdatanascimento')
				var recipientdatabatismo = button.data('whateverdatabatismo')
				var recipienttelefone1 = button.data('whatevertelefone1') 
				var recipienttelefone2 = button.data('whatevertelefone2')
				var recipientclasse = button.data('whateverclasse')
				var recipientnideis_acesso_id = button.data('whateverniveis_acesso_id')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Aluno: ' + recipient)
				modal.find('#id_usuarios').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#recipient-email').val(recipientemail)
				modal.find('#recipient-login').val(recipientlogin)
				modal.find('#recipient-senha').val(recipientsenha)
				modal.find('#recipient-endereco').val(recipientendereco)
				modal.find('#recipient-datanascimento').val(recipientdatanascimento)
				modal.find('#recipient-databatismo').val(recipientdatabatismo)
				modal.find('#recipient-telefone1').val(recipienttelefone1)
				modal.find('#recipient-telefone2').val(recipienttelefone2)
				modal.find('#recipient-classe').val(recipientclasse)
				modal.find('#recipient-niveis_acesso_id').val(recipientnideis_acesso_id)
			})
		</script>
		<script type="text/javascript">
			$('#databatismo').datepicker({  
				format: "yyyy-mm-dd",
				startView: 3, 
				language: "pt-BR",
				clearBtn: true,
				todayHighlight: true,
				autoclose: true
        //minViewMode: 3,
       // startDate: '+0d',
   });</script>
   <script type="text/javascript">
   	$('#datanascimento').datepicker({  
   		format: "yyyy-mm-dd", 
   		startView: 3,
   		language: "pt-BR",
   		todayHighlight: true,
   		clearBtn: true,
   		autoclose: true
        //startDate: '+0d',
    });</script>

    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/personalizado.js"></script>		

</body>
</html>

