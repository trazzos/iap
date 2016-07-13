<form id="addTypetestForm" name="addTypetestForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddTypetest"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="identifier" id="identifier" value="" />
            <div id="identifierTip" class="textoEjemplo" style="visibility:hidden" align="right">
                CLAVE DEL EXAMEN.
            </div>                     
      </div>
            
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Tipo:</label>
            <input type="text" name="typetest" id="typetest" value="" />
            <div id="typetestTip" class="textoEjemplo" style="visibility:hidden;" align="right">                
                DESCRIPCION DEL EXAMEN. EJEMPLO: PARCIAL, GLOBAL, ETC.
            </div>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Es regularizaci&oacute;n?:</label>
            <select name="regularization" id="regularization" />
                <option value="*" selected="selected">Seleccione</option>
                <option value="yes">SI</option>
                <option value="no">NO</option>
            </select>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addTypetest" name="addTypetest" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>