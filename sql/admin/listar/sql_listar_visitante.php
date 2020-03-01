<?php
	
	$resultado=mysqli_query($conn, "SELECT * FROM visitantes WHERE igreja = $igreja");
	$linhas=mysqli_num_rows($resultado);

	//Listar Classes
	$result_classe = "SELECT * FROM classes WHERE igreja = $igreja";
	$resultado_classe2 = mysqli_query($conn, $result_classe);
