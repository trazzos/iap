<?php
	header('Access-Control-Allow-Origin: *'); 
?>
<table style='color:#93a2a9; align-text:center; font-size:13px; '>
<thead>
</thead>
<tbody>
<?php 
foreach($activeCourses as $key=>$aux){
?>
	<tr>
		<td style='text-align:left'>
		<b>
			<a href='' style=' text-decoration:none; color: #93a2a9;'  onClick='verDetalle(<?php echo $aux["courseId"] ?>)'>
				<font><?php echo $aux["name"]?></font>
			</a>
		</b>
		<br><?php echo $aux["majorName"]?>
		</td>
	</tr>
<?php 
}
?>
</table>
