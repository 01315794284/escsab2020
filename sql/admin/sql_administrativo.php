<?php
  $resultado_apontamento=mysqli_query($conn, "SELECT Max(dataapontamento)  FROM apontamento WHERE igreja=$igreja");
  $linhas_datas=mysqli_num_rows($resultado_apontamento);
 // $resultado=mysqli_query($conn, "SELECT *, sum(pontuacao) ponto order by pontuacao DESC");
  //$linhas=mysqli_num_rows($resultado);

  $resultado_max_classe=mysqli_query($conn, "SELECT Max(numerodaclasse)  FROM classes WHERE igreja=$igreja");
  $linhas_max_classe=mysqli_num_rows($resultado_max_classe);

// Aniversariantes
$mes_atual = date("m");
$resultado_aniversario=mysqli_query($conn, "SELECT * FROM usuarios WHERE Month(datanascimento) = '$mes_atual' AND igreja=$igreja ORDER BY datanascimento, classe, nome");
$linhas_aniversario=mysqli_num_rows($resultado_aniversario);

//Aniversario de Batismo
//$mes_atual = date("m");
$resultado_aniversario_batismo=mysqli_query($conn, "SELECT * FROM usuarios WHERE Month(databatismo) = '$mes_atual' AND igreja=$igreja ORDER BY databatismo, classe, nome");
$linhas_aniversario_batismo=mysqli_num_rows($resultado_aniversario_batismo);


      //Consulta Oferta das Classes
      $resultado_oferta_classe = mysqli_query($conn, "SELECT alvodeoferta FROM classes WHERE igreja=$igreja");
      $linhas_oferta_classe = mysqli_num_rows($resultado_oferta_classe);


$sqlmaior_classe = mysqli_query($conn , "SELECT *, count(numerodaclasse) maior_classe FROM classes WHERE igreja=$igreja");
    while ($dadosmaior_classe = mysqli_fetch_array($sqlmaior_classe)){
      extract($dadosmaior_classe);
    }
//$maior_classe = $maior_classe;

    $sqlmaiordata = mysqli_query($conn , "SELECT *, max(dataapontamento) dataapontamento FROM apontamento WHERE igreja=$igreja");
    while ($dadosmaiordata = mysqli_fetch_array($sqlmaiordata)){
      extract($dadosmaiordata);
    }
    //MAIOR DATA
    $datadia = $dataapontamento[6].$dataapontamento[7];
    $datames = $dataapontamento[4].$dataapontamento[5];
    $dataano = $dataapontamento[0].$dataapontamento[1].$dataapontamento[2].$dataapontamento[3];


  $conn_id = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado_id=mysqli_query($conn_id, "SELECT Max(id_apontamento)  FROM apontamento WHERE igreja=$igreja");
  $linhas_datas=mysqli_num_rows($resultado_id);


      //Conexao para VRF a quantidade
      $resultado_estudo=mysqli_query($conn, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento AND igreja=$igreja");
      $linhas_estudo=mysqli_num_rows($resultado_estudo);

//VRF o valor de estudosbiblicos
$sqlmaiordata = mysqli_query($conn , "SELECT *, max(dataapontamento) dataapontamento FROM apontamento WHERE igreja=$igreja");
    while ($dadosmaiordata = mysqli_fetch_array($sqlmaiordata)){
      extract($dadosmaiordata);
    }


//-----------------------------------------estudo------------------------------------------------
//VRF o valor de estudo
$sqlestudo = mysqli_query($conn , "SELECT *, sum(estudo) estudosabado FROM apontamento WHERE dataapontamento=$dataapontamento AND igreja=$igreja");
    while ($dadosestudo = mysqli_fetch_array($sqlestudo)){
      extract($dadosestudo);
    }
//-----------------------------------------encontro------------------------------------------------
//VRF o valor de encontro
$sqlencontro = mysqli_query($conn , "SELECT *, sum(encontro) encontrosabado FROM apontamento WHERE dataapontamento=$dataapontamento AND igreja=$igreja");
    while ($dadosencontro = mysqli_fetch_array($sqlencontro)){
      extract($dadosencontro);
    }
//-----------------------------------------Estudos Biblicos------------------------------------------------
//VRF o valor de estudosbiblicos
$sqlestudosbiblicos = mysqli_query($conn , "SELECT *, sum(estudosbiblicos) estudosbiblicossabado FROM apontamento WHERE dataapontamento=$dataapontamento AND igreja=$igreja");
    while ($dadosestudosbiblicos = mysqli_fetch_array($sqlestudosbiblicos)){
      extract($dadosestudosbiblicos);
    }
/*-----------------------------------------QTD Estudosbiblicos------------------------------------------------
//VRF o valor de qtdestudosbiblicos
$sqlqtdestudosbiblicos = mysqli_query($conn , "SELECT *, sum(qtdestudosbiblicos) qtdestudosbiblicos_sabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosqtdestudosbiblicos = mysqli_fetch_array($sqlqtdestudosbiblicos)){
      extract($dadosqtdestudosbiblicos);
    }
$qtdestudosbiblicossabado = $qtdestudosbiblicos_sabado;
//echo "--------qtdestudosbiblicos sabado---------- $qtdestudosbiblicossabado";*/

//-----------------------------------------Acao Soliária------------------------------------------------
//VRF o valor de acao
$sqlacao = mysqli_query($conn , "SELECT *, sum(acao) acaosabado FROM apontamento WHERE dataapontamento=$dataapontamento AND igreja=$igreja");
    while ($dadosacao = mysqli_fetch_array($sqlacao)){
      extract($dadosacao);
    }
//-----------------------------------------presenca------------------------------------------------
//VRF o valor de presenca
$sqlpresenca = mysqli_query($conn , "SELECT *, sum(presenca) presencasabado FROM apontamento WHERE dataapontamento=$dataapontamento  AND igreja=$igreja");
    while ($dadospresenca = mysqli_fetch_array($sqlpresenca)){
      extract($dadospresenca);
    }
//-----------------------------------------contato------------------------------------------------
//VRF o valor de presenca
$sqlcontato = mysqli_query($conn , "SELECT *, sum(contato) contatosabado FROM apontamento WHERE dataapontamento=$dataapontamento  AND igreja=$igreja");
    while ($dadoscontato = mysqli_fetch_array($sqlcontato)){
      extract($dadoscontato);
    }
//-----------------------------------------qtd_alunos------------------------------------------------
//VRF o valor de qtd_alunos
$sqlqtd_alunos = mysqli_query($conn , "SELECT *, count(niveis_acesso_id) qtd_alunos_total FROM usuarios  WHERE igreja=$igreja");
    while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
      extract($dadosqtd_alunos);
    }
//-----------------------------------------QTD Visitas Adventistas------------------------------------------------
  $resultado_adventista_sabado = mysqli_query($conn , "SELECT sum(adventista) adventista_sabado FROM apontamento WHERE dataapontamento=$dataapontamento  AND igreja=$igreja ");
    while ($dadosqtd_adventista_sabado = mysqli_fetch_array($resultado_adventista_sabado)){
      extract($dadosqtd_adventista_sabado);
    }
//-----------------------------------------QTD Visitas Não Adventistas------------------------------------------------
  $resultado_naoadventista_sabado = mysqli_query($conn , "SELECT sum(naoadventista) naoadventista_sabado FROM apontamento WHERE dataapontamento=$dataapontamento  AND igreja=$igreja");
    while ($dadosqtd_naoadventista_sabado = mysqli_fetch_array($resultado_naoadventista_sabado)){
      extract($dadosqtd_naoadventista_sabado);
    }
//-----------------------------------------oferta------------------------------------------------
//VRF o valor de oferta
$sqloferta = mysqli_query($conn , "SELECT *, sum(oferta) ofertasabado FROM apontamento WHERE dataapontamento=$dataapontamento  AND igreja=$igreja");
    while ($dadosoferta = mysqli_fetch_array($sqloferta)){
      extract($dadosoferta);
    }
//-----------------------------------------alvo de oferta------------------------------------------------
//VRF o valor de alvodeoferta
$sqlalvodeoferta = mysqli_query($conn , "SELECT *, sum(alvodeoferta) valordeoferta FROM classes  WHERE igreja=$igreja");
    while ($dadosalvodeoferta = mysqli_fetch_array($sqlalvodeoferta)){
      extract($dadosalvodeoferta);
    }
