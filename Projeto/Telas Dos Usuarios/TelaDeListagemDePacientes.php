<html>
<head>
	<title>
		ProntOnline - Lista De Pacientes
	</title>
</head>
<body>
	<p align="center"><b>ProntOnline</b></p>
	<hr>
	<p align="center">Estes sao todos os pacientes cadastrados no sistema</p>
	<br>
	<br>
</body>
</html>
<?php
	require_once 'BD.php';
	require_once 'SisHospBiblioteca.php';
	
	//instanciamos um objeto da classe BD
	$bd1= new BD();
	
	
	/*
	 *estas variáveis vão
	 *nos ajudar na consulta 
	 *dos dados dos pacientes 
	 */
	//construimos a query
	$query1= ListaTodosPacientes;
	
	
	//realizamos a consulta
	$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);
	
	
	$statusFetchArray= "";
	
	
	while($statusFetchArray = mysql_fetch_array($statusQuery1)) 
	{
		echo "CPF: ".$statusFetchArray["CPF_PACIENTE"]."  NOME: ".$statusFetchArray["NOME_PACIENTE"]."  EMAIL: ".$statusFetchArray["EMAIL_PACIENTE"]."  TELEFONE: ".$statusFetchArray["TELEFONE"]."  NOME DO PAI: ".$statusFetchArray["NOME_PAI"]."  NOME DA MAE: ".$statusFetchArray["NOME-MAE"];
		?>
		<br>
		<hr>
		<?php
	}
	
?>