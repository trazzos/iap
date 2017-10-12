<div class="portlet box red" style='margin-top:5% !important; width:70%; margin-left:15% !important'>
    <div class="portlet-title" >
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Selecciona la curricula
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body" >
        <div id="tblContent">
			
			<form id="frmGral">
			<input  type="hidden" name="solicitudId" id="solicitudId"  value="{$solicitudId}" >
			<span class="caption-subject font-blue-madison bold uppercase">Activa</span>
			 <div class="portlet-body">
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light" >
                                    <thead>
                                    <tr class="uppercase">
                                        
                                        <th style="text-align: center"> Tipo </th>
                                        <th style="text-align: center"> Nombre </th>
										 <th style="text-align: center"> Grupo </th>
                                        <th style="text-align: center"> Modalidad </th>
                                        <th style="text-align: center"> Fecha Inicial </th>
                                        <th style="text-align: center"> Fecha Final </th>
{*
                                        <th style="text-align: center"> Pagos </th>
*}
                                        
                                        <th style="text-align: center"> Modulos </th>
                                       
                                        <th style="text-align: center"> Selecciona </th>
                                    </tr>
                                    </thead>
                                    {foreach from=$activeCourses item=subject}
                                    <tr>
                                       
                                        <td align="center">{$subject.majorName}</td>
                                        <td align="center">{$subject.name}</td>
										  <td align="center">{$subject.group}
                                        <td align="center">{$subject.modality}</td>
                                        <td align="center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
                                        <td align="center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
                                     
{*
                                        <td align="center">{$subject.payments}</td>
*}
                                        <td align="center">{$subject.courseModule}
                                      
                                        <td align="center">
                                           <input type="checkbox" name="activa_{$subject.courseId}" id="">
                                        </td>
                                     </tr>
                                        {foreachelse}
                                        <tr>
                                            <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
                                        </tr>

                                    {/foreach}

                                </table>
                            </div>
                        </div>
						
				<span class="caption-subject font-blue-madison bold uppercase">Finalizado</span>
				 <div class="portlet-body">
                            <div class="table-scrollable table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                    <tr class="uppercase">
                                        <th style="text-align: center"> Clave </th>
                                        <th style="text-align: center"> Tipo </th>
                                        <th style="text-align: center"> Nombre </th>
                                        <th style="text-align: center"> Modalidad </th>
                                        <th style="text-align: center"> Fecha Inicial </th>
                                        <th style="text-align: center"> Fecha Final </th>
                                        {*
                                                                                <th> Pagos </th>
                                        *}
                                        <th style="text-align: center"> Dias Activo </th>
                                        <th style="text-align: center"> Modulos </th>
                                        <th style="text-align: center"> Calificación </th>
                                        <th style="text-align: center"> Selecciona </th>
                                    </tr>
                                    </thead>
                                    {foreach from=$finishedCourses item=subject}

                                    <tr>
                                        <td style="text-align: center">{$subject.clave}</td>
                                        <td style="text-align: center">{$subject.majorName}</td>
                                        <td style="text-align: center">{$subject.name}</td>
                                        <td style="text-align: center">{$subject.modality}</td>
                                        <td style="text-align: center">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
                                        <td style="text-align: center"style="text-align: center">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
                                        <td >{$subject.daysToFinish}</td>
                                        {*
                                                                                <td align="center">{$subject.payments}</td>
                                        *}
                                        <td style="text-align: center">{$subject.courseModule}
                                        <td style="text-align: center">{$subject.mark}</td>
                                        <td style="text-align: center">
										 <input type="checkbox" name="finalizada_{$subject.courseId}" id="">
										</td>
                                     </tr>
                                        {foreachelse}
                                        <tr>
                                            <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
                                        </tr>
                                    {/foreach}

                                </table>
                            </div>
                        </div>
             </form>
			 <div id="msjgg"></div>
			<center><button onClick='addSaveSolicitud()' class="btn green submitForm" >Solicitar</button> </center>
        </div>
    </div>
</div>

