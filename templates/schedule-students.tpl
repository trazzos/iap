<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Horario del Alumno</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
           
           <div style="font-size:14px" align="center"><b>{$name}</b></div>
           <p>&nbsp;</p>
                                                 
    {if !$schV1}   
    <div align="center">
        <span id="addScheduleDiv" style="cursor:pointer">
            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />Agregar/Editar Horario
        </span>   
    </div>
    {else}
    	{if !$confirmated}
    	<div align="center">
            <input type="button" name="confirm" value="Confirmar Inscripci&oacute;n" style="height:30px;" onclick="confirm_schedule({$userId},{$schGpoId})"   />
        </div>
        {else}
        <div align="center" class="msgConfirmation">
        La inscripci&oacute;n ha sido confirmada correctamente.
        </div>
        {/if}
    {/if}
	<div style="float:left">
    	{if !$schV1}
        <span id="impScheduleDiv" style="cursor:pointer">
        	<a href="javascript:void(0)" onclick="DeleteSchedule({$userId})" style="text-decoration:none;  color:#000000">
            <img src="{$WEB_ROOT}/images/icons/delete.png" border="0" />Eliminar Horario
        	</a>
        </span>
        {/if}
    </div>
    <div style="float:right">
        <span id="impScheduleDiv" style="cursor:pointer">
        	<a href="javascript:void(0)" onclick="PrintSchedule({$userId})" style="text-decoration:none;  color:#000000">
            <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" />Imprimir Horario
        	</a>
        </span>   
    </div>
    <div style="clear:both"></div>
        
        <div id="tblContent">{include file="lists/schedule-student.tpl"}</div>
                         
       <div align="center" class="lnkGral">
       		<p>&nbsp;</p>
            <p>&nbsp;</p>
            <a href="{$WEB_ROOT}/student">Regresar</a>
       </div>             
                 
    </div> 
   </li>                                                              
 </ul> 