<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Lista de Docentes
        </div>
        <div class="actions">
			
        </div>
    </div>
    <div class="portlet-body">
	
			<form id='frmFlt'>
		<div style='display:-webkit-inline-box'>
			
			<table>
				<tr>
					<td><b>Vigencia</b></td>
					<td><input type='checkbox' name='activo'  >Activo</td>
					<td><input type='checkbox' name='programado'>Programado </td>
				</tr>
				<tr>
					<td><b>Tipo</b></td>
					<td><input type='checkbox' name='linea' >En Linea</td>
					<td><input type='checkbox' name='presencial'>Presencial</td>
				</tr>
			</table>

		</div>
		</form>
		<center><button onClick='onBuscar()' class='btn green'>Buscar</button></center>
		<div id="msj">
		</div>
		<div id='container'>
        {include file="{$DOC_ROOT}/templates/lists/report-docentes.tpl"}
		</div>
		
    </div>
</div>