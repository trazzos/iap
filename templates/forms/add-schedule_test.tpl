<form id="addSchedule_testForm" name="addSchedule_testForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddSchedule_test"/>
<input type="hidden" id="periodoId" name="periodoId" value="{$periodoId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Tipo Examen::</label>
            <select name="typetestId" id="typetestId">
                {html_options values=$optTypetestIds output=$optTypetestOut selected=$optTypetestSel}
            </select>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Fecha Examen::</label>
            <select name="typetestDay" id="typetestDay" style="width:50px">
                {html_options values=$optDateDayIds output=$optDateDayOut selected=$optDateDaySel}
            </select>
            
            <select name="typetestMonth" id="typetestMonth" style="width:100px; margin-left:10px">
                {html_options values=$optDateMonthIds output=$optDateMonthOut selected=$optDateMonthSel}
            </select>
            
            <select name="typetestYear" id="testYear" style="width:100px; margin-left:10px">
                {html_options values=$optDateYearsIds output=$optDateYearsOut selected=$optDateYearsSel}
            </select>                    
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Comentarios</label>
            <input name="comments" id="comments" type="text" value="" size="60" maxlength="60"/>               
      </div>
            
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addSchedule_test" name="addSchedule_test" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>