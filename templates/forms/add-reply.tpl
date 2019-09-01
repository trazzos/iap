<!-- TinyMCE -->
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>



<script type="text/javascript">
	tinyMCE.init({
      mode : "textareas",
      theme : "silver",
      skin : "oxide",
      menubar:false,
        plugins : "paste",
		theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
        paste_auto_cleanup_on_paste : true,
        paste_preprocess : function(pl, o) {
            // Content string containing the HTML from the clipboard
            o.content = "-: CLEANED :-\n" + o.content;
        },
        paste_postprocess : function(pl, o) {
            // Content DOM node containing the DOM structure of the clipboard
            o.node.innerHTML = o.node.innerHTML + "\n-: CLEANED :-";
        }

		
	});
</script>
<!-- /TinyMCE -->
<form id="addMajorForm" name="addMajorForm" method="post" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<input type="hidden" id="topicsubId" name="topicsubId" value="{$topicsubId}"/>
<input type="hidden" id="moduleId" name="moduleId" value="{$moduleId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1" style="width:250px"><span class="reqField">*</span> Respuesta:</label>
            <textarea name="reply" id="reply" style="width: 700px; height: 250px;"></textarea>
       </div>

   <!--
   {if $anexoforo} 
    file="{$WEB_ROOT}/anexoforo/{$anexoforo.path}&mime={$anexoforo.mime}" 
  {/if} 
  -->
    <div class="content-settings-row">
            <label for="f1">Subir imagen (solo formato jpg)</label>
            <input type="file" name="path" id="path" />
      </div>
    
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px"> 
      <input type="submit" class="btn-70-l"   value="." accept="image/jpeg" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>