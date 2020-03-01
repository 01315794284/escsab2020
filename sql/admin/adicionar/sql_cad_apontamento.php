<?php
  $resultado=mysqli_query($conn, "SELECT nome FROM usuarios");
  $linhas=mysqli_num_rows($resultado);

   //QTD de Alunos
    $sqlqtd_alunos = mysqli_query($conn, "SELECT *, count(classe) qtd_alunos FROM usuarios WHERE classe = $classe AND  igreja = $igreja ");
       while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
           extract($dadosqtd_alunos);
            }
        $qtd_alunos_total = $qtd_alunos;