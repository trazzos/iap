<form id="editClassroomForm" name="editClassroomForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditClassroom"/>
<input type="hidden" id="id" name="id" value="{$info.classroomId}" />
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="clave" id="clave" value="{$info.clave}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="{$info.name}" />                      
      </div>
                  
      <div class="content-settings-row">
            <label for="f1">Descripci&oacute;n:</label>
            <textarea name="description" id="description" cols="50" rows="6">{$info.description}</textarea>                   
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editClassroom" name="editClassroom" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>