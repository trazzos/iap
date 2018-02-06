<form  id='frmGral_2'>
<input type="hidden" name="personalId" class='form-control' value='{$info.personalId}'>
Licenciatura
<br>
<br>
Escuela Licenciatura
<input type="text" name="lic_escuela" value='{$infoBasic.estudios.0.escuela}' class='form-control' {if $cId eq 'si'} disabled {/if}><br>
<input type="checkbox" name="lic_titulo"  {if $infoBasic.estudios.0.titulo eq 'si'} checked {/if} id="" {if $cId eq 'si'} disabled {/if}>Titulo<br>
<input type="checkbox" name="lic_acta" {if $infoBasic.estudios.0.actaExamen eq 'si'} checked {/if} id="" {if $cId eq 'si'} disabled {/if}>Acta de Examen<br>
<input type="checkbox" name="lic_cedula" {if $infoBasic.estudios.0.cedula eq 'si'} checked {/if} id="" {if $cId eq 'si'} disabled {/if}>Cedula<br>
<br>
Maestria
<br>
<br>
Escuela Maestria
<input type="text" name="master_escuela" value='{$infoBasic.estudios.1.escuela}' class='form-control' {if $cId eq 'si'} disabled {/if}><br>
<input type="checkbox" name="master_titulo" {if $infoBasic.estudios.1.titulo eq 'si'} checked {/if}  id="" {if $cId eq 'si'} disabled {/if}>Titulo<br>
<input type="checkbox" name="master_acta"  {if $infoBasic.estudios.1.actaExamen eq 'si'} checked {/if} id="" {if $cId eq 'si'} disabled {/if}>Acta de Examen<br>
<input type="checkbox" name="master_cedula"{if $infoBasic.estudios.1.cedula eq 'si'} checked {/if}  id="" {if $cId eq 'si'} disabled {/if}>Cedula<br>
<br>
Doctorado
<br>
<br>
Escuela Doctorado
<input type="text" name="doc_escuela" value='{$infoBasic.estudios.2.escuela}' {if $cId eq 'si'} disabled {/if}class='form-control'><br>
<input type="checkbox" name="doc_titulo" {if $infoBasic.estudios.2.titulo eq 'si'} checked {/if} {if $cId eq 'si'} disabled {/if} id="">Titulo<br>
<input type="checkbox" name="doc_acta" {if $infoBasic.estudios.2.actaExamen eq 'si'} checked {/if} {if $cId eq 'si'} disabled {/if} id="">Acta de Examen<br>
<input type="checkbox" name="doc_cedula" {if $infoBasic.estudios.2.cedula eq 'si'} checked {/if}  {if $cId eq 'si'} disabled {/if} id="">Cedula<br>
</form>

{if $cId ne 'si'}
	<div id="msj_2">
	</div>
	<center>
	<button onClick='guardarInformacion(2)' class="btn green" >
	Guardar
	</button>
	</center>
{/if}