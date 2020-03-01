<?php
		//Informacoes das Classes
		$resultado=mysqli_query($conn, "SELECT * FROM pontuacao WHERE igreja = $igreja order by classe, id_pontuacao desc");
		$linhas=mysqli_num_rows($resultado);

		//Classe:
		$result_classe = "SELECT * FROM classes WHERE igreja = $igreja ORDER BY id_classes";
		$resultado_classe2 = mysqli_query($conn, $result_classe);

		//Atividade:
		$result_atividade = "SELECT id_atividade,atividade FROM atividade WHERE igreja = $igreja";
		$resultado_atividade2 = mysqli_query($conn, $result_atividade);