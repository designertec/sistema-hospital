<?php
	define(CODIGO_TIPO_USUARIO_MEDICO,"2");
	
	define(CODIGO_TIPO_USUARIO_GERENTE,"1");
	
	define(CODIGO_TIPO_USUARIO_PACIENTE,"3");

	define(TAMANHO_CPF, 14);
	
	define(TelaMarcacaoQueryEspecialidade, "SELECT MEDICOS.NOME_MEDICO, MEDICOS.CRM, MEDICOS.ESPECIALIDADE FROM MEDICOS WHERE MEDICOS.ESPECIALIDADE =");
	
	define(TelaMarcacaoQueryEspecialidadeDataSolicitadaInicio, "SELECT MEDICOS.NOME_MEDICO, MEDICOS.CRM, MEDICOS.ESPECIALIDADE FROM MEDICOS WHERE MEDICOS.ESPECIALIDADE =");
	
	define(TelaMarcacaoQueryEspecialidadeDataSolicitadaFim, "AND NOT EXISTS (SELECT * FROM MARCACAO_CONSULTA WHERE MARCACAO_CONSULTA.DATA_CONSULTA =");
	
	define(TelaDeLoginQueryUsuarios,"SELECT USUARIO.LOGIN_USUARIO,USUARIO.SENHA_USURAIO,USUARIO.COD_TIPO_USUARIO FROM USURAIOS WHERE USUARIO.LOGIN_USUARIO = '$loginInformado'");

	define(BaseDados,"sis_hospital");
	
	define(server,"localhost");
	
	define(user,"root");
	
	define(password,"");
	
	function TamanhoDeUmaString(string $str)
	{
		/*
		 * essa funзгo retorna um inteiro
		 * representando o tamanho
		 * de uma string passada como parвmetro
		 */
		
		$result= (int) 0;
		
		foreach($str as $c)
		{
			$result= (int) $result + 1;
		}
		
		return $result;
	}

	function VerificaSeCaracterEhNumero(char $c)
	{
		/*
		 * uma funзгo que nos informa
		 * se um caracter й um nъmero 
		 * ou nгo, se for um nъmero
		 * retorna 1 se nгo for retorna 0
		 */
		$result= (int) 0;	//comeзamos supondo que nгo й um nъmero
		
		if(($c == 0) || ($c == 1) || ($c == 2) || ($c == 3) || ($c == 4) || ($c == 5) || ($c == 6) || ($c == 7) || ($c == 8) || ($c == 9))
		{
			/*
			 * se o caracter $c for pelo menos 
			 * um dos dнgitos, entгo ele й
			 * um nъmero
			 */
			$result= (int) 1;
		}
		
		return $result;
	}

	function VerificaSeEhStringDeNumeros(string $str)
	{
	   /*
		* essA funзгo vai verificar
		* se uma string informada й
		* composta penas de nъmeros,
		* se estiver correto retorna 1
		* se estiver errado retorna 0
		*/
			
		$result= (int) 1;	//comeзamos supondo que estб no formato correto
		$caracter= "";
	
		foreach($str as $caracter)
		{
			if(VerificaSeCaracterEhNumero($caracter) == 0)
			{
				/*
				 * se o caracter nгo for um nъmero
				 * o resultado й zero e terminamos 
				 * com o laзo usando break
				 */
				$result= (int) 0;
				break;
			}
		}
		
		/*
		 *se o caracter й um nъmero, entгo
		 *ele nгo entrou nehuma vez no if()
		 *e $result continua igual 1
		 */
		
		return $result;
	}
	
	function VerificaFormatoDaData(string $str)
	{
		/*
		 * essa funзгo verfica se uma string 
		 * representando uma data informada
		 * estб no formato: dd/mm/aaaa
		 * se estiver retorna 1
		 * se nгo estiver retorna 0
		 */
		
		$qtd= (int) 1;
		$result= (int) 1;	//comeзamos supondo que estб no formato correto
		$caracter= "";
		
		foreach($str as $caracter)
		{
			/*
			 * quando o contador estiver
			 * contando 3 e 6 devemos ter
			 * o caracter '/', caso contrбrio 
			 * temos um erro
			 */
			if((($qtd % 3) == 0) && ($caracter != '/'))		//podia ter usado: (($qtd == 3) || ($qtd == 6))
			{
				//se estamos em 3 ou 6 e nгo temos o '/' temos erro
				$result= (int) 0;
				break;
			}
			else	//se estamos em qualquer outra posiзгo
				if(VerificaSeCaracterEhNumero($caracter) == 0)		//podia ter usado: (verificaStringDeNumeros($caracter) == 0)
				{
					/*
					 * se estamos em qualquer outra posiзгo
					 * e nгo temos um nъmero temos um erro
					 */
					$result= (int) 0;
					break;
				}
		}
	   
	   /*
		*se a data estб na forma correta, entгo
		*ele nгo entrou em nehum if()
		*e $result continua igual 1
		*/
		
		return $result;
		
	}
?>