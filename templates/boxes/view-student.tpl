<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-user-plus "></i>Ver Grupo {$tip}
        </div>

    </div>
    <div class="portlet-body">
        <div id="tblContent">
{*TODO quitar box solo dejar lista*}
<!-- Esta pantalla se muestra en   Cirricula -> Historial-> Alumnos A/I --><div class="popupheader" style="z-index:70">
      
      <div class="ftitl">
        <div class="dgBox" id="draganddrop">
            {*}<div style="float:left;"><img src="{$WEB_ROOT}/images/icons/addPopup.png" /></div>{*}
            <div class="flabel" style="float:left">
            <!--Alumnos--> {$status|ucfirst} </div>
        </div>
            <!--<div class="closePopup" id="closePopUpDiv">
            <a href="javascript:void(0)" title="Cerrar"><img src="{$WEB_ROOT}/images/new/close.png" /></a>
            </div>-->				
       </div>
               
     {include file="{$DOC_ROOT}/templates/lists/student1.tpl"}                      
    </div>
    </div>
</div>