<form id="editMajorForm" name="editMajorForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditMajor"/>
<input type="hidden" id="majorId" name="majorId" value="{$post.majorId}"/>
<ul id="sort-box" class="sorts">
    <li>              
      <div class="content-in-popup">
        
        <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Nombre:</label>
              <input type="text" name="name" id="name" value="{$post.name}" />                      
        </div>
        
        
        <div class="content-settings-row">
              <label for="f1">Descripci&oacute;n:</label>
              <textarea name="description" id="description" cols="50" rows="6">{$post.description}</textarea>                   
        </div>
        
        <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
        <div style="padding-right:60px">                 
        <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
        <input type="button" class="btn-70-l" id="editMajor" name="editMajor" />                  
        </div>
        
      </div>
     </li>
                                
   </ul>
      
 </form>