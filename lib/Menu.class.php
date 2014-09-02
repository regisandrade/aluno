<?php
/**
*
* Classe para gerar menu boostranp
* @author Regis Andrade
* 
*/
class Menu {

  /**
  *
  * Função para gerar um array com os itens do menu
  * área do aluno do IPECON
  *
  * @method menuIpeconAreaAluno
  * @author Regis Andrade
  * @return Array
  * 
  */
	public function menuIpeconAreaAluno(){
		$menu = array(
			array("Home","home.php","fixo"),
            array("Educacional",
                  array(array("Material Disponível","home.php?pag=materialDisponivel&arq=index.php"),
                          array("Artigos","home.php?pag=artigos&arq=index.php"),
                          array("Cronograma","home.php?pag=cronograma&arq=index.php"),
                          array("Notas/Frequência","home.php?pag=notasFrequencias&arq=index.php"),
                          array("Professores","home.php?pag=professores&arq=index.php"),
                          array("Depoimento","home.php?pag=depoimento&arq=index.php"),
                          array("Atualizar dados cadastrais","home.php?pag=alterarDados&arq=index.php"))),
            array("Declarações",
                  array(array("Currículo","declaracoes/curriculo.php"," target=\"_blank\""),
                        array("Estudante","declaracoes/estudante.php"," target=\"_blank\""))),
            array("Bco Oportunidade",
                  array(array("Atualizar currículo","home.php?pag=bcoOportunidade&arq=cadCurriculoAluno.php"),
                        array("Vagas disponível","home.php?pag=bcoOportunidade&arq=listVagasAluno.php"))),
            array("Outros",
                  array(array("Links","home.php?pag=links&arq=index.php"),
                        array("Alterar senha","home.php?pag=alterarSenha&arq=index.php"),
                        array("Ajuda","home.php?pag=ajuda&arq=index.php"),
                        array("Sair","sair.php")))            
		);
		return $menu;
	}

  /**
  *
  * Função para gerar um array com os itens do menu
  * área do aluno do IPECON
  *
  * @method menuIpeconAdministracao
  * @author Regis Andrade
  * @return Array  
  *
  */
	public function menuIpeconAdministracao(){
		$menu = array(
            array("Cadastro",
                  array(array("Alunos","aluno/aluno.php"),
                        array("Artigos","artigo/artigo.php"),
                        array("Avisos","artigo/artigo.php"),
                        array("Cronogramas","artigo/artigo.php"),
                        array("Currículos Professores","artigo/artigo.php"),
                        array("Cursos","artigo/artigo.php"),
                        array("Disciplinas","artigo/artigo.php"),
                        array("Material de Apoio","artigo/artigo.php"),
                        array("Links","artigo/artigo.php"),
                        array("Matrículas","artigo/artigo.php"),
                        array("Mensagens","artigo/artigo.php"),
                        array("Notas e Frequências","artigo/artigo.php"),
                        array("Notícias","artigo/artigo.php"),
                        array("Professores","artigo/artigo.php"),
                        array("Turmas","artigo/artigo.php"),
                        array("Usuários Admin.","artigo/artigo.php")
                       )
                 ),
            array("Movimento",
                  array(array("Aluno","aluno/aluno.php"),
                        array("Artigo","artigo/artigo.php"))),
            array("Relatórios",
                  array(array("Alunos potenciais","#"),
                        array("Boletos emitídos","#"),
                        array("Pré-Inscrição","#"),
                        array("Newsletter","#"),
                        array("Histórico Escolar","#"))),
            array("Administração",
                  array(array("Área do Aluno","#"),
                        array("Alterar senha","#"),
                        array("Senha dos alunos","#"),
                        array("Sair","sair.php")))            
		);
		return $menu;
	}
}