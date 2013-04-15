<?php
/**
*
*  ALTERAR DADOS DO ALUNO
*  @autor Regis Andrade
*
*/

require_once "../../lib/myDB.class.php";
$bd = new myDB();

require_once "../class/curso.class.php";
$cursoDAO = new Curso();
$parametros['curso'] = $_SESSION['curso'];
$listaCursos = $cursoDAO->pesquisar($bd,$parametros);
unset($parametros);

require_once "../class/aluno.class.php";
$alunoDAO = new Aluno();
$parametros['curso'] = $_SESSION['id_numero'];
$listaAlunos = $alunoDAO->pesquisar($bd,$parametros);
unset($parametros);
?>
<h2>Atualizar dados cadastrais</h2>

<p>Atenção: se os seus dados estiveren incompletos, favor completar.</p>

<form name="form_aluno" action="alterar_cadastro/cadastro_alterado.php" method="post" onSubmit="return validarAluno()">
  <input type="hidden" name="codg_aluno" value="<?php echo $reg_aluno['Id_Numero']; ?>">
  <label>Curso:</label>
  <?php
  if(!is_array($listaCursos))
    echo '<p class="text-error">Nenhum curso cadastrado.</p>';
  }else{
    foreach ($listaCursos as $curso) {
    ?>
      <?php echo $curso['Nome']; ?>
      <input type="hidden" name="codg_curso" value="<?php echo $curso['Codg_Curso']; ?>">
    <?php
    }
  }
  ?>
  
  <label>Nome:</label><input name="nome" type="text" id="nome" value="<?php echo $reg_aluno['Nome']; ?>">
  
  <label>Data Nascimento:<input name="data_nascimento" type="text" id="data_nascimento" value="<?php echo $reg_aluno['Data_Nascimento']; ?>">&nbsp;sem "/"
    
  <label>Naturalidade:</label><input name="naturalidade" type="text" id="naturalidade" value="<?php echo $reg_aluno['Naturalidade']; ?>">
  
  <label>Estado:</label>
  <select name="uf_1">
    <option value="" selected>UF
    <option value="AC" <?php if($reg_aluno['UF_Naturalidade'] == 'AC'){ echo 'selected'); }?>>AC
    <option value="AL" <?php if($reg_aluno['UF_Naturalidade'] == 'AL'){ echo 'selected'); }?>>AL
    <option value="AM" <?php if($reg_aluno['UF_Naturalidade'] == 'AM'){ echo 'selected'); }?>>AM
    <option value="BA" <?php if($reg_aluno['UF_Naturalidade'] == 'BA'){ echo 'selected'); }?>>BA
    <option value="CE" <?php if($reg_aluno['UF_Naturalidade'] == 'CE'){ echo 'selected'); }?>>CE
    <option value="DF" <?php if($reg_aluno['UF_Naturalidade'] == 'DF'){ echo 'selected'); }?>>DF
    <option value="ES" <?php if($reg_aluno['UF_Naturalidade'] == 'ES'){ echo 'selected'); }?>>ES
    <option value="GO" <?php if($reg_aluno['UF_Naturalidade'] == 'GO'){ echo 'selected'); }?>>GO
    <option value="MA" <?php if($reg_aluno['UF_Naturalidade'] == 'MA'){ echo 'selected'); }?>>MA
    <option value="MG" <?php if($reg_aluno['UF_Naturalidade'] == 'MG'){ echo 'selected'); }?>>MG
    <option value="MS" <?php if($reg_aluno['UF_Naturalidade'] == 'MS'){ echo 'selected'); }?>>MS
    <option value="MT" <?php if($reg_aluno['UF_Naturalidade'] == 'MT'){ echo 'selected'); }?>>MT
    <option value="PA" <?php if($reg_aluno['UF_Naturalidade'] == 'PA'){ echo 'selected'); }?>>PA
    <option value="PB" <?php if($reg_aluno['UF_Naturalidade'] == 'PB'){ echo 'selected'); }?>>PB
    <option value="PE" <?php if($reg_aluno['UF_Naturalidade'] == 'PE'){ echo 'selected'); }?>>PE
    <option value="PI" <?php if($reg_aluno['UF_Naturalidade'] == 'PI'){ echo 'selected'); }?>>PI
    <option value="PR" <?php if($reg_aluno['UF_Naturalidade'] == 'PR'){ echo 'selected'); }?>>PR
    <option value="RJ" <?php if($reg_aluno['UF_Naturalidade'] == 'RJ'){ echo 'selected'); }?>>RJ
    <option value="RN" <?php if($reg_aluno['UF_Naturalidade'] == 'RN'){ echo 'selected'); }?>>RN
    <option value="RO" <?php if($reg_aluno['UF_Naturalidade'] == 'RO'){ echo 'selected'); }?>>RO
    <option value="RR" <?php if($reg_aluno['UF_Naturalidade'] == 'RR'){ echo 'selected'); }?>>RR
    <option value="RS" <?php if($reg_aluno['UF_Naturalidade'] == 'RS'){ echo 'selected'); }?>>RS
    <option value="SC" <?php if($reg_aluno['UF_Naturalidade'] == 'SC'){ echo 'selected'); }?>>SC
    <option value="SP" <?php if($reg_aluno['UF_Naturalidade'] == 'SP'){ echo 'selected'); }?>>SP
    <option value="TO" <?php if($reg_aluno['UF_Naturalidade'] == 'TO'){ echo 'selected'); }?>>TO
  </select>
  
  <label>Nacionalidade:</label><input name="nacionalidade" type="text" value="<?php echo $reg_aluno['Nacionalidade']; ?>">
  
  <td align="right" valign="middle">Sexo:</label><input name="sexo" type="radio" value="M" <?php if($reg_aluno['Sexo'] == 'M'){ echo 'checked'); }?>>M
    <input type="radio" name="sexo" value="F" <?php if($reg_aluno['Sexo'] == 'F'){ echo 'checked'); }?>>F
  
  <label>Identidade (RG):</label><input name="rg" type="text" id="rg" value="<?php echo $reg_aluno['RG']; ?>">
  
  <label>Orgão Exp.:</label><input name="orgao" type="text" id="orgao" value="<?php echo $reg_aluno['Orgao']; ?>">
  
  <label>C.P.F. N&ordm;:</label><input name="cpf" type="text" id="cpf" value="<?php echo $reg_aluno['CPF']; ?>" readonly="true">
  
  <label>Endere&ccedil;o:</label><input name="endereco" type="text" id="endereco" value="<?php echo $reg_aluno['Endereco']; ?>">
  
  <label>Bairro:</label><input name="bairro" type="text" id="bairro" value="<?php echo $reg_aluno['Bairro']; ?>">
  
  <label>CEP:</label><input name="cep" type="text" id="cep" value="<?php echo $reg_aluno['CEP']; ?>">
  
  <label>Cidade:</label><input name="cidade" type="text" id="cidade" value="<?php echo $reg_aluno['Cidade']; ?>">
  
  <label>Estado:</label>
  <select name="uf_2">
    <option value="" selected>UF
    <option value="AC" <?php if($reg_aluno['UF'] == 'AC'){ echo 'selected'); }?>>AC
    <option value="AL" <?php if($reg_aluno['UF'] == 'AL'){ echo 'selected'); }?>>AL
    <option value="AM" <?php if($reg_aluno['UF'] == 'AM'){ echo 'selected'); }?>>AM
    <option value="BA" <?php if($reg_aluno['UF'] == 'BA'){ echo 'selected'); }?>>BA
    <option value="CE" <?php if($reg_aluno['UF'] == 'CE'){ echo 'selected'); }?>>CE
    <option value="DF" <?php if($reg_aluno['UF'] == 'DF'){ echo 'selected'); }?>>DF
    <option value="ES" <?php if($reg_aluno['UF'] == 'ES'){ echo 'selected'); }?>>ES
    <option value="GO" <?php if($reg_aluno['UF'] == 'GO'){ echo 'selected'); }?>>GO
    <option value="MA" <?php if($reg_aluno['UF'] == 'MA'){ echo 'selected'); }?>>MA
    <option value="MG" <?php if($reg_aluno['UF'] == 'MG'){ echo 'selected'); }?>>MG
    <option value="MS" <?php if($reg_aluno['UF'] == 'MS'){ echo 'selected'); }?>>MS
    <option value="MT" <?php if($reg_aluno['UF'] == 'MT'){ echo 'selected'); }?>>MT
    <option value="PA" <?php if($reg_aluno['UF'] == 'PA'){ echo 'selected'); }?>>PA
    <option value="PB" <?php if($reg_aluno['UF'] == 'PB'){ echo 'selected'); }?>>PB
    <option value="PE" <?php if($reg_aluno['UF'] == 'PE'){ echo 'selected'); }?>>PE
    <option value="PI" <?php if($reg_aluno['UF'] == 'PI'){ echo 'selected'); }?>>PI
    <option value="PR" <?php if($reg_aluno['UF'] == 'PR'){ echo 'selected'); }?>>PR
    <option value="RJ" <?php if($reg_aluno['UF'] == 'RJ'){ echo 'selected'); }?>>RJ
    <option value="RN" <?php if($reg_aluno['UF'] == 'RN'){ echo 'selected'); }?>>RN
    <option value="RO" <?php if($reg_aluno['UF'] == 'RO'){ echo 'selected'); }?>>RO
    <option value="RR" <?php if($reg_aluno['UF'] == 'RR'){ echo 'selected'); }?>>RR
    <option value="RS" <?php if($reg_aluno['UF'] == 'RS'){ echo 'selected'); }?>>RS
    <option value="SC" <?php if($reg_aluno['UF'] == 'SC'){ echo 'selected'); }?>>SC
    <option value="SP" <?php if($reg_aluno['UF'] == 'SP'){ echo 'selected'); }?>>SP
    <option value="TO" <?php if($reg_aluno['UF'] == 'TO'){ echo 'selected'); }?>>TO
  </select> 
  
  <label>Fone Resid&ecirc;ncial:</label><input name="fone_residencial" type="text" id="fone_residencial" value="<?php echo $reg_aluno['Fone_Residencial']; ?>">
  
  <label>Fone Comercial:</label><input name="fone_comercial" type="text" id="fone_comercial" value="<?php echo $reg_aluno['Fone_Comercial']; ?>">
  
  <label>Celular:</label><input name="celular" type="text" value="<?php echo $reg_aluno['Fone_Celular']; ?>">
  
  <label>e-Mail:</label><input name="email" type="text" id="email" value="<?php echo $reg_aluno['e_Mail']; ?>">
  
  <label>Curso Gradua&ccedil;&atilde;o:</label><input name="graduacao" type="text" id="curso" value="<?php echo $reg_aluno['Curso_Graduacao']; ?>">
  
  <label>Institui&ccedil;&atilde;o:</label><input name="instituicao" type="text" id="instituicao" value="<?php echo $reg_aluno['Instituicao']; ?>">
  
  <label>Sigla:</label><input name="sigla" type="text" id="sigla2" value="<?php echo $reg_aluno['Sigla']; ?>">
  
  <label>Ano Conclus&atilde;o:</label><input name="conclusao" type="text" id="conclusao" value="<?php echo $reg_aluno['Ano_Conclusao']; ?>">
  
  <button class="btn btn-large btn-primary" type="submit">Alterar dados</button>
    
</form>