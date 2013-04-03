<?php
	class Enfermagem extends Usuarios
	{
		//atributos
		private $_nomeEnfermeira,$_cre,$_emailEnfermeira,$_cpf,$_telefone;
		/*
		 *esses atributos devem
		 *ser tratados como strings 
		 */
		private $_enderecoEnfermeira;
		/*
		 *deverá ser um objeto da
		 *classe Endereco
		 */
		
		//construtores
		public function Enfermagem()
		{
			
		}
		//public function Enfermagem($_nomeEnfermeira,$_cre,$_emailEnfermeira,$cpf)
		//{
			//$this->_cpf= $cpf;
			//$this->_nomeEnfermeira= $_nomeEnfermeira;
			//$this->_cre= $_cre;
			//$this->_emailEnfermeira= $_emailEnfermeira;
		//}
		
		//métodos
		
		
		//gets e sets
		public function getNomeEnfermeira()
		{
			return $this->_nomeEnfermeira;
		}
		public function setNomeEnfermeira($_nomeEnfermeira)
		{
			$this->_nomeEnfermeira= $_nomeEnfermeira;
		}
		
		public function getCre()
		{
			return $this->_cre;
		}
		public function setCre($_cre)
		{
			$this->_cre= $_cre;
		}
		
		public function getEmailEnfermeira()
		{
			return $this->_emailEnfermeira;
		}
		public function setEmailEnfermeira($_emailEnfermeira)
		{
			$this->_emailEnfermeira= $_emailEnfermeira;
		}
		
		public function getCpf()
		{
			return $this->_cpf;
		}
		public function setCpf($cpf)
		{
			$this->_cpf= $cpf;
		}
		
		public function getTelefone()
		{
			return $this->_telefone;
		}
		public function setTelefone($telefone)
		{
			$this->_telefone= $telefone;
		}
		
	}
?>