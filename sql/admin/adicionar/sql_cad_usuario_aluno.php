<?php
	$resultado=mysqli_query($conn, "SELECT * FROM classes");
    $linhas=mysqli_num_rows($resultado);


    //Listar Classes
    $result_classes = "SELECT id_classes,professor, classe, numerodaclasse FROM classes";
    $resultado_classes2 = mysqli_query($conn, $result_classes);