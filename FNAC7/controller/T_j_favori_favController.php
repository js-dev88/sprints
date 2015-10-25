<?php

class T_j_favori_favController extends Controller {
	
	//ajouter un favori
	public function addFav(){
		$b=new T_j_favori_fav(parameters()["id"]);
		
	}
}