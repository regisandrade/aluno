<?php
// Criando uma conexão com o bd Banco de oportunidade
//require_once "../lib/myDB.class.php";
$param['sistema'] = 'bcoOportunidade';
$pdoBco = new myDB($param);
$bdBcoOportunidade = $pdoBco->getInstance($param);
unset($param);

$alunoDAO = new Aluno();
$param['idNumero'] = $_SESSION['idNumero'];
$objAluno = $alunoDAO->pesquisar($bdBcoOportunidade,$param);
unset($param);

if(is_array($objAluno)){
    $objAluno = current($objAluno);
}
// Convertendo o array em objeto
$objAluno = (object) $objAluno;

?>
<h2>Atualizar seu curr&iacute;culo</h2>

<form name="formCurriculo" id="formCurriculo" class="form-horizontal" method="POST" action="">
<input type="hidden" name="ID_CURRICULO" value="<?php echo ($registroCurriculo && $registroCurriculo->ID != '' ? $registroCurriculo->ID : ''); ?>" />
<input type="hidden" name="tipoAcao" id="tipoAcao" value="<?php echo ($registroCurriculo && $registroCurriculo->ID != '' ? '2' : '1'); ?>"/>
<input type="hidden" name="cpf" value="<?php echo $_SESSION['id_numero']; ?>" />
<input type="hidden" name="idAluno" value="<?php echo ($registroCurriculo && $registroCurriculo->CPF != '' ? str_replace('.','',str_replace('-','',$registroCurriculo->CPF)) : str_replace('.','',str_replace('-','',$registroAluno->CPF))); ?>" />

    <div class="control-group">
        <label class="control-label" for="">Nome:</label>
		<div class="controls">
			<input type="text" id="nome" name="nome" class="input-xxlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->NOME != '') ? utf8_decode($registroCurriculo->NOME) : ($registroAluno && $registroAluno->Nome != '' ? utf8_decode($registroAluno->Nome) : ''); ?>" />
		</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="sexo">Sexo:</label>
        <div class="controls">
        	<select id="sexo" name="sexo" class="span2">
                <option value="">[Selecionar]</option>
                <option value="F" <?php echo ($registroCurriculo && $registroCurriculo->SEXO == 'F' ? 'selected' : ($registroAluno && $registroAluno->Sexo == 'F' ? 'selected' : '')); ?>>Feminino</option>
                <option value="M" <?php echo ($registroCurriculo && $registroCurriculo->SEXO == 'M' ? 'selected' : ($registroAluno && $registroAluno->Sexo == 'M' ? 'selected' : '')); ?>>Masculino</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="endereco">Endere&ccedil;o:</label>
        <div class="controls">
        	<textarea id="endereco" name="endereco" rows="5" class=""><?php echo ($registroCurriculo && $registroCurriculo->ENDERECO != '') ? utf8_decode($registroCurriculo->ENDERECO) : ($registroAluno && $registroAluno->Endereco != '' ? utf8_decode($registroAluno->Endereco) : ''); ?></textarea></td>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="bairro">Bairro:</label>
        <div class="controls">
        	<input type="text" id="bairro" name="bairro" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->BAIRRO != '') ? utf8_decode($registroCurriculo->BAIRRO) : ($registroAluno && $registroAluno->Bairro != '' ? utf8_decode($registroAluno->Bairro) : ''); ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="cidade">Cidade:</label>
        <div class="controls">
        	<input type="text" id="cidade" name="cidade" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->CIDADE != '') ? utf8_decode($registroCurriculo->CIDADE) : ($registroAluno && $registroAluno->Cidade != '' ? utf8_decode($registroAluno->Cidade) : ''); ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="uf">UF:</label>
        <div class="controls">
	        <select name="uf" id="uf" class="span2">
	            <option value="0">[Selecionar]</option>
	            <option value="AC" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'AC' ? 'selected' : ($registroAluno && $registroAluno->UF == 'AC' ? 'selected' : '')); ?>>Acre</option>
	            <option value="AL" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'AL' ? 'selected' : ($registroAluno && $registroAluno->UF == 'AL' ? 'selected' : '')); ?>>Alagoas</option>
	            <option value="AP" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'AP' ? 'selected' : ($registroAluno && $registroAluno->UF == 'AP' ? 'selected' : '')); ?>>Amap&aacute;</option>
	            <option value="AM" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'AM' ? 'selected' : ($registroAluno && $registroAluno->UF == 'AM' ? 'selected' : '')); ?>>Amazonas</option>
	            <option value="BA" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'BA' ? 'selected' : ($registroAluno && $registroAluno->UF == 'BA' ? 'selected' : '')); ?>>Bahia</option>
	            <option value="CE" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'CE' ? 'selected' : ($registroAluno && $registroAluno->UF == 'CE' ? 'selected' : '')); ?>>Cear&aacute;</option>
	            <option value="DF" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'DF' ? 'selected' : ($registroAluno && $registroAluno->UF == 'DF' ? 'selected' : '')); ?>>Distrito Federal</option>
	            <option value="ES" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'ES' ? 'selected' : ($registroAluno && $registroAluno->UF == 'ES' ? 'selected' : '')); ?>>Espirito Santo</option>
	            <option value="GO" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'GO' ? 'selected' : ($registroAluno && $registroAluno->UF == 'GO' ? 'selected' : '')); ?>>Goi&aacute;s</option>
	            <option value="MA" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'MA' ? 'selected' : ($registroAluno && $registroAluno->UF == 'MA' ? 'selected' : '')); ?>>Maranh&atilde;o</option>
	            <option value="MS" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'MS' ? 'selected' : ($registroAluno && $registroAluno->UF == 'MS' ? 'selected' : '')); ?>>Mato Grosso do Sul</option>
	            <option value="MT" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'MT' ? 'selected' : ($registroAluno && $registroAluno->UF == 'MT' ? 'selected' : '')); ?>>Mato Grosso</option>
	            <option value="MG" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'MG' ? 'selected' : ($registroAluno && $registroAluno->UF == 'MG' ? 'selected' : '')); ?>>Minas Gerais</option>
	            <option value="PA" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'PA' ? 'selected' : ($registroAluno && $registroAluno->UF == 'PA' ? 'selected' : '')); ?>>Par&aacute;</option>
	            <option value="PB" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'PB' ? 'selected' : ($registroAluno && $registroAluno->UF == 'PB' ? 'selected' : '')); ?>>Para&iacute;ba</option>
	            <option value="PR" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'PR' ? 'selected' : ($registroAluno && $registroAluno->UF == 'PR' ? 'selected' : '')); ?>>Paran&aacute;</option>
	            <option value="PE" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'PE' ? 'selected' : ($registroAluno && $registroAluno->UF == 'PE' ? 'selected' : '')); ?>>Pernambuco</option>
	            <option value="PI" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'PI' ? 'selected' : ($registroAluno && $registroAluno->UF == 'PI' ? 'selected' : '')); ?>>Piau&iacute;</option>
	            <option value="RJ" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'RJ' ? 'selected' : ($registroAluno && $registroAluno->UF == 'RJ' ? 'selected' : '')); ?>>Rio de Janeiro</option>
	            <option value="RN" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'RN' ? 'selected' : ($registroAluno && $registroAluno->UF == 'RN' ? 'selected' : '')); ?>>Rio Grande do Norte</option>
	            <option value="RS" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'RS' ? 'selected' : ($registroAluno && $registroAluno->UF == 'RS' ? 'selected' : '')); ?>>Rio Grande do Sul</option>
	            <option value="RO" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'RO' ? 'selected' : ($registroAluno && $registroAluno->UF == 'RO' ? 'selected' : '')); ?>>Rond&ocirc;nia</option>
	            <option value="RR" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'RR' ? 'selected' : ($registroAluno && $registroAluno->UF == 'RR' ? 'selected' : '')); ?>>Roraima</option>
	            <option value="SC" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'SC' ? 'selected' : ($registroAluno && $registroAluno->UF == 'SC' ? 'selected' : '')); ?>>Santa Catarina</option>
	            <option value="SP" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'SP' ? 'selected' : ($registroAluno && $registroAluno->UF == 'SP' ? 'selected' : '')); ?>>S&atilde;o Paulo</option>
	            <option value="SE" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'SE' ? 'selected' : ($registroAluno && $registroAluno->UF == 'SE' ? 'selected' : '')); ?>>Sergipe</option>
	            <option value="TO" <?php echo ($registroCurriculo && $registroCurriculo->UF == 'TO' ? 'selected' : ($registroAluno && $registroAluno->UF == 'TO' ? 'selected' : '')); ?>>Tocantins</option>
	        </select>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="cep">C.E.P.:</label>
        <div class="controls">
        	<input type="text" id="cep" name="cep" class="input-small" title="#####-###" maxlength="9" value="<?php echo ($registroCurriculo && $registroCurriculo->CEP != '') ? $registroCurriculo->CEP : ($registroAluno && $registroAluno->CEP !== '' ? $registroAluno->CEP : ''); ?>" />&nbsp;<span class="help-inline">9999-999</span></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="telefoneFixo">Telefone Fixo:</label>
        <div class="controls">
        	<input type="text" id="telefoneFixo" name="telefoneFixo" class="input-medium" title="(##) ####-####" maxlength="14" value="<?php echo ($registroCurriculo && $registroCurriculo->TELEFONE_FIXO != '') ? $registroCurriculo->TELEFONE_FIXO : ($registroAluno && $registroAluno->Fone_Residencial !== '' ? $registroAluno->Fone_Residencial : ''); ?>" />&nbsp;<span class="help-inline">(99) 9999-9999</span></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="telefoneCelular">Telefone Celular:</label>
        <div class="controls">
        	<input type="text" id="telefoneCelular" name="telefoneCelular" class="input-medium" title="(##) ####-####" maxlength="14" value="<?php echo ($registroCurriculo && $registroCurriculo->TELEFONE_CELULAR != '') ? $registroCurriculo->TELEFONE_CELULAR : ($registroAluno && $registroAluno->Celular !== '' ? $registroAluno->Celular : ''); ?>" />&nbsp;<span class="help-inline">(99) 9999-9999</span></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="email">E-mail:</label>
        <div class="controls">
        	<input type="text" id="email" name="email" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->EMAIL != '') ? $registroCurriculo->EMAIL : ($registroAluno && $registroAluno->e_Mail !== '' ? $registroAluno->e_Mail : ''); ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataNascimento">Data de Nascimento:</label>
        <div class="controls">
        	<input type="text" id="dataNascimento" name="dataNascimento" class="input-small" maxlength="10" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_NASCIMENTO != '') ? Util::formataData($registroCurriculo->DATA_NASCIMENTO, '-', '/') : ($registroAluno && $registroAluno->Data_Nascimento !== '' ? Util::formataData($registroAluno->Data_Nascimento, '-', '/') : ''); ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="cidadeNascimento">Cidade de Nascimento:</label>
        <div class="controls">
        	<input type="text" id="cidadeNascimento" name="cidadeNascimento" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->CIDADE_NASCIMENTO != '') ? utf8_decode($registroCurriculo->CIDADE_NASCIMENTO) : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="ufNascimento">UF de Nascimento:</label>
        <div class="controls">
	        <select name="ufNascimento" id="ufNascimento" class="span2">
	            <option value="0">[Selecionar]</option>
	            <option value="AC" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'AC' ? 'selected' : ''); ?>>Acre</option>
	            <option value="AL" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'AL' ? 'selected' : ''); ?>>Alagoas</option>
	            <option value="AP" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'AP' ? 'selected' : ''); ?>>Amap&aacute;</option>
	            <option value="AM" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'AM' ? 'selected' : ''); ?>>Amazonas</option>
	            <option value="BA" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'BA' ? 'selected' : ''); ?>>Bahia</option>
	            <option value="CE" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'CE' ? 'selected' : ''); ?>>Cear&aacute;</option>
	            <option value="DF" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'DF' ? 'selected' : ''); ?>>Distrito Federal</option>
	            <option value="ES" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'ES' ? 'selected' : ''); ?>>Espirito Santo</option>
	            <option value="GO" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'GO' ? 'selected' : ''); ?>>Goi&aacute;s</option>
	            <option value="MA" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'MA' ? 'selected' : ''); ?>>Maranh&atilde;o</option>
	            <option value="MS" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'MS' ? 'selected' : ''); ?>>Mato Grosso do Sul</option>
	            <option value="MT" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'MT' ? 'selected' : ''); ?>>Mato Grosso</option>
	            <option value="MG" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'MG' ? 'selected' : ''); ?>>Minas Gerais</option>
	            <option value="PA" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'PA' ? 'selected' : ''); ?>>Par&aacute;</option>
	            <option value="PB" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'PB' ? 'selected' : ''); ?>>Para&iacute;ba</option>
	            <option value="PR" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'PR' ? 'selected' : ''); ?>>Paran&aacute;</option>
	            <option value="PE" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'PE' ? 'selected' : ''); ?>>Pernambuco</option>
	            <option value="PI" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'PI' ? 'selected' : ''); ?>>Piau&iacute;</option>
	            <option value="RJ" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'RJ' ? 'selected' : ''); ?>>Rio de Janeiro</option>
	            <option value="RN" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'RN' ? 'selected' : ''); ?>>Rio Grande do Norte</option>
	            <option value="RS" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'RS' ? 'selected' : ''); ?>>Rio Grande do Sul</option>
	            <option value="RO" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'RO' ? 'selected' : ''); ?>>Rond&ocirc;nia</option>
	            <option value="RR" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'RR' ? 'selected' : ''); ?>>Roraima</option>
	            <option value="SC" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'SC' ? 'selected' : ''); ?>>Santa Catarina</option>
	            <option value="SP" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'SP' ? 'selected' : ''); ?>>S&atilde;o Paulo</option>
	            <option value="SE" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'SE' ? 'selected' : ''); ?>>Sergipe</option>
	            <option value="TO" <?php echo ($registroCurriculo && $registroCurriculo->UF_NASCIMENTO == 'TO' ? 'selected' : ''); ?>>Tocantins</option>
	        </select>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="estadoCivil">Estado Civil:</label>
        <div class="controls">
        	<input type="text" id="estadoCivil" name="estadoCivil" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->ESTADO_CIVIL != '') ? $registroCurriculo->ESTADO_CIVIL : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="rg">RG:</label>
        <div class="controls">
        	<input type="text" id="rg" name="rg" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->RG != '') ? $registroCurriculo->RG : ($registroAluno && $registroAluno->RG !== '' ? $registroAluno->RG : ''); ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="orgaoExpedidor">Org&atilde;o Expedidor:</label>
        <div class="controls">
        	<input type="text" id="orgaoExpedidor" name="orgaoExpedidor" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->ORGAO_EXPEDIDOR != '') ? $registroCurriculo->ORGAO_EXPEDIDOR : ($registroAluno && $registroAluno->Orgao !== '' ? $registroAluno->Orgao : ''); ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataExpedicaoRg">Data de Expedi&ccedil;&atilde;o do RG:</label>
        <div class="controls">
        	<input type="text" id="dataExpedicaoRg" name="dataExpedicaoRg" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_EXPEDICAO_RG != '') ? Util::formataData($registroCurriculo->DATA_EXPEDICAO_RG,'-','/') : ''; ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="">C.P.F.:</label>
        <div class="controls">
        	<strong><?php echo $_SESSION['id_numero']; ?></strong></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="carteiraReservista">Carteira de Reservista:</label>
        <div class="controls">
        	<input type="text" id="carteiraReservista" name="carteiraReservista" class="input-medium" value="<?php echo ($registroCurriculo && $registroCurriculo->CARTEIRA_RESERVISTA != '') ? $registroCurriculo->CARTEIRA_RESERVISTA : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="numeroPisPasep">N&uacute;mero do PIS-PASEP:</label>
        <div class="controls">
        <input type="text" id="numeroPisPasep" name="numeroPisPasep" class="input-medium" value="<?php echo ($registroCurriculo && $registroCurriculo->PIS_PASEP != '') ? $registroCurriculo->PIS_PASEP : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataPisPasep">Data de Cadastro do PIS-PASEP:</label>
        <div class="controls">
        	<input type="text" id="dataPisPasep" name="dataPisPasep" class="input-small" maxlength="10" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_CADASTRO_PIS_PASEP != '') ? Util::formataData($registroCurriculo->DATA_CADASTRO_PIS_PASEP,'-','/') : ''; ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="numeroTituloEleitor">N&uacute;mero do T&iacute;tulo de Eleitor:</label>
        <div class="controls">
        	<input type="text" id="numeroTituloEleitor" name="numeroTituloEleitor" class="input-medium" value="<?php echo ($registroCurriculo && $registroCurriculo->TITULO_ELEITOR != '') ? $registroCurriculo->TITULO_ELEITOR : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="zona">Zona:</label>
        <div class="controls">
        	<input type="text" id="zona" name="zona" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->ZONA != '') ? $registroCurriculo->ZONA : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="secao">Se&ccedil;&atilde;o:</label>
        <div class="controls">
        	<input type="text" id="secao" name="secao" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->SECAO != '') ? $registroCurriculo->SECAO : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="numeroHabilitacao">Habilita&ccedil;&atilde;o:</label>
        <div class="controls">
        	<input type="text" id="numeroHabilitacao" name="numeroHabilitacao" class="input-medium" value="<?php echo ($registroCurriculo && $registroCurriculo->HABILITACAO != '') ? $registroCurriculo->HABILITACAO : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="categoria">Categoria:</label>
        <div class="controls">
        	<input type="text" id="categoria" name="categoria" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->CATEGORIA != '') ? $registroCurriculo->CATEGORIA : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="vencimentoHabilitacao">Vencimento:</label>
        <div class="controls">
        	<input type="text" id="vencimentoHabilitacao" name="vencimentoHabilitacao" maxlength="10" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->VALIDADE != '') ? Util::formataData($registroCurriculo->VALIDADE,'-','/') : ''; ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="areaInteresse">&Aacute;rea de Interesse:</label>
        <div class="controls">
        	<textarea id="areaInteresse" name="areaInteresse" rows="5" class=""><?php echo ($registroCurriculo && $registroCurriculo->AREA_INTERESSE != '') ? utf8_decode($registroCurriculo->AREA_INTERESSE) : ''; ?></textarea></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="objetivoProfissional">Objetivo Profissional:</label>
        <div class="controls">
        	<textarea id="objetivoProfissional" name="objetivoProfissional" rows="5" class=""><?php echo ($registroCurriculo && $registroCurriculo->OBJETIVO_PROFISSIONAL != '') ? utf8_decode($registroCurriculo->OBJETIVO_PROFISSIONAL) : ''; ?></textarea></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="disponibilidadeHorario">Disponibilidade de Hor&aacute;rio:</label>
        <div class="controls">
	        <select id="disponibilidadeHorario" name="disponibilidadeHorario" class="span2">
	            <option value="">[Selecionar]</option>
	            <option value="M" <?php echo ($registroCurriculo && $registroCurriculo->DISPONIBILIDADE_HORARIO == 'M' ? 'selected' : ''); ?>>Manh&atilde;</option>
	            <option value="T" <?php echo ($registroCurriculo && $registroCurriculo->DISPONIBILIDADE_HORARIO == 'T' ? 'selected' : ''); ?>>Tarde</option>
	            <option value="N" <?php echo ($registroCurriculo && $registroCurriculo->DISPONIBILIDADE_HORARIO == 'N' ? 'selected' : ''); ?>>Noite</option>
	            <option value="I" <?php echo ($registroCurriculo && $registroCurriculo->DISPONIBILIDADE_HORARIO == 'I' ? 'selected' : ''); ?>>Integral</option>
			</select>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="msn">MSN:</label>
        <div class="controls">
        	<input type="text" id="msn" name="msn" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->MSN != '') ? $registroCurriculo->MSN : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="twitter">Twitter:</label>
        <div class="controls">
        	<input type="text" id="twitter" name="twitter" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->TWITTER != '') ? $registroCurriculo->TWITTER : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="facebook">Facebook:</label>
        <div class="controls">
        	<input type="text" id="facebook" name="facebook" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->FACEBOOK != '') ? $registroCurriculo->FACEBOOK : ''; ?>" /></td>
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
        	<input type="text" id="nomeEmpresa_1" name="nomeEmpresa_1" class="input-xxlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->NOME_EMPRESA_1 != '') ? utf8_decode($registroCurriculo->NOME_EMPRESA_1) : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="atividadeEmpresa_1">Atividade da empresa:</label>
        <div class="controls">
        	<textarea id="atividadeEmpresa_1" name="atividadeEmpresa_1" class=""><?php echo ($registroCurriculo && $registroCurriculo->ATIVIDADE_EMPRESA_1 != '') ? utf8_decode($registroCurriculo->ATIVIDADE_EMPRESA_1) : ''; ?></textarea></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataAdmissao_1">Data de admissão:</label>
        <div class="controls controls-row">
        	<input type="text" id="dataAdmissao_1" name="dataAdmissao_1" class="input-small" maxlength="10" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_ADMISSAO_1 != '') ? Util::formataData($registroCurriculo->DATA_DEMISSAO_1,'-','/') : ''; ?>" /> <img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataDemissao_1">Data de demissão:</label>
        <div class="controls">
        	<input type="text" id="dataDemissao_1" name="dataDemissao_1" class="input-small" maxlength="10" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_DEMISSAO_1 != '') ? Util::formataData($registroCurriculo->DATA_DEMISSAO_1,'-','/') : ''; ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="funcaoExercida_1">Função exercida:</label>
        <div class="controls">
        	<input type="text" id="funcaoExercida_1" name="funcaoExercida_1" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->FUNCAO_EXERCIDA_1 != '') ? utf8_decode($registroCurriculo->FUNCAO_EXERCIDA_1) : ''; ?>" /></td>
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="atividadeExercida_1">Atividades exercida:</label>
        <div class="controls">
        	<textarea id="atividadeExercida_1" name="atividadeExercida_1" rows="5" class=""><?php echo ($registroCurriculo && $registroCurriculo->ATIVIDADE_EXERCIDA_1 != '') ? utf8_decode($registroCurriculo->ATIVIDADE_EXERCIDA_1) : ''; ?></textarea></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="salario_1">Último salário:</label>
        <div class="controls">
        	<input type="text" id="salario_1" name="salario_1" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->SALARIO_1 != '') ? number_format($registroCurriculo->SALARIO_1,2,',','.') : ''; ?>" /></td>
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
        	<input type="text" id="nomeEmpresa_2" name="nomeEmpresa_2" class="input-xxlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->NOME_EMPRESA_2 != '') ? utf8_decode($registroCurriculo->NOME_EMPRESA_2) : ''; ?>" /></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="atividadeEmpresa_2">Atividade da empresa:</label>
        <div class="controls">
        	<textarea id="atividadeEmpresa_2" name="atividadeEmpresa_2" rows="5" class=""><?php echo ($registroCurriculo && $registroCurriculo->ATIVIDADE_EMPRESA_2 != '') ? utf8_decode($registroCurriculo->ATIVIDADE_EMPRESA_2) : ''; ?></textarea></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataAdmissao_2">Data de admissão:</label>
        <div class="controls">
        	<input type="text" id="dataAdmissao_2" name="dataAdmissao_2" class="input-small" maxlength="10" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_ADMISSAO_2 != '') ? Util::formataData($registroCurriculo->DATA_ADMISSAO_2,'-','/') : ''; ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>

    <div class="control-group">
        <label class="control-label" for="dataDemissao_2">Data de demissão:</label>
        <div class="controls">
        	<input type="text" id="dataDemissao_2" name="dataDemissao_2" class="input-small" maxlength="10" value="<?php echo ($registroCurriculo && $registroCurriculo->DATA_DEMISSAO_2 != '') ? Util::formataData($registroCurriculo->DATA_DEMISSAO_2,'-','/') : ''; ?>" />&nbsp;<img src="../admin/bcoOportunidade/imagens/icone-calendario.png" class="imgCalendario" border="0"></td>
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="funcaoExercida_2">Função exercida:</label>
        <div class="controls">
        	<input type="text" id="funcaoExercida_2" name="funcaoExercida_2" class="input-xlarge" value="<?php echo ($registroCurriculo && $registroCurriculo->FUNCAO_EXERCIDA_2 != '') ? utf8_decode($registroCurriculo->FUNCAO_EXERCIDA_2) : ''; ?>" /></td>
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="atividadeExercida_2">Atividades exercida:</label>
        <div class="controls">
        	<textarea id="atividadeExercida_2" name="atividadeExercida_2" rows="5" class=""><?php echo ($registroCurriculo && $registroCurriculo->ATIVIDADE_EXERCIDA_2 != '') ? utf8_decode($registroCurriculo->ATIVIDADE_EXERCIDA_2) : ''; ?></textarea></td>
    	</div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="salario_2">Último salário:</label>
        <div class="controls">
        	<input type="text" id="salario_2" name="salario_2" class="input-small" value="<?php echo ($registroCurriculo && $registroCurriculo->SALARIO_2 != '') ? number_format($registroCurriculo->SALARIO_2,2,',','.') : ''; ?>" /></td>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" id="btnGravarCurriculo" class="btn btn-large btn-primary">Atualizar Currículo</button>
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