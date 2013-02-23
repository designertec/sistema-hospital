<?php
	class Prontuarios
	{
		//atributos
		private $_codigoProntuario,$_codigoConsultaPaciente,$_codigoResultadoConsulta;
		/*
		 *esses atributos devem
		 *ser tratados como inteiros
		 */
		private $_idPaciente;
		/*
		 *esse atributo deve
		 *ser tratado como string 
		 */
		
		//construtores
		public function Prontuarios()
		{
				
		}
		public function Prontuarios(int $_codigoProntuario,int $_codigoConsultaPaciente,int $_idPaciente,int $_codigoResultadoConsulta)
		{
			$this->_codigoProntuario= $_codigoProntuario;
			$this->_codigoConsultaPaciente= $_codigoConsultaPaciente;
			$this->_idPaciente= $_idPaciente;
			$this->_codigoResultadoConsulta= $_codigoResultadoConsulta;
		}
		
		
		//métodos
		
		
		
		//gets e sets
		public function getCodigoProntuario()
		{
			return (int) $this->_codigoProntuario;
		}
		public function setCodigoProntuario(int $_codigoProntuario)
		{
			$this->_codigoProntuario= $_codigoProntuario;
		}
		
		public function getCodigoConsultaPaciente()
		{
			return (int) $this->_codigoConsultaPaciente;
		}
		public function setCodigoConsultaPaciente(int $_codigoConsultaPaciente)
		{
			$this->_codigoConsultaPaciente= $_codigoConsultaPaciente;
		}
		
		public function getIdPaciente()
		{
			return (int) $this->_idPaciente;
		}
		public function setIdPaciente(int $_idPaciente)
		{
			$this->_idPaciente= $_idPaciente;
		}
		
		public function getCodigoResultadoConsulta()
		{
			return (int) $this->_codigoResultadoConsulta;
		}
		public function setCodigoResultadoConsulta(int $_codigoResultadoConsulta)
		{
			$this->_codigoResultadoConsulta= $_codigoResultadoConsulta;
		}
		
	}
?>