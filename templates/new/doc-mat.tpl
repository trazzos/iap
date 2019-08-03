<div class="portlet box {$PORTLET_COLOR}">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Lista de Docentes
        </div>
        <div class="actions">
			<a  class="btn {$BUTTON_COLOR}" href="javascript:void(0)" onClick="printPDF()" target="_blank" title='AGREGAR'>
				<i class="fa fa-plus"></i> Imprimir
			</a>
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
		<center><button onClick='onBuscar()' class='btn {$BUTTON_COLOR}'>Buscar</button></center>
		<div id="msj">
		</div>
		<div id='container'>
        {include file="{$DOC_ROOT}/templates/lists/report-docentes.tpl"}
		</div>
		
    </div>
</div>