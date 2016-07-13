<form id="editSemesterForm" name="editSemesterForm" method="post">
<input type="hidden" id="semesterId" name="semesterId" value="{$post.semesterId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="name" id="name" value="{$post.name}" />                      
      </div>
                  
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="clave" id="clave" value="{$post.clave}" />                      
      </div>     
            
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="saveEditSemester" name="saveEditSemester" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>