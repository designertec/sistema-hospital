<?php
	class Paciente extends Usuarios
	{
		//atributos
		private $_telefone,$_cpf;
		
		private $_nomePaciente,$_nomePai,$_nomeMae,$_emailPaciente;
		/*
		 *esses atributos devem 
		 *ser tratados como strings 
		 */
	
		
		//construtores
		public function Paciente()
		{
			
		}
		//public function Paciente($telefone,$nomePaciente,$nomePai,$nomeMae,$emailPaciente,$cpf)
		//{
			//$this->_cpf= $cpf;
			//$this->_nomePaciente= $nomePaciente;
			//$this->_nomePai= $nomePai;
			//$this->_nomeMae= $nomeMae;
			//$this->_emailPaciente= $emailPaciente;
			//$this->_telefone= $telefone;
		//}
		
		//métodos
		
		
		//gets e sets
		public function getNomePaciente()
		{
			return $this->_nomePaciente;
		}
		public function setNomePaciente($_nomePaciente)
		{
			$this->_nomePaciente= $_nomePaciente;
		}
		
		public function getNomePai()
		{
			return $this->_nomePai;
		}
		public function setNomePai($_nomePai)
		{
			$this->_nomePai= $_nomePai;
		}
		
		public function getNomeMae()
		{
			return $this->_nomeMae;
		}
		public function setNomeMae($_nomeMae)
		{
			$this->_nomeMae= $_nomeMae;
		}
		
		public function getEmailPaciente()
		{
			return $this->_emailPaciente;
		}
		public function setEmailPaciente($_emailPaciente)
		{
			$this->_emailPaciente= $_emailPaciente;
		}
		
		public function getTelefone()
		{
			return $this->_telefone;
		}
		public function setTelefone($telefone)
		{
			$this->_telefone= $telefone;
		}
		
		public function getCpf()
		{
			return $this->_cpf;
		}
		public function setCpf($cpf)
		{
			$this->_cpf= $cpf;
		}
		
	}
?>