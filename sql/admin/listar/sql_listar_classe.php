<?php
	//Informações das Classes
	$resultado=mysqli_query($conn, "SELECT * FROM classes WHERE igreja=$igreja");
	$linhas=mysqli_num_rows($resultado);
