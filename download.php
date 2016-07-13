<?php
header('Content-disposition: attachment; filename='.$_GET["file"]);
header('Content-type:'.$_GET["mime"]);
readfile(urldecode($_GET["file"]));
?>