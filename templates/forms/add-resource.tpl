<!-- TinyMCE -->
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
      mode : "textareas",
      theme : "silver",
      skin : "oxide",
      menubar:false,
	});
</script>
<!-- /TinyMCE -->
<form id="addMajorForm" name="addMajorForm" method="post" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>

<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-small">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="{$name}" style="width:150px" />         
      </div>

      <div class="content-settings-row">
            <label for="f1">Descripcion:</label>
            <input type="text" name="description" id="description" value="{$description}" style="width:150px" />
      </div>

      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Archivo:</label>
            <input type="file" name="path" id="path" value="" maxlength="30"/>
      </div>

      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>