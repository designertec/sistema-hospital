<h1>Casos de Uso</h1>

<h3><b>UC001: Cadastrar Paciente</b></h3><br>
<b>Objetivo:</b> Cadastrar o paciente para que ele possa usar o sistema<br>
<b>Descrição:</b> O paciente informa seus dados, endereço e faz o cadastro no sistema<br>
<b>Ator:</b> Paciente<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Nenhuma<br>
<b>Pós-Condição</b>: O usuário é cadastrado no sistema<br>
<b>Cenários principais de sucesso:</b> A partir do cadastro, o usuário poderá acessar o sistema e já terá seu prontuário único.<br>
<b>Fluxos Alternativos:</b>Se o número de caracteres for inválido, o sistema exibirá uma mensagem de erro e irá pedir para que o usuário digite novamente(erro001).<br><br>

<h3><b>UC002: Cadastrar Médico</b></h3><br>
<b>Objetivo:</b> Cadastrar o médico/Enfermeiro para que ele possa usar o sistema<br>
<b>Descrição:</b> O administrador cadastra o médico e sua agenda no sistema<br>
<b>Ator:</b> Médico, Administrador<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> O médico estar cadastrado no CRM(!)<br>
<b>Pós-Condição</b>: O médico é cadastrado no sistema<br>
<b>Cenários principais de sucesso:</b> A partir do cadastro, o médico/Enfermeiro poderá acessar o sistema e alterar prontuários.<br>
<b>Fluxos Alternativos:</b>Se o número de caracteres for inválido, o sistema exibirá uma mensagem de erro e irá pedir para que o usuário digite novamente;<br>
Caso o médico não tenha CRM, uma mensagem de erro é exibida(erro002);<br>

<h3><b>UC003: Fazer Login</b></h3><br>
<b>Objetivo:</b> Ter acesso ao sistema<br>
<b>Descrição:</b> O usuário deve entrar com o CPF e senha.<br>
<b>Ator:</b> Paciente, Médico/Enfermeiro, Administrador.<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Médico/Enfermeiro, Pacientes e Administrador cadastrados no sistema.<br>
<b>Pós-Condição</b>: O usuário tem acesso ao sistema.<br>
<b>Cenários principais de sucesso:</b>

1 Se o CPF e senha estiverem corretos, entrará no sistema.<br>
<ol><li>1 <b>Paciente</b>, poderá alterar seus dados cadastrais e marcar consultas.<br>
</li><li>2 <b>Medico/Enfermeiro</b>, poderá acrescentar informações ao prontuário.<br>
</li><li>3 <b>Administrador</b>, poderá cadastrar/retirar médicos.<br>
<b>Fluxos Alternativos:</b>....<br>
</li></ol><blockquote>Caso o CPF ou senha estiver incorreto, informar: CPF ou senha invalido(erro003 ou erro005).</blockquote>

<h3><b>UC004: Alterar Prontuário</b></h3><br>
<b>Objetivo:</b> Dar a oportunidade do médico mudar o prontuário<br>
<b>Descrição:</b> O médico altera os dados do paciente a partir de exames feitos<br>
<b>Ator:</b> Paciente, Médico<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Médico e Pacientes cadastrados no sistema<br>
<b>Pós-Condição</b>: O prontuário é alterado<br>
<b>Cenários principais de sucesso:</b> O médico poderá visualizar o novo prontuário, com todas as informações do paciente.<br>
<b>Fluxos Alternativos:</b>....<br>

<h3><b>UC005: Alterar dados cadastrais</b></h3><br>
<b>Objetivo:</b> Alterar a senha e endereço.<br>
<b>Descrição:</b> O paciente altera a sua senha e/ou endereço.<br>
<b>Ator:</b> Paciente<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Pacientes cadastrados no sistema<br>
<b>Pós-Condição</b>: A senha e/ou endereço é(são) alterados.<br>
<b>Cenários principais de sucesso:</b>
O paciente poderá alterar o seu endereço e senha de forma rápida e intuitiva.<br>
<b>Fluxos Alternativos:</b>
<blockquote>Caso a senha antiga seja inválida, informar que a senha foi digitada de forma errada(erro003).<br>
<br></blockquote>

<h3><b>UC006: Marcar consultas</b></h3><br>
<b>Objetivo:</b> Dar a oportunidade ao paciente marcar e desmarcar consultas.<br>
<b>Descrição:</b> O paciente escolhe a especialidade da consulta e o sistema marca o dia. O paciente também pode cancelar uma consulta marcada(1 semana antes).<br>
<b>Ator:</b> Paciente<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Médico e Pacientes cadastrados no sistema<br>
<b>Pós-Condição</b>: A consulta é marcada ou desmarcada.<br>
<b>Cenários principais de sucesso:</b>

<blockquote>A consulta é marcada ou desmarcada.<br></blockquote>

<b>Fluxos Alternativos:</b>

<h3><b>UC007: Consultar Prontuário</b></h3><br>
<b>Objetivo:</b>Consultar prontuário do paciente<br>
<b>Descrição:</b> O médico ou paciente consulta o prontuário em tela<br>
<b>Ator:</b> Médico, paciente<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Pacientes com prontuários cadastrados no sistema<br>
<b>Pós-Condição</b>: O prontuário é visualizado com sucesso<br>
<b>Cenários principais de sucesso:</b>
O médico ou paciente poderão visualizar o prontuário de forma rápida e intuitiva.<br>
<b>Fluxos Alternativos:</b>
Caso o prontuário não seja encontrado, informar: prontuário não encontrado (erro004)<br>
<br>
<h3><b>UC008: Imprimir Prontuário</b></h3><br>
<b>Objetivo:</b>Imprimir o prontuário do paciente<br>
<b>Descrição:</b> O médico ou paciente imprime o prontuário<br>
<b>Ator:</b> Médico, paciente<br>
<b>Prioridade:</b> Baixa<br>
<b>Pré-Condição:</b> Pacientes com prontuários cadastrados no sistema<br>
<b>Pós-Condição</b>: O prontuário é impresso com sucesso<br>
<b>Cenários principais de sucesso:</b>
O médico ou paciente poderão imprimir o prontuário de forma rápida e intuitiva.<br>
<b>Fluxos Alternativos:</b>

<h3><b>UC009: Criar Prontuário</b></h3><br>
<b>Objetivo:</b>Permitir que o médico ou enfermeiro crie o prontuário do paciente<br>
<b>Descrição:</b> O médico ou enfermeiro cria o prontuário do paciente<br>
<b>Ator:</b> Médico, Enfermeiro<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> Pacientes cadastrados no sistema<br>
<b>Pós-Condição</b>: O prontuário é impresso com sucesso<br>
<b>Cenários principais de sucesso:</b>
O médico ou enfermeiro poderá criar o prontuário de forma rápida e intuitiva<br>
<b>Fluxos Alternativos:</b>
<blockquote>Caso o paciente não esteja cadastrado, informar: paciente não cadastrado(erro005)</blockquote>


<h3><b>UC010: Cadastrar ADM</b></h3><br>
<b>Objetivo:</b> Cadastrar o ADM para que ele possa administrar o sistema<br>
<b>Descrição:</b> O administrador cadastra outro administrador<br>
<b>Ator:</b> Administrador<br>
<b>Prioridade:</b> Alta<br>
<b>Pré-Condição:</b> <br>
<b>Pós-Condição</b>: O ADM é cadastrado no sistema<br>
<b>Cenários principais de sucesso:</b> A partir do cadastro, o ADM poderá acessar o sistema e cadastrar novos funcionários..<br>
<b>Fluxos Alternativos:</b>





<h3><b>Tratamento de erros</b></h3><br>
<b><b>erro001:</b></b>  "Número de caracteres inválido, digite novamente."<br>
<b><b>erro002:</b></b>  "Atenção! Faltou informar o CRM!"<br>
<b><b>erro003:</b></b>  "Senha incorreta."<br>
<b><b>erro004:</b></b>  "Prontuário não encontrado."<br>
<b><b>erro005:</b></b>  "Paciente não cadastrado."<br>
<b><b>erro006:</b></b>  "Usuário já cadastrado!"<br>