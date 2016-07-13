
{if $positionId==1}
   {assign var="Color" value="#3e9129"}
   {*}  <img src="{$WEB_ROOT}/images/admin.jpg" width="100%"> {*}
    {assign var="imagen" value="admin"}
   {/if}
   
   {if $positionId!=1 && $positionId!=0}
   {assign var="Color" value="#3e9129"}
   {*}<img src="{$WEB_ROOT}/images/docente.jpg" width="100%"> {*}
   {assign var="imagen" value="docente"}
   
   {/if}
   
   
   
  {*}#3e9129{*}
   
   
   {assign var="Color" value="#3e9129"}
   {if $positionId==1 ||  $positionId==4}
<div style="background:url('{$WEB_ROOT}/images/{$imagen}.jpg');background-repeat:repeat; width:100%; min-height:59px">
{else}
<div style="background:url('{$WEB_ROOT}/images/general.jpg');background-repeat:repeat; width:100%; min-height:59px">

{/if}
<div id="topbar" style="background-color:#000;">

  <a class="none" style="width:1%" href="http://www.iapchiapas.org.mx">&nbsp;</a>




  <a class="image" style=""  href="http://www.iapchiapas.org.mx"><img src="http://iapchiapas.org.mx/images/logos/logo_2.png" /></a>
  <a target="_blank" class="none" style="width:1%" href="http://www.iapchiapas.org.mx">&nbsp;</a>

  {if !$User.username}

{*}        <b><a target="_blank" class="link" style=""  href="http://www.iapchiapas.org.mx/nosotros.php">Nosotros</a></b>
        <a class="separator" href="#"><img src="/images/logos/separator.png" /></a>
    
        <b><a target="_blank" class="link" style=""  href="http://www.iapchiapas.org.mx/oferta.php">Oferta</a></b>
        <a target="_blank" class="separator" href="#"><img src="/images/logos/separator.png" /></a>
    
        <b><a target="_blank" class="link" style=""  href="http://www.iapchiapas.org.mx/noticias.php">Noticias</a></b>
        <a target="_blank" class="separator" href="#"><img src="/images/logos/separator.png" /></a>
    
        <b><a target="_blank" class="link" style=""  href="http://www.iapchiapas.org.mx/eventos.php">Pr&oacute;ximos Eventos</a></b>
        <a target="_blank" class="separator" href="#"><img src="/images/logos/separator.png" /></a>
    

        <b><a target="_blank" class="link" style=""  href="http://www.iapchiapas.org.mx/publicaciones.php">Publicaciones</a></b>
        <a target="_blank" class="separator" href="#"><img src="/images/logos/separator.png" /></a>
    

        <b><a target="_blank" class="link" style=""  href="http://www.iapchiapas.org.mx/biblioteca.php">Biblioteca</a></b>
        <a target="_blank" class="separator" href="#"><img src="/images/logos/separator.png" /></a>
      
        <b><a class="link" style=""  href="http://www.iapchiapas.org.mx/contacto.php">Contacto</a></b>
        <a target="_blank" class="separator" href="#"><img src="/images/logos/separator.png" /></a>
    
    
  
  <a class="image_2" style="" target="_blank" href="http://www.facebook.com/IAPChiapas"><img src="http://iapchiapas.org.mx/images/logos/FB_4.png" /></a>    
  <a class="separator" href="#"><img src="/images/logos/separator.png" /></a>
  <a class="image_2" style="" target="_blank" href="https://twitter.com/Iap_Chiapas"><img src="http://iapchiapas.org.mx/images/logos/TW_4.png" /></a>
  {*}
        {/if}
  
</div><!--topbar-->
</div> 

