<?php
	class Medico extends Usuarios
	{
		//atributos
		private $_nomeMedico,$_especialidade,$_crm,$_emailMedico,$_cpf,$_telefone;
		/*
		 *esses atributos devem
		 *ser tratados como strings
		 */
		private $_enderecoMedico;
		/*
		 * deverá ser um objeto da
		 * classe Endereco
		 */
		
		private $_documentosMedico;
		/*
		 *deverá ser um objeto da 
		 *classe Documento 
		 */
		
		//construtores
		public function Medico()
		{
			
		}
		public function Medico($_nomeMedico,$_especialidade,$_crm,$_emailMedico,$cpf)
		{
			$this->_cpf= $cpf;
			$this->_nomeMedico= $_nomeMedico;
			$this->_especialidade= $_especialidade;
			$this->_crm= $_crm;
			$this->_emailMedico= $_emailMedico;
		}
		
		
		//métodos
		
		
		//gets e sets
		public function getNomeMedico()
		{
			return $this->_nomeMedico;
		}
		public function setNomeMedico($_nomeMedico)
		{
			$this->_nomeMedico= $_nomeMedico;
		}
		
		public function getEspecialidade()
		{
			return $this->_especialidade;
		}
		public function setEspecialidade($_especialidade)
		{
			$this->_especialidade= $_especialidade;
		}
		
		public function getCrm()
		{
			return $this->_crm;
		}
		public function setCrm($_crm)
		{
			$this->_crm= $_crm;
		}
		
		public function getEmailMedico()
		{
			return $this->_emailMedico;
		}
		public function setEmailMedico($_emailMedico)
		{
			$this->_emailMedico= $_emailMedico;
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