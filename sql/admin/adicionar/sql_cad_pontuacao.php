<?php
	$resultado=mysqli_query($conn, "SELECT * FROM classes");
    $linhas=mysqli_num_rows($resultado);
    

    //Lista de Classes
    $result_classes = "SELECT id_classes,professor, classe, numerodaclasse FROM classes";
    $resultado_classes2 = mysqli_query($conn, $result_classes);

    //Lista de Atividades
    $result_atividade = "SELECT id_atividade,atividade FROM atividade";
    $resultado_atividade2 = mysqli_query($conn, $result_atividade);