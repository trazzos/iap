<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Perfil
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
	
		<center>
					<form id="frmFoto">
						
						<input type="hidden" name="userId" class='form-control' value='{$info.userId}'>
						<div ><!--
							<img src='{$foto}' style='width: 100px !important'>-->
							<div class="profile-userpic">
                    <img src="{{$infoStudent.imagen}}" class="img-responsive" alt=""> </div>
							<div style='position: relative; 
							bottom:0px; width:100%; margin-right: -100px;'>
							<span class="btn btn-default btn-file">
							<input type="file" name="archivos" id="archivos" onChange="onChangePicture({$info.userId})" class="btn-file" style="border: 0px solid !important">
							<i class="material-icons md-16 icon-green"  >create</i>
							</span>
							
							</div>
							</a>
						</div>
					</form>
					<br>
					<br>
					<form id="frmGral">
					<textarea name='desc'></textarea>
					<br>
					</form>
					<button class="btn green" type="button">Guardar</button>
					<br>
					<br>
					Cuéntanos mas acerca de ti, incluye datos como edad, formación académica y profesional, intereses personales y algunos aspectos que permitan a tus compañeros conocerte 
					<br>
					(Esta información será visible para tu asesor y demás compañeros)
				</center>
    </div>
</div>

<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7"

    });
</script>