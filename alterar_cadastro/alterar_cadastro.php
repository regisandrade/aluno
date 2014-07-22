<?php
//== Selecionar Cursos
$comando = "SELECT * FROM curso WHERE Codg_Curso = ".$_SESSION['curso'];
$result = mysql_query($comando) or die('Erro na consulta dos Cursos. '.mysql_error());
$num = mysql_num_rows($result);

// Consulta de dados do aluno
$cmd_aluno = "
SELECT
      ALU.Id_Numero,
      ALU.Nome,
      DATE_FORMAT(ALU.Data_Nascimento, '%d/%m/%y') AS Data_Nascimento,
      ALU.Naturalidade,
      ALU.UF_Naturalidade,
	  ALU.Nacionalidade,
      ALU.Sexo,
      ALU.RG,
      ALU.Orgao,
      ALU.CPF,
      ALU.e_Mail,
      ENDE.Endereco,
      ENDE.Bairro,
      ENDE.CEP,
      ENDE.Cidade,
      ENDE.UF,
      ENDE.Fone_Residencial,
      ENDE.Fone_Comercial,
      ENDE.Celular AS Fone_Celular,
      GRA.Curso_Graduacao,
      GRA.Instituicao,
      GRA.Sigla,
      GRA.Ano_Conclusao
FROM
    aluno ALU
INNER JOIN endereco ENDE ON
      ENDE.Id_Numero = ALU.Id_Numero
INNER JOIN graduacao GRA ON
      GRA.Id_Numero = ALU.Id_Numero
WHERE
     ALU.Id_Numero = '".$_SESSION['id_numero']."'";
$res_aluno = mysql_query($cmd_aluno) or die('Erro na consulta dos dados do Aluno. '.mysql_error());
$reg_aluno = mysql_fetch_array($res_aluno);
?>
<h2>Atualizar dados cadastrais</h2>
   <table border="0" cellpadding="0" cellspacing="2">
    <form name="form_aluno" action="alterar_cadastro/cadastro_alterado.php" method="post" onSubmit="return validarAluno()">
    <input type="hidden" name="codg_aluno" value="<?php print($reg_aluno['Id_Numero']); ?>">
      <tr>
	<td align="center" height="20" style="color:#FF0000" colspan="2">Atenção: se os seus dados estiveren incompletos, favor completar.</td>
      </tr>
      <tr>
	    <td align="right" class="textoInscricao12Negrito">Curso:</td>
	    <td>
	      <?php
	      if($num < 1){
		    print('<font color="#ff0000">Nenhum curso cadastrado.</font>');
	      }else{
		    while($registro = mysql_fetch_array($result)){
	      ?>
	      <input type="radio" name="codg_curso" value="<?php print $registro['Codg_Curso']; ?>" checked><?php print($registro['Nome']); ?>
	      <input type="hidden" name="nome_curso" value="<?php print($registro['Nome']); ?>">
	      <?php
		    }
	      }
	      ?>
	    </td>
      </tr>
      <tr>
	    <td width="130" height="22" align="right" class="textoInscricao12Negrito">Nome:</td>
	    <td><input name="nome" type="text" class="txtInscricaoGrande" id="nome" size="50" maxlength="255" value="<?php print($reg_aluno['Nome']); ?>"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Data Nascimento:</td>
	    <td width="263"><input name="data_nascimento" type="text" class="txtInscricaoMini" id="data_nascimento" size="11" maxlength="10" onKeyPress="FormataData(this.name, this.value)" value="<?php print($reg_aluno['Data_Nascimento']); ?>">
	      &nbsp;<font color="#FF0000" size="1" face="Verdana">sem "/"</font></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Naturalidade:</td>
	    <td><input name="naturalidade" type="text" class="txtInscricaoPequeno" id="naturalidade" value="<?php print($reg_aluno['Naturalidade']); ?>" size="30" maxlength="150"></td>
      </tr>
      <tr>
	    <td align="right" class="textoInscricao12Negrito">Estado:</td>
	    <td><select name="uf_1" class="txtInscricaoMini">
		    <option value="" selected>UF
		    <option value="AC" <?php if($reg_aluno['UF_Naturalidade'] == 'AC'){ print('selected'); }?>>AC
		    <option value="AL" <?php if($reg_aluno['UF_Naturalidade'] == 'AL'){ print('selected'); }?>>AL
		    <option value="AM" <?php if($reg_aluno['UF_Naturalidade'] == 'AM'){ print('selected'); }?>>AM
		    <option value="BA" <?php if($reg_aluno['UF_Naturalidade'] == 'BA'){ print('selected'); }?>>BA
		    <option value="CE" <?php if($reg_aluno['UF_Naturalidade'] == 'CE'){ print('selected'); }?>>CE
		    <option value="DF" <?php if($reg_aluno['UF_Naturalidade'] == 'DF'){ print('selected'); }?>>DF
		    <option value="ES" <?php if($reg_aluno['UF_Naturalidade'] == 'ES'){ print('selected'); }?>>ES
		    <option value="GO" <?php if($reg_aluno['UF_Naturalidade'] == 'GO'){ print('selected'); }?>>GO
		    <option value="MA" <?php if($reg_aluno['UF_Naturalidade'] == 'MA'){ print('selected'); }?>>MA
		    <option value="MG" <?php if($reg_aluno['UF_Naturalidade'] == 'MG'){ print('selected'); }?>>MG
		    <option value="MS" <?php if($reg_aluno['UF_Naturalidade'] == 'MS'){ print('selected'); }?>>MS
		    <option value="MT" <?php if($reg_aluno['UF_Naturalidade'] == 'MT'){ print('selected'); }?>>MT
		    <option value="PA" <?php if($reg_aluno['UF_Naturalidade'] == 'PA'){ print('selected'); }?>>PA
		    <option value="PB" <?php if($reg_aluno['UF_Naturalidade'] == 'PB'){ print('selected'); }?>>PB
		    <option value="PE" <?php if($reg_aluno['UF_Naturalidade'] == 'PE'){ print('selected'); }?>>PE
		    <option value="PI" <?php if($reg_aluno['UF_Naturalidade'] == 'PI'){ print('selected'); }?>>PI
		    <option value="PR" <?php if($reg_aluno['UF_Naturalidade'] == 'PR'){ print('selected'); }?>>PR
		    <option value="RJ" <?php if($reg_aluno['UF_Naturalidade'] == 'RJ'){ print('selected'); }?>>RJ
		    <option value="RN" <?php if($reg_aluno['UF_Naturalidade'] == 'RN'){ print('selected'); }?>>RN
		    <option value="RO" <?php if($reg_aluno['UF_Naturalidade'] == 'RO'){ print('selected'); }?>>RO
		    <option value="RR" <?php if($reg_aluno['UF_Naturalidade'] == 'RR'){ print('selected'); }?>>RR
		    <option value="RS" <?php if($reg_aluno['UF_Naturalidade'] == 'RS'){ print('selected'); }?>>RS
		    <option value="SC" <?php if($reg_aluno['UF_Naturalidade'] == 'SC'){ print('selected'); }?>>SC
		    <option value="SP" <?php if($reg_aluno['UF_Naturalidade'] == 'SP'){ print('selected'); }?>>SP
		    <option value="TO" <?php if($reg_aluno['UF_Naturalidade'] == 'TO'){ print('selected'); }?>>TO
	    </select>
	    </td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Nacionalidade:</td>
	    <td><input name="nacionalidade" type="text" class="txtInscricaoPequeno" maxlength="150" value="<?php print($reg_aluno['Nacionalidade']); ?>"></td>
      </tr>
      <tr>
	    <td align="right" valign="middle" class="textoInscricao12Negrito">Sexo:</td>
	    <td><input name="sexo" type="radio" value="M" <?php if($reg_aluno['Sexo'] == 'M'){ print('checked'); }?>>M
	      <input type="radio" name="sexo" value="F" <?php if($reg_aluno['Sexo'] == 'F'){ print('checked'); }?>>F</td>
      </tr>
      <tr>
	    <td align="right" class="textoInscricao12Negrito">Identidade (RG):</td>
	    <td><input name="rg" type="text" class="txtInscricaoMini" id="rg" size="15" maxlength="25" value="<?php print($reg_aluno['RG']); ?>"></td>
      </tr>
      <tr>
	    <td align="right" class="textoInscricao12Negrito">Orgão Exp.:&nbsp;</td>
	    <td><input name="orgao" type="text" class="txtInscricaoMini" id="orgao" size="7" maxlength="7" value="<?php print($reg_aluno['Orgao']); ?>"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">C.P.F. N&ordm;:</td>
	    <td><input name="cpf" type="text" class="txtInscricaoMini" id="cpf" value="<?php print($reg_aluno['CPF']); ?>" size="15" maxlength="14" readonly="true"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Endere&ccedil;o:</td>
	    <td><input name="endereco" type="text" class="txtInscricaoGrande" id="endereco" value="<?php print($reg_aluno['Endereco']); ?>" size="50" maxlength="255"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Bairro:</td>
	    <td><input name="bairro" type="text" class="txtInscricaoMedio" id="bairro" value="<?php print($reg_aluno['Bairro']); ?>" size="30" maxlength="150"></td>
      </tr>
      <tr>
	    <td align="right" class="textoInscricao12Negrito">CEP:</td>
	    <td><input name="cep" type="text" class="txtInscricaoMini" id="cep" value="<?php print($reg_aluno['CEP']); ?>" size="11" maxlength="9"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Cidade:</td>
	    <td><input name="cidade" type="text" class="txtInscricaoMedio" id="cidade" value="<?php print($reg_aluno['Cidade']); ?>" size="30" maxlength="150"></td>
      </tr>
      <tr>
	    <td align="right" class="textoInscricao12Negrito">Estado:</td>
	    <td><select name="uf_2" class="txtInscricaoMini">
		    <option value="" selected>UF
		    <option value="AC" <?php if($reg_aluno['UF'] == 'AC'){ print('selected'); }?>>AC
		    <option value="AL" <?php if($reg_aluno['UF'] == 'AL'){ print('selected'); }?>>AL
		    <option value="AM" <?php if($reg_aluno['UF'] == 'AM'){ print('selected'); }?>>AM
		    <option value="BA" <?php if($reg_aluno['UF'] == 'BA'){ print('selected'); }?>>BA
		    <option value="CE" <?php if($reg_aluno['UF'] == 'CE'){ print('selected'); }?>>CE
		    <option value="DF" <?php if($reg_aluno['UF'] == 'DF'){ print('selected'); }?>>DF
		    <option value="ES" <?php if($reg_aluno['UF'] == 'ES'){ print('selected'); }?>>ES
		    <option value="GO" <?php if($reg_aluno['UF'] == 'GO'){ print('selected'); }?>>GO
		    <option value="MA" <?php if($reg_aluno['UF'] == 'MA'){ print('selected'); }?>>MA
		    <option value="MG" <?php if($reg_aluno['UF'] == 'MG'){ print('selected'); }?>>MG
		    <option value="MS" <?php if($reg_aluno['UF'] == 'MS'){ print('selected'); }?>>MS
		    <option value="MT" <?php if($reg_aluno['UF'] == 'MT'){ print('selected'); }?>>MT
		    <option value="PA" <?php if($reg_aluno['UF'] == 'PA'){ print('selected'); }?>>PA
		    <option value="PB" <?php if($reg_aluno['UF'] == 'PB'){ print('selected'); }?>>PB
		    <option value="PE" <?php if($reg_aluno['UF'] == 'PE'){ print('selected'); }?>>PE
		    <option value="PI" <?php if($reg_aluno['UF'] == 'PI'){ print('selected'); }?>>PI
		    <option value="PR" <?php if($reg_aluno['UF'] == 'PR'){ print('selected'); }?>>PR
		    <option value="RJ" <?php if($reg_aluno['UF'] == 'RJ'){ print('selected'); }?>>RJ
		    <option value="RN" <?php if($reg_aluno['UF'] == 'RN'){ print('selected'); }?>>RN
		    <option value="RO" <?php if($reg_aluno['UF'] == 'RO'){ print('selected'); }?>>RO
		    <option value="RR" <?php if($reg_aluno['UF'] == 'RR'){ print('selected'); }?>>RR
		    <option value="RS" <?php if($reg_aluno['UF'] == 'RS'){ print('selected'); }?>>RS
		    <option value="SC" <?php if($reg_aluno['UF'] == 'SC'){ print('selected'); }?>>SC
		    <option value="SP" <?php if($reg_aluno['UF'] == 'SP'){ print('selected'); }?>>SP
		    <option value="TO" <?php if($reg_aluno['UF'] == 'TO'){ print('selected'); }?>>TO
	    </select> </td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Fone Resid&ecirc;ncial:</td>
	    <td><input name="fone_residencial" type="text" class="txtInscricaoMini" id="fone_residencial" value="<?php print($reg_aluno['Fone_Residencial']); ?>" size="13" maxlength="12"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Fone Comercial:</td>
	    <td><input name="fone_comercial" type="text" class="txtInscricaoMini" id="fone_comercial" value="<?php print($reg_aluno['Fone_Comercial']); ?>" size="13" maxlength="12"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Celular:</td>
	    <td><input name="celular" type="text" class="txtInscricaoMini" size="13" maxlength="12" value="<?php print($reg_aluno['Fone_Celular']); ?>"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">e-Mail:</td>
	    <td><input name="email" type="text" class="txtInscricaoGrande" id="email" value="<?php print($reg_aluno['e_Mail']); ?>" size="50" maxlength="150"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Curso Gradua&ccedil;&atilde;o:</td>
	    <td><input name="graduacao" type="text" class="txtInscricaoGrande" id="curso" value="<?php print($reg_aluno['Curso_Graduacao']); ?>" size="50" maxlength="255"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Institui&ccedil;&atilde;o:</td>
	    <td><input name="instituicao" type="text" class="txtInscricaoGrande" id="instituicao" value="<?php print($reg_aluno['Instituicao']); ?>" size="50" maxlength="255"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Sigla:</td>
	    <td><input name="sigla" type="text" class="txtInscricaoMini" id="sigla2" value="<?php print($reg_aluno['Sigla']); ?>" size="13" maxlength="13"></td>
      </tr>
      <tr>
	    <td height="22" align="right" class="textoInscricao12Negrito">Ano Conclus&atilde;o:</td>
	    <td><input name="conclusao" type="text" class="txtInscricaoMini" id="conclusao" value="<?php print($reg_aluno['Ano_Conclusao']); ?>" size="5" maxlength="4"></td>
      </tr>
      <tr>
	    <td height="45" align="right">&nbsp;</td>
	    <td><input name="alterar" type="submit" id="alterar" value="Alterar" class="botao" />
	      &nbsp;&nbsp;<input name="limpar" type="reset" id="limpar" value="Limpar" onClick="document.form_aluno.nome.focus()" class="botao" /></td>
      </tr>
      <script language="JavaScript">document.form_aluno.nome.focus();</script>
    </form>
</table>
<p>&nbsp;</p>
