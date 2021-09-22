<?php
require_once("./upload.php");

$file = $_FILES['arquivo'];

    while(true){
        $upload = new Upload($file);
        $resultado = $upload->upload(true);

        if($resultado != null)
            echo $upload->getMensagem($resultado);
    }

function dd($p = [])
{
    echo "<pre>";
    print_r($p);
    echo "</pre>";
}