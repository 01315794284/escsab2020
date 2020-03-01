<?php
 	$resultado=mysqli_query($conn, "SELECT * FROM apontamento WHERE igreja = $igreja ORDER BY id_apontamento DESC");
   $linhas=mysqli_num_rows($resultado);


   //VRF o valor de qtd_alunos
$sqlqtd_alunos = mysqli_query($conn , "SELECT *, count(niveis_acesso_id) qtd_alunos_total FROM usuarios WHERE igreja = $igreja");
while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
  extract($dadosqtd_alunos);
}