<html>
<head>
	<title>
		ProntOnline - Tela de Cadastro de Novo MEDICO
	</title>
</head>
<body>
	<p align="center"><i><b>Informe seus dados cadastrais, os campos marcados com * sao obrigatorios.</b></i></p>
	<p align="center">
		<form action="TelaDeCadastroNovaEnfermeira.php" method="POST">
			Nome:* <input type="text" name="nomeInformado" maxlength="40" value="">
			<br>
			Telefone:* <input type="text" name="telefoneInformado" maxlength="13" value="">
			<br>
			Email:* <input type="text" name="emailInformado" maxlength="70" value="">
			<br>
			CPF:* <input type="text" name="cpfInformado" maxlength="14" value="">
			<br>
			CRE:* <input type="text" name="creInformado" maxlength="20" value="">
			<br>
			Endere�o:
			<br>
			Rua:* <input type="text" name="ruaInformada" maxlength="30" value="">     Numero:* <input type="text" name="numeroInformado" maxlength="5" value=""> 
			<br>
			Complemento:* <input type="text" name="complementoInformado" maxlength="20" value="">     CEP:* <input type="text" name="cepInformado" maxlength="10" value="">
			<br>
			Bairro:* <input type="text" name="bairroInformado" maxlength="15" value="">     Cidade:*  <input type="text" name="CidadeInformada" maxlength="20" value="">  
			<br>
			UF:* <input type="text" name="ufInformado" maxlength="2" value="">     Pais:* <input type="text" name="paisInformado" maxlength="20" value="">
			<hr>
			Acesso:
			<br>
			<b>SEU LOGIN NO SISTEMA SERA SEU CPF</b>
			<br>
			Senha:* <input type="password" name="senhaEscolhida" maxlength="15" value="">
			<br>
			Confirma�ao:* <input type="password" name="confirmacaoSenhaEscolhida" maxlength="15" value="">
			<hr>
			<p align="center"><input type="submit" value="CADASTRAR"></p>
			<br>
		</form>
	</p>
</body>
</html>
<?php
	require_once 'SisHospBiblioteca.php';
	require_once 'Usuarios.php';
	require_once 'BD.php';
	require_once 'Endereco.php';
	require_once 'Enfermagem.php';

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
	$ufInformada= $_POST["ufInformada"];
	$creInformado= $_POST["creInformado"];
	
	
	
	
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
	$codEndEnf= (int) 0;	
	
	/*
	 *esta query ser� utilizada
	 *para consultar o c�digo
	 *do �ltimo usu�rio cadastrado
	 *para somarmos  + 1 e cadastrarmos
	 *o novo usu�rio que foi informado
	 */
	$codUsuarioEnf= (int) 0;
	
	/*
	 *esta vari�vel vai receber
	 *o retorno da fun��o crypt()
	 *que vai criptografar a senha
	 *escolhida pelo usu�rio antes 
	 *de ser guardada no banco de dados
	 */
	//$senhaCrypt= (int) 0;
	
	
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
	if(($nomeInformado == "") || ($telefoneInformado == "") || ($emailInformado == "") || ($cpfInformado == "") || ($ruaInformada == "") || ($numeroInformado == "") || ($complementoInformado == "") || ($cepInformado == "") || ($bairroInformado == "") || ($paisInformado == "") || ($senhaEscolhida == "") || ($confirmacaoSenhaEscolhida == "") || ($cidadeInformada == "") || ($ufInformada == "") || ($creInformado == ""))
	{
		unset($bd1);
		header("Location: InformeDadosObrigatoriosEnfermeira.html");
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
			$query1= ConsultaCpfInformadoMedico." ".$cpfInformado;
			
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
				header("Location: CpfJaCadastradoEnfermeira.html");
			}
			else 
				if($senhaEscolhida != $confirmacaoSenhaEscolhida)		//se a confirma��o da senha falhou
				{
					unset($bd1);
					header("Location: SenhaNaoConfereEnfermeira.html");
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
						*m�dico, para nos auxiliar no
						*cadastro de um novo usuario no
						*banco de dados
						*/
						$enfermeira1= new Enfermagem();
						
						
						
						
					    
							
						//colocamos as informa��es do endere�o do paciente no objeto $end1
						$end1->setBairro($bairroInformado);
						$end1->setCep($cepInformado);
						$end1->setCidade($cidadeInformada);
						$end1->setComplemento($complementoInformado);
						$end1->setNomeRua($ruaInformada);
						$end1->setNumero($numeroInformado);
						$end1->setPais($paisInformado);
						$end1->getUf($ufInformada);
							
							
						//criptografamos a senha escolhida
						//$senhaCrypt= crypt($senhaEscolhida);
							
						//colocamos as informa��es de usu�rio de sistema do paciente no objeto $usuario1
						$usuario1->setCodigoTipoUsuario(CODIGO_TIPO_USUARIO_ENFERMAGEM);
						$usuario1->setLogin($cpfInformado);
						$usuario1->setSenha($senhaEscolhida);

						
						/*
						 *passamos as informa��es 
						 *para o banco de dados 
						 *usando o INSERT  
						 */
						
						/*
						 *inserimos os dados de endere�o 
						 */
						//construimos a $query4
						$query4= InsereEnderecoMedico.$end1->getNomeRua().", ".$end1->getNumero().", ".$end1->getComplemento().", ".$end1->getCep().", ".$end1->getBairro().", ".$end1->getCidade().", ".$end1->getPais().", ".$end1->getUf().")";
						//inserimos atrav�s do objeto $bd1
						$statusQuery4= $bd1->ConectaConsultaFechaBd($query4);
						//pegamos o codigo do endere�o, cod_end, para usar o mesmo valor em pacientes
						$codEndEnf= mysql_insert_id();
						
						if($statusQuery4 == 0)
						{
							header("Location: ErroAoCadastrarEnfermeira.html");
						}
						
						
						/*
						 *inserimos os dados de usuario 
						 */
						//construimos a $query5
						$query5= InsereDadosUsuario.$usuario1->getLogin().", ".$usuario1->getSenha().", ".$usuario1->getCodigoTipoUsuario().")";
						//inserimos atrav�s do objeto $bd1
						$statusQuery5= $bd1->ConectaConsultaFechaBd($query5);
						//pegamos o codigo do usuario, para usar o mesmo valor em clientes
						$codUsuarioEnf= mysql_insert_id();
						
						if($statusQuery5 == 0)
						{
							header("Location: ErroAoCadastrarEnfermeira.html");
						}
						
						
						//colocamos as informa��es pessoais do cliente no objeto
						$enfermeira1->setCpf($cpfInformado);
						$enfermeira1->setNomeEnfermeira($nomeInformado);
						$enfermeira1->setEmailEnfermeira($emailInformado);
						$enfermeira1->setCodUsuario($codUsuarioEnf);
						$enfermeira1->setTelefone($telefoneInformado);
						$enfermeira1->setCre($creInformado);
						$end1->setCodEnd($codEndEnf);
						
						
						/*
						 *inserimos dados pessoais do cliente 
						 */
						//construimos a $query6
						$query6= InsereDadosPessoaisEnfermagem.$enfermeira1->getCpf().", ".$enfermeira1->getNomeEnfermeira().", ".$enfermeira1->getTelefone().", ".$enfermeira1->getEmailEnfermeira().", ".$end1->getCodEnd().", ".$enfermeira1->getCodUsuario().", ".", ".$enfermeira1->getCre().")";
						//inserimos atrav�s do objeto $bd1
						$statusQuery6= $bd1->ConectaConsultaFechaBd($query6);
						
						if($statusQuery6 == 0)
						{
							header("Location: ErroAoCadastrarEnfermeira.html");
						}
						
						
						
						
					
						
						
						
						//DESTRUIMOS OS OBJETOS
						unset($bd1);
						unset($end1);
						unset($usuario1);
						unset($enfermeira1);
						
						header("Location: CadastroRealizadoComSucesso.html");
						
					}
						
		}
	
?>