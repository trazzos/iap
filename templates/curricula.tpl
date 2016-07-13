 
 <ul id="sort-box" class="sorts">
  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/icons/22/display.png" alt="" />
            <h2>Curricula Activa</h2>
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
          {include file="{$DOC_ROOT}/templates/lists/student-curricula-activa.tpl"}
        </div>
 </li>
  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/icons/22/display.png" alt="" />
            <h2>Curricula Inactiva (Falta de pago, baja, etc)</h2> 
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
          {include file="{$DOC_ROOT}/templates/lists/student-curricula-inactiva.tpl"}
         
        </div>
 </li>
  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="images/icons/22/display.png" alt="" />
            <h2>Curricula Finalizada</h2> 
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
          {include file="{$DOC_ROOT}/templates/lists/student-curricula-finalizada.tpl"}
         
        </div>
 </li>

   
 </ul>
                           

