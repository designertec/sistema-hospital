<?php
	class Paciente extends Usuarios
	{
		//atributos
		private $_nomePaciente,$_nomePai,$_nomeMae,$_emailPaciente;
		/*
		 *esses atributos devem 
		 *ser tratados como strings 
		 */
		private $_documentosPaciente;
		/*
		 *deverá ser um objeto da
		 *classe Documentos 
		 */
		
		private $_enderecoPaciente;
		/*
		 *deverá ser um objeto da
		 *classe Endereco 
		 */
		
		//construtores
		public function Paciente()
		{
			
		}
		public function Paciente(string $nomePaciente,string $nomePai,string $nomeMae,string $emailPaciente,string $rg,string $orgaoExpRg,string  $dataExpRg,string $cpf,string $nomeRua,string $bairro,int $numero,string $complemento,string  $cep,string $cidade,string $uf,string $pais)
		{
			$this->_nomePaciente= $nomePaciente;
			$this->_nomePai= $nomePai;
			$this->_nomeMae= $nomeMae;
			$this->_emailPaciente= $emailPaciente;
			$this->_documentosPaciente= new Documentos((string) $rg,(string) $orgaoExpRg,(string) $dataExpRg,(string) $cpf);		//instaciamos o objeto documento
			$this->_enderecoPaciente= new Endereco((string) $nomeRua,(string) $bairro,(int) $numero,(string) $complemento,(string) $cep,(string) $cidade,(string) $uf,(string) $pais);		//instsanciamos o objeto endereco
		}
		
		//métodos
		
		
		//gets e sets
		public function getNomePaciente()
		{
			return $this->_nomePaciente;
		}
		public function setNomePaciente(string $_nomePaciente)
		{
			$this->_nomePaciente= $_nomePaciente;
		}
		
		public function getNomePai()
		{
			return $this->_nomePai;
		}
		public function setNomePai(string $_nomePai)
		{
			$this->_nomePai= $_nomePai;
		}
		
		public function getNomeMae()
		{
			return $this->_nomeMae;
		}
		public function setNomeMae(string $_nomeMae)
		{
			$this->_nomeMae= $_nomeMae;
		}
		
		public function getEmailPaciente()
		{
			return $this->_emailPaciente;
		}
		public function setEmailPaciente(string $_emailPaciente)
		{
			$this->_emailPaciente= $_emailPaciente;
		}
		
	}
?>