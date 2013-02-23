<?php
	require_once 'SisHosBiblioteca.php';

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
		 * 0.000.000, a quantidade d�gitos
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
		
		public function Documentos(string $rg,string $orgaoExpRg,string $dataExpRg,string $cpf)
		{
			$this->_cpf= $cpf;
			$this->_rg= $rg;
			$this->_dataExpRg= $dataExpRg;
			$this->_orgaoExpRg= $orgaoExpRg;
		}
		
		//m�todos
		private function VerificaFormatoCpf()
		{
		   /*
			* esse m�todo vai verificar
			* se o CPF informado est� no formato correto,
			* se estiver correto retorna 1
			* se estiver errado retorna 0
			*/
			$qtd= (int) 1;
			$result= (int) 1;	//come�amos supondo que est� no formato correto
			$caracter= "";
		
		   /*
			* para que o Cpf esteja no fomrato correto
			* deve ter 14 elementos, os n�meros, os pontos
			* e o d�gito
			*/
			if(tamanhoDeUmaString($str) == TAMANHO_CPF)		//se o tamanho da string que representa o cpf est� correto
			{
				foreach(getCpf() as $caracter)
				{
					if((($qtd == 4) || ($qtd == 8)) && ($caracter != '.'))
					{
					   /*
						* se estamos em uma das duas posi��es acima(4 ou 8
						* e n�o temos o caracter ponto '.', ent�o
						* temos um erro
						*/
							
						//se a cada tr�s d�gitos n�o temos o ponto, est� no formato errado
						$result= (int) 0;
						break;
					}
					else
						if(($qtd == 12) && ($caracter != '-'))
						{
						   /*
							* se estamos na posi��o acima (12)
							* e n�o temos o caracter d�gito '-'
							* ent�o temos um erro
							*/
								
							//se n�o tem o d�gito na posi��o 12, est� no formato errado
							$result= (int) 0;
							break;
						}
						else
							if(verificaSeCaracterEhNumero($caracter) == 0)		//(verificaStringDeNumeros($caracter) == 0)
							{
							   /*
								* se estamos em qualquer outra posi��o
								* que deve ter um n�mero, se n�o temos,
								* ent�o temos um erro
								*/
									
								//se em qualquer outra posi��o n�o temos um n�mero, est� no formato errado
								$result= (int) 0;
								break;
							}
								
							//incrementamos o contador
							$qtd= (int) $qtd + 1;
				}
			}
				
		   /*
			* se n�o entrou em nenhum caso
			* acima, casos de erro, ent�o
			* est� no formato correto e
			* a vari�vel $result continua
			* com o valor 1
			*/
			return $result;
		}
		
		private function VerificaFormatoRg()
		{
		   /*
			* esse m�todo vai verificar
			* se o CPF informado est� no
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
			* de n�meros e a cada 3 n�meros deve-se ter um
			* caracter ponto '.'
			*/
		
			foreach(getRg() as $caracter)
			{
			   /*
				* a cada m�ltiplo de quatro temos que ter o ponto
				* separando tr�s n�meros na string: 000.000.000
				* se estamos em uma posi��o m�ltipla de 4 e n�o
				* temos o caracter '.' ent�o temos um erro
				*/
				if(($qtd % 4) == 0) //se estamos em um m�ltiplo de 4
				{
					if($caracter != '.')	//verificamos se temos o caracter correto
					{
						$result= (int) 0;
						break;
					}
				}
				else	//se n�o estamos em um m�ltiplo de 4
					if(verificaStringDeNumeros($caracter) == 0)
					{
					   /*
						* se n�o estamos em uma posi��o m�tipla
						* de 4, ent�o temos que ter um n�mero
						* sen�o temos um erro
						*/
						$result= (int) 0;
						break;
					}
			}
			//se n�o entramos na condi��o de erro est� no formato correto
			return $result;
		}
		
		//gets e sets
		public function getCpf()
		{
			return $this->_cpf;
		}
		public function setCpf(string $cpf)
		{
			$this->_cpf= $cpf;
		}
		
		public function getRg()
		{
			$this->_rg= $rg;
		}
		public function setRg(string  $rg)
		{
			$this->_rg= $rg;
		}
		
		public function getDataExpRg()
		{
			return $this->_dataExpRg;
		}
		public function setDataExpRg(string $dataExpRg)
		{
			$this->_dataExpRg= $dataExpRg;
		}
		
		public function getOrgaoExpRg()
		{
			return $this->_orgaoExpRg;
		}
		public function setOrgaoExpRg(string $orgaoExpRg)
		{
			$this->_orgaoExpRg= $orgaoExpRg;
		}
		
	}
?>