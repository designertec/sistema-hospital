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
			Endereço:
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
			Confirmaçao:* <input type="password" name="confirmacaoSenhaEscolhida" maxlength="15" value="">
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

	//todos os dados pedidos no fomrulário são obrigatórios

	/*
	 *atribuimos as variáveis os dados 
	 *informados pelo usuário no formulário 
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
	 *já existe no banco de dados 
	 */
	$query1= "";
	
	/*
	 *esta variável vai receber o 
	 *resultado da consulta feita
	 *no banco de dados pela $query1 
	 */
	$statusQuery1= (int) 0;
	
	/*
	 *essa variável será 
	 *usada para verificar
	 *se alguma linha foi afetada 
	 *na consulta de cpf, ajudando 
	 *a verificar se o cpf informado
	 *já está cadastrado
	 */
	$numRows1= (int) 0;
	
	/*
	 *esta query será utilizada
	 *para consultar o código
	 *do último endereço cadastrado
	 *para somarmos  + 1 e cadastrarmos
	 *o novo endereço que foi informado
	 */
	$codEndEnf= (int) 0;	
	
	/*
	 *esta query será utilizada
	 *para consultar o código
	 *do último usuário cadastrado
	 *para somarmos  + 1 e cadastrarmos
	 *o novo usuário que foi informado
	 */
	$codUsuarioEnf= (int) 0;
	
	/*
	 *esta variável vai receber
	 *o retorno da função crypt()
	 *que vai criptografar a senha
	 *escolhida pelo usuário antes 
	 *de ser guardada no banco de dados
	 */
	//$senhaCrypt= (int) 0;
	
	
	/*
	 *esta query será utilizada 
	 *para inserir os dados de 
	 *endereço do cliente 
	 */
	$query4= "";
	
	
	/*
	 *esta variável vai receber
	*o resultado da consulta
	*feita pela $query4
	*/
	$statusQuery4= (int) 0;
	
	
   /*
	*esta query será utilizada
	*para inserir os dados de
	*usuário do cliente
	*/
	$query5= "";
	
	
   /*
	*esta variável vai receber
	*o resultado da consulta
	*feita pela $query5
	*/
	$statusQuery5= (int) 0;
	
	
	/*
	 *esta query será utilizada
	*para inserir os dados pessoais
	* do cliente
	*/
	$query6= "";
	
	
	/*
	 *esta variável vai receber
	*o resultado da consulta
	*feita pela $query6
	*/
	$statusQuery6= (int) 0;
	
	
	/*
	 *instanciamos um objeto
	 *da classe BD para comunicação
	 *com o banco 
	 */
	$bd1= new BD();
	
	
	//validar se todos os campos foram preenchidos
	if(($nomeInformado == "") || ($telefoneInformado == "") || ($emailInformado == "") || ($cpfInformado == "") || ($ruaInformada == "") || ($numeroInformado == "") || ($complementoInformado == "") || ($cepInformado == "") || ($bairroInformado == "") || ($paisInformado == "") || ($senhaEscolhida == "") || ($confirmacaoSenhaEscolhida == "") || ($cidadeInformada == "") || ($ufInformada == "") || ($creInformado == ""))
	{
		unset($bd1);
		header("Location: InformeDadosObrigatoriosEnfermeira.html");
	}
	else	//se todos os dados estão deividamente preenchidos
		{
			/*
			 *como os dados foram todos preenchidos
			 *no formulários HTML então agora
			 *vamos validar o cadastro, consultando 
			 *no banco se já existe um cpf cadastrado
			 *igual ao que foi informado
			 */
			
			
			/*
			 *consultamos no banco e atribuimos 
			 *o resultado da consulta a 
			 *variável $statusQuery1 
			 */
			//construimos a $query1
			$query1= ConsultaCpfInformadoMedico." ".$cpfInformado;
			
			$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);
			
			/*
			 *se alguma linha foi afetada 
			 *na consulta então o cpf ja existe
			 *para verificar isso usamos a função
			 *mysql_num_rows() 
			 */
			$numRows1= mysql_num_rows($statusQuery1);
			
			//validação SE O CPF JÁ ESTÁ CADASTRADO
			if(($numRows1 != 0) || ($statusQuery1["CPF"] == $cpfInformado))
			{
				unset($bd1);
				header("Location: CpfJaCadastradoEnfermeira.html");
			}
			else 
				if($senhaEscolhida != $confirmacaoSenhaEscolhida)		//se a confirmação da senha falhou
				{
					unset($bd1);
					header("Location: SenhaNaoConfereEnfermeira.html");
				}
				else	//se o cpf ainda não existe no sistema e se a senha informada confere continuamos com o cadastro
					{
						/*
						 *se o cpf ainda não existe 
						 *no sistema continuamos 
						 *com o cadastro, logo
						 *passamos as informações 
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
						*endereço, para nos auxiliar no
						*cadastro de um novo usuario no
						*banco de dados
						*/
						$end1= new Endereco();
						
						
					   /*
						*instaciamos um objeto da classe
						*médico, para nos auxiliar no
						*cadastro de um novo usuario no
						*banco de dados
						*/
						$enfermeira1= new Enfermagem();
						
						
						
						
					    
							
						//colocamos as informações do endereço do paciente no objeto $end1
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
							
						//colocamos as informações de usuário de sistema do paciente no objeto $usuario1
						$usuario1->setCodigoTipoUsuario(CODIGO_TIPO_USUARIO_ENFERMAGEM);
						$usuario1->setLogin($cpfInformado);
						$usuario1->setSenha($senhaEscolhida);

						
						/*
						 *passamos as informações 
						 *para o banco de dados 
						 *usando o INSERT  
						 */
						
						/*
						 *inserimos os dados de endereço 
						 */
						//construimos a $query4
						$query4= InsereEnderecoMedico.$end1->getNomeRua().", ".$end1->getNumero().", ".$end1->getComplemento().", ".$end1->getCep().", ".$end1->getBairro().", ".$end1->getCidade().", ".$end1->getPais().", ".$end1->getUf().")";
						//inserimos através do objeto $bd1
						$statusQuery4= $bd1->ConectaConsultaFechaBd($query4);
						//pegamos o codigo do endereço, cod_end, para usar o mesmo valor em pacientes
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
						//inserimos através do objeto $bd1
						$statusQuery5= $bd1->ConectaConsultaFechaBd($query5);
						//pegamos o codigo do usuario, para usar o mesmo valor em clientes
						$codUsuarioEnf= mysql_insert_id();
						
						if($statusQuery5 == 0)
						{
							header("Location: ErroAoCadastrarEnfermeira.html");
						}
						
						
						//colocamos as informações pessoais do cliente no objeto
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
						//inserimos através do objeto $bd1
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