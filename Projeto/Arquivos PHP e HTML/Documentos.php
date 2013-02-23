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
		 * 0.000.000, a quantidade dнgitos
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
		
		//mйtodos
		private function VerificaFormatoCpf()
		{
		   /*
			* esse mйtodo vai verificar
			* se o CPF informado estб no formato correto,
			* se estiver correto retorna 1
			* se estiver errado retorna 0
			*/
			$qtd= (int) 1;
			$result= (int) 1;	//comeзamos supondo que estб no formato correto
			$caracter= "";
		
		   /*
			* para que o Cpf esteja no fomrato correto
			* deve ter 14 elementos, os nъmeros, os pontos
			* e o dнgito
			*/
			if(tamanhoDeUmaString($str) == TAMANHO_CPF)		//se o tamanho da string que representa o cpf estб correto
			{
				foreach(getCpf() as $caracter)
				{
					if((($qtd == 4) || ($qtd == 8)) && ($caracter != '.'))
					{
					   /*
						* se estamos em uma das duas posiзхes acima(4 ou 8
						* e nгo temos o caracter ponto '.', entгo
						* temos um erro
						*/
							
						//se a cada trкs dнgitos nгo temos o ponto, estб no formato errado
						$result= (int) 0;
						break;
					}
					else
						if(($qtd == 12) && ($caracter != '-'))
						{
						   /*
							* se estamos na posiзгo acima (12)
							* e nгo temos o caracter dнgito '-'
							* entгo temos um erro
							*/
								
							//se nгo tem o dнgito na posiзгo 12, estб no formato errado
							$result= (int) 0;
							break;
						}
						else
							if(verificaSeCaracterEhNumero($caracter) == 0)		//(verificaStringDeNumeros($caracter) == 0)
							{
							   /*
								* se estamos em qualquer outra posiзгo
								* que deve ter um nъmero, se nгo temos,
								* entгo temos um erro
								*/
									
								//se em qualquer outra posiзгo nгo temos um nъmero, estб no formato errado
								$result= (int) 0;
								break;
							}
								
							//incrementamos o contador
							$qtd= (int) $qtd + 1;
				}
			}
				
		   /*
			* se nгo entrou em nenhum caso
			* acima, casos de erro, entгo
			* estб no formato correto e
			* a variбvel $result continua
			* com o valor 1
			*/
			return $result;
		}
		
		private function VerificaFormatoRg()
		{
		   /*
			* esse mйtodo vai verificar
			* se o CPF informado estб no
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
			* de nъmeros e a cada 3 nъmeros deve-se ter um
			* caracter ponto '.'
			*/
		
			foreach(getRg() as $caracter)
			{
			   /*
				* a cada mъltiplo de quatro temos que ter o ponto
				* separando trкs nъmeros na string: 000.000.000
				* se estamos em uma posiзгo mъltipla de 4 e nгo
				* temos o caracter '.' entгo temos um erro
				*/
				if(($qtd % 4) == 0) //se estamos em um mъltiplo de 4
				{
					if($caracter != '.')	//verificamos se temos o caracter correto
					{
						$result= (int) 0;
						break;
					}
				}
				else	//se nгo estamos em um mъltiplo de 4
					if(verificaStringDeNumeros($caracter) == 0)
					{
					   /*
						* se nгo estamos em uma posiзгo mъtipla
						* de 4, entгo temos que ter um nъmero
						* senгo temos um erro
						*/
						$result= (int) 0;
						break;
					}
			}
			//se nгo entramos na condiзгo de erro estб no formato correto
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