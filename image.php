<?php
header('Content-type: image/png');
$fileId = (int)$_GET['id'];
include '../../images/' . $fileId . '.png';