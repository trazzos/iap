<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Grupo
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
	
		<center>
			
		{foreach from=$lstGrupo item=item key=key}
		
   

			<div  style=" float: left;
			margin: 0 auto;
			width: 9%;
			height: 9%;
			-webkit-border-radius: 10%!important;
			-moz-border-radius: 10%!important;
			border-radius: 10%!important;">
				<a href="{$WEB_ROOT}/perfil/id/{$id}">
				{if $item.rutaFoto eq ''}
				       <img src="{$WEB_ROOT}/alumnos/no_foto.JPG" class="img-responsive" alt="" style="border-radius: 60%;  width: 60%;height: 60%;"> 

				{else}
				       <img src="{$WEB_ROOT}/alumnos/{$item.rutaFoto}" class="img-responsive" alt="" style="border-radius: 60%;  width: 60%;height: 60%;"> 
				{/if}
				<font style="font-size:11px; color:#73b760 ">Ver Perfil</font>
				</a>
			</div>
			<div style=" float:left;">
			<br>
			<font style="font-size:11px">{$item.names|upper} {$item.lastNamePaterno|upper}  {$item.lastNameMaterno|upper}</font>
			</div>
			<div style=" float:left;">
			<br>
			
			</div>
			<div style=" clear:both;"></div>
		{/foreach}
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