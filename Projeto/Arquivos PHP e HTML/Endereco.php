<?php
	class Endereco
	{
		//atributos
		private $_nomeRua,$_bairro,$_complemento;
		private $_cep,$_cidade,$_uf,$_pais;
		/*
		 *esses atributos devem 
		 *ser tratados como strings 
		 */
		private $_numero;
		/*
		 *essse atributo deve
		*ser tratado como inteiro
		*/
		
		//construtores
		public function Endereco(string $nomeRua,string $bairro,int $numero,string $complemento,string $cep,string $cidade,string $uf,string $pais)
		{
			$this->_nomeRua= $nomeRua;
			$this->_bairro= $bairro;
			$this->_numero= $numero;
			$this->_complemento= $complemento;
			$this->_cep= $cep;
			$this->_cidade= $cidade;
			$this->_uf= $uf;
			$this->_pais= $pais;
		}
		public function Endereco()
		{
			
		}
		
		//métodos
		
		
		//gets e sets
		public function getNomeRua()
		{
			return $this->_nomeRua;
		}
		public function setNomeRua(string $nomeRua)
		{
			$this->_nomeRua= $nomeRua;
		}
		
		public function getBairro()
		{
			return $this->_bairro;
		}
		public function setBairro(string $bairro)
		{
			$this->_bairro= $bairro;
		}
		
		public function getNumero()
		{
			return $this->_Numero;
		}
		public function setNumero(int $numero)
		{
			$this->_numero= $numero;
		}
		
		public function getComplemento()
		{
			return (int) $this->_complemento;
		}
		public function setComplemento(string $complemento)
		{
			$this->_complemento= $complemento;
		}
		
		public function getCep()
		{
			return $this->_cep;
		}
		public function setCep(string $cep)
		{
			$this->_cep= $cep;
		}
		
		public function getCidade()
		{
			return $this->_cidade;
		}
		public function setCidade(string $cidade)
		{
			$this->_cidade= $cidade;
		}
		
		public function getUf()
		{
			return $this->_uf;
		}
		public function setUf(string $uf)
		{
			$this->_uf= $uf;
		}
		
		public function getPais()
		{
			return $this->_pais;
		}
		public function setPais(string $pais)
		{
			$this->_pais= $pais;
		}
		
	}
?>