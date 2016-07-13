<form id="addPeriodoForm" name="addPeriodoForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddPeriodo"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Periodo:</label>
            <input type="text" name="identifier" id="identifier" value="" />
            	<div id="PeriodoEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Ejemplo: 12-12, 12-13, 13-13, etc...
				</div>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre Periodo:</label>
            <input type="text" name="name" id="name" value="" />
            	<div id="nameEjemplo" class="textoEjemplo" style="visibility:hidden; display:block;" align="right">
					Ejemplo: AGOSTO/2012 - ENERO/2013, etc...
				</div>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Periodo Inicia:</label>
            <input type="text" name="starts" id="starts" value="" />
            	<div id="startsEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Formato 'YYYY-MM-DD', Ejemplo: 2010-08-10
				</div>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Periodo Termina:</label>
            <input type="text" name="ends" id="ends" value="" />
            	<div id="endsEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Formato 'YYYY-MM-DD', Ejemplo: 2010-08-10
				</div>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fichas Inicia:</label>
            <input type="text" name="fichasStarts" id="fichasStarts" value="" />
            	<div id="fichasStartsEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Formato 'YYYY-MM-DD', Ejemplo: 2010-08-10
				</div>                     
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fichas Termina:</label>
            <input type="text" name="fichasEnds" id="fichasEnds" value="" />
            	<div id="fichasEndsEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Formato 'YYYY-MM-DD', Ejemplo: 2010-08-10
				</div>                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Periodo Vacacional Inicia:</label>
            <input type="text" name="vacationsStarts" id="vacationsStarts" value="" />
            	<div id="vacationsStartsEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Formato 'YYYY-MM-DD', Ejemplo: 2010-08-10
				</div>                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Periodo Vacacional Termina:</label>
            <input type="text" name="vacationsEnds" id="vacationsEnds" value="" />
            	<div id="vacationsEndsEjemplo" class="textoEjemplo" style="visibility:hidden" align="right">
					Formato 'YYYY-MM-DD', Ejemplo: 2010-08-10
				</div>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Activo:</label>
            <select name="active" id="active"/>
                {html_options values=$optActiveIds output=$optActiveOut selected=$optActiveSel}
            </select>                   
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addPeriodo" name="addPeriodo" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>