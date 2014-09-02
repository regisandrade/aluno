<?php
/**
* 
* Class Curriculo
* Class para manter curriculo
* 
*/
class Curriculo {
	private $util;
	
	function __construct() {
		$this->util = new Util();
	}

	/**
	* Pesquisar curriculos ou apenas uma
	*/
	function pesquisar($pdo,$param=null) {
		try {
			$sql = "SELECT
                   ID
                  ,NOME
                  ,SEXO
                  ,ENDERECO
                  ,BAIRRO
                  ,CIDADE
                  ,UF
                  ,CEP
                  ,TELEFONE_FIXO
                  ,TELEFONE_CELULAR
                  ,EMAIL
                  ,DATA_NASCIMENTO
                  ,CIDADE_NASCIMENTO
                  ,UF_NASCIMENTO
                  ,ESTADO_CIVIL
                  ,RG
                  ,ORGAO_EXPEDIDOR
                  ,DATA_EXPEDICAO_RG
                  ,CPF
                  ,CARTEIRA_RESERVISTA
                  ,PIS_PASEP
                  ,DATA_CADASTRO_PIS_PASEP
                  ,TITULO_ELEITOR
                  ,ZONA
                  ,SECAO
                  ,HABILITACAO
                  ,CATEGORIA
                  ,VALIDADE
                  ,AREA_INTERESSE
                  ,OBJETIVO_PROFISSIONAL
                  ,DISPONIBILIDADE_HORARIO
                  ,MSN
                  ,TWITTER
                  ,FACEBOOK
                  ,NOME_EMPRESA_1
                  ,ATIVIDADE_EMPRESA_1
                  ,DATA_ADMISSAO_1
                  ,DATA_DEMISSAO_1
                  ,FUNCAO_EXERCIDA_1
                  ,ATIVIDADE_EXERCIDA_1
                  ,SALARIO_1
                  ,NOME_EMPRESA_2
                  ,ATIVIDADE_EMPRESA_2
                  ,DATA_ADMISSAO_2
                  ,DATA_DEMISSAO_2
                  ,FUNCAO_EXERCIDA_2
                  ,ATIVIDADE_EXERCIDA_2
                  ,SALARIO_2
                  ,DATA_CADASTRO
                  ,FORMACAO_INSTITUCAO
                  ,FORMACAO_CURSO
                  ,FORMACAO_ANO
					FROM
                   curriculos
					WHERE
                   1=1";
			if($param['id']){
				$sql .= "\n AND ID = {$param['id']}";
			}
			
			if($param['idNumero']){
				$sql .= "\n AND CPF = '{$param['idNumero']}'";
			}
						
			$rs = $pdo->prepare($sql);
			$count = $rs->execute();

			if($count === false){
				$resposta['mensagem'] = "Nenhum registro encontrado.";
				$resposta['sucesso'] = false;
			}else{
				$conta = 0;
				$arrDados = array();
				while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
					$arrDados[$conta]['idCurriculo'] = $registro->ID;
					$arrDados[$conta]['nome'] = $registro->NOME;
					$arrDados[$conta]['sexo'] = $registro->SEXO;
					$arrDados[$conta]['endereco'] = $registro->ENDERECO;
					$arrDados[$conta]['bairro'] = $registro->BAIRRO;
					$arrDados[$conta]['cidade'] = $registro->CIDADE;
					$arrDados[$conta]['uf'] = $registro->UF;
					$arrDados[$conta]['cep'] = $registro->CEP;
					$arrDados[$conta]['telefoneFixo'] = $registro->TELEFONE_FIXO;
					$arrDados[$conta]['telefoneCelular'] = $registro->TELEFONE_CELULAR;
					$arrDados[$conta]['email'] = $registro->EMAIL;
					$arrDados[$conta]['dataNascimento'] = $registro->DATA_NASCIMENTO;
					$arrDados[$conta]['cidadeNascimento'] = $registro->CIDADE_NASCIMENTO;
					$arrDados[$conta]['ufNascimento'] = $registro->UF_NASCIMENTO;
					$arrDados[$conta]['estadoCivil'] = $registro->ESTADO_CIVIL;
					$arrDados[$conta]['rg'] = $registro->RG;
					$arrDados[$conta]['orgaoExpedidor'] = $registro->ORGAO_EXPEDIDOR;
					$arrDados[$conta]['dataExpedicaoRg'] = $registro->DATA_EXPEDICAO_RG;
					$arrDados[$conta]['cpf'] = $registro->CPF;
					$arrDados[$conta]['carteiraReservista'] = $registro->CARTEIRA_RESERVISTA;
					$arrDados[$conta]['numeroPisPasep'] = $registro->PIS_PASEP;
					$arrDados[$conta]['dataPisPasep'] = $registro->DATA_CADASTRO_PIS_PASEP;
					$arrDados[$conta]['numeroTituloEleitor'] = $registro->TITULO_ELEITOR;
					$arrDados[$conta]['zona'] = $registro->ZONA;
					$arrDados[$conta]['secao'] = $registro->SECAO;
					$arrDados[$conta]['numeroHabilitacao'] = $registro->HABILITACAO;
					$arrDados[$conta]['categoria'] = $registro->CATEGORIA;
					$arrDados[$conta]['vencimentoHabilitacao'] = $registro->VALIDADE;
					$arrDados[$conta]['areaInteresse'] = $registro->AREA_INTERESSE;
					$arrDados[$conta]['objetivoProfissional'] = $registro->OBJETIVO_PROFISSIONAL;
					$arrDados[$conta]['disponibilidadeHorario'] = $registro->DISPONIBILIDADE_HORARIO;
					$arrDados[$conta]['msn'] = $registro->MSN;
					$arrDados[$conta]['twitter'] = $registro->TWITTER;
					$arrDados[$conta]['facebook'] = $registro->FACEBOOK;
          $arrDados[$conta]['instituicao'] = $registro->FORMACAO_INSTITUCAO;
          $arrDados[$conta]['cursoGraduacao'] = $registro->FORMACAO_CURSO;
          $arrDados[$conta]['anoConclusao'] = $registro->FORMACAO_ANO;
					$arrDados[$conta]['nomeEmpresa_1'] = $registro->NOME_EMPRESA_1;
					$arrDados[$conta]['atividadeEmpresa_1'] = $registro->ATIVIDADE_EMPRESA_1;
					$arrDados[$conta]['dataAdmissao_1'] = $registro->DATA_ADMISSAO_1;
					$arrDados[$conta]['dataDemissao_1'] = $registro->DATA_DEMISSAO_1;
					$arrDados[$conta]['funcaoExercida_1'] = $registro->FUNCAO_EXERCIDA_1;
					$arrDados[$conta]['atividadeExercida_1'] = $registro->ATIVIDADE_EXERCIDA_1;
					$arrDados[$conta]['salario_1'] = $registro->SALARIO_1;
					$arrDados[$conta]['nomeEmpresa_2'] = $registro->NOME_EMPRESA_2;
					$arrDados[$conta]['atividadeEmpresa_2'] = $registro->ATIVIDADE_EMPRESA_2;
					$arrDados[$conta]['dataAdmissao_2'] = $registro->DATA_ADMISSAO_2;
					$arrDados[$conta]['dataDemissao_2'] = $registro->DATA_DEMISSAO_2;
					$arrDados[$conta]['funcaoExercida_2'] = $registro->FUNCAO_EXERCIDA_2;
					$arrDados[$conta]['atividadeExercida_2'] = $registro->ATIVIDADE_EXERCIDA_2;
					$arrDados[$conta]['salario_2'] = $registro->SALARIO_2;
					$arrDados[$conta]['dataCadastro'] = $registro->DATA_CADASTRO;          

					$conta++;
				}
			}
			
			$resposta['valores'] = $arrDados;
			$resposta['sucesso'] = true;

		} catch (PDOException $e) {
			echo $e->getMessage();
			$resposta['mensagem'] = $e->getMessage();
			$resposta['sucesso']  = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

	/**
	* Inserir curriculo
	*/
	function inserir($pdo,$param=null){
		try {
      $dataNascimento = Util::formataData($param['dataNascimento'],'/','-','USA');
      $dataExpedicaoRg = Util::formataData($param['dataExpedicaoRg'],'/','-','USA');
      $dataPisPasep = Util::formataData($param['dataPisPasep'],'/','-','USA');
      $validade = Util::formataData($param['vencimentoHabilitacao'],'/','-','USA');
      $dataAdmissao1 = Util::formataData($param['dataAdmissao_1'],'/','-','USA');
      $dataDemissao1 = Util::formataData($param['dataDemissao_1'],'/','-','USA');
      $dataAdmissao2 = Util::formataData($param['dataAdmissao_2'],'/','-','USA');
      $dataDemissao2 = Util::formataData($param['dataDemissao_2'],'/','-','USA');

      /* @var $salario float */
      $salario1 = str_replace(',','.',str_replace('.','',$param['salario_1']));
      $salario2 = str_replace(',','.',str_replace('.','',$param['salario_2']));
      $cpf = str_replace('.','',str_replace('-','',$param['cpf']));

			$sql = "insert into
                    curriculos(
                           NOME
                          ,SEXO
                          ,ENDERECO
                          ,BAIRRO
                          ,CIDADE
                          ,UF
                          ,CEP
                          ,TELEFONE_FIXO
                          ,TELEFONE_CELULAR
                          ,EMAIL
                          ,DATA_NASCIMENTO
                          ,CIDADE_NASCIMENTO
                          ,UF_NASCIMENTO
                          ,ESTADO_CIVIL
                          ,RG
                          ,ORGAO_EXPEDIDOR
                          ,DATA_EXPEDICAO_RG
                          ,CPF
                          ,CARTEIRA_RESERVISTA
                          ,PIS_PASEP
                          ,DATA_CADASTRO_PIS_PASEP
                          ,TITULO_ELEITOR
                          ,ZONA
                          ,SECAO
                          ,HABILITACAO
                          ,CATEGORIA
                          ,VALIDADE
                          ,AREA_INTERESSE
                          ,OBJETIVO_PROFISSIONAL
                          ,DISPONIBILIDADE_HORARIO
                          ,MSN
                          ,TWITTER
                          ,FACEBOOK
                          ,FORMACAO_INSTITUCAO
                          ,FORMACAO_CURSO
                          ,FORMACAO_ANO
                          ,NOME_EMPRESA_1
                          ,ATIVIDADE_EMPRESA_1
                          ,DATA_ADMISSAO_1
                          ,DATA_DEMISSAO_1
                          ,FUNCAO_EXERCIDA_1
                          ,ATIVIDADE_EXERCIDA_1
                          ,SALARIO_1
                          ,NOME_EMPRESA_2
                          ,ATIVIDADE_EMPRESA_2
                          ,DATA_ADMISSAO_2
                          ,DATA_DEMISSAO_2
                          ,FUNCAO_EXERCIDA_2
                          ,ATIVIDADE_EXERCIDA_2
                          ,SALARIO_2
                          ,DATA_CADASTRO
                    ) values (
                           ?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?
                          ,?)";
      
      $pdo->beginTransaction();
			
      $rs  = $pdo->prepare($sql);

      $rs->bindValue(1, $param['nome'], PDO::PARAM_STR);
      $rs->bindValue(2, $param['sexo'], PDO::PARAM_STR);
      $rs->bindValue(3, $param['endereco'], PDO::PARAM_STR);
      $rs->bindValue(4, $param['bairro'], PDO::PARAM_STR);
      $rs->bindValue(5, $param['cidade'], PDO::PARAM_STR);
      $rs->bindValue(6, $param['uf'], PDO::PARAM_STR);
      $rs->bindValue(7, $param['cep'], PDO::PARAM_STR);
      $rs->bindValue(8, $param['telefoneFixo'], PDO::PARAM_STR);
      $rs->bindValue(9, $param['telefoneCelular'], PDO::PARAM_STR);
      $rs->bindValue(10, $param['email'], PDO::PARAM_STR);
      $rs->bindValue(11, $dataNascimento, PDO::PARAM_STR);
      $rs->bindValue(12, $param['cidadeNascimento'], PDO::PARAM_STR);
      $rs->bindValue(13, $param['ufNascimento'], PDO::PARAM_STR);
      $rs->bindValue(14, $param['estadoCivil'], PDO::PARAM_STR);
      $rs->bindValue(15, $param['rg'], PDO::PARAM_STR);
      $rs->bindValue(16, $param['orgaoExpedidor'], PDO::PARAM_STR);
      $rs->bindValue(17, $param['dataExpedicaoRg'], PDO::PARAM_STR);
      $rs->bindValue(18, $cpf, PDO::PARAM_STR);
      $rs->bindValue(19, $param['carteiraReservista'], PDO::PARAM_STR);
      $rs->bindValue(20, $param['numeroPisPasep'], PDO::PARAM_STR);
      $rs->bindValue(21, $dataPisPasep, PDO::PARAM_STR);
      $rs->bindValue(22, $param['numeroTituloEleitor'], PDO::PARAM_STR);
      $rs->bindValue(23, $param['zona'], PDO::PARAM_STR);
      $rs->bindValue(24, $param['secao'], PDO::PARAM_STR);
      $rs->bindValue(25, $param['numeroHabilitacao'], PDO::PARAM_STR);
      $rs->bindValue(26, $param['categoria'], PDO::PARAM_STR);
      $rs->bindValue(27, $validade, PDO::PARAM_STR);
      $rs->bindValue(28, $param['areaInteresse'], PDO::PARAM_STR);
      $rs->bindValue(29, $param['objetivoProfissional'], PDO::PARAM_STR);
      $rs->bindValue(30, $param['disponibilidadeHorario'], PDO::PARAM_STR);
      $rs->bindValue(31, $param['msn'], PDO::PARAM_STR);
      $rs->bindValue(32, $param['twitter'], PDO::PARAM_STR);
      $rs->bindValue(33, $param['facebook'], PDO::PARAM_STR);
      $rs->bindValue(34, $param['instituicao'], PDO::PARAM_STR);
      $rs->bindValue(35, $param['cursoGraduacao'], PDO::PARAM_STR);
      $rs->bindValue(36, $param['anoConclusao'], PDO::PARAM_INT);
      $rs->bindValue(37, $param['nomeEmpresa_1'], PDO::PARAM_STR);
      $rs->bindValue(38, $param['atividadeEmpresa_1'], PDO::PARAM_STR);
      $rs->bindValue(39, $dataAdmissao1, PDO::PARAM_STR);
      $rs->bindValue(40, $dataDemissao1, PDO::PARAM_STR);
      $rs->bindValue(41, $param['funcaoExercida_1'], PDO::PARAM_STR);
      $rs->bindValue(42, $param['atividadeExercida_1'], PDO::PARAM_STR);
      $rs->bindValue(43, $param['salario1'], PDO::PARAM_STR);
      $rs->bindValue(44, $param['nomeEmpresa_2'], PDO::PARAM_STR);
      $rs->bindValue(45, $param['atividadeEmpresa_2'], PDO::PARAM_STR);
      $rs->bindValue(46, $dataAdmissao2, PDO::PARAM_STR);
      $rs->bindValue(47, $dataDemissao2, PDO::PARAM_STR);
      $rs->bindValue(48, $param['funcaoExercida_2'], PDO::PARAM_STR);
      $rs->bindValue(49, $param['atividadeExercida_2'], PDO::PARAM_STR);
      $rs->bindValue(50, $param['salario2'], PDO::PARAM_STR);
      $rs->bindValue(51, date('Y-m-d'), PDO::PARAM_STR);

      $count = $rs->execute();
			$rs->commit();

			if($count === false){
        $rs->rollBack();
				$resposta['mensagem'] = "Erro ao incluir o currículo.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = false;
			}else{
				$resposta['mensagem'] = "Currículo incluído com sucesso.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = true;
			}
		} catch (Exception $e) {
      $rs->rollBack();
			$resposta['mensagem'] = $e->getMessage();
			$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
			$resposta['sucesso']  = false;
		}

		$pdo = null;
		//return $arrDados;
		echo json_encode($resposta);
	}

	/**
	* Alterar curriculo
	*/
	function alterar($pdo,$param=null){
		try {
			$sql = "update
                     curriculos
					    set
                     NOME                    = ?
                    ,SEXO                    = ?
                    ,ENDERECO                = ?
                    ,BAIRRO                  = ?
                    ,CIDADE                  = ?
                    ,UF                      = ?
                    ,CEP                     = ?
                    ,TELEFONE_FIXO           = ?
                    ,TELEFONE_CELULAR        = ?
                    ,EMAIL                   = ?
                    ,DATA_NASCIMENTO         = ?
                    ,CIDADE_NASCIMENTO       = ?
                    ,UF_NASCIMENTO           = ?
                    ,ESTADO_CIVIL            = ?
                    ,RG                      = ?
                    ,ORGAO_EXPEDIDOR         = ?
                    ,DATA_EXPEDICAO_RG       = ?
                    ,CPF                     = ?
                    ,CARTEIRA_RESERVISTA     = ?
                    ,PIS_PASEP               = ?
                    ,DATA_CADASTRO_PIS_PASEP = ?
                    ,TITULO_ELEITOR          = ?
                    ,ZONA                    = ?
                    ,SECAO                   = ?
                    ,HABILITACAO             = ?
                    ,CATEGORIA               = ?
                    ,VALIDADE                = ?
                    ,AREA_INTERESSE          = ?
                    ,OBJETIVO_PROFISSIONAL   = ?
                    ,DISPONIBILIDADE_HORARIO = ?
                    ,MSN                     = ?
                    ,TWITTER                 = ?
                    ,FACEBOOK                = ?
                    ,NOME_EMPRESA_1          = ?
                    ,ATIVIDADE_EMPRESA_1     = ?
                    ,DATA_ADMISSAO_1         = ?
                    ,DATA_DEMISSAO_1         = ?
                    ,FUNCAO_EXERCIDA_1       = ?
                    ,ATIVIDADE_EXERCIDA_1    = ?
                    ,SALARIO_1               = ?
                    ,NOME_EMPRESA_2          = ?
                    ,ATIVIDADE_EMPRESA_2     = ?
                    ,DATA_ADMISSAO_2         = ?
                    ,DATA_DEMISSAO_2         = ?
                    ,FUNCAO_EXERCIDA_2       = ?
                    ,ATIVIDADE_EXERCIDA_2    = ?
                    ,SALARIO_2               = ?
                    ,FORMACAO_INSTITUCAO     = ?
                    ,FORMACAO_CURSO          = ?
                    ,FORMACAO_ANO            = ?
              where
                     ID                      = ?";

			$dataNascimento = Util::formataData($param['dataNascimento'],'/','-','USA');
      $dataExpedicaoRg = Util::formataData($param['dataExpedicaoRg'],'/','-','USA');
      $dataPisPasep = Util::formataData($param['dataPisPasep'],'/','-','USA');
      $validade = Util::formataData($param['vencimentoHabilitacao'],'/','-','USA');
      $dataAdmissao1 = Util::formataData($param['dataAdmissao_1'],'/','-','USA');
      $dataDemissao1 = Util::formataData($param['dataDemissao_1'],'/','-','USA');
      $dataAdmissao2 = Util::formataData($param['dataAdmissao_2'],'/','-','USA');
      $dataDemissao2 = Util::formataData($param['dataDemissao_2'],'/','-','USA');

      /* @var $salario float */
      $salario1 = str_replace(',','.',str_replace('.','',$param['salario_1']));
      $salario2 = str_replace(',','.',str_replace('.','',$param['salario_2']));

      $count = $rs->execute(array($param['nome'],
                                  $param['sexo'],
                                  $param['endereco'],
                                  $param['bairro'],
                                  $param['cidade'],
                                  $param['uf'],
                                  $param['cep'],
                                  $param['telefoneFixo'],
                                  $param['telefoneCelular'],
                                  $param['email'],
                                  $dataNascimento,
                                  $param['cidadeNascimento'],
                                  $param['ufNascimento'],
                                  $param['estadoCivil'],
                                  $param['rg'],
                                  $param['orgaoExpedidor'],
                                  $dataExpedicaoRg,
                                  $param['cpf'],
                                  $param['carteiraReservista'],
                                  $param['numeroPisPasep'],
                                  $dataPisPasep,
                                  $param['numeroTituloEleitor'],
                                  $param['zona'],
                                  $param['secao'],
                                  $param['numeroHabilitacao'],
                                  $param['categoria'],
                                  $validade,
                                  $param['areaInteresse'],
                                  $param['objetivoProfissional'],
                                  $param['disponibilidadeHorario'],
                                  $param['msn'],
                                  $param['twitter'],
                                  $param['facebook'],
                                  $param['nomeEmpresa_1'],
                                  $param['atividadeEmpresa_1'],
                                  $dataAdmissao1,
                                  $dataDemissao1,
                                  $param['funcaoExercida_1'],
                                  $param['atividadeExercida_1'],
                                  $salario1,
                                  $param['nomeEmpresa_2'],
                                  $param['atividadeEmpresa_2'],
                                  $dataAdmissao2,
                                  $dataDemissao2,
                                  $param['funcaoExercida_2'],
                                  $param['atividadeExercida_2'],
                                  $salario2,
                                  $param['instituicao'],
                                  $param['cursoGraduacao'],
                                  $param['anoConclusao'],
                                  $param['idCurriculo']));

			if($count === false){
				$resposta['mensagem'] = "Erro ao alterar a currículo.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = false;
			}else{
				$resposta['mensagem'] = "Currículo alterada com sucesso.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = true;
			}
		} catch (Exception $e) {
			$resposta['mensagem'] = $e->getMessage();
			$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
			$resposta['sucesso']  = false;
		}

		$pdo = null;
		return $arrDados;
		//echo json_encode($resposta);
	}

} // Fim class