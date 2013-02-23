<?php
	class Enfermagem extends Usuarios
	{
		//atributos
		private $_nomeEnfermeira,$_cre,$_emailEnfermeira;
		/*
		 *esses atributos devem
		 *ser tratados como strings 
		 */
		private $_documentosEnfermeira;
		/*
		 *deverá ser um objeto da 
		 *classe Documentos 
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
		public function Enfermagem(string $_nomeEnfermeira,string $_cre,string $_emailEnfermeira,string $rg,string $orgaoExpRg,string  $dataExpRg,string $cpf,string $nomeRua,string $bairro,int $numero,string $complemento,string  $cep,string $cidade,string $uf,string $pais)
		{
			$this->_nomeEnfermeira= $_nomeEnfermeira;
			$this->_cre= $_cre;
			$this->_emailEnfermeira= $_emailEnfermeira;
			$this->_documentosEnfermeira= new Documentos((string) $rg,(string) $orgaoExpRg,(string) $dataExpRg,(string) $cpf);
			$this->_enderecoEnfermeira= new Endereco((string) $nomeRua,(string) $bairro,(int) $numero,(string) $complemento,(string) $cep,(string) $cidade,(string) $uf,(string) $pais);
		}
		
		//métodos
		
		
		//gets e sets
		public function getNomeEnfermeira()
		{
			return $this->_nomeEnfermeira;
		}
		public function setNomeEnfermeira(string $_nomeEnfermeira)
		{
			$this->_nomeEnfermeira= $_nomeEnfermeira;
		}
		
		public function getCre()
		{
			return $this->_cre;
		}
		public function setCre(string $_cre)
		{
			$this->_cre= $_cre;
		}
		
		public function getEmailEnfermeira()
		{
			return $this->_emailEnfermeira;
		}
		public function setEmailEnfermeira(string $_emailEnfermeira)
		{
			$this->_emailEnfermeira= $_emailEnfermeira;
		}
		
	}
?>