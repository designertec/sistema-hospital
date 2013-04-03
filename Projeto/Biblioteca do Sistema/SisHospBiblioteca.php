<?php
	define('CODIGO_TIPO_USUARIO_MEDICO',"2");
	
	define('CODIGO_TIPO_USUARIO_ENFERMAGEM',"4");
	
	define('CODIGO_TIPO_USUARIO_GERENTE',"1");
	
	define('CODIGO_TIPO_USUARIO_PACIENTE',"3");

	define('TAMANHO_CPF', 14);
	
	define('ConsultaCpfInformadoMedico',"SELECT MEDICOS.CPF FROM MEDICOS WHERE MEDICOS.CPF_MEDICO =");
	
	define('ConsultaCpfInformadoPaciente',"SELECT PACIENTES.CPF FROM PACIENTES WHERE PACIENTES.CPF_PACIENTE =");
	
	define('TelaMarcacaoQueryEspecialidade', "SELECT MEDICOS.NOME_MEDICO, MEDICOS.CRM, MEDICOS.ESPECIALIDADE FROM MEDICOS WHERE MEDICOS.ESPECIALIDADE =");
	
	define('TelaMarcacaoQueryEspecialidadeDataSolicitadaInicio', "SELECT MEDICOS.CPF_MEDICO,MEDICOS.NOME_MEDICO, MEDICOS.CRM, MEDICOS.ESPECIALIDADE FROM MEDICOS WHERE MEDICOS.ESPECIALIDADE =");
	
	define('TelaMarcacaoQueryEspecialidadeDataSolicitadaFim', "AND NOT EXISTS (SELECT * FROM MARCACAO_CONSULTA WHERE MARCACAO_CONSULTA.DATA_CONSULTA =");
	
	define('TelaDeMarcacaoQueryCadastro',"INSERT INTO MARCACAO_CONSULTAS (COD_MEDICO_DA_CONSULTA, DATA_CONSULTA, COD_PACIENTE) VALUES (");
	
	define('TelaDeLoginQueryUsuarios',"SELECT USUARIO.LOGIN_USUARIO,USUARIO.SENHA_USURAIO,USUARIO.COD_TIPO_USUARIO FROM USURAIOS WHERE USUARIO.LOGIN_USUARIO = ");
	
	define('TelaDoPacienteConsulta',"SELECT * FROM PACIENTES WHERE CPF_PACIENTE = ");
	
	define('InsereEnderecoMedico',"INSERT INTO ENDERECO (END_RUA, END_NUMERO, END_COMPLEMENTO, END_CEP, END_BAIRRO, END_CIDADE, END_PAIS, END_UF) VALUES (");
	
	define('InsereEnderecoPaciente',"INSERT INTO ENDERECO (END_RUA, END_NUMERO, END_COMPLEMENTO, END_CEP, END_BAIRRO, END_CIDADE, END_PAIS, END_UF) VALUES (");
	
	define('InsereDadosUsuario',"INSERT INTO USUARIOS (USUARIOS.LOGIN_USUARIO, USUARIOS.SENHA_USUARIO, USUARIOS.COD_TIPO_USUARIO) VALUES (");
	
	define('InsereDadosPessoaisEnfermagem',"INSERT INTO ENFERMAGEM (ENFERMAGEM.CPF_ENFERMEIRA, ENFERMAGEM.NOME_ENFERMEIRA, ENFERMAGEM.TELEFONE, ENFERMAGEM.EMAIL_ENFERMEIRA, ENFERMAGEM.COD_END, ENFERMAGEM.COD_USUARIO, ENFERMAGEM.CRE) VALUES (");
	
	define('InsereDadosPessoaisMedico',"INSERT INTO MEDICOS (MEDICOS.CPF_MEDICO, MEDICOS.NOME_MEDICO, MEDICOS.TELEFONE, MEDICOS.EMAIL_MEDICO, MEDICOS.COD_END, MEDICOS.COD_USUARIO, MEDICOS.ESPECIALIDADE, MEDICOS.CRM) VALUES (");
	
	define('InsereDadosPessoaisPaciente',"INSERT INTO PACIENTES (PACIENTES.CPF_PACIENTE, PACIENTES.NOME_PACIENTE, PACIENTES.TELEFONE_PACIENTE, PACIENTES.EMAIL_PACIENTE, PACIENTES.COD_END, PACIENTES.COD_USUARIO, PACIENTES.NOME_PAI, PACIENTES.NOME_MAE) VALUES (");
	
	define('ListaTodosMedicos',"SELECT * FROM MEDICOS");
	
	define('ListaTodosEnfermeiros',"SELECT * FROM ENFERMAGEM");
	
	define('ListaTodosPacientes',"SELECT * FROM PACIENTES");
	
	define('BaseDados',"sis_hospital");
	
	define('server',"localhost");
	
	define('user',"root");
	
	define('password',"");
	
	function TamanhoDeUmaString($str)
	{
		/*
		 * essa função retorna um inteiro
		 * representando o tamanho
		 * de uma string passada como parâmetro
		 */
		
		$result= (int) 0;
		
		foreach($str as $c)
		{
			$result= (int) $result + 1;
		}
		
		return $result;
	}

	function VerificaSeCaracterEhNumero($c)
	{
		/*
		 * uma função que nos informa
		 * se um caracter é um número 
		 * ou não, se for um número
		 * retorna 1 se não for retorna 0
		 */
		$result= (int) 0;	//começamos supondo que não é um número
		
		if(($c == 0) || ($c == 1) || ($c == 2) || ($c == 3) || ($c == 4) || ($c == 5) || ($c == 6) || ($c == 7) || ($c == 8) || ($c == 9))
		{
			/*
			 * se o caracter $c for pelo menos 
			 * um dos dígitos, então ele é
			 * um número
			 */
			$result= (int) 1;
		}
		
		return $result;
	}

	function VerificaSeEhStringDeNumeros($str)
	{
	   /*
		* essA função vai verificar
		* se uma string informada é
		* composta penas de números,
		* se estiver correto retorna 1
		* se estiver errado retorna 0
		*/
			
		$result= (int) 1;	//começamos supondo que está no formato correto
		$caracter= "";
	
		foreach($str as $caracter)
		{
			if(VerificaSeCaracterEhNumero($caracter) == 0)
			{
				/*
				 * se o caracter não for um número
				 * o resultado é zero e terminamos 
				 * com o laço usando break
				 */
				$result= (int) 0;
				break;
			}
		}
		
		/*
		 *se o caracter é um número, então
		 *ele não entrou nehuma vez no if()
		 *e $result continua igual 1
		 */
		
		return $result;
	}
	
	function VerificaFormatoDaData($str)
	{
		/*
		 * essa função verfica se uma string 
		 * representando uma data informada
		 * está no formato: dd/mm/aaaa
		 * se estiver retorna 1
		 * se não estiver retorna 0
		 */
		
		$qtd= (int) 1;
		$result= (int) 1;	//começamos supondo que está no formato correto
		$caracter= "";
		
		foreach($str as $caracter)
		{
			/*
			 * quando o contador estiver
			 * contando 3 e 6 devemos ter
			 * o caracter '/', caso contrário 
			 * temos um erro
			 */
			if((($qtd % 3) == 0) && ($caracter != '/'))		//podia ter usado: (($qtd == 3) || ($qtd == 6))
			{
				//se estamos em 3 ou 6 e não temos o '/' temos erro
				$result= (int) 0;
				break;
			}
			else	//se estamos em qualquer outra posição
				if(VerificaSeCaracterEhNumero($caracter) == 0)		//podia ter usado: (verificaStringDeNumeros($caracter) == 0)
				{
					/*
					 * se estamos em qualquer outra posição
					 * e não temos um número temos um erro
					 */
					$result= (int) 0;
					break;
				}
		}
	   
	   /*
		*se a data está na forma correta, então
		*ele não entrou em nehum if()
		*e $result continua igual 1
		*/
		
		return $result;
		
	}
?>