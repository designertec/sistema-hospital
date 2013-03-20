<?php
	class Endereco
	{
		//atributos
		private $_codEnd;
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
		public function Endereco($nomeRua,$bairro,$numero,$complemento,$cep,$cidade,$uf,$pais)
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
		public function setNomeRua($nomeRua)
		{
			$this->_nomeRua= $nomeRua;
		}
		
		public function getBairro()
		{
			return $this->_bairro;
		}
		public function setBairro($bairro)
		{
			$this->_bairro= $bairro;
		}
		
		public function getNumero()
		{
			return $this->_Numero;
		}
		public function setNumero($numero)
		{
			$this->_numero= $numero;
		}
		
		public function getComplemento()
		{
			return (int) $this->_complemento;
		}
		public function setComplemento($complemento)
		{
			$this->_complemento= $complemento;
		}
		
		public function getCep()
		{
			return $this->_cep;
		}
		public function setCep($cep)
		{
			$this->_cep= $cep;
		}
		
		public function getCidade()
		{
			return $this->_cidade;
		}
		public function setCidade($cidade)
		{
			$this->_cidade= $cidade;
		}
		
		public function getUf()
		{
			return $this->_uf;
		}
		public function setUf($uf)
		{
			$this->_uf= $uf;
		}
		
		public function getPais()
		{
			return $this->_pais;
		}
		public function setPais($pais)
		{
			$this->_pais= $pais;
		}
		
		public function getCodEnd()
		{
			return $this->_codEnd;
		}
		public function setCodEnd($codEnd)
		{
			$this->_codEnd= $codEnd;
		}
		
	}
?>