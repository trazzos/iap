<html>
<head>
    <title>Acta de Calificaciones</title>
    <style type='text/css'>
        .txtTicket{
            font-size:12px;
            font-family: sans-serif;
            text-transform: uppercase;
            /*font:bold 12px 'Trebuchet MS';*/
        }
        table,td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .notas{
            font-size:10px;
            font-family: sans-serif;
            text-transform: uppercase;
            /*font:bold 12px 'Trebuchet MS';*/
        }
        table,td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body style="font-size: 20px;">
<table class='txtTicket' style="width: 100%; border: none; font-size: 16px">
    <tr>
        <td style="border:none; width: 25%">
            <img width='280px' src='{$DOC_ROOT}/images/logos/{$LOGO_PDF}'>
        </td>
        <td style="border:none">
            <center>
                <b>{$myInstitution['name_long']}</b>
                {if $COMPANY_ACTA_TEXT}<br><b>{$COMPANY_ACTA_TEXT}</b> {/if}
                <br>Clave: <b>{$myInstitution['identifier']}</b>
                <br><b>REPORTE DE CALIFICACIONES DEL {$info['initialDate']} al {$info['finalDate']}</td></b>
            </center>
        </td>
    </tr>
</table>
<br>
<table class='txtTicket' style="width: 100%; border: none; font-weight: normal; font-size: 16px">
    <tr>
        <td colspan="3" style="border: none">Nombre del catedrático: {$infoPersonal['name']} {$infoPersonal['lastname_materno']} {$infoPersonal['lastname_paterno']}</td>
    </tr>
    <tr>
        <td style="border: none">Asignatura: {$info['claveMateria']} {$info['name']}</td>
        <td style="border: none">Grado: {$info['semesId']}</td>
        <td style="border: none">Grupo: {$info['groupA']}</td>
    </tr>
    <tr>
        <td colspan="3" style="border: none">Aréa: {$info['subjectName']}</td>
    </tr>
    <tr>
        <td style="border: none">Turno: {$infoCourse['turn']}</td>
        <td style="border: none">Nivel: {$infoCourse['majorName']}</td>
        <td style="border: none">Ciclo escolar: {$infoCourse['scholarCicle']}</td>
    </tr>

</table>
<br>
<table style="width: 100%" class='txtTicket'>
    <tr>
        <td style='width:11px'><center>N/P</center></td>
        <td ><center>Nombre del alumno</center></td>
        <td ><center>Cond</center></td>
        <td ><center>Faltas</center></td>
        <td ><center>Numero</center></td>
        <td ><center>Letra</center></td>
        <td ><center>Observacion</center></td>
    </tr>
    {foreach from=$noTeam item=item key=key}
    <tr>
        <td>{$key+1}</td>
        <td>{$item['lastNamePaterno']} {$item['lastNameMaterno']} {$item['names']}</td>
        <td></td>
        <td></td>
        <td><center>{$item['score']}</center></td>
        <td><center>{$item['letra']}</center></td>
        <td></td>
    </tr>
    {/foreach}
</table>

<p style="font-size: 16px">
    TUXTLA GUTIERREZ, CHIAPAS; A_________DE _____________________ DEL {'Y'|date}
    <div style="text-align: center">FIRMA DEL CATEDRATICO</div>
</p>
