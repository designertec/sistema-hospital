<?php
	class BD
	{
		/*
		 *Essa classe tem como objetivo
		 *reduzir a escrita de cѓdigo
		 *relativa a procedimentos que serуo
		 *executados vсrias vezes relacionados
		 *ao banco de dados, procedimento que 
		 *que com certeza vamos repetir, sуo
		 *eles: conectar com o bd, selecionar o
		 *bd, realizar uma consulta, fechar o bd.
		 *Com isso resolvi deixar esse script 
		 *dentro de um mщtodo dessa classe, que 
		 *ao meu ver nуo deve ter atributos, logo
		 *se queremos conectar com o bd para fazermos 
		 *uma consulta instanciamos um objeto dessa 
		 *classe e chamamos a funчуo com esse script.
		 */
		
		//atributos
		
		//construtores
		public function BD()
		{
			
		}
		
		//mщtodos
		public function ConectaConsultaFechaBd($query)
		{
			/*
			 *essas variсveis receberуo
			 *os retornos das funчѕes MYsql
			 *serуo variсveis auxiliares
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
				//os argumentos server, user e password estуo definido na biblioteca
				$statusConexao= mysql_connect(server,user,password);
			}
			catch(Exception $e)	//instanciamos um objeto da classe padrуo Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicaчуo
				 */
				echo "ERRO AO CONECTAR COM O BANCO DE DADOS:".$e->getMessage();	//exibimos menssagem
				unset($e);	//destruimos o objeto
				die();		//encerramos a aplicaчуo
			}
			
			
			//selecionamos a base de dados
			try
			{
				//retorna true em caso de sucesso ou false em caso de erro
				//o argumento BaseDados estс definido na biblioteca
				$statusSelecaoBd= mysql_select_db(BaseDados);
			}
			catch(Exception $e)	//instanciamos um objeto da classe padrуo Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicaчуo
				 */
				echo "ERRO AO SELECIONAR A BASE DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplicaчуo
			}
			
			//realizamos uma consulta
			try
			{	
				/*
				 * $query щ o parтmetro do mщtodo, 
				 * como se tratam muitas vezes de 
				 * consultas SQL pretendo definir
				 * todas elas na biblioteca, atribuir
				 * a consulta que desejo a uma 
				 * variсvel chamada $query e passс-la
				 * sempre como parтmetro
				 */
				$statusQuery= mysql_query($query);
			}
			catch (Exception $e)	//instanciamos um objeto da classe padrуo Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicaчуo
				 */
				echo "ERRO AO CONSULTAR O BANCO DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplicaчуo
			}
			
			/*
			 *neste ponto jс possuimos o resultado da consulta, 
			 *como as funчѕes mysql_fecth_array, mysql_num_rows,
			 * sуo independentes do banco de dados estс com a
			 * conexуo aberta entуo podemos fechar a conexуo com o BD
			 */
			
			//fechamos a conexуo com o banco de dados
			try
			{
				$statusClose= mysql_close();
			}
			catch(Exception $e)	//instanciamos um objeto da classe padrуo Exception
			{
				/*
				 *no caso de erro com o banco de dados
				 *exibimos uma menssagem e encerramos
				 *a aplicaчуo
				 */
				echo "ERRO AO FECHAR A CONEXУO COM O BANCO DE DADOS: ".$e->getMessage();	//exibimos menssagem
				unset($e); 	//destruimos o objeto
				die();		//encerramos a aplicaчуo
			}
			
			
			/*
			 *retornamos o resultado da consulta 
			 *que ficou armazenado em $statusQuery, 
			 *para agora ser usado an funчуo 
			 *mysql_fetch_array 
			 */
			return $statusQuery;
		}
		
		//gets e sets
		
		
	}
?>