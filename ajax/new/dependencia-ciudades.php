<?php
include_once('../../init.php');
include_once('../../config.php');
include(DOC_ROOT."/classes/class.mysql.php");
include(DOC_ROOT."/classes/class.combos.php");
$ciudades = new selects();
$ciudades->code = $_POST["estadoId"];
$tam=$_POST["tam"];
$ciudades = $ciudades->cargarCiudades();
if($tam==1)
    echo"<select id='ciudad' name='ciudad' style='width:300px' class=\"form-control\"><option value='0'>Elige tu Ciudad</option>";
else
    echo"<select id='ciudad' name='ciudad' style='width:350px' class=\"form-control\"><option value='0'>Elige tu Ciudad</option>";
foreach($ciudades as $key=>$value)
{
    echo "<option value=\"$key\">".$value."</option>";
}
echo "</select>";
?>