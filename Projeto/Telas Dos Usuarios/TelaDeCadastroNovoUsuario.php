<html>
<head>
	<title>
		E_Commerce - Tela de Cadastro de Novo Usuario
	</title>
</head>
<body>
	<p align="center"><i><b>Informe seus dados cadastrais, os campos marcados com * sao obrigatorios.</b></i></p>
	<p align="center">
		<form action="TelaDeCadastroNovoUsuario.php" method="POST">
			Nome:* <input type="text" name="nomeInformado" maxlength="40" value="">
			<br>
			Telefone:* <input type="text" name="telefoneInformado" maxlength="13" value="">
			<br>
			Email:* <input type="text" name="emailInformado" maxlength="70" value="">
			<br>
			CPF:* <input type="text" name="cpfInformado" maxlength="14" value="">
			<br>
			Endere�o:
			<br>
			Rua:* <input type="text" name="ruaInformada" maxlength="30" value="">     Numero:* <input type="text" name="numeroInformado" maxlength="5" value=""> 
			<br>
			Complemento:* <input type="text" name="complementoInformado" maxlength="20" value="">     CEP:* <input type="text" name="cepInformado" maxlength="10" value="">
			<br>
			Bairro:* <input type="text" name="bairroInformado" maxlength="15" value="">     Cidade:*  <input type="text" name="CidadeInformada" maxlength="20" value="">  
			<br>
			Pais:* <input type="text" name="paisInformado" maxlength="20" value="">
			<hr>
			Acesso:
			<br>
			Senha:* <input type="text" name="senhaEscolhida" maxlength="15" value="">
			<br>
			Confirma�ao:* <input type="text" name="confirmacaoSenhaEscolhida" maxlength="15" value="">
			<hr>
			<p align="center"><b>Login: </b><input type="submit" value="CADASTRAR"></p>
			<br>
		</form>
	</p>
</body>
</html>
<?php
	//todos os dados pedidos no fomrul�rio s�o obrigat�rios

	/*
	 *atribuimos as vari�veis os dados 
	 *informados pelo usu�rio no formul�rio 
	 *HTML 
	 */
	$nomeInformado= $_POST["nomeInformado"];
	$telefoneInformado= $_POST["telefoneInformado"];
	$emailInformado= $_POST["emailInformado"];
	$cpfInformado= $_POST["cpfInformado"];
	$ruaInformada= $_POST["ruaInformada"];
	$numeroInformado= $_POST["numeroInformado"];
	$complementoInformado= $_POST["complementoInformado"];
	$cepInformado= $_POST["cepInformado"];
	$bairroInformado= $_POST["bairroInformado"];
	$paisInformado= $_POST["paisInformado"];
	$senhaEscolhida= $_POST["senhaEscolhida"];
	$confirmacaoSenhaEscolhida= $_POST["confirmacaoSenhaEscolhida"];
	$cidadeInformada= $_POST["CidadeInformada"];
	
	
	/*
	 *esta query vai ser utilizada
	 *para uma consulta que vai ajudar
	 *a verificar se o cpf informado 
	 *j� existe no banco de dados 
	 */
	$query1= "";
	
	/*
	 *esta vari�vel vai receber o 
	 *resultado da consulta feita
	 *no banco de dados pela $query1 
	 */
	$statusQuery1= (int) 0;
	
	/*
	 *essa vari�vel ser� 
	 *usada para verificar
	 *se alguma linha foi afetada 
	 *na consulta de cpf, ajudando 
	 *a verificar se o cpf informado
	 *j� est� cadastrado
	 */
	$numRows1= (int) 0;
	
	/*
	 *esta query ser� utilizada
	 *para consultar o c�digo
	 *do �ltimo endere�o cadastrado
	 *para somarmos  + 1 e cadastrarmos
	 *o novo endere�o que foi informado
	 */
	$codEndClie= (int) 0;	
	
	/*
	 *esta query ser� utilizada
	 *para consultar o c�digo
	 *do �ltimo usu�rio cadastrado
	 *para somarmos  + 1 e cadastrarmos
	 *o novo usu�rio que foi informado
	 */
	$codUsuarioClie= (int) 0;
	
	/*
	 *esta vari�vel vai receber
	 *o retorno da fun��o crypt()
	 *que vai criptografar a senha
	 *escolhida pelo usu�rio antes 
	 *de ser guardada no banco de dados
	 */
	$senhaCrypt= (int) 0;
	
	
	/*
	 *esta query ser� utilizada 
	 *para inserir os dados de 
	 *endere�o do cliente 
	 */
	$query4= "";
	
	
	/*
	 *esta vari�vel vai receber
	*o resultado da consulta
	*feita pela $query4
	*/
	$statusQuery4= (int) 0;
	
	
   /*
	*esta query ser� utilizada
	*para inserir os dados de
	*usu�rio do cliente
	*/
	$query5= "";
	
	
   /*
	*esta vari�vel vai receber
	*o resultado da consulta
	*feita pela $query5
	*/
	$statusQuery5= (int) 0;
	
	
	/*
	 *esta query ser� utilizada
	*para inserir os dados pessoais
	* do cliente
	*/
	$query6= "";
	
	
	/*
	 *esta vari�vel vai receber
	*o resultado da consulta
	*feita pela $query6
	*/
	$statusQuery6= (int) 0;
	
	
	/*
	 *instanciamos um objeto
	 *da classe BD para comunica��o
	 *com o banco 
	 */
	$bd1= new BD();
	
	
	//validar se todos os campos foram preenchidos
	if(($nomeInformado == "") || ($telefoneInformado == "") || ($emailInformado == "") || ($cpfInformado == "") || ($ruaInformada == "") || ($numeroInformado == "") || ($complementoInformado == "") || ($cepInformado == "") || ($bairroInformado == "") || ($paisInformado == "") || ($senhaEscolhida == "") || ($confirmacaoSenhaEscolhida == ""))
	{
		unset($bd1);
		header("Location: InformeDadosObrigatorios.html");
	}
	else	//se todos os dados est�o deividamente preenchidos
		{
			/*
			 *como os dados foram todos preenchidos
			 *no formul�rios HTML ent�o agora
			 *vamos validar o cadastro, consultando 
			 *no banco se j� existe um cpf cadastrado
			 *igual ao que foi informado
			 */
			
			
			/*
			 *consultamos no banco e atribuimos 
			 *o resultado da consulta a 
			 *vari�vel $statusQuery1 
			 */
			//construimos a $query1
			$query1= ConsultaCpfInformado." ".$cpfInformado;
			
			$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);
			
			/*
			 *se alguma linha foi afetada 
			 *na consulta ent�o o cpf ja existe
			 *para verificar isso usamos a fun��o
			 *mysql_num_rows() 
			 */
			$numRows1= mysql_num_rows($statusQuery1);
			
			//valida��o SE O CPF J� EST� CADASTRADO
			if(($numRows1 != 0) || ($statusQuery1["CPF"] == $cpfInformado))
			{
				unset($bd1);
				header("Location: CpfJaCadastrado.html");
			}
			else 
				if($senhaEscolhida != $confirmacaoSenhaEscolhida)		//se a confirma��o da senha falhou
				{
					unset($bd1);
					header("Location: SenhaNaoConfere.html");
				}
				else	//se o cpf ainda n�o existe no sistema e se a senha informada confere continuamos com o cadastro
					{
						/*
						 *se o cpf ainda n�o existe 
						 *no sistema continuamos 
						 *com o cadastro, logo
						 *passamos as informa��es 
						 *para o banco de dados 
						 */
						
				       /*
						*instaciamos um objeto da classe
						*usuarios, para nos auxiliar no
						*cadastro de um novo usuario no
						*banco de dados
						*/
						$usuario1= new Usuarios();
						
					   /*
						*instaciamos um objeto da classe
						*endere�o, para nos auxiliar no
						*cadastro de um novo usuario no
						*banco de dados
						*/
						$end1= new Endereco();
						
						
					   /*
						*instaciamos um objeto da classe
						*cliente, para nos auxiliar no
						*cadastro de um novo usuario no
						*banco de dados
						*/
						$cliente1= new Cliente();
						
						
						//AS QUERYS 3 E 4 S�O FIXAS, N�O ENVOLVEM VARI�VEIS POR ISSO N�O PRECISAMOS CONSTRU�-LAS
						
					    
							
						//colocamos as informa��es do endere�o do cliente no objeto $end1
						$end1->setBairro($bairroInformado);
						$end1->setCep($cepInformado);
						$end1->setCidade($cidadeInformada);
						$end1->setComplemento($complementoInformado);
						$end1->setNomeRua($ruaInformada);
						$end1->setNumero($numeroInformado);
						$end1->setPais($paisInformado);
							
							
						//criptografamos a senha escolhida
						$senhaCrypt= crypt($senhaEscolhida);
							
						//colocamos as informa��es de usu�rio de sistema do cliente no objeto $usuario1
						$usuario1->setCodUsuario($statusQuery3);
						$usuario1->setCodigoTipoUsuario(CODIGO_TIPO_USUARIO_CLIENTE);
						$usuario1->setLogin($cpfInformado);
						$usuario1->setSenha($senhaCrypt);

						
						/*
						 *passamos as informa��es 
						 *para o banco de dados 
						 *usando o INSERT  
						 */
						
						/*
						 *inserimos os dados de endere�o 
						 */
						//construimos a $query4
						$query4= InsereEnderecoCliente.$end1->getCodEnd().", ".$end1->getNomeRua().", ".$end1->getNumero().", ".$end1->getComplemento().", ".$end1->getCep().", ".$end1->getBairro().", ".$end1->getCidade().", ".$end1->getPais().")";
						//inserimos atrav�s do objeto $bd1
						$statusQuery4= $bd1->ConectaConsultaFechaBd($query4);
						//pegamos o codigo do endere�o, cod_end, para usar o mesmo valor em clientes
						$codEndClie= mysql_insert_id();
						
						if($statusQuery4 = 0)
						{
							header("Location: ErroAoCadastrar.html");
						}
						
						
						/*
						 *inserimos os dados de usuario 
						 */
						//construimos a $query5
						$query5= InsereDadosUsuarioClie.$usuario1->getCodUsuario().", ".$usuario1->getLogin().", ".$usuario1->getSenha().", ".$usuario1->getCodigoTipoUsuario().")";
						//inserimos atrav�s do objeto $bd1
						$statusQuery5= $bd1->ConectaConsultaFechaBd($query5);
						//pegamos o codigo do usuario, para usar o mesmo valor em clientes
						$codUsuarioClie= mysql_insert_id();
						
						if($statusQuery5 = 0)
						{
							header("Location: ErroAoCadastrar.html");
						}
						
						
						//colocamos as informa��es pessoais do cliente no objeto $cliente1
						$cliente1->setCpf($cpfInformado);
						$cliente1->setNome($nomeInformado);
						$cliente1->setEmail($emailInformado);
						$cliente1->setTelefone($telefoneInformado);
						$cliente1->setCodUsuarioClie($codUsuarioClie);
						$cliente1->setCodEnd($codEndClie);
						
						
						/*
						 *inserimos dados pessoais do cliente 
						 */
						//construimos a $query6
						$query6= InsereDadosPessoaisClie.$cliente1->getCpf().", ".$cliente1->getNome().", ".$cliente1->getTelefone().", ".$cliente1->getEmail().", ".$cliente1->getCodEnd().", ".$cliente1->getCodUsuarioClie().")";
						//inserimos atrav�s do objeto $bd1
						$statusQuery6= $bd1->ConectaConsultaFechaBd($query6);
						
						if($statusQuery6 = 0)
						{
							header("Location: ErroAoCadastrar.html");
						}
						
						//DESTRUIMOS OS OBJETOS
						unset($bd1);
						unset($end1);
						unset($usuario1);
						unset($cliente1);
						
						header("Location: CadastroRealizadoComSucesso.html");
						
					}
						
		}
	
?>