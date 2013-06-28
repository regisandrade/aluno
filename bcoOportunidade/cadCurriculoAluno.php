<?php
$curriculoAluno = new Curriculo();
$param['idNumero'] = $_SESSION['idNumero'];
$arrAluno = $curriculoAluno->pesquisar($bd,$param);
unset($param);

$arrAluno = array_filter($arrAluno);

if (!empty($arrAluno)) {
    if(is_array($arrAluno)){
        $objAluno = current($arrAluno);
    }
    // Convertendo o array em objeto
    $objAluno = (object) $objAluno;

    //echo "tem dados na tabela de currículo";
} else {
    $param['sistema'] = 'ipecon';
    $oConexao = myDB::getInstance($param);
    unset($param);

    $alunoDAO = new Aluno();
    $param['idNumero'] = $_SESSION['idNumero'];
    $arrAluno = $alunoDAO->pesquisar($oConexao,$param);
    unset($param);

    $objAluno = current($arrAluno);

    // Convertendo o array em objeto
    $objAluno = (object) $objAluno;

    //echo "tem dados na tabela de aluno";
}
// echo "<pre>";
// print_r($objAluno);
// echo "</pre>";
//die;
?>
<h2>Atualizar seu curr&iacute;culo</h2>

<form name="formCurriculo" id="formCurriculo" class="form-horizontal" method="POST" action="bcoOportunidade/alterarCurriculoAluno.php">
<input type="hidden" name="ID_CURRICULO" value="<?php echo ($objAluno && $objAluno->idCurriculo != '' ? $objAluno->idCurriculo : ''); ?>" />
<input type="hidden" name="ACAO" id="ACAO" value="<?php echo ($objAluno && $objAluno->idCurriculo != '' ? 'ALTERAR' : 'INCLUIR'); ?>"/>
<input type="hidden" name="cpf" value="<?php echo $objAluno->cpf; ?>" />
<input type="hidden" name="idAluno" value="<?php echo ($objAluno && $objAluno->cpf != '' ? str_replace('.','',str_replace('-','',$objAluno->cpf)) : ''); ?>" />

    <div class="control-group">
        <label class="control-label" for="">Nome:</label>
		<div class="controls">
			<input type="text" id="nome" name="nome" class="input-xxlarge" value="<?php echo ($objAluno && $objAluno->nome != '' ? utf8_decode($objAluno->nome) : ''); ?>" />
		</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="sexo">Sexo:</label>
        <div class="controls">
        	<select id="sexo" name="sexo" class="span2">
                <option value="">[Selecionar]</option>
                <option value="F" <?php echo ($objAluno && $objAluno->sexo == 'F' ? 'selected' : ''); ?>>Feminino</option>
                <option value="M" <?php echo ($objAluno && $objAluno->sexo == 'M' ? 'selected' : ''); ?>>Masculino</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="endereco">Endere&ccedil;o:</label>
        <div class="controls">
        	<textarea id="endereco" name="endereco" rows="5" class=""><?php echo ($objAluno && $objAluno->endereco != '' ? utf8_decode($objAluno->endereco) : ''); ?></textarea>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="bairro">Bairro:</label>
        <div class="controls">
        	<input type="text" id="bairro" name="bairro" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->bairro != '' ? utf8_decode($objAluno->bairro) : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="cidade">Cidade:</label>
        <div class="controls">
        	<input type="text" id="cidade" name="cidade" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->cidade != '' ? utf8_decode($objAluno->cidade) : ''); ?>" />    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="uf">UF:</label>
        <div class="controls">
	        <select name="uf" id="uf" class="span2">
	            <option value="0">[Selecionar]</option>
	            <option value="AC" <?php echo ($objAluno && $objAluno->uf == 'AC' ? 'selected' : ''); ?>>Acre</option>
	            <option value="AL" <?php echo ($objAluno && $objAluno->uf == 'AL' ? 'selected' : ''); ?>>Alagoas</option>
	            <option value="AP" <?php echo ($objAluno && $objAluno->uf == 'AP' ? 'selected' : ''); ?>>Amap&aacute;</option>
	            <option value="AM" <?php echo ($objAluno && $objAluno->uf == 'AM' ? 'selected' : ''); ?>>Amazonas</option>
	            <option value="BA" <?php echo ($objAluno && $objAluno->uf == 'BA' ? 'selected' : ''); ?>>Bahia</option>
	            <option value="CE" <?php echo ($objAluno && $objAluno->uf == 'CE' ? 'selected' : ''); ?>>Cear&aacute;</option>
	            <option value="DF" <?php echo ($objAluno && $objAluno->uf == 'DF' ? 'selected' : ''); ?>>Distrito Federal</option>
	            <option value="ES" <?php echo ($objAluno && $objAluno->uf == 'ES' ? 'selected' : ''); ?>>Espirito Santo</option>
	            <option value="GO" <?php echo ($objAluno && $objAluno->uf == 'GO' ? 'selected' : ''); ?>>Goi&aacute;s</option>
	            <option value="MA" <?php echo ($objAluno && $objAluno->uf == 'MA' ? 'selected' : ''); ?>>Maranh&atilde;o</option>
	            <option value="MS" <?php echo ($objAluno && $objAluno->uf == 'MS' ? 'selected' : ''); ?>>Mato Grosso do Sul</option>
	            <option value="MT" <?php echo ($objAluno && $objAluno->uf == 'MT' ? 'selected' : ''); ?>>Mato Grosso</option>
	            <option value="MG" <?php echo ($objAluno && $objAluno->uf == 'MG' ? 'selected' : ''); ?>>Minas Gerais</option>
	            <option value="PA" <?php echo ($objAluno && $objAluno->uf == 'PA' ? 'selected' : ''); ?>>Par&aacute;</option>
	            <option value="PB" <?php echo ($objAluno && $objAluno->uf == 'PB' ? 'selected' : ''); ?>>Para&iacute;ba</option>
	            <option value="PR" <?php echo ($objAluno && $objAluno->uf == 'PR' ? 'selected' : ''); ?>>Paran&aacute;</option>
	            <option value="PE" <?php echo ($objAluno && $objAluno->uf == 'PE' ? 'selected' : ''); ?>>Pernambuco</option>
	            <option value="PI" <?php echo ($objAluno && $objAluno->uf == 'PI' ? 'selected' : ''); ?>>Piau&iacute;</option>
	            <option value="RJ" <?php echo ($objAluno && $objAluno->uf == 'RJ' ? 'selected' : ''); ?>>Rio de Janeiro</option>
	            <option value="RN" <?php echo ($objAluno && $objAluno->uf == 'RN' ? 'selected' : ''); ?>>Rio Grande do Norte</option>
	            <option value="RS" <?php echo ($objAluno && $objAluno->uf == 'RS' ? 'selected' : ''); ?>>Rio Grande do Sul</option>
	            <option value="RO" <?php echo ($objAluno && $objAluno->uf == 'RO' ? 'selected' : ''); ?>>Rond&ocirc;nia</option>
	            <option value="RR" <?php echo ($objAluno && $objAluno->uf == 'RR' ? 'selected' : ''); ?>>Roraima</option>
	            <option value="SC" <?php echo ($objAluno && $objAluno->uf == 'SC' ? 'selected' : ''); ?>>Santa Catarina</option>
	            <option value="SP" <?php echo ($objAluno && $objAluno->uf == 'SP' ? 'selected' : ''); ?>>S&atilde;o Paulo</option>
	            <option value="SE" <?php echo ($objAluno && $objAluno->uf == 'SE' ? 'selected' : ''); ?>>Sergipe</option>
	            <option value="TO" <?php echo ($objAluno && $objAluno->uf == 'TO' ? 'selected' : ''); ?>>Tocantins</option>
	        </select>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="cep">C.E.P.:</label>
        <div class="controls">
        	<input type="text" id="cep" name="cep" class="input-small" title="#####-###" maxlength="9" value="<?php echo ($objAluno && $objAluno->cep != '' ? $objAluno->CEP : ''); ?>" />&nbsp;<span class="help-inline">9999-999</span>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="telefoneFixo">Telefone Fixo:</label>
        <div class="controls">
        	<input type="text" id="telefoneFixo" name="telefoneFixo" class="input-medium" title="(##) ####-####" maxlength="14" value="<?php echo ($objAluno && $objAluno->foneResidencial != '' ? $objAluno->foneResidencial : ''); ?>" />&nbsp;<span class="help-inline">(99) 9999-9999</span>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="telefoneCelular">Telefone Celular:</label>
        <div class="controls">
        	<input type="text" id="telefoneCelular" name="telefoneCelular" class="input-medium" title="(##) ####-####" maxlength="14" value="<?php echo ($objAluno && $objAluno->foneCelular != '' ? $objAluno->foneCelular : ''); ?>" />&nbsp;<span class="help-inline">(99) 9999-9999</span>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="email">E-mail:</label>
        <div class="controls">
        	<input type="text" id="email" name="email" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->eMail != '' ? $objAluno->eMail : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataNascimento">Data de Nascimento:</label>
        <div class="controls">
            <div class="input-append date" id="dataNascimento" data-date="<?php echo ($objAluno && $objAluno->dataNascimento != '' ? $objAluno->dataNascimento : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataNascimento" type="text" value="<?php echo ($objAluno && $objAluno->dataNascimento != '' ? $objAluno->dataNascimento : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataNascimento" name="dataNascimento" class="input-small" maxlength="10" value="" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="cidadeNascimento">Natural de:</label>
        <div class="controls">
        	<input type="text" id="cidadeNascimento" name="cidadeNascimento" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->naturalidade != '' ? utf8_decode($objAluno->naturalidade) : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="ufNascimento">UF de Naturalidade:</label>
        <div class="controls">
	        <select name="ufNascimento" id="ufNascimento" class="span2">
	            <option value="0">[Selecionar]</option>
	            <option value="AC" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'AC' ? 'selected' : ''); ?>>Acre</option>
	            <option value="AL" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'AL' ? 'selected' : ''); ?>>Alagoas</option>
	            <option value="AP" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'AP' ? 'selected' : ''); ?>>Amap&aacute;</option>
	            <option value="AM" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'AM' ? 'selected' : ''); ?>>Amazonas</option>
	            <option value="BA" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'BA' ? 'selected' : ''); ?>>Bahia</option>
	            <option value="CE" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'CE' ? 'selected' : ''); ?>>Cear&aacute;</option>
	            <option value="DF" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'DF' ? 'selected' : ''); ?>>Distrito Federal</option>
	            <option value="ES" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'ES' ? 'selected' : ''); ?>>Espirito Santo</option>
	            <option value="GO" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'GO' ? 'selected' : ''); ?>>Goi&aacute;s</option>
	            <option value="MA" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'MA' ? 'selected' : ''); ?>>Maranh&atilde;o</option>
	            <option value="MS" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'MS' ? 'selected' : ''); ?>>Mato Grosso do Sul</option>
	            <option value="MT" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'MT' ? 'selected' : ''); ?>>Mato Grosso</option>
	            <option value="MG" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'MG' ? 'selected' : ''); ?>>Minas Gerais</option>
	            <option value="PA" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'PA' ? 'selected' : ''); ?>>Par&aacute;</option>
	            <option value="PB" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'PB' ? 'selected' : ''); ?>>Para&iacute;ba</option>
	            <option value="PR" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'PR' ? 'selected' : ''); ?>>Paran&aacute;</option>
	            <option value="PE" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'PE' ? 'selected' : ''); ?>>Pernambuco</option>
	            <option value="PI" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'PI' ? 'selected' : ''); ?>>Piau&iacute;</option>
	            <option value="RJ" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'RJ' ? 'selected' : ''); ?>>Rio de Janeiro</option>
	            <option value="RN" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'RN' ? 'selected' : ''); ?>>Rio Grande do Norte</option>
	            <option value="RS" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'RS' ? 'selected' : ''); ?>>Rio Grande do Sul</option>
	            <option value="RO" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'RO' ? 'selected' : ''); ?>>Rond&ocirc;nia</option>
	            <option value="RR" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'RR' ? 'selected' : ''); ?>>Roraima</option>
	            <option value="SC" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'SC' ? 'selected' : ''); ?>>Santa Catarina</option>
	            <option value="SP" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'SP' ? 'selected' : ''); ?>>S&atilde;o Paulo</option>
	            <option value="SE" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'SE' ? 'selected' : ''); ?>>Sergipe</option>
	            <option value="TO" <?php echo ($objAluno && $objAluno->ufNaturalidade == 'TO' ? 'selected' : ''); ?>>Tocantins</option>
	        </select>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="estadoCivil">Estado Civil:</label>
        <div class="controls">
        	<input type="text" id="estadoCivil" name="estadoCivil" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->estadoCivil != '' ? $objAluno->estadoCivil : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="rg">RG:</label>
        <div class="controls">
        	<input type="text" id="rg" name="rg" class="input-small" value="<?php echo ($objAluno && $objAluno->rg != '' ? $objAluno->rg : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="orgaoExpedidor">Org&atilde;o Expedidor:</label>
        <div class="controls">
        	<input type="text" id="orgaoExpedidor" name="orgaoExpedidor" class="input-small" value="<?php echo ($objAluno && $objAluno->orgaoExpedidor != '' ? $objAluno->orgaoExpedidor : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataExpedicaoRg">Data de Expedi&ccedil;&atilde;o do RG:</label>
        <div class="controls">
            <div class="input-append date" id="dataExpedicaoRg" data-date="<?php echo ($objAluno && $objAluno->dataExpedicaoRg != '' ? $objAluno->dataExpedicaoRg : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataExpedicaoRg" type="text" value="<?php echo ($objAluno && $objAluno->dataExpedicaoRg != '' ? $objAluno->dataExpedicaoRg : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataExpedicaoRg" name="dataExpedicaoRg" class="input-small" value="<?php echo ($objAluno && $objAluno->dataExpedicaoRg != '' ? Util::formataData($objAluno->dataExpedicaoRg,'-','/') : ''); ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="">C.P.F.:</label>
        <div class="controls">
        	<strong><?php echo $objAluno->cpf; ?></strong>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="carteiraReservista">Carteira de Reservista:</label>
        <div class="controls">
        	<input type="text" id="carteiraReservista" name="carteiraReservista" class="input-medium" value="<?php echo ($objAluno && $objAluno->carteiraReservista != '' ? $objAluno->carteiraReservista : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="numeroPisPasep">N&uacute;mero do PIS-PASEP:</label>
        <div class="controls">
        <input type="text" id="numeroPisPasep" name="numeroPisPasep" class="input-medium" value="<?php echo ($objAluno && $objAluno->numeroPisPasep != '' ? $objAluno->numeroPisPasep : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataPisPasep">Data de Cadastro do PIS-PASEP:</label>
        <div class="controls">
            <div class="input-append date" id="dataPisPasep" data-date="<?php echo ($objAluno && $objAluno->dataPisPasep != '' ? $objAluno->dataPisPasep : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataPisPasep" type="text" value="<?php echo ($objAluno && $objAluno->dataPisPasep != '' ? $objAluno->dataPisPasep : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataPisPasep" name="dataPisPasep" class="input-small" maxlength="10" value="<?php echo ($objAluno && $objAluno->dataPisPasep != '' ? Util::formataData($objAluno->dataPisPasep,'-','/') : ''); ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="numeroTituloEleitor">N&uacute;mero do T&iacute;tulo de Eleitor:</label>
        <div class="controls">
        	<input type="text" id="numeroTituloEleitor" name="numeroTituloEleitor" class="input-medium" value="<?php echo ($objAluno && $objAluno->numeroTituloEleitor != '' ? $objAluno->numeroTituloEleitor : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="zona">Zona:</label>
        <div class="controls">
        	<input type="text" id="zona" name="zona" class="input-small" value="<?php echo ($objAluno && $objAluno->zona != '' ? $objAluno->zona : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="secao">Se&ccedil;&atilde;o:</label>
        <div class="controls">
        	<input type="text" id="secao" name="secao" class="input-small" value="<?php echo ($objAluno && $objAluno->secao != '' ? $objAluno->secao : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="numeroHabilitacao">Habilita&ccedil;&atilde;o:</label>
        <div class="controls">
        	<input type="text" id="numeroHabilitacao" name="numeroHabilitacao" class="input-medium" value="<?php echo ($objAluno && $objAluno->numeroHabilitacao != '' ? $objAluno->numeroHabilitacao : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="categoria">Categoria:</label>
        <div class="controls">
        	<input type="text" id="categoria" name="categoria" class="input-small" value="<?php echo ($objAluno && $objAluno->categoria != '' ? $objAluno->categoria : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="vencimentoHabilitacao">Vencimento:</label>
        <div class="controls">
            <div class="input-append date" id="vencimentoHabilitacao" data-date="<?php echo ($objAluno && $objAluno->vencimentoHabilitacao != '' ? $objAluno->vencimentoHabilitacao : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="vencimentoHabilitacao" type="text" value="<?php echo ($objAluno && $objAluno->vencimentoHabilitacao != '' ? $objAluno->vencimentoHabilitacao : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="vencimentoHabilitacao" name="vencimentoHabilitacao" maxlength="10" class="input-small" value="<?php echo ($objAluno && $objAluno->vencimentoHabilitacao != '' ? Util::formataData($objAluno->vencimentoHabilitacao,'-','/') : ''); ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="areaInteresse">&Aacute;rea de Interesse:</label>
        <div class="controls">
        	<textarea id="areaInteresse" name="areaInteresse" rows="5" class=""><?php echo ($objAluno && $objAluno->areaInteresse != '' ? utf8_decode($objAluno->areaInteresse) : ''); ?></textarea>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="objetivoProfissional">Objetivo Profissional:</label>
        <div class="controls">
        	<textarea id="objetivoProfissional" name="objetivoProfissional" rows="5" class=""><?php echo ($objAluno && $objAluno->objetivoProfissional != '' ? utf8_decode($objAluno->objetivoProfissional) : ''); ?></textarea>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="disponibilidadeHorario">Disponibilidade de Hor&aacute;rio:</label>
        <div class="controls">
	        <select id="disponibilidadeHorario" name="disponibilidadeHorario" class="span2">
	            <option value="">[Selecionar]</option>
	            <option value="M" <?php echo ($objAluno && $objAluno->disponibilidadeHorario == 'M' ? 'selected' : ''); ?>>Manh&atilde;</option>
	            <option value="T" <?php echo ($objAluno && $objAluno->disponibilidadeHorario == 'T' ? 'selected' : ''); ?>>Tarde</option>
	            <option value="N" <?php echo ($objAluno && $objAluno->disponibilidadeHorario == 'N' ? 'selected' : ''); ?>>Noite</option>
	            <option value="I" <?php echo ($objAluno && $objAluno->disponibilidadeHorario == 'I' ? 'selected' : ''); ?>>Integral</option>
			</select>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="msn">MSN:</label>
        <div class="controls">
        	<input type="text" id="msn" name="msn" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->msn != '' ? $objAluno->msn : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="twitter">Twitter:</label>
        <div class="controls">
        	<input type="text" id="twitter" name="twitter" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->twitter != '' ? $objAluno->twitter : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="facebook">Facebook:</label>
        <div class="controls">
        	<input type="text" id="facebook" name="facebook" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->facebook != '' ? $objAluno->facebook : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <h3>Formação Profissional</h3>
    </div>

    <div class="control-group">
        <label class="control-label" for="instituicao">Instituição:</label>
        <div class="controls">
            <input type="text" id="instituicao" name="instituicao" class="input-xxlarge" value="<?php echo ($objAluno && $objAluno->instituicao != '' ? $objAluno->instituicao : ''); ?>" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="cursoGraduacao">Curso:</label>
        <div class="controls">
            <input type="text" id="cursoGraduacao" name="cursoGraduacao" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->cursoGraduacao != '' ? $objAluno->cursoGraduacao : ''); ?>" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="anoConclusao">Ana de conclusão:</label>
        <div class="controls">
            <input type="text" id="anoConclusao" name="anoConclusao" class="input-mini" value="<?php echo ($objAluno && $objAluno->anoConclusao != '' ? $objAluno->anoConclusao : ''); ?>" />
        </div>
    </div>

    <div class="control-group">
        <h3>Experiência Profissional</h3>
    </div>

    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <strong>Ultima empresa</strong>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="nomeEmpresa_1">Nome da empresa:</label>
        <div class="controls">
        	<input type="text" id="nomeEmpresa_1" name="nomeEmpresa_1" class="input-xxlarge" value="<?php echo ($objAluno && $objAluno->nomeEmpresa_1 != '' ? utf8_decode($objAluno->nomeEmpresa_1) : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="atividadeEmpresa_1">Atividade da empresa:</label>
        <div class="controls">
        	<textarea id="atividadeEmpresa_1" name="atividadeEmpresa_1" class=""><?php echo ($objAluno && $objAluno->ATIVIDADE_EMPRESA_1 != '' ? utf8_decode($objAluno->ATIVIDADE_EMPRESA_1) : ''); ?></textarea>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataAdmissao_1">Data de admissão:</label>
        <div class="controls">
            <div class="input-append date" id="dataAdmissao_1" data-date="<?php echo ($objAluno && $objAluno->dataAdmissao_1 != '' ? $objAluno->dataAdmissao_1 : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataAdmissao_1" type="text" value="<?php echo ($objAluno && $objAluno->dataAdmissao_1 != '' ? $objAluno->dataAdmissao_1 : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataAdmissao_1" name="dataAdmissao_1" class="input-small" maxlength="10" value="<?php echo ($objAluno && $objAluno->DATA_ADMISSAO_1 != '' ? Util::formataData($objAluno->DATA_DEMISSAO_1,'-','/') : ''); ?>" /> <img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataDemissao_1">Data de demissão:</label>
        <div class="controls">
            <div class="input-append date" id="dataDemissao_1" data-date="<?php echo ($objAluno && $objAluno->dataDemissao_1 != '' ? $objAluno->dataDemissao_1 : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataDemissao_1" type="text" value="<?php echo ($objAluno && $objAluno->dataDemissao_1 != '' ? $objAluno->dataDemissao_1 : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataDemissao_1" name="dataDemissao_1" class="input-small" maxlength="10" value="<?php echo ($objAluno && $objAluno->DATA_DEMISSAO_1 != '' ? Util::formataData($objAluno->DATA_DEMISSAO_1,'-','/') : ''); ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="funcaoExercida_1">Função exercida:</label>
        <div class="controls">
        	<input type="text" id="funcaoExercida_1" name="funcaoExercida_1" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->FUNCAO_EXERCIDA_1 != '' ? utf8_decode($objAluno->FUNCAO_EXERCIDA_1) : ''); ?>" />
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="atividadeExercida_1">Atividades exercida:</label>
        <div class="controls">
        	<textarea id="atividadeExercida_1" name="atividadeExercida_1" rows="5" class=""><?php echo ($objAluno && $objAluno->ATIVIDADE_EXERCIDA_1 != '' ? utf8_decode($objAluno->ATIVIDADE_EXERCIDA_1) : ''); ?></textarea>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="salario_1">Último salário:</label>
        <div class="controls">
        	<input type="text" id="salario_1" name="salario_1" class="input-small" value="<?php echo ($objAluno && $objAluno->SALARIO_1 != '' ? number_format($objAluno->SALARIO_1,2,',','.') : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <strong>Penúltima empresa</strong>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="nomeEmpresa_2">Nome da empresa:</label>
        <div class="controls">
        	<input type="text" id="nomeEmpresa_2" name="nomeEmpresa_2" class="input-xxlarge" value="<?php echo ($objAluno && $objAluno->NOME_EMPRESA_2 != '' ? utf8_decode($objAluno->NOME_EMPRESA_2) : ''); ?>" />
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="atividadeEmpresa_2">Atividade da empresa:</label>
        <div class="controls">
        	<textarea id="atividadeEmpresa_2" name="atividadeEmpresa_2" rows="5" class=""><?php echo ($objAluno && $objAluno->ATIVIDADE_EMPRESA_2 != '' ? utf8_decode($objAluno->ATIVIDADE_EMPRESA_2) : ''); ?></textarea>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataAdmissao_2">Data de admissão:</label>
        <div class="controls">
            <div class="input-append date" id="dataAdmissao_2" data-date="<?php echo ($objAluno && $objAluno->dataAdmissao_2 != '' ? $objAluno->dataAdmissao_2 : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataAdmissao_2" type="text" value="<?php echo ($objAluno && $objAluno->dataAdmissao_2 != '' ? $objAluno->dataAdmissao_2 : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataAdmissao_2" name="dataAdmissao_2" class="input-small" maxlength="10" value="<?php echo ($objAluno && $objAluno->DATA_ADMISSAO_2 != '' ? Util::formataData($objAluno->DATA_DEMISSAO_2,'-','/') : ''); ?>" /> <img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataDemissao_2">Data de demissão:</label>
        <div class="controls">
            <div class="input-append date" id="dataDemissao_2" data-date="<?php echo ($objAluno && $objAluno->dataDemissao_2 != '' ? $objAluno->dataDemissao_2 : ''); ?>" data-date-format="dd/mm/yyyy">
                <input class="input-medium" name="dataDemissao_2" type="text" value="<?php echo ($objAluno && $objAluno->dataDemissao_2 != '' ? $objAluno->dataDemissao_2 : ''); ?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span>
                <!-- <input type="text" id="dataDemissao_2" name="dataDemissao_2" class="input-small" maxlength="10" value="<?php echo ($objAluno && $objAluno->DATA_DEMISSAO_2 != '' ? Util::formataData($objAluno->DATA_DEMISSAO_2,'-','/') : ''); ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"> -->
            </div>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="funcaoExercida_2">Função exercida:</label>
        <div class="controls">
        	<input type="text" id="funcaoExercida_2" name="funcaoExercida_2" class="input-xlarge" value="<?php echo ($objAluno && $objAluno->FUNCAO_EXERCIDA_2 != '' ? utf8_decode($objAluno->FUNCAO_EXERCIDA_2) : ''); ?>" />
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="atividadeExercida_2">Atividades exercida:</label>
        <div class="controls">
        	<textarea id="atividadeExercida_2" name="atividadeExercida_2" rows="5" class=""><?php echo ($objAluno && $objAluno->ATIVIDADE_EXERCIDA_2 != '' ? utf8_decode($objAluno->ATIVIDADE_EXERCIDA_2) : ''); ?></textarea>
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="salario_2">Último salário:</label>
        <div class="controls">
        	<input type="text" id="salario_2" name="salario_2" class="input-small" value="<?php echo ($objAluno && $objAluno->SALARIO_2 != '' ? number_format($objAluno->SALARIO_2,2,',','.') : ''); ?>" />
        </div>
    </div>

    <div class="form-actions">
        <button type="button" id="btnGravarCurriculo" class="btn btn-large btn-primary">Atualizar Currículo</button>
        <button type="button" class="btn btn-large">Cancelar</button>
    </div>

<!--     <div class="control-group">
        <label class="control-label" for="">&nbsp;</label>
        <div class="controls">
            <button type="button" id="btnGravarCurriculo" class="btn btn-primary">Atualizar Currículo</button>
        </div>
    </div>
 -->
</form>