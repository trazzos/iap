<form id="addStudentForm" name="addStudentForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddStudent"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in">
      
       <div class="content-settings-row">
            <label for="f1">Folio:</label>
            <b>{$current}</b>                      
      </div>
      
       <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Fecha:</label>
            <input type="text" name="date" id="date" value="{$date}" size="10" style="width:150px" /><a href="javascript:NewCal('date','ddmmyyyy')"><img src="{$WEB_ROOT}/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Forma de Pago:</label>
            	<select name='paymentMethod' id="paymentMethod">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Convenio">Convenio</option>
                </select>                    
      </div>
      
       <div class="content-settings-row">
            <label for="f1">Recibo Numero:</label> 
            <b>{$invoiceId}</b>                      
      </div>

       <div class="content-settings-row">
            <label for="f1">Datos del Recibo:</label> 
            <b>{$invoice.lastNamePaterno} {$invoice.lastNameMaterno} {$invoice.names}</b>                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Comentarios:</label>
            <input type="text" name="comments" id="comments" value="Pago de Colegiatura" />                      
      </div>
      
	  
	    <div class="content-settings-row">
            <label for="f1">N&uacute;mero de Autorizaci&oacute;n Bancaria :</label>
						<input type="text" name="autorize" id="autorize" value="" />                                  
      </div>
	  
      <div class="content-settings-row">
            <label for="f1">Saldo Recibo:</label>
						<input type="text" name="debt" id="debt" value="{$invoice.debt}" readonly="readonly"/>                                  
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Importe Pago:</label>
            <input type="text" name="amount" id="amount" value="{$invoice.debt}" onchange="revisa_anticipo()" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Importe Aplicado:</label>
            <input type="text" name="amountApplied" id="amountApplied" value="{$invoice.debt}" readonly="readonly" />                      
      </div>

      <div class="content-settings-row">
            <label for="f1">Saldo a Favor:</label>
						<input type="text" name="credit" id="credit" value="{$invoice.saldoFavor}" readonly="readonly" />             
      </div>

      <div class="content-settings-row">
            <label for="f1">Anticipo:</label>
						<input type="text" name="anticipo" id="anticipo" value="" readonly="readonly" />
      </div>
      

      <div class="content-settings-row">
      <input type="submit" class="btn-70-l" id="addStudent" name="addStudent" value="." />                  <a href="http://www.iapchiapasenlinea.mx/invoicesrep.php?invoiceId={$invoiceId}" target="_blank" title="Imprimir pagos" > <img src="{$WEB_ROOT}/images/icons/16/pdf.gif" class="spanPay" id="d-{$subject.invoiceId}" name="d-{$subject.name}"  /></a>     
      </div>        

    </div>
   </li>                              
 </ul>    
</form>