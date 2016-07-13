<form id="editInstitutionForm" name="editInstitutionForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditInstitution"/>
<input type="hidden" id="institutionId" name="institutionId" value="{$post.institutionId}"/>
<ul id="sort-box" class="sorts">
    <li>              
      <div class="content-in-popup">
        
        <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Nombre:</label>
              <input type="text" name="name" id="name" value="{$post.name}" />                      
        </div>
        
         <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Nombre Completo:</label>
              <input type="text" name="name_long" id="name_long" value="{$post.name_long}" />                      
        </div>
        
         <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Clave de C.T.:</label>
              <input type="text" name="identifier" id="identifier" value="{$post.identifier}" />                      
        </div>
        
         <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Ubicaci&oacute;n:</label>
              <input type="text" name="ubication" id="ubication" value="{$post.ubication}" />                      
        </div>
        
         <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Direcci&oacute;n:</label>
              <input type="text" name="ubication_long" id="ubication_long" value="{$post.ubication_long}" />                      
        </div>
        
         <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Tel&eacute;fono:</label>
              <input type="text" name="phone" id="phone" value="{$post.phone}" maxlength="14" />
              <div align="right" id="telefonoTip" class="textoEjemplo" style="visibility:hidden;">
					Formato: 999-99-9-99-99
				</div>                     
        </div>
        
         <div class="content-settings-row">
              <label for="f1"><span class="reqField">*</span> Fax:</label>
              <input type="text" name="fax" id="fax" value="{$post.fax}" maxlength="14" />
              <div align="right" id="faxTip" class="textoEjemplo" style="visibility:hidden;">
					Formato: 999-99-9-99-99
				</div>                      
        </div>

         <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Jefe de Oficina:</label>
            <input type="text" name="jefeOficina" id="jefeOficina" value="{$post.jefeOficina}" maxlength="255" />
        </div>

         <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Presidente:</label>
            <input type="text" name="presidente" id="presidente" value="{$post.presidente}" maxlength="255" />
        </div>

         <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Responsable de Serv. Escolares:</label>
            <input type="text" name="respServiciosEscolares" id="respServiciosEscolares" value="{$post.respServiciosEscolares}" maxlength="255" />
        </div>

         <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Director Academico:</label>
            <input type="text" name="directorAcademico" id="directorAcademico" value="{$post.directorAcademico}" maxlength="255" />
        </div>

         <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Jefe de Servicios Escolares:</label>
            <input type="text" name="jefeServiciosEscolares" id="jefeServiciosEscolares" value="{$post.jefeServiciosEscolares}" maxlength="255" />
        </div>
                
        <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
        <div style="padding-right:60px">                 
        <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
        <input type="button" class="btn-70-l" id="editInstitution" name="editInstitution" />                  
        </div>
        
      </div>
     </li>
                                
   </ul>
      
 </form>