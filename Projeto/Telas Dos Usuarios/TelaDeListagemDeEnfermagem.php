<html>
<head>
	<title>
		ProntOnline - Lista De Enfermeiras
	</title>
</head>
<body>
	<p align="center"><b>ProntOnline</b></p>
	<hr>
	<p align="center">Estes sao todos as enfermeiras(os) cadastradas no sistema</p>
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
	 *dos dados das enfermeiras 
	 */
	//construimos a query
	$query1= ListaTodosEnfermeiros;
	
	
	//realizamos a consulta
	$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);
	
	
	$statusFetchArray= "";
	
	
	while($statusFetchArray = mysql_fetch_array($statusQuery1)) 
	{
		echo "CPF: ".$statusFetchArray["CPF_ENFERMEIRA"]."  NOME: ".$statusFetchArray["NOME_ENFERMEIRA"]."  CRE: ".$statusFetchArray["CRE"]."  EMAIL: ".$statusFetchArray["EMAIL_ENFERMEIRA"]."  TELEFONE: ".$statusFetchArray["TELEFONE"];
		?>
		<br>
		<hr>
		<?php
	}
	
?>