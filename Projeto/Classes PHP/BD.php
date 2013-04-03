<?php
	class BD
	{
		/*
		 *Essa classe tem como objetivo
		 *reduzir a escrita de código
		 *relativa a procedimentos que serão
		 *executados várias vezes relacionados
		 *ao banco de dados, procedimento que 
		 *que com certeza vamos repetir, são
		 *eles: conectar com o bd, selecionar o
		 *bd, realizar uma consulta, fechar o bd.
		 *Com isso resolvi deixar esse script 
		 *dentro de um método dessa classe, que 
		 *ao meu ver não deve ter atributos, logo
		 *se queremos conectar com o bd para fazermos 
		 *uma consulta instanciamos um objeto dessa 
		 *classe e chamamos a função com esse script.
		 */
		
		//atributos
		
		//construtores
		public function BD()
		{
			
		}
		
		//métodos
		public function ConectaConsultaFechaBd($query)
		{
			/*
			 *essas variáveis receberão
			 *os retornos das funções MYsql
			 *serão variáveis auxiliares
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
				//os argumentos server, user e password estão definido na biblioteca
				$statusConexao= mysql_connect(server,user,password);
			}
			catch(Exception $e)	//instanciamos um objeto da classe padrão Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicação
				 */
				echo "ERRO AO CONECTAR COM O BANCO DE DADOS:".$e->getMessage();	//exibimos menssagem
				unset($e);	//destruimos o objeto
				die();		//encerramos a aplicação
			}
			
			
			//selecionamos a base de dados
			try
			{
				//retorna true em caso de sucesso ou false em caso de erro
				//o argumento BaseDados está definido na biblioteca
				$statusSelecaoBd= mysql_select_db(BaseDados);
			}
			catch(Exception $e)	//instanciamos um objeto da classe padrão Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicação
				 */
				echo "ERRO AO SELECIONAR A BASE DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplicação
			}
			
			//realizamos uma consulta
			try
			{	
				/*
				 * $query é o parâmetro do método, 
				 * como se tratam muitas vezes de 
				 * consultas SQL pretendo definir
				 * todas elas na biblioteca, atribuir
				 * a consulta que desejo a uma 
				 * variável chamada $query e passá-la
				 * sempre como parâmetro
				 */
				$statusQuery= mysql_query($query);
			}
			catch (Exception $e)	//instanciamos um objeto da classe padrão Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicação
				 */
				echo "ERRO AO CONSULTAR O BANCO DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplicação
			}
			
			/*
			 *neste ponto já possuimos o resultado da consulta, 
			 *como as funções mysql_fecth_array, mysql_num_rows,
			 * são independentes do banco de dados está com a
			 * conexão aberta então podemos fechar a conexão com o BD
			 */
			
			//fechamos a conexão com o banco de dados
			try
			{
				$statusClose= mysql_close();
			}
			catch(Exception $e)	//instanciamos um objeto da classe padrão Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicação
				 */
				echo "ERRO AO FECHAR A CONEXÃO COM O BANCO DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplicação
			}
			
			
			/*
			 *retornamos o resultado da consulta 
			 *que ficou armazenado em $statusQuery, 
			 *para agora ser usado an função 
			 *mysql_fetch_array 
			 */
			return $statusQuery;
		}
		
		//gets e sets
		
		
	}
?>