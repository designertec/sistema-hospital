<?php
	class BD
	{
		/*
		 *Essa classe tem como objetivo
		 *reduzir a escrita de c�digo
		 *relativa a procedimentos que ser�o
		 *executados v�rias vezes relacionados
		 *ao banco de dados, procedimento que 
		 *que com certeza vamos repetir, s�o
		 *eles: conectar com o bd, selecionar o
		 *bd, realizar uma consulta, fechar o bd.
		 *Com isso resolvi deixar esse script 
		 *dentro de um m�todo dessa classe, que 
		 *ao meu ver n�o deve ter atributos, logo
		 *se queremos conectar com o bd para fazermos 
		 *uma consulta instanciamos um objeto dessa 
		 *classe e chamamos a fun��o com esse script.
		 */
		
		//atributos
		
		//construtores
		public function BD()
		{
			
		}
		
		//m�todos
		public function ConectaConsultaFechaBd($query)
		{
			/*
			 *essas vari�veis receber�o
			 *os retornos das fun��es MYsql
			 *ser�o vari�veis auxiliares
			 */
			$statusConexao= (int) 0;
			$statusSelecaoBd= (int) 0;
			$statusQuery= (int) 0;
			$statusFetchArray= (int) 0;
			$statusClose= (int) 0;
				
			
			//conectamos com o banco de dados
			try
			{
				//retorna o link com o banco em caso de sucesso ou false em caso de erro
				//os argumentos server, user e password est�o definido na biblioteca
				$statusConexao= mysql_connect(server,user,password);
			}
			catch(Exception $e)	//instanciamos um objeto da classe padr�o Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplica��o
				 */
				echo "ERRO AO CONECTAR COM O BANCO DE DADOS:".$e->getMessage();	//exibimos menssagem
				unset($e);	//destruimos o objeto
				die();		//encerramos a aplica��o
			}
			
			
			//selecionamos a base de dados
			try
			{
				//retorna true em caso de sucesso ou false em caso de erro
				//o argumento BaseDados est� definido na biblioteca
				$statusSelecaoBd= mysql_select_db(BaseDados);
			}
			catch(Exception $e)	//instanciamos um objeto da classe padr�o Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplica��o
				 */
				echo "ERRO AO SELECIONAR A BASE DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplica��o
			}
			
			//realizamos uma consulta
			try
			{	
				/*
				 * $query � o par�metro do m�todo, 
				 * como se tratam muitas vezes de 
				 * consultas SQL pretendo definir
				 * todas elas na biblioteca, atribuir
				 * a consulta que desejo a uma 
				 * vari�vel chamada $query e pass�-la
				 * sempre como par�metro
				 */
				$statusQuery= mysql_query($query);
			}
			catch (Exception $e)	//instanciamos um objeto da classe padr�o Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplica��o
				 */
				echo "ERRO AO CONSULTAR O BANCO DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplica��o
			}
			
			/*
			 *neste ponto j� possuimos o resultado da consulta, 
			 *como as fun��es mysql_fecth_array, mysql_num_rows,
			 * s�o independentes do banco de dados est� com a
			 * conex�o aberta ent�o podemos fechar a conex�o com o BD
			 */
			
			//fechamos a conex�o com o banco de dados
			try
			{
				$statusClose= mysql_close();
			}
			catch(Exception $e)	//instanciamos um objeto da classe padr�o Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplica��o
				 */
				echo "ERRO AO FECHAR A CONEX�O COM O BANCO DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplica��o
			}
			
			
			/*
			 *retornamos o resultado da consulta 
			 *que ficou armazenado em $statusQuery, 
			 *para agora ser usado an fun��o 
			 *mysql_fetch_array 
			 */
			return $statusQuery;
		}
		
		//gets e sets
		
		
	}
?>