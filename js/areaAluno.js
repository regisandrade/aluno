function  Abrir_Aviso(codg,largura,altura){
	posx = (screen.width/2)-(largura/2)
	posy = (screen.height/2)-(altura/2)
	features = "width=" + largura + ", height=" + altura + ", top=" + posy + ", left=" + posx + ", scrollbars = 1";
	window.open("ler_aviso.php?codg_aviso="+codg,"Aviso",features);
}
function fecharJanela(){
    window.close();
}

function Direcionar(valor){
	if(valor == 'TURMA ATUAL'){
		document.location = "home.php?pag=11";
	}
	if(valor == 'TURMAS ANTERIORES'){
		document.location = "home.php?pag=12";
	}
}

function Visualizar_Declaracao(url,titulo,largura,altura){
	posx = (screen.width/2)-(largura/2)
	posy = (screen.height/2)-(altura/2)

	propriedades = "width=" + largura + ", height=" + altura + ", top=" + posy + ", left=" + posx + ", status=" + 1 + ", scrollbars=" + 1
	janela = window.open(url,titulo,propriedades)
}

function VerificarFormSenha(){
	if(document.form_senha.senha_antiga.value==''){
		alert('Favor, digitar a Senha Antiga.');
		document.form_senha.senha_antiga.focus();
		return false;
	}
	if(document.form_senha.nova_senha.value==''){
		alert('Favor, digitar a Nova Senha.');
		document.form_senha.nova_senha.focus();
		return false;
	}
	if(document.form_senha.repetir_senha.value==''){
		alert('Favor, repetir a Senha.');
		document.form_senha.repetir_senha.focus();
		return false;
	}
	if(document.form_senha.nova_senha.value == document.form_senha.repetir_senha.value){
		return true;
	}else{
		alert('A nova Senha esta diferente da repetir Senha.\nTente novamente.');
		return false;
	}
}

function VerificarAjuda(){
	if(document.form_ajuda.nome.value==''){
		alert('Favor, digitar o Nome.');
		document.form_ajuda.nome.focus();
		return false;
	}

	if(document.form_ajuda.email.value==''){
		alert('Favor, digitar o e-Mail.');
		document.form_ajuda.email.focus();
		return false;
	}

	if(document.form_ajuda.mensagem.value==''){
		alert('Favor, digitar a Mensagem.');
		document.form_ajuda.mensagem.focus();
		return false;
	}

}

function validarAluno(){
	if(document.form_aluno.nome.value==''){
		alert('Favor, digitar o Nome do Aluno.');
		document.form_aluno.nome.focus();
		return false;
	}

	if(document.form_aluno.data_nascimento.value==''){
		alert('Favor, digitar a Data de Nascimento do Aluno.');
		document.form_aluno.data_nascimento.focus();
		return false;
	}

	if(document.form_aluno.naturalidade.value==''){
		alert('Favor, digitar a Naturalidade do Aluno.');
		document.form_aluno.data_nascimento.focus();
		return false;
	}

	if(document.form_aluno.uf_1.value==''){
		alert('Favor, selecionar o Estado da Naturalidade do Aluno.');

		document.form_aluno.uf_1.focus();
		return false;
	}

	if(document.form_aluno.cpf.value==''){
		alert('Favor, digitar o CPF do Aluno.');
		document.form_aluno.cpf.focus();
		return false;
	}

	if(document.form_aluno.endereco.value==''){
		alert('Favor, digitar o Endereço do Aluno.');
		document.form_aluno.endereco.focus();
		return false;
	}

	if(document.form_aluno.bairro.value==''){
		alert('Favor, digitar o Bairro do Aluno.');
		document.form_aluno.bairro.focus();
		return false;
	}

	if(document.form_aluno.cep.value==''){
		alert('Favor, digitar o CEP do Aluno.');
		document.form_aluno.cep.focus();
		return false;
	}

	if(document.form_aluno.cidade.value==''){
		alert('Favor, digitar a Cidade do Aluno.');
		document.form_aluno.cidade.focus();
		return false;
	}

	if(document.form_aluno.uf_2.value==''){
		alert('Favor, digitar o Estado do Aluno.');
		document.form_aluno.uf_2.focus();
		return false;
	}

	if(document.form_aluno.curso.value==''){
		alert('Favor, digitar o Curso de Graduação do Aluno.');
		document.form_aluno.curso.focus();
		return false;
	}

	if(document.form_aluno.instituicao.value==''){
		alert('Favor, digitar a Instituição do Aluno.');
		document.form_aluno.instituicao.focus();
		return false;
	}

	if(document.form_aluno.sigla.value==''){
		alert('Favor, digitar a Sigla da Instituição do Aluno.');
		document.form_aluno.sigla.focus();
		return false;
	}

	if(document.form_aluno.conclusao.value==''){
		alert('Favor, digitar o Ano de Conclusão do Aluno.');
		document.form_aluno.conclusao.focus();
		return false;
	}
}

function FormataData(campo,teclapress)  {
	var tecla = teclapress.keycode;
	vr = teclapress;

	vr = vr.replace(".","");
	vr = vr.replace("/","");
	tam = vr.length ;

	if ( tecla != 9 && tecla != 8 )   {
		if ( tam > 2 && tam < 5 )
			document.form_aluno[campo].value = vr.substr(0,tam - 2) + '/' + vr.substr( tam - 2, tam );
		if ( tam > 5 && tam < 8 )
			document.form_aluno[campo].value = vr.substr(0, 2)+'/' +vr.substr( 2, 2) + '/' + vr.substr( 4, 4);
	}
}

