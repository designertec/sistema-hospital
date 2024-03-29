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
		 * dever� ser um objeto da
		 * classe Endereco
		 */
		
		private $_documentosMedico;
		/*
		 *dever� ser um objeto da 
		 *classe Documento 
		 */
		
		//construtores
		public function Medico()
		{
			
		}
		public function Medico(string $_nomeMedico,string $_especialidade,string $_crm,string $_emailMedico,string $rg,string $orgaoExpRg,string  $dataExpRg,string $cpf,string $nomeRua,string $bairro,int $numero,string $complemento,string  $cep,string $cidade,string $uf,string $pais)
		{
			$this->_nomeMedico= $_nomeMedico;
			$this->_especialidade= $_especialidade;
			$this->_crm= $_crm;
			$this->_emailMedico= $_emailMedico;
			$this->_documentosMedico= new Documentos((string) $rg,(string) $orgaoExpRg,(string) $dataExpRg,(string) $cpf);		//instaciamos o objeto documento
			$this->_enderecoMedico= new Endereco((string) $nomeRua,(string) $bairro,(int) $numero,(string) $complemento,(string) $cep,(string) $cidade,(string) $uf,(string) $pais);		//instsanciamos o objeto endereco
		}
		
		
		//m�todos
		
		
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