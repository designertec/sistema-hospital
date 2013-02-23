<?php
	define(TAMANHO_CPF, 14);

	function TamanhoDeUmaString(string $str)
	{
		/*
		 * essa fun��o retorna um inteiro
		 * representando o tamanho
		 * de uma string passada como par�metro
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
		 * uma fun��o que nos informa
		 * se um caracter � um n�mero 
		 * ou n�o, se for um n�mero
		 * retorna 1 se n�o for retorna 0
		 */
		$result= (int) 0;	//come�amos supondo que n�o � um n�mero
		
		if(($c == 0) || ($c == 1) || ($c == 2) || ($c == 3) || ($c == 4) || ($c == 5) || ($c == 6) || ($c == 7) || ($c == 8) || ($c == 9))
		{
			/*
			 * se o caracter $c for pelo menos 
			 * um dos d�gitos, ent�o ele �
			 * um n�mero
			 */
			$result= (int) 1;
		}
		
		return $result;
	}

	function VerificaSeEhStringDeNumeros(string $str)
	{
	   /*
		* essA fun��o vai verificar
		* se uma string informada �
		* composta penas de n�meros,
		* se estiver correto retorna 1
		* se estiver errado retorna 0
		*/
			
		$result= (int) 1;	//come�amos supondo que est� no formato correto
		$caracter= "";
	
		foreach($str as $caracter)
		{
			if(VerificaSeCaracterEhNumero($caracter) == 0)
			{
				/*
				 * se o caracter n�o for um n�mero
				 * o resultado � zero e terminamos 
				 * com o la�o usando break
				 */
				$result= (int) 0;
				break;
			}
		}
		
		/*
		 *se o caracter � um n�mero, ent�o
		 *ele n�o entrou nehuma vez no if()
		 *e $result continua igual 1
		 */
		
		return $result;
	}
	
	function VerificaFormatoDaData(string $str)
	{
		/*
		 * essa fun��o verfica se uma string 
		 * representando uma data informada
		 * est� no formato: dd/mm/aaaa
		 * se estiver retorna 1
		 * se n�o estiver retorna 0
		 */
		
		$qtd= (int) 1;
		$result= (int) 1;	//come�amos supondo que est� no formato correto
		$caracter= "";
		
		foreach($str as $caracter)
		{
			/*
			 * quando o contador estiver
			 * contando 3 e 6 devemos ter
			 * o caracter '/', caso contr�rio 
			 * temos um erro
			 */
			if((($qtd % 3) == 0) && ($caracter != '/'))		//podia ter usado: (($qtd == 3) || ($qtd == 6))
			{
				//se estamos em 3 ou 6 e n�o temos o '/' temos erro
				$result= (int) 0;
				break;
			}
			else	//se estamos em qualquer outra posi��o
				if(VerificaSeCaracterEhNumero($caracter) == 0)		//podia ter usado: (verificaStringDeNumeros($caracter) == 0)
				{
					/*
					 * se estamos em qualquer outra posi��o
					 * e n�o temos um n�mero temos um erro
					 */
					$result= (int) 0;
					break;
				}
		}
	   
	   /*
		*se a data est� na forma correta, ent�o
		*ele n�o entrou em nehum if()
		*e $result continua igual 1
		*/
		
		return $result;
		
	}
?>