<div id="divForm">
	<form id="editAllUsersScoreForm" name="editAllUsersScoreForm" method="post">
		<fieldset>
			<legend>{$labelText}<strong>{$labelTest}</strong></legend>
			<table style="width:100%">
				<tr>
					<th align="center">No.</th>
					<th align="center">NOMBRE</th>
					<th>GRUPO</th>
					<th align="center">CALIF.</th>
                    {if $testIdentifier == "PARCIAL"}
                    <th align="center">INASIST.</th>
                    {/if}
				</tr>
				{foreach from=$scoresEnum item=item key=key}
					<tr>
						<td>
							<input name="listNumber" id="listNumber" type="text" value="{$item.listNumber}" size="3" maxlength="3" disabled="disabled"c />
						</td>
						<td>
							<input name="fullName" id="fullName" type="text" value="{$item.studentFullName}" size="60" maxlength="60" disabled="disabled"c />
						</td>
						<td>
							<input name="group" id="group" type="text" value="{$item.studentGroupClave}" size="2" maxlength="2" disabled="disabled" />
						</td>
						<td>
							<input name="gradescore-{$item.gradReportUserId}" id="gradescore-{$item.gradReportUserId}" type="text" value="{$item.gradescore}" size="5" maxlength="5" />
						</td>
                        {if $testIdentifier == "PARCIAL"}
                        <td>
							<input name="attendance-{$item.gradReportUserId}" id="attendance-{$item.gradReportUserId}" type="text" value="{$item.attendance}" size="3" maxlength="2" />
						</td>
                        {/if}
					</tr>
				{/foreach}
			</table>
			<hr />
			<div class="formLine" style="text-align:center;">
                <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      			<input type="button" class="btn-70-l" id="editAllGradescore" name="editAllGradescore" />
			</div>
            <div style="clear:both"></div>
            <br />
			<input type="hidden" id="type" name="type" value="saveEditAllGradescore"/>
			<input type="hidden" id="testIdentifier" name="testIdentifier" value="{$testIdentifier}"/>
			<input type="hidden" id="gradereportId" name="gradereportId" value="{$gradereportId}"/>
		</fieldset>
	</form>
</div>