<div align="center" style="padding-top:10px" class="subMnu">
  {if $mnuMain == "catalogos"}
  <table width="750" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td class="tbMnuIzq" width="20"></td>
      {if $AccessMod[1] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/major">Programas Acad&eacute;micos</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      {if $AccessMod[3] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/personal">Personal</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      {if $AccessMod[4] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/student">Alumnos</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      {if $AccessMod[5] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/position">Puestos</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      {if $AccessMod[9] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center" width="60"><a href="{$WEB_ROOT}/role">Roles</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      {if $AccessMod[35] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center" width="60"><a href="{$WEB_ROOT}/profesion">Profesiones</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
   
      {if $AccessMod[36] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center" width="60"><a href="{$WEB_ROOT}/recording">Videoconferencias</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
   
      {if $AccessMod[17] == 1 || $User.positionId == 1}      
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/classroom">Salones</a></td>
      <td class="tbMnu" align="center" width="10"></td>
      {/if}
      <td class="tbMnuDer" width="20"></td>
      
  </tr>      
  </table>    
  </div>
  
  {/if}
  
  {if $mnuMain == "reportes"}
  {*}
  <table width="800" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td class="tbMnuIzq" width="20"></td>
      {if $AccessMod[21] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/report-redi">Inscripci&oacute;n</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}  
      {if $AccessMod[25] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/report-cancel">De Bajas</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}  
      {if $AccessMod[27] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/report-desercion">Reprobaci&oacute;n</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}  
      {if $AccessMod[29] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/report-calificacion">Calificaciones</a></td>         
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}  
      {if $AccessMod[30] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/study-constancy">Constancia de Estudios</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      {if $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/report-excel">Excel</a></td>         
      {/if}
      <td class="tbMnuDer" width="20"></td>
  </tr>      
  </table>
  {*}
  
  {/if}
  
  {if $mnuMain == "admision"}
	  {if $AccessMod[20] == 1 || $User.positionId == 1}
      <table width="150" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td class="tbMnuIzq" width="20"></td>
          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/ficha">Fichas</a></td>                  
          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/ficha">Fichas</a></td>                  
          <td class="tbMnuDer" width="20"></td>
      </tr>      
      </table>
      {/if}
  {/if}
  {if $mnuMain == "cursos"}
  		{assign var="inicio" value="0"}
          <table width="400" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
		     {if $AccessMod[8] == 1 || $User.positionId == 1}
			 {assign var="inicio" value="1"}
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/subject">Curricula</a></td>
              {/if}
			
			  {if $AccessMod[11] == 1 || $User.positionId == 1}
			    {if $inicio != 0}<td class="tbMnu" align="center" width="10">|</td>{/if}
              <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/history-subject">Historial</a></td>
              
			      
			   {/if}
			   <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
        
  {/if}

{if $vistaPrevia==1}

  {if $mnuMain == "modulo"}
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "view-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/view-modules-student/id/{$id}/vp/1">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "information-modules-student"}current-link-menu{/if}"href="{$WEB_ROOT}/information-modules-student/id/{$id}/vp/1">Informaci&oacute;n</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-image-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-image-modules-student/id/{$id}/vp/1">Calendario</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-modules-student/id/{$id}/vp/1">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "presentation-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/presentation-modules-student/id/{$id}/vp/1">Clase</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "examen-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/examen-modules-student/id/{$id}/vp/1">Ex&aacute;menes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "resources-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/resources-modules-student/id/{$id}/vp/1">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "forum-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/forum-modules-student/id/{$id}/vp/1">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "team-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/team-modules-student/id/{$id}/vp/1">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  {/if}
 
 
  
  {if $mnuMain == "modulo1"}
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "view-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/view-modules-student/id/{$id}/vp/1">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "information-modules-student"}current-link-menu{/if}"href="{$WEB_ROOT}/information-modules-student/id/{$id}/vp/1">Informacion</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-image-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-image-modules-student/id/{$id}">Calendario</a></td>-->
            
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-modules-student/id/{$id}/vp/1">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu {if $page == "presentation-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/presentation-modules-student/id/{$id}">Clase</a></td>-->
          
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "examen-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/examen-modules-student/id/{$id}/vp/1">Examenes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "resources-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/resources-modules-student/id/{$id}/vp/1">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "forum-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/forum-modules-student/id/{$id}/vp/1">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "team-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/team-modules-student/id/{$id}/vp/1">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  {/if}
  
  
  {else}
  
  
  
  
    {if $mnuMain == "modulo"}
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "view-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/view-modules-student/id/{$id}">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "information-modules-student"}current-link-menu{/if}"href="{$WEB_ROOT}/information-modules-student/id/{$id}">Informaci&oacute;n</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-image-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-image-modules-student/id/{$id}">Calendario</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-modules-student/id/{$id}">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "presentation-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/presentation-modules-student/id/{$id}">Clase</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "examen-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/examen-modules-student/id/{$id}">Ex&aacute;menes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "resources-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/resources-modules-student/id/{$id}">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "forum-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/forum-modules-student/id/{$id}">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "team-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/team-modules-student/id/{$id}">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  {/if}
 
 
  
  {if $mnuMain == "modulo1"}
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu {if $page == "view-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/view-modules-student/id/{$id}">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "information-modules-student"}current-link-menu{/if}"href="{$WEB_ROOT}/information-modules-student/id/{$id}">Informacion</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-image-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-image-modules-student/id/{$id}">Calendario</a></td>-->
            
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "calendar-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/calendar-modules-student/id/{$id}">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu {if $page == "presentation-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/presentation-modules-student/id/{$id}">Clase</a></td>-->
          
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "examen-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/examen-modules-student/id/{$id}">Examenes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "resources-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/resources-modules-student/id/{$id}">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "forum-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/forum-modules-student/id/{$id}">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu {if $page == "team-modules-student"}current-link-menu{/if}" href="{$WEB_ROOT}/team-modules-student/id/{$id}">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  {/if}
  {/if}
  
  
  
  {if $mnuMain == "cobranza"}
  		{if $AccessMod[34] == 1 || $User.positionId == 1}
          <table width="600" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/invoices">Recibos</a></td>

       {*}       <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/sistema/nueva-factura">Nuevo Comprobante</a></td>{*}
              
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/sistema/consultar-facturas">Consultar Facturas</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/admin-folios/nuevos-folios">Lista de Folios</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/admin-folios/actualizar-certificado">Actualizar Certificado</a></td>
              
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
        {/if}
  {/if}
  
  
  
  
  
   {if $mnuMain == "tv"}
      <table width="300" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td class="tbMnuIzq" width="20"></td>
          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/tv">Videoconferencia en Vivo</a></td>                  
          <td class="tbMnu" align="center">|</td>                  
          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/recorded">Grabaciones</a></td>                  
          <td class="tbMnuDer" width="20"></td>
      </tr>      
      </table>
  {/if}
 
  {if $mnuMain == "docentes"}
      {if $AccessMod[12] == 1 || $User.positionId == 1}
      <table width="150" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td class="tbMnuIzq" width="20"></td>
          <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/schedule-personal">Horario</a></td>                  
          <td class="tbMnuDer" width="20"></td>
      </tr>      
      </table>
      {/if}
  {/if}
  
  {if $mnuMain == "configuracion"}
  <table width="500" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td class="tbMnuIzq" width="20"></td>
      {if $AccessMod[13] == 1 || $User.positionId == 1}
      <td class="tbMnu" align="center"><a href="{$WEB_ROOT}/institution">Datos de la Escuela</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      {/if}
      <td class="tbMnuDer" width="20"></td>
  </tr>      
  </table>
  {/if}
  </div>