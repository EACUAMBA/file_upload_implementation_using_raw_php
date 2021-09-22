<?php
require_once("./upload.php");

$file = $_FILES;

$upload = new Upload($file);
$upload->upload();


function dd($p = []){
echo "<pre>";
print_r($p);
echo "</pre>";
}