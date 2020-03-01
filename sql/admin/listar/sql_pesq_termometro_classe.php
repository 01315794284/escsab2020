<?php
 	$resultado_classes=mysqli_query($conn, "SELECT * FROM classes WHERE igreja = $igreja");
   $linhas_classes=mysqli_num_rows($resultado_classes);