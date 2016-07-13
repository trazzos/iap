<div id="hiddenmenu" align="center">
         
      <div class="icon-no-spacer">
          <p><a {if $page == "homepage"}id="active-icon"{/if} href="{$WEB_ROOT}" title="Inicio">
             <img src="{$WEB_ROOT}/images/icons/48/home.png" />Inicio</a>
          </p>
      </div>
      {if $AccessMod[32] == 1 || $AccessMod[33] == 1}

      <div class="icon-spacer">
          <p><a {if $mnuMain == "cursos"}id="active-icon"{/if} href="{$WEB_ROOT}/alumn-services" title="Cursos">
            <img src="{$WEB_ROOT}/images/icons/48/user.png" />Mis Datos</a>
          </p>
      </div>
      {*}<div class="icon-spacer">
          <p><a {if $mnuMain == "cobranza"}id="active-icon"{/if} href="{$WEB_ROOT}/invoices-student" title="Pagos">
            <img src="{$WEB_ROOT}/images/icons/48/money.png" />Cobranza</a>
          </p>
      </div>{*}
      
      {/if}

      {if $User.positionId == 1 || $AccessMod[1] == 1 || $AccessMod[2] == 1  || $AccessMod[3] == 1 || $AccessMod[4] == 1 || $AccessMod[5] == 1 || $AccessMod[6] == 1 || $AccessMod[7] == 1 || $AccessMod[9] == 1 || $AccessMod[10] == 1}
      
         {assign var="iniPage" value=""}
         
         {if $AccessMod[1] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="major"}
          {elseif $AccessMod[3] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="personal"}
          {elseif $AccessMod[4] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="student"}
          {elseif $AccessMod[5] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="position"}
          {elseif $AccessMod[9] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="role"}
          {elseif $AccessMod[35] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="profesion"}     
          {elseif $AccessMod[36] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="recording"}      
          {elseif $AccessMod[17] == 1 || $User.positionId == 1} 
                {assign var="iniPage" value="classroom"}     
          {elseif $User.positionId == 1}
                {assign var="iniPage" value="cancel-code"}
          {elseif $User.positionId == 1}
                {assign var="iniPage" value="school-type"}
          {elseif $AccessMod[19] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="kardex-calificacion"}
          {/if}     
     
      <div class="icon-spacer">
          <p><a {if $mnuMain == "catalogos"}id="active-icon"{/if}
		  href="{$WEB_ROOT}/{$iniPage}" 
		   
		  
		  
		  
		  title="Cat&aacute;logos">
          <img src="{$WEB_ROOT}/images/icons/48/catalogos.png" />Cat&aacute;logos</a>
          </p>
      </div>
      {/if}
      
      {if $AccessMod[34] == 1 || $User.positionId == 1}
      <div class="icon-spacer">
          <p><a {if $mnuMain == "cobranza"}id="active-icon"{/if} href="{$WEB_ROOT}/invoices" title="Pagos">
            <img src="{$WEB_ROOT}/images/icons/48/money.png" />Cobranza</a>
          </p>
      </div>
      {/if}
      
      {if $AccessMod[11] == 1 || $User.positionId == 1 || $AccessMod[31] == 1 || $AccessMod[8] == 1}
      <div class="icon-spacer">
          <p>
          {if !$docente}
          <a {if $mnuMain == "cursos"}id="active-icon"{/if} href="{$WEB_ROOT}/subject" title="Cursos">
            <img src="{$WEB_ROOT}/images/icons/48/wordprocessing.png" />Curricula</a>
          {else}
          <a {if $mnuMain == "cursos"}id="active-icon"{/if} href="{$WEB_ROOT}/history-subject" title="Cursos">
            <img src="{$WEB_ROOT}/images/icons/48/wordprocessing.png" />Curricula</a>
          {/if}  
          </p>
      </div>
      {/if}
      
      {if  $AccessMod[21] == 1 || $AccessMod[25] == 1 || $AccessMod[26] == 1 || $AccessMod[27] == 1 || $AccessMod[29] == 1 || $AccessMod[30] == 1 || $User.positionId == 1}
      
          {assign var="iniPage" value=""}
          
          {if $AccessMod[21] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="report-redi"}
          {elseif $AccessMod[25] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="report-cancel"}
          {elseif $AccessMod[26] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="report-regular"}
          {elseif $AccessMod[27] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="report-desercion"}
          {elseif $AccessMod[29] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="report-calificacion"}
          {elseif $AccessMod[30] == 1 || $User.positionId == 1}
                {assign var="iniPage" value="study-constancy"}
          {elseif $User.positionId == 1}
                {assign var="iniPage" value="report-excel"}
          {/if}
      
      {*}<div class="icon-spacer">
          <p><a {if $mnuMain == "reportes"}id="active-icon"{/if} href="{$WEB_ROOT}/{$iniPage}" title="Reportes">
            <img src="{$WEB_ROOT}/images/icons/48/view_statistics.png" />Reportes</a>
          </p>
      </div>{*}
      {/if}
      
      {*if $AccessMod[12] == 1 || $User.positionId == 1}
      <div class="icon-spacer">
          <p><a {if $mnuMain == "docentes"}id="active-icon"{/if} href="{$WEB_ROOT}/schedule-personal" title="Docentes">
            <img src="{$WEB_ROOT}/images/icons/48/docentes.png" />Docentes</a>
         </p>
      </div>
      {/if*}
      
      <div class="icon-spacer">
          <p><a {if $mnuMain == "tv"}id="active-icon"{/if} href="{$WEB_ROOT}/tv" title="Tv">
            <img src="{$WEB_ROOT}/images/icons/48/tv.png" />&nbsp;&nbsp;Tv&nbsp;&nbsp;</a>
          </p>
      </div>
      
      
      {if $User.positionId == 1 || $AccessMod[13] == 1 || $AccessMod[14] == 1  || $AccessMod[15] == 1 || $AccessMod[16] == 1}
      	
          {assign var="iniPage" value=""}
      
          {if $AccessMod[13] == 1 || $User.positionId == 1}
          		{assign var="iniPage" value="institution"}
          {elseif $AccessMod[14] == 1 || $User.positionId == 1}
          		{assign var="iniPage" value="periodo"}
          {elseif $AccessMod[15] == 1 || $User.positionId == 1}
          		{assign var="iniPage" value="schedule_test"}
          {elseif $AccessMod[16] == 1 || $User.positionId == 1}
          		{assign var="iniPage" value="schedule-time"}
          {/if}
      
      <div class="icon-spacer">
          <p><a {if $mnuMain == "reportes"}id="active-icon"{/if} href="{$WEB_ROOT}/reporte-general" title="Configuraci&oacute;n">
            <img src="{$WEB_ROOT}/images/icons/48/view_statistics.png" />Reportes</a>
          </p>
      </div>
      
      <div class="icon-spacer">
          <p><a {if $mnuMain == "configuracion"}id="active-icon"{/if} href="{$WEB_ROOT}/{$iniPage}" title="Configuraci&oacute;n">
            <img src="{$WEB_ROOT}/images/icons/48/applications_systemg.png" />Configuraci&oacute;n</a>
          </p>
      </div>
      {/if}
                         
 </div>