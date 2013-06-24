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
					$arrDados[$conta]['estadoCivel'] = $registro->ESTADO_CIVIL;
					$arrDados[$conta]['rg'] = $registro->RG;
					$arrDados[$conta]['organcaoExpedidor'] = $registro->ORGAO_EXPEDIDOR;
					$arrDados[$conta]['dataExpedicaoRg'] = $registro->DATA_EXPEDICAO_RG;
					$arrDados[$conta]['cpf'] = $registro->CPF;
					$arrDados[$conta]['carteiraReservista'] = $registro->CARTEIRA_RESERVISTA;
					$arrDados[$conta]['pisPasep'] = $registro->PIS_PASEP;
					$arrDados[$conta]['dataCadastroPisPasep'] = $registro->DATA_CADASTRO_PIS_PASEP;
					$arrDados[$conta]['tituloEleitor'] = $registro->TITULO_ELEITOR;
					$arrDados[$conta]['zona'] = $registro->ZONA;
					$arrDados[$conta]['secao'] = $registro->SECAO;
					$arrDados[$conta]['habitacao'] = $registro->HABILITACAO;
					$arrDados[$conta]['categoria'] = $registro->CATEGORIA;
					$arrDados[$conta]['validade'] = $registro->VALIDADE;
					$arrDados[$conta]['areaInteresse'] = $registro->AREA_INTERESSE;
					$arrDados[$conta]['objetivoProfissional'] = $registro->OBJETIVO_PROFISSIONAL;
					$arrDados[$conta]['disponibilidadeHorario'] = $registro->DISPONIBILIDADE_HORARIO;
					$arrDados[$conta]['msn'] = $registro->MSN;
					$arrDados[$conta]['twitter'] = $registro->TWITTER;
					$arrDados[$conta]['facebook'] = $registro->FACEBOOK;
					$arrDados[$conta]['nomeEmpresa1'] = $registro->NOME_EMPRESA_1;
					$arrDados[$conta]['atividadeEmpresa1'] = $registro->ATIVIDADE_EMPRESA_1;
					$arrDados[$conta]['dataAdmissao1'] = $registro->DATA_ADMISSAO_1;
					$arrDados[$conta]['dataDemissao1'] = $registro->DATA_DEMISSAO_1;
					$arrDados[$conta]['funcaoExercida1'] = $registro->FUNCAO_EXERCIDA_1;
					$arrDados[$conta]['atividadeExercida1'] = $registro->ATIVIDADE_EXERCIDA_1;
					$arrDados[$conta]['salario1'] = $registro->SALARIO_1;
					$arrDados[$conta]['nomeEmpresa2'] = $registro->NOME_EMPRESA_2;
					$arrDados[$conta]['atividadeEmpresa2'] = $registro->ATIVIDADE_EMPRESA_2;
					$arrDados[$conta]['dataAdmissao2'] = $registro->DATA_ADMISSAO_2;
					$arrDados[$conta]['dataDemissao2'] = $registro->DATA_DEMISSAO_2;
					$arrDados[$conta]['funcaoExercida2'] = $registro->FUNCAO_EXERCIDA_2;
					$arrDados[$conta]['atividadeExercida2'] = $registro->ATIVIDADE_EXERCIDA_2;
					$arrDados[$conta]['salario2'] = $registro->SALARIO_2;
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
                             :idCurriculo
                            ,:nome
                           ,:sexo
                           ,:endereco
                           ,:bairro
                           ,:cidade
                           ,:uf
                           ,:cep
                           ,:telefoneFixo
                           ,:telefoneCelular
                           ,:email
                           ,:dataNascimento
                           ,:cidadeNascimento
                           ,:ufNascimento
                           ,:estadoCivel
                           ,:rg
                           ,:organcaoExpedidor
                           ,:dataExpedicaoRg
                           ,:cpf
                           ,:carteiraReservista
                           ,:pisPasep
                           ,:dataCadastroPisPasep
                           ,:tituloEleitor
                           ,:zona
                           ,:secao
                           ,:habitacao
                           ,:categoria
                           ,:validade
                           ,:areaInteresse
                           ,:objetivoProfissional
                           ,:disponibilidadeHorario
                           ,:msn
                           ,:twitter
                           ,:facebook
                           ,:nomeEmpresa1
                           ,:atividadeEmpresa1
                           ,:dataAdmissao1
                           ,:dataDemissao1
                           ,:funcaoExercida1
                           ,:atividadeExercida1
                           ,:salario1
                           ,:nomeEmpresa2
                           ,:atividadeEmpresa2
                           ,:dataAdmissao2
                           ,:dataDemissao2
                           ,:funcaoExercida2
                           ,:atividadeExercida2
                           ,:salario2
                           ,:dataCadastro)";
			$rs  = $pdo->prepare($sql);
			
			$dataNascimento = Util::formataData($_REQUEST['dataNascimento'],'/','-','USA');
            $dataExpedicaoRg = Util::formataData($_REQUEST['dataExpedicaoRg'],'/','-','USA');
            $dataCadastroPisPasep = Util::formataData($_REQUEST['dataCadastroPisPasep'],'/','-','USA');
            $validade = Util::formataData($_REQUEST['validade'],'/','-','USA');
            $dataAdmissao1 = Util::formataData($_REQUEST['dataAdmissao1'],'/','-','USA');
            $dataDemissao1 = Util::formataData($_REQUEST['dataDemissao1'],'/','-','USA');
            $dataAdmissao2 = Util::formataData($_REQUEST['dataAdmissao2'],'/','-','USA');
            $dataDemissao2 = Util::formataData($_REQUEST['dataDemissao2'],'/','-','USA');

            /* @var $salario float */
            $salario1 = str_replace(',','.',str_replace('.','',$_REQUEST['salario1']));
            $salario2 = str_replace(',','.',str_replace('.','',$_REQUEST['salario2']));

			$count = $rs->execute(array(':idCurriculo'=>$param['idCurriculo'],
										':nome'=>$param['nome'],
										':sexo'=>$param['sexo'],
										':endereco'=>$param['endereco'],
										':bairro'=>$param['bairro'],
										':cidade'=>$param['cidade'],
										':uf'=>$param['uf'],
										':cep'=>$param['cep'],
										':telefoneFixo'=>$param['telefoneFixo'],
										':telefoneCelular'=>$param['telefoneCelular'],
										':email'=>$param['email'],
										':dataNascimento'=>$dataNascimento,
										':cidadeNascimento'=>$param['cidadeNascimento'],
										':ufNascimento'=>$param['ufNascimento'],
										':estadoCivel'=>$param['estadoCivel'],
										':rg'=>$param['rg'],
										':organcaoExpedidor'=>$param['organcaoExpedidor'],
										':dataExpedicaoRg'=>$dataExpedicaoRg,
										':cpf'=>$param['cpf'],
										':carteiraReservista'=>$param['carteiraReservista'],
										':pisPasep'=>$param['pisPasep'],
										':dataCadastroPisPasep'=>$dataCadastroPisPasep,
										':tituloEleitor'=>$param['tituloEleitor'],
										':zona'=>$param['zona'],
										':secao'=>$param['secao'],
										':habitacao'=>$param['habitacao'],
										':categoria'=>$param['categoria'],
										':validade'=>$validade,
										':areaInteresse'=>$param['areaInteresse'],
										':objetivoProfissional'=>$param['objetivoProfissional'],
										':disponibilidadeHorario'=>$param['disponibilidadeHorario'],
										':msn'=>$param['msn'],
										':twitter'=>$param['twitter'],
										':facebook'=>$param['facebook'],
										':nomeEmpresa1'=>$param['nomeEmpresa1'],
										':atividadeEmpresa1'=>$param['atividadeEmpresa1'],
										':dataAdmissao1'=>$dataAdmissao1,
										':dataDemissao1'=>$dataDemissao1,
										':funcaoExercida1'=>$param['funcaoExercida1'],
										':atividadeExercida1'=>$param['atividadeExercida1'],
										':salario1'=>$salario1,
										':nomeEmpresa2'=>$param['nomeEmpresa2'],
										':atividadeEmpresa2'=>$param['atividadeEmpresa2'],
										':dataAdmissao2'=>$dataAdmissao2,
										':dataDemissao2'=>$dataDemissao2,
										':funcaoExercida2'=>$param['funcaoExercida2'],
										':atividadeExercida2'=>$param['atividadeExercida2'],
										':salario2'=>$salario2,
										':dataCadastro'=>date('Y-m-d')));

			if($count === false){
				$resposta['mensagem'] = "Erro ao incluir o currículo.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = false;
			}else{
				$resposta['mensagem'] = "Currículo incluído com sucesso.";
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
					where
                             ID = ?";

			$dataNascimento = Util::formataData($_REQUEST['dataNascimento'],'/','-','USA');
            $dataExpedicaoRg = Util::formataData($_REQUEST['dataExpedicaoRg'],'/','-','USA');
            $dataCadastroPisPasep = Util::formataData($_REQUEST['dataCadastroPisPasep'],'/','-','USA');
            $validade = Util::formataData($_REQUEST['validade'],'/','-','USA');
            $dataAdmissao1 = Util::formataData($_REQUEST['dataAdmissao1'],'/','-','USA');
            $dataDemissao1 = Util::formataData($_REQUEST['dataDemissao1'],'/','-','USA');
            $dataAdmissao2 = Util::formataData($_REQUEST['dataAdmissao2'],'/','-','USA');
            $dataDemissao2 = Util::formataData($_REQUEST['dataDemissao2'],'/','-','USA');

            /* @var $salario float */
            $salario1 = str_replace(',','.',str_replace('.','',$_REQUEST['salario1']));
            $salario2 = str_replace(',','.',str_replace('.','',$_REQUEST['salario2']));

            $count = $rs->execute(array($param['idCurriculo'],
										$param['nome'],
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
										$param['estadoCivel'],
										$param['rg'],
										$param['organcaoExpedidor'],
										$dataExpedicaoRg,
										$param['cpf'],
										$param['carteiraReservista'],
										$param['pisPasep'],
										$dataCadastroPisPasep,
										$param['tituloEleitor'],
										$param['zona'],
										$param['secao'],
										$param['habitacao'],
										$param['categoria'],
										$validade,
										$param['areaInteresse'],
										$param['objetivoProfissional'],
										$param['disponibilidadeHorario'],
										$param['msn'],
										$param['twitter'],
										$param['facebook'],
										$param['nomeEmpresa1'],
										$param['atividadeEmpresa1'],
										$dataAdmissao1,
										$dataDemissao1,
										$param['funcaoExercida1'],
										$param['atividadeExercida1'],
										$salario1,
										$param['nomeEmpresa2'],
										$param['atividadeEmpresa2'],
										$dataAdmissao2,
										$dataDemissao2,
										$param['funcaoExercida2'],
										$param['atividadeExercida2'],
										$salario2));

			if($count === false){
				$resposta['mensagem'] = "Erro ao alterar a curriculo.";
				$resposta['caminho']  = $param['caminho'] ? $param['caminho'] : '';
				$resposta['sucesso']  = false;
			}else{
				$resposta['mensagem'] = "curriculo alterada com sucesso.";
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
