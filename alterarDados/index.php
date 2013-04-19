<?php
/**
*
*  ALTERAR DADOS DO ALUNO
*  @autor Regis Andrade
*
*/

require_once "class/aluno.class.php";
$alunoDAO = new Aluno();

$parametros['idNumero'] = $_SESSION['idNumero'];
$dadosAluno = $alunoDAO->pesquisar($bd,$parametros);
unset($parametros);

if (is_array($dadosAluno)) {
  $dadosAluno = current($dadosAluno);
}

?>
<h2>Atualizar dados cadastrais</h2>

<p class="text-error">Atenção: se os seus dados estiveren incompletos, favor completar.</p>

<form class="form-horizontal" name="form-aluno" method="post" action="alterar_cadastro/cadastro_alterado.php">
  <input type="hidden" name="id" value="<?php echo $dadosAluno['id']; ?>">
  <input type="hidden" name="codg_curso" value="<?php echo $_SESSION['idCurso']; ?>">

  <div class="control-group">
    <label class="control-label">Curso:&nbsp;</label>
    <div class="controls">
      <span class="input-xlarge uneditable-input"><strong><?php echo $_SESSION['nomeCurso']; ?></strong></span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="nome">Nome:&nbsp;</label>
    <div class="controls">
      <input name="nome" type="text" id="nome" class="input-xxlarge" value="<?php echo $dadosAluno['nome']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="data_nascimento">Data Nascimento:&nbsp;</label>
    <div class="controls">
      <input name="data_nascimento" type="date" id="data_nascimento" class="input-medium" value="<?php echo $dadosAluno['dataNascimento']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="naturalidade">Naturalidade:&nbsp;</label>
    <div class="controls">
      <input name="naturalidade" type="text" id="naturalidade" class="input-xlarge" value="<?php echo $dadosAluno['naturalidade']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="uf_1">Estado:&nbsp;</label>
    <div class="controls">
      <select name="uf_1" id="uf_1" class="input-mini" required>
        <option value="" selected>UF
        <option value="AC" <?php if($dadosAluno['ufNaturalidade'] == 'AC'){ echo 'selected'; } ?>>AC
        <option value="AL" <?php if($dadosAluno['ufNaturalidade'] == 'AL'){ echo 'selected'; } ?>>AL
        <option value="AM" <?php if($dadosAluno['ufNaturalidade'] == 'AM'){ echo 'selected'; } ?>>AM
        <option value="BA" <?php if($dadosAluno['ufNaturalidade'] == 'BA'){ echo 'selected'; } ?>>BA
        <option value="CE" <?php if($dadosAluno['ufNaturalidade'] == 'CE'){ echo 'selected'; } ?>>CE
        <option value="DF" <?php if($dadosAluno['ufNaturalidade'] == 'DF'){ echo 'selected'; } ?>>DF
        <option value="ES" <?php if($dadosAluno['ufNaturalidade'] == 'ES'){ echo 'selected'; } ?>>ES
        <option value="GO" <?php if($dadosAluno['ufNaturalidade'] == 'GO'){ echo 'selected'; } ?>>GO
        <option value="MA" <?php if($dadosAluno['ufNaturalidade'] == 'MA'){ echo 'selected'; } ?>>MA
        <option value="MG" <?php if($dadosAluno['ufNaturalidade'] == 'MG'){ echo 'selected'; } ?>>MG
        <option value="MS" <?php if($dadosAluno['ufNaturalidade'] == 'MS'){ echo 'selected'; } ?>>MS
        <option value="MT" <?php if($dadosAluno['ufNaturalidade'] == 'MT'){ echo 'selected'; } ?>>MT
        <option value="PA" <?php if($dadosAluno['ufNaturalidade'] == 'PA'){ echo 'selected'; } ?>>PA
        <option value="PB" <?php if($dadosAluno['ufNaturalidade'] == 'PB'){ echo 'selected'; } ?>>PB
        <option value="PE" <?php if($dadosAluno['ufNaturalidade'] == 'PE'){ echo 'selected'; } ?>>PE
        <option value="PI" <?php if($dadosAluno['ufNaturalidade'] == 'PI'){ echo 'selected'; } ?>>PI
        <option value="PR" <?php if($dadosAluno['ufNaturalidade'] == 'PR'){ echo 'selected'; } ?>>PR
        <option value="RJ" <?php if($dadosAluno['ufNaturalidade'] == 'RJ'){ echo 'selected'; } ?>>RJ
        <option value="RN" <?php if($dadosAluno['ufNaturalidade'] == 'RN'){ echo 'selected'; } ?>>RN
        <option value="RO" <?php if($dadosAluno['ufNaturalidade'] == 'RO'){ echo 'selected'; } ?>>RO
        <option value="RR" <?php if($dadosAluno['ufNaturalidade'] == 'RR'){ echo 'selected'; } ?>>RR
        <option value="RS" <?php if($dadosAluno['ufNaturalidade'] == 'RS'){ echo 'selected'; } ?>>RS
        <option value="SC" <?php if($dadosAluno['ufNaturalidade'] == 'SC'){ echo 'selected'; } ?>>SC
        <option value="SP" <?php if($dadosAluno['ufNaturalidade'] == 'SP'){ echo 'selected'; } ?>>SP
        <option value="TO" <?php if($dadosAluno['ufNaturalidade'] == 'TO'){ echo 'selected'; } ?>>TO
      </select>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="nacionalidade">Nacionalidade:&nbsp;</label>
    <div class="controls">
      <input name="nacionalidade" id="nacionalidade" type="text" class="input-xlarge" value="<?php echo $dadosAluno['nacionalidade']; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="">Sexo:&nbsp;</label>
    <div class="controls">
      <label class="radio">
        <input name="sexo" type="radio" value="M" <?php if($dadosAluno['sexo'] == 'M'){ echo 'checked'; } ?>>M
      </label>
      <label class="radio">
        <input name="sexo" type="radio" value="F" <?php if($dadosAluno['sexo'] == 'F'){ echo 'checked'; } ?>>F
      </label>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="rg">Identidade (RG):&nbsp;</label>
    <div class="controls">
      <input name="rg" type="text" id="rg" class="input-medium" value="<?php echo $dadosAluno['rg']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="orgao">Orgão Exp.:&nbsp;</label>
    <div class="controls">
      <input name="orgao" type="text" id="orgao" class="input-mini" value="<?php echo $dadosAluno['orgao']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cpf">C.P.F. N&ordm;:&nbsp;</label>
    <div class="controls">
      <span class="input-medium uneditable-input"><?php echo $dadosAluno['cpf']; ?></span>
      <!-- <input name="cpf" type="text" id="cpf" class="input-medium uneditable-input" value="<?php echo $dadosAluno['cpf']; ?>"> -->
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="endereco">Endere&ccedil;o:&nbsp;</label>
    <div class="controls">
      <input name="endereco" type="text" id="endereco" class="input-xlarge" value="<?php echo $dadosAluno['endereco']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="bairro">Bairro:&nbsp;</label>
    <div class="controls">
      <input name="bairro" type="text" id="bairro" class="input-xlarge" value="<?php echo $dadosAluno['bairro']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cep">CEP:&nbsp;</label>
    <div class="controls">
      <input name="cep" type="text" id="cep" class="input-small" value="<?php echo $dadosAluno['cep']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cidade">Cidade:&nbsp;</label>
    <div class="controls">
      <input name="cidade" type="text" id="cidade" class="input-xlarge" value="<?php echo $dadosAluno['cidade']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="uf_2">Estado:&nbsp;</label>
    <div class="controls">
      <select name="uf_2" id="uf_2" class="input-mini" required>
        <option value="" selected>UF
        <option value="AC" <?php if($dadosAluno['uf'] == 'AC'){ echo 'selected'; } ?>>AC
        <option value="AL" <?php if($dadosAluno['uf'] == 'AL'){ echo 'selected'; } ?>>AL
        <option value="AM" <?php if($dadosAluno['uf'] == 'AM'){ echo 'selected'; } ?>>AM
        <option value="BA" <?php if($dadosAluno['uf'] == 'BA'){ echo 'selected'; } ?>>BA
        <option value="CE" <?php if($dadosAluno['uf'] == 'CE'){ echo 'selected'; } ?>>CE
        <option value="DF" <?php if($dadosAluno['uf'] == 'DF'){ echo 'selected'; } ?>>DF
        <option value="ES" <?php if($dadosAluno['uf'] == 'ES'){ echo 'selected'; } ?>>ES
        <option value="GO" <?php if($dadosAluno['uf'] == 'GO'){ echo 'selected'; } ?>>GO
        <option value="MA" <?php if($dadosAluno['uf'] == 'MA'){ echo 'selected'; } ?>>MA
        <option value="MG" <?php if($dadosAluno['uf'] == 'MG'){ echo 'selected'; } ?>>MG
        <option value="MS" <?php if($dadosAluno['uf'] == 'MS'){ echo 'selected'; } ?>>MS
        <option value="MT" <?php if($dadosAluno['uf'] == 'MT'){ echo 'selected'; } ?>>MT
        <option value="PA" <?php if($dadosAluno['uf'] == 'PA'){ echo 'selected'; } ?>>PA
        <option value="PB" <?php if($dadosAluno['uf'] == 'PB'){ echo 'selected'; } ?>>PB
        <option value="PE" <?php if($dadosAluno['uf'] == 'PE'){ echo 'selected'; } ?>>PE
        <option value="PI" <?php if($dadosAluno['uf'] == 'PI'){ echo 'selected'; } ?>>PI
        <option value="PR" <?php if($dadosAluno['uf'] == 'PR'){ echo 'selected'; } ?>>PR
        <option value="RJ" <?php if($dadosAluno['uf'] == 'RJ'){ echo 'selected'; } ?>>RJ
        <option value="RN" <?php if($dadosAluno['uf'] == 'RN'){ echo 'selected'; } ?>>RN
        <option value="RO" <?php if($dadosAluno['uf'] == 'RO'){ echo 'selected'; } ?>>RO
        <option value="RR" <?php if($dadosAluno['uf'] == 'RR'){ echo 'selected'; } ?>>RR
        <option value="RS" <?php if($dadosAluno['uf'] == 'RS'){ echo 'selected'; } ?>>RS
        <option value="SC" <?php if($dadosAluno['uf'] == 'SC'){ echo 'selected'; } ?>>SC
        <option value="SP" <?php if($dadosAluno['uf'] == 'SP'){ echo 'selected'; } ?>>SP
        <option value="TO" <?php if($dadosAluno['uf'] == 'TO'){ echo 'selected'; } ?>>TO
      </select>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="fone_residencial">Fone Resid&ecirc;ncial:&nbsp;</label>
    <div class="controls">
      <input name="fone_residencial" type="text" id="fone_residencial" class="input-medium" value="<?php echo $dadosAluno['foneResidencial']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="fone_comercial">Fone Comercial:&nbsp;</label>
    <div class="controls">
      <input name="fone_comercial" type="text" id="fone_comercial" class="input-medium" value="<?php echo $dadosAluno['foneComercial']; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="celular">Celular:&nbsp;</label>
    <div class="controls">
      <input name="celular" id="celular" type="text" class="input-medium" value="<?php echo $dadosAluno['foneCelular']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="email">e-Mail:&nbsp;</label>
    <div class="controls">
      <input name="email" type="email" id="email" class="input-xlarge" value="<?php echo $dadosAluno['eMail']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="curso">Curso Gradua&ccedil;&atilde;o:&nbsp;</label>
    <div class="controls">
      <input name="graduacao" type="text" id="curso" class="input-xlarge" value="<?php echo $dadosAluno['cursoGraduacao']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="instituicao">Institui&ccedil;&atilde;o:&nbsp;</label>
    <div class="controls">
      <input name="instituicao" type="text" id="instituicao" class="input-xlarge" value="<?php echo $dadosAluno['instituicao']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="sigla2">Sigla:&nbsp;</label>
    <div class="controls">
      <input name="sigla" type="text" id="sigla2" class="input-mini" value="<?php echo $dadosAluno['sigla']; ?>" required>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="conclusao">Ano Conclus&atilde;o:&nbsp;</label>
    <div class="controls">
      <input name="conclusao" type="text" id="conclusao" class="input-mini" value="<?php echo $dadosAluno['anoConclusao']; ?>" required>
      <br>
      <br>
      <button class="btn btn-large btn-primary" type="submit">Alterar dados</button>
    </div>
  </div>
    
</form>