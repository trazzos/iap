<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Grupo
        </div>
		<div class="actions">
			<a class="btn {$BUTTON_COLOR}" href="{$WEB_ROOT}/edit-modules-course/id/{$id}" title="Regresar")">Regresar
			</a>
		</div>
    </div>
    <div class="portlet-body">
	
		{foreach from=$lstGrupo item=item key=key}
			<div  class="col-md-3 text-center padding-tb-10">

				<a href="{$WEB_ROOT}/graybox.php?page=view-perfil&id={$item.userId}" data-target="#ajax" data-toggle="modal" data-width="1000px">
				{if $item.rutaFoto eq ''}
				       <img src="{$WEB_ROOT}/images/no_foto.jpg" class="" alt="" style="border-radius: 60%;  width: 25%;height: 25%; ">

				{else}
				       <img src="{$WEB_ROOT}/alumnos/{$item.rutaFoto}?{$rand}" class="" alt="" style="border-radius: 60%;  width: 25%;height: 25%;">
				{/if}
					<br>
				<font style="font-size:11px; color:#73b760 ">Ver Perfil</font>
				</a>
				<br>
				<font style="font-size:11px">{$item.names|upper} {$item.lastNamePaterno|upper}  {$item.lastNameMaterno|upper}</font>
			</div>

		{/foreach}
		<div style="clear: both"></div>
    </div>
</div>