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
<input type="hidden" id="topicId" name="topicId" value="{$topicId}"/><input type="hidden" id="userId" name="userId" value="{$userId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-small">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>Asunto:</label>
            <input type="text" name="subject" id="subject" value="" />
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:250px"><span class="reqField">*</span> Descripcion:</label>
            <textarea name="reply" id="reply" style="width:150px"></textarea>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>