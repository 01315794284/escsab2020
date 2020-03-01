<?php
	$resultado=mysqli_query($conn, "SELECT * FROM usuarios WHERE igreja = $igreja ORDER BY classe, nome");
	$linhas=mysqli_num_rows($resultado);

	$resultado_qtd_alunos=mysqli_query($conn, "SELECT * FROM usuarios igreja = $igreja ");
  //$linhas_qtd_alunos=mysqli_num_rows($resultado_qtd_alunos);
  

	//VRF quantos alunos tem nas classes - Alunos Cadastrados 
		$sql = mysqli_query($conn, "SELECT *, COUNT(niveis_acesso_id) qtd_alunos FROM usuarios WHERE niveis_acesso_id <=4 && igreja = $igreja ");
				while ($dados = mysqli_fetch_array($sql)){
					extract($dados); }

//Listar Classes
$result_classe = "SELECT * FROM classes WHERE igreja = $igreja  ORDER BY id_classes";
$resultado_classe2 = mysqli_query($conn, $result_classe);
