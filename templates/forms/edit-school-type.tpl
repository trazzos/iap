<form id="editSchoolTypeForm" name="editSchoolTypeForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditSchoolType"/>
<input type="hidden" id="schtypId" name="schtypId" value="{$post.schtypId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="clave" id="clave" value="{$post.clave}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="{$post.name}" />                      
      </div>
            
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editSchoolType" name="editSchoolType" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>