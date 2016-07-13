<form id="editGradescoreForm" name="editGradescoreForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditGradescore"/>
<input type="hidden" id="testIdentifier" name="testIdentifier" value="{$post.testIdentifier}"/>
<input type="hidden" id="gradReportUserId" name="gradReportUserId" value="{$post.gradReportUserId}"/>
<ul id="sort-box" class="sorts">
    <li>              
      <div class="content-in-popup">
                
        <div class="content-settings-row">
              <label for="f1">Examen:</label>
              <input type="text" name="testDescrip" id="testDescrip" value="{$post.testDescrip}" disabled="disabled" />                      
        </div>
        
        <div class="content-settings-row">
              <label for="f1">Fecha:</label>
              <input type="text" name="datetest" id="datetest" value="{$post.datetest}" disabled="disabled" />                      
        </div>
       
        <div class="content-settings-row">
              <label for="f1">Inasistencia:</label>
              <input type="text" name="attendance" id="attendance" value="{$post.attendance}" />                   
        </div>
        
        <div class="content-settings-row">
              <label for="f1">Calificaci&oacute;n:</label>
              <input type="text" name="gradescore" id="gradescore" value="{$post.gradescore}" />                   
        </div>
        
        <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
        <div style="padding-right:60px">                 
        <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
        <input type="button" class="btn-70-l" id="editGradescore" name="editGradescore" />                  
        </div>
        
      </div>
     </li>
                                
   </ul>
      
 </form>