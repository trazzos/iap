<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in">
			
      {if $myModule.welcomeTextDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Bienvenida ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.welcomeTextDecoded}
      </div>
      {/if}

      {if $myModule.introductionDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Introducci&oacute;n ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.introductionDecoded}
      </div>
      {/if}

      {if $myModule.intentionsDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Intenciones del Curso ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.intentionsDecoded}
      </div>
      {/if}

      {if $myModule.objectivesDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Objetivos del Curso ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.objectivesDecoded}
      </div>
      {/if}

      {if $myModule.themesDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Temas ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.themesDecoded}
      </div>
      {/if}

      {if $myModule.schemeDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Esquema ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.schemeDecoded}
      </div>
      {/if}

      {if $myModule.methodologyDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Metodologia ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.methodologyDecoded}
      </div>
      {/if}

      {if $myModule.politicsDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Politicas ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.politicsDecoded}
      </div>
      {/if}
	  
      {if $myModule.evaluationDecoded != ""}
		 	<div class="content-settings-row-register" align="center">
            <b>.:: Evaluaci&oacute;n ::.</b>
      </div>      
      <div class="content-settings-row-register-padding">
            {$myModule.evaluationDecoded}
      </div>
      {/if}
   {if $myModule.bibliography != ""}		 
   <div class="content-settings-row-register" align="center"> 
   <b>.:: Bibliograf&iacute;a ::.</b>      </div>            <div class="content-settings-row-register-padding">            {$myModule.bibliographyDecoded}       </div>      {/if}
   


    </div>
   </li>                              
 </ul>