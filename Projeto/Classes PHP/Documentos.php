<?php
	require_once 'SisHospBiblioteca.php';

	class Documentos
	{
		//atributos
		/*
		 *todos os atributos devem
		 *ser tratados como strings 
		 */
		private $_rg;
		/*
		 * o RG deve estar no formato:
		 * 0.000.000, a quantidade dígitos
		 * pode variar
		 */
		
		private $_cpf;
		/*
		 * o CPF deve ser informado no formato:
		 * 000.000.000-00
		 */
		
		private $_orgaoExpRg;
		private $_dataExpRg;
		/*
		 * a data deve estar no formato
		 * dd/mm/aaaa
		 */
		
		
		//construtores
		public function Documentos()
		{
			
		}
		
		//public function Documentos($rg,$orgaoExpRg,$dataExpRg,$cpf)
		//{
			//$this->_cpf= $cpf;
			//$this->_rg= $rg;
			//$this->_dataExpRg= $dataExpRg;
			//$this->_orgaoExpRg= $orgaoExpRg;
		//}
		
		//métodos
		private function VerificaFormatoCpf()
		{
		   /*
			* esse método vai verificar
			* se o CPF informado está no formato correto,
			* se estiver correto retorna 1
			* se estiver errado retorna 0
			*/
			$qtd= (int) 1;
			$result= (int) 1;	//começamos supondo que está no formato correto
			$caracter= "";
		
		   /*
			* para que o Cpf esteja no fomrato correto
			* deve ter 14 elementos, os números, os pontos
			* e o dígito
			*/
			if(tamanhoDeUmaString($str) == TAMANHO_CPF)		//se o tamanho da string que representa o cpf está correto
			{
				foreach(getCpf() as $caracter)
				{
					if((($qtd == 4) || ($qtd == 8)) && ($caracter != '.'))
					{
					   /*
						* se estamos em uma das duas posições acima(4 ou 8
						* e não temos o caracter ponto '.', então
						* temos um erro
						*/
							
						//se a cada três dígitos não temos o ponto, está no formato errado
						$result= (int) 0;
						break;
					}
					else
						if(($qtd == 12) && ($caracter != '-'))
						{
						   /*
							* se estamos na posição acima (12)
							* e não temos o caracter dígito '-'
							* então temos um erro
							*/
								
							//se não tem o dígito na posição 12, está no formato errado
							$result= (int) 0;
							break;
						}
						else
							if(verificaSeCaracterEhNumero($caracter) == 0)		//(verificaStringDeNumeros($caracter) == 0)
							{
							   /*
								* se estamos em qualquer outra posição
								* que deve ter um número, se não temos,
								* então temos um erro
								*/
									
								//se em qualquer outra posição não temos um número, está no formato errado
								$result= (int) 0;
								break;
							}
								
							//incrementamos o contador
							$qtd= (int) $qtd + 1;
				}
			}
				
		   /*
			* se não entrou em nenhum caso
			* acima, casos de erro, então
			* está no formato correto e
			* a variável $result continua
			* com o valor 1
			*/
			return $result;
		}
		
		private function VerificaFormatoRg()
		{
		   /*
			* esse método vai verificar
			* se o CPF informado está no
			* formato correto, se
			* estiver correto retorna 1
			* se estiver errado retorna 0
			*/
		
			$result= (int) 1;
			$caracter= "";
			$qtd= (int) 0;
		
		   /*
			* para que o RG esteja no formato correto
			* deve ser composto por uma quantidade limitada
			* de números e a cada 3 números deve-se ter um
			* caracter ponto '.'
			*/
		
			foreach(getRg() as $caracter)
			{
			   /*
				* a cada múltiplo de quatro temos que ter o ponto
				* separando três números na string: 000.000.000
				* se estamos em uma posição múltipla de 4 e não
				* temos o caracter '.' então temos um erro
				*/
				if(($qtd % 4) == 0) //se estamos em um múltiplo de 4
				{
					if($caracter != '.')	//verificamos se temos o caracter correto
					{
						$result= (int) 0;
						break;
					}
				}
				else	//se não estamos em um múltiplo de 4
					if(verificaStringDeNumeros($caracter) == 0)
					{
					   /*
						* se não estamos em uma posição mútipla
						* de 4, então temos que ter um número
						* senão temos um erro
						*/
						$result= (int) 0;
						break;
					}
			}
			//se não entramos na condição de erro está no formato correto
			return $result;
		}
		
		//gets e sets
		public function getCpf()
		{
			return $this->_cpf;
		}
		public function setCpf($cpf)
		{
			$this->_cpf= $cpf;
		}
		
		public function getRg()
		{
			$this->_rg= $rg;
		}
		public function setRg($rg)
		{
			$this->_rg= $rg;
		}
		
		public function getDataExpRg()
		{
			return $this->_dataExpRg;
		}
		public function setDataExpRg($dataExpRg)
		{
			$this->_dataExpRg= $dataExpRg;
		}
		
		public function getOrgaoExpRg()
		{
			return $this->_orgaoExpRg;
		}
		public function setOrgaoExpRg($orgaoExpRg)
		{
			$this->_orgaoExpRg= $orgaoExpRg;
		}
		
	}
?>