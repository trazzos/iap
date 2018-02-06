<form  id='frmGral_3'>
<input type="hidden" name="personalId" class='form-control' value='{$info.personalId}'>
Favor de completar todos los campos, sino cuenta con información en alguno de ellos colocar las siglas N/D, una vez completado todos los
campos se le habilitará el botón 'Descargar' para que pueda imprimir la 'Carta de Autorización de pago' y lo pueda firmar, este archivo 
deberá escanearlo y subirlo en la sección de 'DOCUMENOS DEL DOCENTE'.
<br>
<br>
Institución Bancaria
<input type="text" name="banco" class='form-control' {if $cId eq 'si'} disabled {/if} value="{$infoBasic.infoBanco.0.nombreBanco}"><br> 
No. Cuenta
<input type="text" name="ncuenta" class='form-control' {if $cId eq 'si'} disabled  {/if} value="{$infoBasic.infoBanco.0.numCuenta}"><br>
CLABE Interbancaria
<input type="text" name="clabeInter" class='form-control' {if $cId eq 'si'} disabled {/if} value="{$infoBasic.infoBanco.0.claveInterbancaria}"><br>
Sucursal
<input type="text" name="sucursal" class='form-control' {if $cId eq 'si'} disabled {/if} value="{$infoBasic.infoBanco.0.sucursal}"><br>
Numero de Plaza
<input type="text" name="nplaza" class='form-control' {if $cId eq 'si'} disabled {/if} value="{$infoBasic.infoBanco.0.numeroPlaza}"><br>
Lugar
<input type="text" name="lugar" class='form-control' {if $cId eq 'si'} disabled {/if} value="{$infoBasic.infoBanco.0.lugar}"><br>
Correo Electrónico para notificación de pago
<input type="text" name="correoNoti" class='form-control' {if $cId eq 'si'} disabled {/if} value="{$infoBasic.infoBanco.0.correo}"><br>
</form>
{if $cId ne 'si'}
<div id="msj_3">
</div>
<center>
<button onClick='guardarInformacion(3)' class="btn green" >
Guardar
</button>
</center>
{/if}