<html>
<head>
	<title>
		ProntOnLine - Paciente
	</title>
</head>
<body>
	<p align="center"><i><b>ProntOnLine</b></i></p>
	<hr>
	<br>
	<br>
	<br>
	<p align="center">
	<b>Nesta página você paciente pode marcar suas consultas para médicos de acordo com a especialidade </b>
	<br>
	<b>selecionada e visualizar seu prontuário.</b>
	<br>
	</p>
	<br>
	<p align="center"><a href="TelaDoPacienteMarcacao.php">Clique aqui para MARCAR CONSULTAS</a></p>
	<hr>
	<br>
	<p align="center">ABAIXO VOCE PODE VISUALIZAR SEU PRONTUARIO</p>
	<br>
	<p align="center">
	<form action="TelaDoPaciente.php" method="POST">
		<input type="text" name="cpfInformado" maxlength="14">
		<br>
		<input type="submit" value="Enviar">
		<br>
		<hr>
	</form>
	</p>
</body>
</html>
<?php
	require_once 'Pacientes.php';
	require_once 'Prontuarios.php';
	require_once 'BD.php';
	

	/*
	 *aqui vamos exibir informações pessoais
	 *do usuário e também informações do seu prontuário 
	 */

	//pegamos o cpf informao no formulário html
	$cpfInformado= $_POST["cpfInformado"];
	
	
	//consultamos as informações pessoais do paciente na tabela Paceintes
	
	/*
	 *instanciamos um objeto da 
	 *classe BD para nos auxiliar 
	 *na conexão com o banco de dados 
	 */
	$bd1= new BD();
	
	
	
	
	//consultamos as informações pessoais do paciente na tabela Pacientes
	/*
	 *estas variáveis nos ajuadarão
	 *a realizar a consulta e a pegar
	 *o retorno da consutla feita no 
	 *banco de dados 
	 */
	//cosntruimos a query
	$query1= TelaDoPacienteConsulta.$cpfInformado.")";
	
	//inicializamos a variável
	$statusQuery1= (int) 0;
	
	//realizamos a consulta
	$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);$_COOKIE
	
	
	
	
	//consultamos as informações do prontuario do paciente
	/*
	 *estas variáveis irão nos
	 *auxiliar a realizar a consulta
	 *nas informções da tabela prontuários 
	 */
	//construimos a query
	
	
	
	
	
?>