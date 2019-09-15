<!-- TinyMCE -->
<script type="text/javascript">
	tinyMCE.init({
      mode : "textareas",
      theme : "silver",
      skin : "oxide",
      menubar:false,
	});
</script>
<!-- /TinyMCE -->
<form id="editSubjectForm" name="editSubjectForm" method="post">
<input type="hidden" id="subjectId" name="subjectId" value="{$post.subjectId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Tipo:</label>
             <select name="tipo" id="tipo">
            	{foreach from=$major item=item}
  	          <option value="{$item.majorId}" {if $post.tipo == $item.majorId} selected="selected"{/if}>{$item.name}</option>
              {/foreach}
            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="frmName" id="frmName" value="{$post.name}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> Clave:</label>
            <input type="text" name="frmClave" id="frmClave" value="{$post.clave}" />                      
      </div>
      <div class="content-settings-row">
            <label for="f1"><span class="reqField"></span> RVOE:</label>
            <input type="text" name="rvoe" id="rvoe" value="{$post.rvoe}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Costo Mensual:</label>
            <input type="text" name="cost" id="cost" value="{$post.cost}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Numero de Pagos Totales:</label>
            <input type="text" name="payments" id="payments" value="{$post.payments}" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px">Texto de Bienvenida:</label>
     				<textarea id="welcomeText" name="welcomeText" rows="15" cols="80" style="width: 50%">{$post.welcomeText}</textarea>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px">Introduccion:</label>
     				<textarea id="introduction" name="introduction" rows="15" cols="80" style="width: 50%">{$post.introduction}</textarea>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px">Intenciones:</label>
     				<textarea id="intentions" name="intentions" rows="15" cols="80" style="width: 50%">{$post.intentions}</textarea>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px">Objetivos:</label>
     				<textarea id="objectives" name="objectives" rows="15" cols="80" style="width: 50%">{$post.objectives}</textarea>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px">Metodologia:</label>
     				<textarea id="methodology" name="methodology" rows="15" cols="80" style="width: 50%">{$post.methodology}</textarea>
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px">Politicas:</label>
     				<textarea id="politics" name="politics" rows="15" cols="80" style="width: 50%">{$post.politics}</textarea>
      </div>

      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="saveEditSubject" name="saveEditSubject" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>