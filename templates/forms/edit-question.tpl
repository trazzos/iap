<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Editar Preguntas
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent">

<!-- TinyMCE -->
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7"		
		
	});
</script>
<!-- /TinyMCE -->
<form id="addMajorForm" name="addMajorForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-small">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Pregunta:</label>
            <input type="text" name="question" id="question" value="{$question.question}"  />
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Opcion A:</label>
            <input type="text" name="opcionA" id="opcionA" value="{$question.opcionA}"  />
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Opcion B:</label>
            <input type="text" name="opcionB" id="opcionB" value="{$question.opcionB}"  />
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Opcion C:</label>
            <input type="text" name="opcionC" id="opcionC" value="{$question.opcionC}"  />
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Opcion D:</label>
            <input type="text" name="opcionD" id="opcionD" value="{$question.opcionD}"  />
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Opcion E:</label>
            <input type="text" name="opcionE" id="opcionE" value="{$question.opcionE}"  />
      </div>

      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Respuesta:</label>
            <select id="answer" name="answer">
            	<option value="opcionA" {if $question.answer == "opcionA"} selected="selected"{/if}>Opcion A</option>
            	<option value="opcionB" {if $question.answer == "opcionB"} selected="selected"{/if}>Opcion B</option>
            	<option value="opcionC" {if $question.answer == "opcionC"} selected="selected"{/if}>Opcion C</option>
            	<option value="opcionD" {if $question.answer == "opcionD"} selected="selected"{/if}>Opcion D</option>
            	<option value="opcionE" {if $question.answer == "opcionE"} selected="selected"{/if}>Opcion E</option>
            </select>                      
      </div>

      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="Editar" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>

      </div>
    </div>
</div>
