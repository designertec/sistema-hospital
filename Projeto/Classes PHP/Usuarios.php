<?php
	class Usuarios
	{
		//atributos
		private $_codUsuario;
		private $_login,$_senha;
		/*
		 *esses atributos devem ser
		 *trataados como strings 
		 */
		private $_codigoTipoUsuario;
		/*
		 *esse atributo deve ser
		 *tratado como inteiro 
		 */
		
		
		//construtores
		private function Usuarios()
		{
			
		}
		//private function Usuarios($_login,$_senha,$_codigoTipoUsuario)
		//{
			//$this->_login= $_login;
			//$this->_senha= $_senha;
			//$this->_codigoTipoUsuario= $_codigoTipoUsuario;
		//}
		
		
		//métodos
		//??deveriamos criar um metodo para criptografar e descriptografar senhas??
		
		
		//gets e sets
		public function getLogin()
		{
			return $this->_login;
		}
		public function setLogin($_login)
		{
			$this->_login= $_login;
		}
		
		public function getSenha()
		{
			return $this->_senha;
		}
		public function setSenha($_senha)
		{
			$this->_senha= $_senha;
		}
		
		public function getCodigoTipoUsuario()
		{
			return $this->_codigoTipoUsuario;
		}
		public function setCodigoTipoUsuario($_codigoTipoUsuario)
		{
			$this->_codigoTipoUsuario= $_codigoTipoUsuario;
		}
		
		public function getCodUsuario()
		{
			return $this->_codUsuario;
		}
		public function setCodUsuario($codUsuario)
		{
			$this->_codUsuario= $codUsuario;
		}
		
	}
?>