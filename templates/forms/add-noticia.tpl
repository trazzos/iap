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
<form id="addNoticia" name="addNoticia" method="post" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="addNoticia"/>
<input type="hidden" id="courseModuleId" name="courseModuleId" value="{$id}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-small">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Noticia:</label>
            <input type="text" name="title" id="title" value="{$title}" style="width:150px" />         
      </div>

      <div class="content-settings-row">
            <label for="f1" style="width:200px">Descripcion:</label>
            <textarea name="description" id="description" value="{$description}" cols="30"></textarea>
      </div>

      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="." />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>