<?php
  $resultado=mysqli_query($conn, "SELECT nome, id_usuarios, classe FROM usuarios WHERE igreja=$igreja ORDER BY classe");
  $linhas=mysqli_num_rows($resultado);


  //Listar Classes
  $result_classes = "SELECT id_classes,professor, classe, numerodaclasse FROM classes WHERE igreja=$igreja";
  $resultado_classes2 = mysqli_query($conn, $result_classes);
  
//Pegando só o id
  $resultado_id=mysqli_query($conn, "SELECT id_usuarios FROM usuarios WHERE igreja=$igreja");
  $linhas_id=mysqli_num_rows($resultado_id);