<?php
	include_once("../conexao.php");
	$id_classes = mysqli_real_escape_string($conn, $_POST['id_classes']);
	$numerodaclasse = mysqli_real_escape_string($conn, $_POST['numerodaclasse']);
	$professor = mysqli_real_escape_string($conn, $_POST['professor']);
	$professorassociado = mysqli_real_escape_string($conn, $_POST['professorassociado']);
	$secretario = mysqli_real_escape_string($conn, $_POST['secretario']);
	$nomedaclasse = mysqli_real_escape_string($conn, $_POST['nomedaclasse']);
	$classe = mysqli_real_escape_string($conn, $_POST['classe']);
	$pontuacao = mysqli_real_escape_string($conn, $_POST['pontuacao']);
	$alvodeoferta = mysqli_real_escape_string($conn, $_POST['alvodeoferta']);
	$igreja = mysqli_real_escape_string($conn, $_POST['igreja']);

	echo "$id_classes - $classe - $trimestre - $ano";
	$result_classes = "UPDATE classes SET 
	`id_classes`='$numerodaclasse', 
	`numerodaclasse`='$numerodaclasse', 
	`nomedaclasse`='$nomedaclasse',	
	`professor`='$professor', 
	`professorassociado`='$professorassociado', 
	`secretario`='$secretario', `classe`='$classe', 
	`pontuacao`='$pontuacao', 
	`alvodeoferta`='$alvodeoferta', 
	`igreja`='$igreja'  
	
		WHERE 
	`classes`.`id_classes` = '$id_classes'";
	

	$resultado_classes = mysqli_query($conn, $result_classes);	
		header("Location: ../listar_classe.php");
?>