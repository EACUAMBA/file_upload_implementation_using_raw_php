<?php
class Upload{

private $file;

public function __construct($file){
  $this->file = $file;
}

function upload(){
dd($this->file);
$this->valida();

}

private function valida(){
  
}

}





