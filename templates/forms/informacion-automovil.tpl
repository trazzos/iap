<form  id='frmGral_4'>
<input type="hidden" name="personalId" class='form-control' value='{$info.personalId}'>
Si usted impartirá clases presenciales y llevará su automóvil al IAP-Chiapas los dias de clase, le pedimos de favor
llenar la siguiente información para poder apartarle un cajón el dia de sus clases
<br>
<br>
Modelo automóvil
<input type="text" name="modeloAuto" class='form-control' {if $cId eq 'si'} disabled {/if} value='{$infoBasic.infoAuto.0.modelo}'><br>
Color automóvil
<input type="text" name="colorAuto" class='form-control' {if $cId eq 'si'} disabled {/if} value='{$infoBasic.infoAuto.0.color}'><br>
Placas automóvil
<input type="text" name="placasAuto" class='form-control' {if $cId eq 'si'} disabled {/if} value='{$infoBasic.infoAuto.0.placas}'><br>
</form>
{if $cId ne 'si'}
<div id="msj_4">
</div>
<center>
<button onClick='guardarInformacion(4)' class="btn green" >
Guardar
</button>
</center>
{/if}