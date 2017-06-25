<form id="addMajorForm" name="addMajorForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddMajor"/>
<input type="hidden" id="courseModuleId" name="courseModuleId" value="{$myModule.courseModuleId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in">

			 <div class="content-settings-row-register" align="center">
            <b>.:: Datos de la actividad ::.</b>
      </div>      
      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Titulo de la actividad:</label>
            <b>{$activity.resumen}</b> | <a href="{$WEB_ROOT}/edit-modules-course/id/{$activity.courseModuleId}" title="Editar Modulo" style="color:#000" >Regresar a Modulo</a>
      </div>

			 <div class="content-settings-row-register" align="center">
            <b>.:: Configuracion de Examen ::.</b>
      </div>      


      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Tiempo Limite (Minutos):</label>
            <input type="text" name="timeLimit" id="timeLimit" value="{$activity.timeLimit}" style="width:150px" />
      </div>

      <div class="content-settings-row-register">
            <label for="f1"><span class="reqField">*</span> Numero de Preguntas:</label>
            <select name="noQuestions" id="noQuestions">
            	<option value="4" {if $activity.noQuestions == 4} selected="selected" {/if}>4</option>
            	<option value="5" {if $activity.noQuestions == 5} selected="selected" {/if}>5</option>
            	<option value="10" {if $activity.noQuestions == 10} selected="selected" {/if}>10</option>
            	<option value="20" {if $activity.noQuestions == 20} selected="selected" {/if}>20</option>
            	<option value="25" {if $activity.noQuestions == 25} selected="selected" {/if}>25</option>
            	<option value="50" {if $activity.noQuestions == 50} selected="selected" {/if}>50</option>
            	<option value="100" {if $activity.noQuestions == 100} selected="selected" {/if}>100</option>
            </select>
      </div>

      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="submit" class="btn-70-l" id="addMajor" name="addMajor" value="Guardar" />
      </div>
      
			 <div class="content-settings-row-register" align="center">
            <b>.:: Preguntas ::.</b>
				<div style="text-align:left">
        	Preguntas en Total: <b>{$activity.noQuestions * 2}</b>
          <br />
        	Preguntas de Examen: <b>{$activity.noQuestions}</b>
          <br />
        	Ponderacion por Pregunta: <b>{$ponderationPerQuestion}%</b>
        </div>
          <div id="tblContent">{include file="lists/questions.tpl"}</div>
      </div>      
      
    </div>
   </li>                              
 </ul>    
</form>