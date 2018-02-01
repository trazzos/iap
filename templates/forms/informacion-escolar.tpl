<form  id='frmGral_2'>
Licenciatura
<br>
<br>
Escuela Licenciatura
<input type="text" name="lic_escuela" value='{$infoBasic.estudios.0.escuela}' class='form-control'><br>
<input type="checkbox" name="lic_titulo"  {if $infoBasic.estudios.0.titulo eq 'si'} checked {/if} id="">Titulo<br>
<input type="checkbox" name="lic_acta" {if $infoBasic.estudios.0.actaExamen eq 'si'} checked {/if} id="">Acta de Examen<br>
<input type="checkbox" name="lic_cedula" {if $infoBasic.estudios.0.cedula eq 'si'} checked {/if} id="">Cedula<br>
<br>
Maestria
<br>
<br>
Escuela Maestria
<input type="text" name="master_escuela" value='{$infoBasic.estudios.1.escuela}' class='form-control'><br>
<input type="checkbox" name="master_titulo" {if $infoBasic.estudios.1.titulo eq 'si'} checked {/if}  id="">Titulo<br>
<input type="checkbox" name="master_acta"  {if $infoBasic.estudios.1.actaExamen eq 'si'} checked {/if} id="">Acta de Examen<br>
<input type="checkbox" name="master_cedula"{if $infoBasic.estudios.1.cedula eq 'si'} checked {/if}  id="">Cedula<br>
<br>
Doctorado
<br>
<br>
Escuela Doctorado
<input type="text" name="doc_escuela" value='{$infoBasic.estudios.2.escuela}' class='form-control'><br>
<input type="checkbox" name="doc_titulo" {if $infoBasic.estudios.2.titulo eq 'si'} checked {/if} id="">Titulo<br>
<input type="checkbox" name="doc_acta" {if $infoBasic.estudios.2.actaExamen eq 'si'} checked {/if} id="">Acta de Examen<br>
<input type="checkbox" name="doc_cedula" {if $infoBasic.estudios.2.cedula eq 'si'} checked {/if}  id="">Cedula<br>
</form>
<div id="msj_2">
</div>
<center>
<button onClick='guardarInformacion(2)' class="btn green" >
Guardar
</button>
</center>