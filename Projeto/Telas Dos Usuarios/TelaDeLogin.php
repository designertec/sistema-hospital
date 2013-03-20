<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>
		E_Commerce - Login
	</title>
</head>
	<body>
		<hr>
		<br>
		<br>
		<br>
		<p align="center">
			<form action="TelaDeLogin.php" method="Post">
				<p align="center"><b>Login: </b><input type="text" name="LoginTextBox"></p><br>
				<p align="center"><b>Senha: </b><input type="text" name="SenhaTextBox"></p><br>
				<p align="center" font="7"><a href="CadastroDeUsuario.php">Primeiro acesso</a></p><br>
				<p align="center"><b>Login: </b><input type="submit" value="ENTRAR"></p><br>
			</form>
		</p>
	</body>
</html>
<?php
	require_once 'Biblioteca_E_Commerce.php';

	/*
	 *na tela de login recebemos do usu�rio seu login e sua senha, realizamos uma consulta no 
	 *banco de dados para descobrir a qual tipo de usu�rio se trata e dependendo do tipo direcionamos
	 *para uma p�gina espec�fica. 
	 */

	
	//vari�veis
	//pegamos o login que foi informado no formul�rio HTML
	$loginInformado= $_POST["LoginTextBox"];
	$senhaInformada= $_POST["SenhaTextBox"];
	
	
	/*
	 *instanciamos um objeto da classe 
	 *Usuarios para guardarmos dados 
	 *que vao ser consultados no BD 
	 */
	$usuario1= new Usuarios();
	
	
	/*
	 *instanciamos um objeto da classe BD
	 *ele executar� o script de comunica��o
	 *com o banco
	 */
	$bd1= new BD();
	
	
	/*
	 *$query � a consulta que ser� passada
	 *como par�metro para o script que 
	 *� executado pelo objeto da classe BD 
	 */
	$query= "";
	$statusQuery= "";
	
	/*
	 *essas vari�veis receber�o
	 *os retornos das fun��es MYsql
	 */
	$statusFetchArray= (int) 0;
	$numLinhasResultado= (int) 0;

	
	/*
	 *aqui realizamos o script de comunica��o com o banco,
	 *lembrando que esse script realiza a consulta que 
	 *passamos como par�metro com $query e devolve
	 *o retorno da fun��o mysql_query() 
	 */
	//construimos a $query
	$query= TelaDeLoginQueryUsuarios." ".$loginInformado;
	//inserimos atrav� do objeto $bd1
	$statusQuery= $bd1->ConectaConsultaFechaBd($query);
	
	//verificamos o n�mero de linhas do resultado da consulta
	$numLinhasResultado= mysql_num_rows($statusQuery);
	
	//fazemos a verifica��o
	if($numLinhasResultado = 0)		//o usu�rio n�o est� cadastrado
	{
		header("Location: UsuarioNaoCadastrado.html");
	}
	else 
		if($numLinhasResultado = 1)		//existe um usu�rio cadastrado com esse login, situa��o correta
		{
			//se a consulta retornou alguma coisa passamos o resultado para o array
			
			$statusFetchArray= mysql_fetch_array($statusQuery);
			
			/*
			 *temos um array onde as chaves (indices)
			 *s�o os nomes dos campos da tabela do banco
			 *nesse caso a tabela usu�rio 
			 */

			/*
			 *jogamos na vari�vel $senhaCadastradaNoBd 
			 *a senha que est� no banco de dados
			 *correpondente ao login passado pelo usu�rio 
			 */
			
			$usuario1= new Usuarios($statusFetchArray["LOGIN_USUARIO"], $statusFetchArray["SENHA_USUARIO"], $statusFetchArray["COD_TIPO_USUARIO"]);
			
			
			
			//verificamos a compatibilidade da senha informada com a que foi cadastrada no banco de dados
			if($senhaInformada = $usuario1->getSenha())
			{
				//fazemos o redirecionamento para as p�ginas corretas
				if($usuario1->getCodigoTipoUsuario() = CODIGO_TIPO_USUARIO_GERENTE)	//administrador
				{
					header("Location: TelaDoAdministrador.php");
				}
				else
					if($usuario1->getCodigoTipoUsuario() = CODIGO_TIPO_USUARIO_MEDICO)		//medico
					{
						header("Location: TelaDoMedico.php");
					}
					else
						if($usuario1->getCodigoTipoUsuario() = CODIGO_TIPO_USUARIO_PACIENTE)		//paciente
						{
							header("Location: TelaDoPaciente.php");
						}
			}
			else
			{
				header("Location: SenhaIncorreta.html");
			}
		}

		unset($usuario1);	//destruimos o objeto $usuario1
?>