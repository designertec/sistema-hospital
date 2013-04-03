<html>
<head>
	<title>
		ProntOnline - Lista De Medicos
	</title>
</head>
<body>
	<p align="center"><b>ProntOnline</b></p>
	<hr>
	<p align="center">Estes sao todos os medicos cadastrados no sistema</p>
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
	 *dos dados dos medicos 
	 */
	//construimos a query
	$query1= ListaTodosMedicos;
	
	
	//realizamos a consulta
	$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);
	
	
	$statusFetchArray= "";
	
	
	while($statusFetchArray = mysql_fetch_array($statusQuery1)) 
	{
		echo "CPF: ".$statusFetchArray["CPF_MEDICO"]."  NOME: ".$statusFetchArray["NOME_MEDICO"]."  CRM: ".$statusFetchArray["CRM"]."  EMAIL: ".$statusFetchArray["EMAIL_MEDICO"]."  TELEFONE: ".$statusFetchArray["TELEFONE"]."  ESPECIALIDADE: ".$statusFetchArray["ESPECIALIDADE"];
		?>
		<br>
		<hr>
		<?php
	}
	
?>