<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Calificaci&oacute;n por alumno</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        
        <div style="text-align: left; width:100%; margin-left:30px;">
            <div style="float:left; width:40%;"><b>No.CONTROL:</b> {$gradescoreInfo.controlNumber}</div>
            <div style="float:left; width:60%;"><b>GRUPO:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$gradescoreInfo.studentGroupClave}</div>
            <div style="float:left; width:40%;"><b>NOMBRE:</b>&nbsp;&nbsp;&nbsp;{$gradescoreInfo.lastNamePaterno} {$gradescoreInfo.lastNameMaterno}, {$gradescoreInfo.names}</div>
            <div style="float:left; width:60%;"><b>SEMESTRE:</b>&nbsp; {$gradereportInfo.semesterClave}</div>            
            <div style="float:left; width:100%;"><b>MATERIA:</b>&nbsp;&nbsp;&nbsp; {$gradereportInfo.subjectName}</div>
        </div>
        
        <hr style="clear:both;"/>
         
         <br /> 
                                                                  
        <div id="tblContent" class="lnkBlack">{include file="lists/gradescore-user.tpl"}</div>
         
                                  
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       
       <div style="text-align: center;" class="lnkGral">
            <a href="{$WEB_ROOT}/gradereport-user/gradereportId/{$gradescoreInfo.gradereportId}" >Regresar</a>
        </div>             
           
    </div> 
   </li>                                                              
 </ul>



{*
<div align="center">
	<div style="text-align: left; width:100%">
		<div style="width:100%; text-align: center;">CALIFICACION POR ALUMNO</div><br/>
		<div style="float:left; width:40%;"><b>No.CONTROL:</b> {$gradescoreInfo.controlNumber}</div>
		<div style="float:left; width:60%;"><b>GRUPO:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$gradescoreInfo.studentGroupClave}</div>
		<div style="float:left; width:40%;"><b>NOMBRE:</b>&nbsp;&nbsp;&nbsp;{$gradescoreInfo.lastNamePaterno} {$gradescoreInfo.lastNameMaterno}, {$gradescoreInfo.names}</div>
		<div style="float:left; width:60%;"><b>SEMESTRE:</b>&nbsp; {$gradereportInfo.semesterClave}</div>
		<div style="float:left; width:40%;">&nbsp;</div>
		<div style="float:left; width:60%;"><b>MATERIA:</b>&nbsp;&nbsp;&nbsp; {$gradereportInfo.subjectName}</div>
		
	</div>
	<hr style="clear:both;"/>
	
</div>
<div id="content">
	{include file="lists/gradescore-user.tpl"}
</div>
<br />
<div style="text-align: center;">
	<a href="{$WEB_ROOT}/gradereport-user/gradereportId/{$gradescoreInfo.gradereportId}" >Regresar al Listado de Calificaciones</a>
</div>
*}