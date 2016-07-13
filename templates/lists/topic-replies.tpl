<script type="text/javascript">
function confirmando()
{

if (confirm("Estas seguro que deseas eliminar la respuesta a este Topico? "))
return true
  else
  return false
}
</script>

<ul id="sort-box" class="sorts">
  <li>              
    <div>
			{foreach from=$replies item=item} 
      
		 	<div class="content-settings-row-register" align="left">
      {if $positionId == 1} 
						
			<form id="deleteReplay" name="deleteReplay" method="post">
			<input type="hidden" id="moduleId" name="moduleId" value="{$moduleId}">
			<input type="hidden"  id="replyId" name="replyId" value="{$item.replyId}" />
			 <div style="padding-right:60px">   
			<input type="submit" class="btn-70-delete"  onClick="return confirmando();" style="border:none; height:24px;" name="eliminar" value="" id="eliminar" >
			 </div >   
			</form>
			
			{*}<a href="" onClick="alert({$item.replyId});">Eliminar</a>{*}
      {/if}


			      <b>  .:: Asunto: {$topic.subject} 
            Respondido Por: {if $item.positionId == NULL || $item.positionId == 0} 			{$item.names} {$item.lastNamePaterno} {$item.lastNameMaterno}             
            								{else}			 {$item.name} {$item.lastname_paterno} {$item.lastname_materno}			 
                            {/if}			
             Fecha: {$item.replyDate|date_format:"%d-%m-%Y %H:%M:%S"} ::.</b>
           </div>     
      <div class="content-settings-row-register">
	    
            {$item.content}
	  </div>
	  
	 
	  <div class="content-settings-row-register">
			
			<img src="{$WEB_ROOT}/forofiles/{$item.path}" >
      </div>
	  
			{/foreach}
     </div>
   </li>                              
 </ul>