<?php
    $resultado=mysqli_query($conn, "SELECT * FROM atividade");
    $linhas=mysqli_num_rows($resultado);