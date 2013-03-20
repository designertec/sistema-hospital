<html>
<head>
	<title>
		ProntOnLine - Marcacao
	</title>
</head>
<body>
	<h1>
	<p align="center"><b>Paciente - Marcacao</b></p>
	<hr>
	<br>
	</h1>
	<h2>
	<p align="center">
		<b>Informe a <i>Especialidade</i> do Medico e a <i>Data da consulta</i>, para marcaçao.</b>
		<br>
		<form method="post" action="TelaDoPacienteMarcacao.php">
			Especialidade:* <input type="text" name="especialidadeInformada" maxlength="20">
			<br>
			Data Desejada para Consulta:* <input type="date" name="dataInformada">
			<br>
			<input type="submit" value="Solicitar Consulta">
			<br>
		</form>
		<?php
			/*
			 *nessa tela vamos consultar no 
			 *banco de dados, se temos um médico
			 *com a especialidade informada,
			 *depois verificar se ele tem 
			 *disponibilidade para aquela data e
			 *finalmente marcar a consulta cadastrando 
			 *no banco de dados 
			 */
		
			/*
			 *esta query será 
			 *usada para consultar 
			 *no banco se existe um 
			 *médico com a especilidade 
			 *informada 
			 */
			$query1= "";
			
			
			/*
			 *essa variável receberá
			 *o resultado da consulta 
			 *realizada pela $query1 
			 */
			$statusQuery1= (int) 0;
			
			
			/*
			 *esta variável vai receber 
			 *o número de linhas do resultado 
			 *da constulta feita por $query1 
			 */
			$numRows1= (int) 0;
			
			
			/*
			 *esta query será 
			 *usada para consultar 
			 *os medicos da especialidade 
			 *informada com disponibilidade
			 *para a data solicitada  
			 */
			$query2= (int) 0;
			
			
			/*
			 *esta variável vai receber 
			 *o resultado da constula 
			 *realizada pela $query2 
			 */
			$statusQuery2= (int) 0;
			
			
		   /*
			*esta variável vai receber
			*o número de linhas do resultado
			*da constulta feita por $query2
			*/
			$numRows2= (int) 0;
			
			
			/*
			 *instanciamos um objeto 
			 *da classe BD que vai nos 
			 *ajudar nas consultas com 
			 *o banco de dados 
			 */
			$bd1= new BD();
		
			
			/*
			 *pegamos os dados passados 
			 *pelo usuário no formulário HTML
			 */
			$especialidadeInformada= $_POST["especialidadeInformada"];
			$dataInformada= $_POST["dataInformada"];
			
			
			/*
			 *consultamos no banco 
			 *de dados se existe um 
			 *médico com tal especialidade 
			 */
			//construimos a $query1
			$query1= TelaMarcacaoQueryEspecialidade." ".$especialidadeInformada;
			
			//consultamos no banco de dados usando o objeto $bd1
			$statusQuery1= $bd1->ConectaConsultaFechaBd($query1);
			
			/*
			 *verificamos quantas linhas 
			 *foram afetadas com o resultado
			 *do SELECT, se nenhuma linha foi 
			 *afetada entao, não temos a especialidade, 
			 *a especialidade informada não é válida
			 */
			$numRows1= mysql_num_rows($statusQuery1);
			
			if($numRows1 == 0)		//se não temos a especialidade redirecionamos para uma tela de erro
			{
				header("Location: NaoTemosEpecialidadeInformada.html");
			}
			else	//se temos a especialidade continuamos com a marcaçãao
				{
						/*
						 *temos que verificar se temos médicos 
						 *disponíveis para a data solicitada 
						 *para isso faremos uma nova consulta 
						 *para listar todos os médicos com 
						 *disponibilidade para a data
						 */
						//construimos a $query2
						$query2= TelaMarcacaoQueryEspecialidadeDataSolicitadaInicio." ".$especialidadeInformada." ".TelaMarcacaoQueryEspecialidadeDataSolicitadaFim." ".$dataInformada.")";
						
						//consultamos no banco de dados usando o objeto $bd1
						$statusQuery2= $bd1->ConectaConsultaFechaBd($query2);
						
					   /*   
						*verificamos quantas linhas
						*foram afetadas com o resultado
						*do SELECT, se nenhuma linha foi
						*afetada entao, não temos a disponibilidade,
						*para marcação da especialidade e para a 
						*data informada
						*/
						$numRows2= mysql_num_rows($statusQuery2);
						
						//se nenhuma linha foi retornada não temos dispinibilidadee de marcação
						if($numRows2 == 0)
						{
							header("Location: NaoTemosDisponibilidadeDeMarcacao.html");
						}
						else	//se alguma linha foi retornada exibimos para o usuário os possíveis médicos
							{
								while($statusFetchArray = mysql_fetch_array($statusQuery2))
								{
									echo "Nome: ".$statusFetchArray["MEDICOS.NOME_MEDICO"]."     CRM: ".$statusFetchArray["MEDICOS.CRM"]."    Especialidade: ".$statusFetchArray["MEDICOS.ESPECIALIDADE"].".";
								}
							}
						
				}
			
		?>
	</p>
	</h2>
</body>