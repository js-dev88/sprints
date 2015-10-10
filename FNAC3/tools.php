<?php

function __autoload($name) {

	$dir = "model";
	if (strpos($name,"Controller") !== FALSE){
		$dir = "controller";
    }/*else{
    	throw new Exception("problemetool" );
    }*/
	include_once $dir."/".$name.".php";

}

