<?php
	class Medico extends Usuarios
	{
		//atributos
		private $_nomeMedico,$_especialidade,$_crm,$_emailMedico;
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
		public function Medico($_nomeMedico,$_especialidade,$_crm,$_emailMedico,$rg,$orgaoExpRg,$dataExpRg,$cpf,$nomeRua,$bairro,$numero,$complemento,$cep,$cidade,$uf,$pais)
		{
			$this->_nomeMedico= $_nomeMedico;
			$this->_especialidade= $_especialidade;
			$this->_crm= $_crm;
			$this->_emailMedico= $_emailMedico;
			$this->_documentosMedico= new Documentos($rg, $orgaoExpRg, $dataExpRg, $cpf);		//instaciamos o objeto documento
			$this->_enderecoMedico= new Endereco($nomeRua, $bairro, $numero, $complemento, $cep, $cidade, $uf, $pais);		//instsanciamos o objeto endereco
		}
		
		
		//métodos
		
		
		//gets e sets
		public function getNomeMedico()
		{
			return $this->_nomeMedico;
		}
		public function setNomeMedico(string $_nomeMedico)
		{
			$this->_nomeMedico= $_nomeMedico;
		}
		
		public function getEspecialidade()
		{
			return $this->_especialidade;
		}
		public function setEsoecialidade(string $_especialidade)
		{
			$this->_especialidade= $_especialidade;
		}
		
		public function getCrm()
		{
			return $this->_crm;
		}
		public function setCrm(string $_crm)
		{
			$this->_crm= $_crm;
		}
		
		public function getEmailMedico()
		{
			return $this->_emailMedico;
		}
		public function setEmailMedico(string $_emailMedico)
		{
			$this->_emailMedico= $_emailMedico;
		}
		
		
	}
?>