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
	 *na tela de login recebemos do usuário seu login e sua senha, realizamos uma consulta no 
	 *banco de dados para descobrir a qual tipo de usuário se trata e dependendo do tipo direcionamos
	 *para uma página específica. 
	 */

	
	//variáveis
	//pegamos o login que foi informado no formulário HTML
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
	 *ele executará o script de comunicação
	 *com o banco
	 */
	$bd1= new BD();
	
	
	/*
	 *$query é a consulta que será passada
	 *como parâmetro para o script que 
	 *é executado pelo objeto da classe BD 
	 */
	$query= "";
	$statusQuery= "";
	
	/*
	 *essas variáveis receberão
	 *os retornos das funções MYsql
	 */
	$statusFetchArray= (int) 0;
	$numLinhasResultado= (int) 0;

	
	/*
	 *aqui realizamos o script de comunicação com o banco,
	 *lembrando que esse script realiza a consulta que 
	 *passamos como parâmetro com $query e devolve
	 *o retorno da função mysql_query() 
	 */
	//construimos a $query
	$query= TelaDeLoginQueryUsuarios." ".$loginInformado;
	//inserimos atravé do objeto $bd1
	$statusQuery= $bd1->ConectaConsultaFechaBd($query);
	
	//verificamos o número de linhas do resultado da consulta
	$numLinhasResultado= mysql_num_rows($statusQuery);
	
	//fazemos a verificação
	if($numLinhasResultado = 0)		//o usuário não está cadastrado
	{
		header("Location: UsuarioNaoCadastrado.html");
	}
	else 
		if($numLinhasResultado = 1)		//existe um usuário cadastrado com esse login, situação correta
		{
			//se a consulta retornou alguma coisa passamos o resultado para o array
			
			$statusFetchArray= mysql_fetch_array($statusQuery);
			
			/*
			 *temos um array onde as chaves (indices)
			 *são os nomes dos campos da tabela do banco
			 *nesse caso a tabela usuário 
			 */

			/*
			 *jogamos na variável $senhaCadastradaNoBd 
			 *a senha que está no banco de dados
			 *correpondente ao login passado pelo usuário 
			 */
			
			$usuario1= new Usuarios($statusFetchArray["LOGIN_USUARIO"], $statusFetchArray["SENHA_USUARIO"], $statusFetchArray["COD_TIPO_USUARIO"]);
			
			
			
			//verificamos a compatibilidade da senha informada com a que foi cadastrada no banco de dados
			if($senhaInformada = $usuario1->getSenha())
			{
				//fazemos o redirecionamento para as páginas corretas
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