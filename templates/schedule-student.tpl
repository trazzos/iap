<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Horario del Alumno</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
    
    {if $confirmated}
        <div align="center" class="msgConfirmation">
        Tu inscripci&oacute;n ha sido confirmada correctamente.
        <br />Ahora ya puedes imprimir tu horario.
        </div>
        <br />
        <div align="center">
            <span id="impScheduleDiv" style="cursor:pointer">
                <a href="javascript:void(0)" onclick="PrintSchedule({$userId})" style="text-decoration:none;  color:#000000">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" />Imprimir Horario
                </a>
            </span>   
        </div>
    {else}        
        {if !$schV1}
        <div align="right">
            <input type="button" name="confirm" value="Confirmar Inscripci&oacute;n" style="height:30px;" onclick="confirm_schedule()"   />
        </div>
        <div align="center">
            <span id="addScheduleDiv" style="cursor:pointer">
                <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />Agregar Horario
            </span>   
        </div>
        {else}
        <div align="right">
            <input type="button" name="confirm" value="Confirmar Inscripci&oacute;n" style="height:30px;" onclick="confirm_scheduleV1({$userId},{$schGpoId})"   />
        </div>
        {/if}
    {/if}       
          
    <div style="clear:both"></div>
        
        <div id="tblContent">{include file="lists/schedule-student.tpl"}</div>
                                 
    </div> 
   </li>                                                              
 </ul>

{*


<div>{$name}</div>

    {if $confirmated}
        <div align="center" class="msgConfirmation">
        Tu inscripci&oacute;n ha sido confirmada correctamente.
        <br />Ahora ya puedes imprimir tu horario.
        </div>
        <br />
        <div align="center">
            <span id="impScheduleDiv" style="cursor:pointer">
                <a href="javascript:void(0)" onclick="PrintSchedule({$userId})" style="text-decoration:none;  color:#000000">
                <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" />Imprimir Horario
                </a>
            </span>   
        </div>
    {else}        
        {if !$schV1}
        <div align="right">
            <input type="button" name="confirm" value="Confirmar Inscripci&oacute;n" style="height:30px;" onclick="confirm_schedule()"   />
        </div>
        <div align="center">
            <span id="addScheduleDiv" style="cursor:pointer">
                <img src="{$WEB_ROOT}/images/icons/add.png" border="0" />Agregar Horario
            </span>   
        </div>
        {else}
        <div align="right">
            <input type="button" name="confirm" value="Confirmar Inscripci&oacute;n" style="height:30px;" onclick="confirm_scheduleV1({$userId},{$schGpoId})"   />
        </div>
        {/if}
    {/if}


<div id="content">
{include file="lists/schedule-student.tpl"}
</div>
*}