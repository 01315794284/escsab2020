<?php
 			//$dataapontamento = strtotime($dataapontamento2);
			//Conexão para VRF a quantidade
			$resultado_estudo=mysqli_query($conn, "SELECT * FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento");
			$linhas_estudo=mysqli_num_rows($resultado_estudo);


			//Consulta Oferta das Classes
			$resultado_oferta_classe = mysqli_query($conn, "SELECT alvodeoferta FROM classes WHERE igreja = $igreja");
      $linhas_oferta_classe = mysqli_num_rows($resultado_oferta_classe);
      
      //-----------------------------------------estudo------------------------------------------------
//VRF o valor de estudo
$sqlestudo = mysqli_query($conn , "SELECT *, sum(estudo) estudo_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadosestudo = mysqli_fetch_array($sqlestudo)){
  extract($dadosestudo);
}
$estudosabado = $estudo_sabado;
//echo "--------estudo sabado---------- $estudosabado";

//-----------------------------------------encontro------------------------------------------------
//VRF o valor de encontro
$sqlencontro = mysqli_query($conn , "SELECT *, sum(encontro) encontro_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadosencontro = mysqli_fetch_array($sqlencontro)){
  extract($dadosencontro);
}
$encontrosabado = $encontro_sabado;
//echo "--------encontro sabado---------- $encontrosabado";

//-----------------------------------------Estudos Biblicos------------------------------------------------
//VRF o valor de estudosbiblicos
$sqlestudosbiblicos = mysqli_query($conn , "SELECT *, sum(estudosbiblicos) estudosbiblicos_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadosestudosbiblicos = mysqli_fetch_array($sqlestudosbiblicos)){
  extract($dadosestudosbiblicos);
}
$estudosbiblicossabado = $estudosbiblicos_sabado;
//echo "--------estudosbiblicos sabado---------- $estudosbiblicossabado";

//-----------------------------------------Acao Soliária------------------------------------------------
//VRF o valor de acao
$sqlacao = mysqli_query($conn , "SELECT *, sum(acao) acao_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadosacao = mysqli_fetch_array($sqlacao)){
  extract($dadosacao);
}
$acaosabado = $acao_sabado;
//echo "--------acao sabado---------- $acaosabado";

//-----------------------------------------presenca------------------------------------------------
//VRF o valor de presenca
$sqlpresenca = mysqli_query($conn , "SELECT *, sum(presenca) presenca_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadospresenca = mysqli_fetch_array($sqlpresenca)){
  extract($dadospresenca);
}
$presencasabado = $presenca_sabado;
//echo "--------presenca sabado---------- $presencasabado";

//-----------------------------------------contato------------------------------------------------
//VRF o valor de presenca
$sqlcontato = mysqli_query($conn , "SELECT *, sum(contato) contato_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadoscontato = mysqli_fetch_array($sqlcontato)){
  extract($dadoscontato);
}
$contatosabado = $contato_sabado;
//echo "--------presenca sabado---------- $presencasabado";


//-----------------------------------------qtd_alunos------------------------------------------------
//VRF o valor de qtd_alunos
$sqlqtd_alunos = mysqli_query($conn , "SELECT *, count(niveis_acesso_id) qtd_alunos FROM usuarios WHERE igreja = $igreja AND classe = $classe");
while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
  extract($dadosqtd_alunos);
}
$qtd_alunos_total = $qtd_alunos;
//echo "--------Alunos Total---------- $qtd_alunos_total";

//-----------------------------------------oferta------------------------------------------------
//VRF o valor de oferta
$sqloferta = mysqli_query($conn , "SELECT *, sum(oferta) oferta_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento AND classe=$classe");
while ($dadosoferta = mysqli_fetch_array($sqloferta)){
  extract($dadosoferta);
}
$ofertasabado = $oferta_sabado;
//echo "--------oferta sabado---------- $ofertasabado";

//-----------------------------------------QTD Visitas Adventistas------------------------------------------------
$resultado_adventista_sabado = mysqli_query($conn , "SELECT sum(adventista) adventista_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento ");
while ($dadosqtd_adventista_sabado = mysqli_fetch_array($resultado_adventista_sabado)){
  extract($dadosqtd_adventista_sabado);
}
//-----------------------------------------QTD Visitas Não Adventistas------------------------------------------------
$resultado_naoadventista_sabado = mysqli_query($conn , "SELECT sum(naoadventista) naoadventista_sabado FROM apontamento WHERE igreja = $igreja AND dataapontamento=$dataapontamento ");
while ($dadosqtd_naoadventista_sabado = mysqli_fetch_array($resultado_naoadventista_sabado)){
  extract($dadosqtd_naoadventista_sabado);
}
//-----------------------------------------alvo de oferta------------------------------------------------
//VRF o valor de alvodeoferta
$sqlalvodeoferta = mysqli_query($conn , "SELECT *, sum(alvodeoferta) valor_oferta FROM classes WHERE igreja = $igreja AND numerodaclasse = $classe");
while ($dadosalvodeoferta = mysqli_fetch_array($sqlalvodeoferta)){
  extract($dadosalvodeoferta);
}

