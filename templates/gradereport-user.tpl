<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Acta de Calificaciones {if $gradeReportInfo.regularization == "Y"}- Intersemestral{/if}</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        
        <div style="text-align: left; width:100%; margin-left:30px;">
            <div style="float:left; width:60%;"><b>SEMESTRE:</b> {$gradeReportInfo.semesterClave}</div>
            <div style="float:left; width:40%;"><b>GENERACION:</b> {$gradeReportInfo.generation}</div>
            <div style="float:left; width:60%;"><b>GRUPO:</b> {$gradeReportInfo.groupClave}</div>
            <div style="float:left; width:40%;"><b>PERIODO:</b> {$gradeReportInfo.periodoName}</div>
            <div style="float:left; width:95%;"><b>MATERIA:</b> {$gradeReportInfo.subjectName}</div>
                     
        </div>
        
        <hr style="clear:both;"/>
        <div style="width:100%;">
            <div align="left"  style="margin:10px 0; width:50%; float:left;" class="lnkGral">
                <a href="{$WEB_ROOT}/gradereport-user/printReportId/{$gradeReportInfo.gradereportId}" id="printGradeReport" style="cursor:pointer; text-decoration:none" target="_blank">
                    <img src="{$WEB_ROOT}/images/icons/printer1.png" border="0" /> Imprimir Acta Semestral
                </a> |
                <a href="{$WEB_ROOT}/gradereport-user/printR1Id/{$gradeReportInfo.gradereportId}" id="printR1" style="cursor:pointer; text-decoration:none" target="_blank">
                    <img src="{$WEB_ROOT}/images/icons/printer1.png" border="0" /> Imprimir Acta R1
                </a> |
                <a href="{$WEB_ROOT}/gradereport-user/printReportList/{$gradeReportInfo.gradereportId}" id="printGradeReportList" style="cursor:pointer; text-decoration:none" target="_blank">
                    <img src="{$WEB_ROOT}/images/icons/printer1.png" border="0" /> Imprimir Seguimiento de Grupo
                </a>
            </div>
            <div align="right" style="margin:10px 0; width:50%; float:right">
                <span id="addStudentIrregularR1" style="cursor:pointer; text-align:right;">
                    {if $gradeReportInfo.regularization == "Y"}
                        {if $info.positionId == 1}
                            <img src="{$WEB_ROOT}/images/icons/add.png" border="0" /> Agregar Alumnos
                        {/if}
                    {/if}
                </span>
                <form name="regularizationDataForm" id="regularizationDataForm">
                    <input type="hidden" id="gradereportId" name="gradereportId" value="{$gradeReportInfo.gradereportId}" />
                    <input type="hidden" id="subjectId" name="subjectId" value="{$gradeReportInfo.subjectId}" />
                    <input type="hidden" id="semesterId" name="semesterId" value="{$gradeReportInfo.semesterId}" />
                    <input type="hidden" id="periodoId" name="periodoId" value="{$gradeReportInfo.periodoId}" />
                    <input type="hidden" id="regularization" name="regularization" value="{$gradeReportInfo.regularization}" />
                </form>
            </div>
            <div style="clear:both"></div>
        </div>  
                                                                  
        <div id="tblContent" class="lnkBlack">{include file="lists/gradereport-user.tpl"}</div>
         
         <div style="text-align: left; padding-top:10px">
            {if $info.positionId == 1}
                <b>CATEDR&Aacute;TICO</b>: {$gradeReportInfo.personalFullName}
            {/if}
        </div>
                         
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       
       <div style="text-align: center;" class="lnkGral">
            <a href="{$WEB_ROOT}/gradereport" >Regresar</a>
        </div>             
           
    </div> 
   </li>                                                              
 </ul>