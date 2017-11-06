<hr>
<a class="btn" href="javascript:;" onClick="SaveMsj('{$infoC.courseModuleId}','activo')" data-title="Trash">Enviar</a>
<a class="btn" href="javascript:;" onClick="SaveMsj('{$infoC.courseModuleId}','borrador')" data-title="Trash">Descartar</a>
<a class="btn" href="javascript:;" onClick="SaveMsj('{$infoC.courseModuleId}','borrar')" data-title="Trash">Borrar</a>
<hr>
<form id="frmGral"> 
<input type="hidden" name="chatId" id="chatId" value='{$infoC.chatId}' >
<input type="hidden" name="yoId" id="yoId" value='{$infoC.yoId}' >
<input type="hidden" name="type" id="type">
<textarea name="mensaje"></textarea>
</form>
<hr>
<input type="file">
<hr>
<a class="btn" href="javascript:;" onClick="SaveMsj('{$infoC.courseModuleId}','enviar')" data-title="Trash">Enviar</a>
<a class="btn" href="javascript:;" onClick="SaveMsj('{$infoC.courseModuleId}','descartar')" data-title="Trash">Descartar</a>
<a class="btn" href="javascript:;" onClick="SaveMsj('{$infoC.courseModuleId}','borrar')" data-title="Trash">Borrar</a>