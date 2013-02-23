<?php
	class Usuarios
	{
		//atributos
		protected $_login,$_senha;
		/*
		 *esses atributos devem ser
		 *trataados como strings 
		 */
		protected $_codigoTipoUsuario;
		/*
		 *esse atributo deve ser
		 *tratado como inteiro 
		 */
		
		
		//construtores
		protected function Usuarios()
		{
			
		}
		protected function Usuarios($_login,$_senha,$_codigoTipoUsuario)
		{
			$this->_login= $_login;
			$this->_senha= $_senha;
			$this->_codigoTipoUsuario= $_codigoTipoUsuario;
		}
		
		
		//métodos
		//??deveriamos criar um metodo para criptografar e descriptografar senhas??
		
		
		//gets e sets
		protected function getLogin()
		{
			return $this->_login;
		}
		protected function setLogin(string $_login)
		{
			$this->_login= $_login;
		}
		
		protected function getSenha()
		{
			return $this->_senha;
		}
		protected function setSenha(string $_senha)
		{
			$this->_senha= $_senha;
		}
		
		protected function getCodigoTipoUsuario()
		{
			return $this->_codigoTipoUsuario;
		}
		protected function setCodigoTipoUsuario(string $_codigoTipoUsuario)
		{
			$this->_codigoTipoUsuario= $_codigoTipoUsuario;
		}
		
	}
?>