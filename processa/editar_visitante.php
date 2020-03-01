<?php
	include_once("../conexao.php");
	$id_visitantes = mysqli_real_escape_string($conn, $_POST['id_visitantes']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$observacao = mysqli_real_escape_string($conn, $_POST['observacao']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
	$datanascimento = mysqli_real_escape_string($conn, $_POST['datanascimento']);
	$telefone1 = mysqli_real_escape_string($conn, $_POST['telefone1']);
	$estudobiblico = mysqli_real_escape_string($conn, $_POST['estudobiblico']);
	$visita = mysqli_real_escape_string($conn, $_POST['visita']);
	$classe = mysqli_real_escape_string($conn, $_POST['numerodaclasse']);
	$datacadastro = mysqli_real_escape_string($conn, $_POST['datacadastro']);
	
	$result_visitantes = "UPDATE visitantes SET `nome`='$nome', `observacao`='$observacao', 
	`email`='$email', `endereco`='$endereco', `datanascimento`='$datanascimento', `telefone1`='$telefone1',
	 `estudobiblico`='$estudobiblico', `visita`='$visita', `numerodaclasse`='$classe', `datacadastro`='$datacadastro'  
	 
	  WHERE id_visitantes = '$id_visitantes'";

	$resultado_visitantes = mysqli_query($conn, $result_visitantes);	
		header("Location: ../listar_visitante.php");
?>