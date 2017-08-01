<table style='color:#93a2a9; align-text:center; font-size:13px; '>
<thead>
</thead>
<tbody>
{foreach from=$activeCourses item=item}
	<tr>
		<td style='text-align:left'>
		<b>
			<a href='' style=' text-decoration:none; color: #93a2a9;'  onClick='verDetalle({$item.courseId})'>
				<font>{$item.name}</font>
			</a>
		</b>
		<br>{$item.majorName}
		</td>
	</tr>
{/foreach}
</table>
