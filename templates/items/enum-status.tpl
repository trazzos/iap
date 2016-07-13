<option value="autorizada" {if $info.status == "autorizada"}selected{/if}>Autorizada</option>        			
<option value="baja" {if $info.status == "baja"}selected{/if}>Baja</option>
<option value="egresado" {if $info.status == "egresado"}selected{/if}>Egresado</option> 
<option value="cancelada" {if $info.status == "cancelada"}selected{/if}>Cancelada</option>
<option value="pendiente" {if $info.status == "pendiente"}selected{/if}>Pendiente</option>