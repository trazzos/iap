<div id="divForm">
	<form id="addInstitutionForm" name="addInstitutionForm" method="post">
		<fieldset>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Nombre:</div><input name="name" id="name" type="text" value="{$post.name}" size="50" maxlength="50"/>
			</div>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Nombre Completo:</div><input name="name_long" id="name_long" type="text" value="{$post.name_long}" size="50" maxlength="120"/>
			</div>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Clave de C.T.:</div><input name="identifier" id="identifier" type="text" value="{$post.identifier}" size="50" maxlength="30"/>
			</div>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Ubicacion:</div><input name="ubication" id="Ubicacion" type="text" value="{$post.ubication}" size="50" maxlength="60"/>
			</div>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Direccion:</div><input name="ubication_long" id="ubication_long" type="text" value="{$post.ubication_long}" size="50" maxlength="80"/>
			</div>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Telefono:</div><input name="phone" id="phone" type="text" value="{$post.phone}" size="50" maxlength="20"/>
			</div>
			<div class="formLine" style="width:100%; text-align:left">
				<div style="width:30%;float:left">* Fax:</div><input name="fax" id="fax" type="text" value="{$post.fax}" size="50" maxlength="20"/>
			</div>
			<hr />
	        <div class="formLine">* Campos requeridos</div>
			<div style="clear:both"></div>
			<hr />
			<div class="formLine" style="text-align:center">
				<input type="button" id="addInstitution" name="addInstitution" class="buttonForm" value="Agregar Institution" />
			</div>
			<input type="hidden" id="type" name="type" value="saveAddInstitution"/>
			<input type="hidden" id="institutionId" name="institutionId" value="{$post.institutionId}"/>
		</fieldset>
	</form>
</div>
