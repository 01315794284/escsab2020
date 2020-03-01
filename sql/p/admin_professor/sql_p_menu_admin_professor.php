<?php
  //VRF Nome da Igreja Logada
  $result_igreja = mysqli_query($conn, "SELECT * FROM igreja WHERE id_igreja = $igreja_logada");
  if (!$result_igreja) {
      echo 'Sem : ' . mysqli_error();
      exit;
  }
  $linha_result_igreja = mysqli_fetch_row($result_igreja);