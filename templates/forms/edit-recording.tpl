<form id="editRoleForm" name="editRoleForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditRole"/>
<input type="hidden" id="recordingId" name="recordingId" value="{$info.recordingId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Id de la Grabacion:</label>
            <input type="text" name="embed" id="embed" value="{$info.embed}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Titulo:</label>
            <input type="text" name="title" id="title" value="{$info.title}" />                      
      </div>
            
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editRole" name="editRole" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>