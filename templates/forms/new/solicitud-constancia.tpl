<!-- TinyMCE
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>
<!-- /TinyMCE -->
{if $id eq 'con'}
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" action="{$WEB_ROOT}/transcript-cc" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="saveConstancias"/>
{else if $id eq 'unsubscribe'}
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" action="{$WEB_ROOT}/unsubscribe" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="saveSolicitudBaja"/>
{else}
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" action="{$WEB_ROOT}/transcript-sc" enctype="multipart/form-data">
<input type="hidden" id="type" name="type" value="saveConstancias"/>
{/if}
    <input type="hidden" id="tipo" name="tipo" value="{$id}"/>
    
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Comprobante de Pago:</label>
            <div class="col-md-8">
               <input type="file" name="comprobante">
			   <br>
			   <br>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" class="btn green submitForm" id="addMajor" name="addMajor"/>
                    <button type="button" class="btn default closeModal" onClick="closeModal()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7"

    });
</script>
