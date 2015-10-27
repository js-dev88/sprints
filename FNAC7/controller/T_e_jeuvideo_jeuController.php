<?php

class T_e_jeuvideo_jeuController extends Controller {

	

	public function view() {
		
			$b = new T_e_jeuvideo_jeu(parameters()["id"]);
			$nbAvis = count(T_e_avis_avi::FindAll($b->jeu_id));
			
			for ($i=0; $i < $nbAvis; $i++) { 
				if(isset($_POST['pouce_id_avi'.$i]) && isset($_POST['pouce_id_cli'.$i]) && isset($_POST['submit_vert'.$i]))
			{
				if(T_j_avisrecommande_avr::countAvisrByClient($_POST['pouce_id_avi'.$i],$_POST['pouce_id_cli'.$i])!=0)
				{
					T_j_avisrecommande_avr::deleteD($_POST['pouce_id_avi'.$i],$_POST['pouce_id_cli'.$i]);
				}
				else {
				if(T_j_avisdeconseille_avd::countAvisdByClient($_POST['pouce_id_avi'.$i],$_POST['pouce_id_cli'.$i])!=0)
				{
					T_j_avisdeconseille_avd::deleteD($_POST['pouce_id_avi'.$i],$_POST['pouce_id_cli'.$i]);
				}
				$recommend = new T_j_avisrecommande_avr ($_POST['pouce_id_avi'.$i],$_POST['pouce_id_cli'.$i]);
				}
			}
			}
			for ($i=0; $i < $nbAvis; $i++) { 
				if(isset($_POST['rpouce_id_avi'.$i]) && isset($_POST['rpouce_id_cli'.$i]) && isset($_POST['submit_rouge'.$i]))
			{
				if(T_j_avisdeconseille_avd::countAvisdByClient($_POST['rpouce_id_avi'.$i],$_POST['rpouce_id_cli'.$i])!=0)
				{
					T_j_avisdeconseille_avd::deleteD($_POST['rpouce_id_avi'.$i],$_POST['rpouce_id_cli'.$i]);
				}
				else {


				if(T_j_avisrecommande_avr::countAvisrByClient($_POST['rpouce_id_avi'.$i],$_POST['rpouce_id_cli'.$i])!=0)
				{
					T_j_avisrecommande_avr::deleteD($_POST['rpouce_id_avi'.$i],$_POST['rpouce_id_cli'.$i]);
				}
				$recommend = new T_j_avisdeconseille_avd ($_POST['rpouce_id_avi'.$i],$_POST['rpouce_id_cli'.$i]);
				}
			}
			}
			$this->render("view",$b);
	}
	

	public function search() {
			//quelque soit le mot il est mis en minuscule 
			$motclef= strtolower($_POST["mot_clef"]);
			$srchConsole=$_POST["choiceconsole"];
			$srchRayon=$_POST["choicerayon"];
			$class = get_called_class();
			$table = strtolower($class);
			if($srchConsole == "console")
			{
				if($srchRayon == "rayon"){
					//console - et rayon -
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j where (lower(jeu_nom) like '%".$motclef."%') or (jeu_id in (select w.jeu_id from t_e_motcle_mot w where lower(w.mot_mot) like '%".$motclef."%'))"); 
				}else{
					//console - et rayon +
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j join t_r_console_con c on c.con_id = j.con_id join t_j_jeurayon_jer v on v.jeu_id = j.jeu_id join t_r_rayon_ray r on r.ray_id=v.ray_id where (lower(jeu_nom) like '%".$motclef."%' or j.jeu_id in (select w.jeu_id from t_e_motcle_mot w where lower(w.mot_mot) like '%".$motclef."%')) and  ray_nom like '%".$srchRayon."%'");
				}
			}else{ 
				
				if($srchRayon == "rayon"){
					//console + et rayon -
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j join t_r_console_con c on c.con_id = j.con_id where (lower(jeu_nom) like '%".$motclef."%' or j.jeu_id in (select w.jeu_id from t_e_motcle_mot w where lower(w.mot_mot) like '%".$motclef."%')) and con_nom like '%".$srchConsole."%'");  
				}else{
					//console + et rayon +
					$st = db()->prepare("select * from t_e_jeuvideo_jeu j join t_r_console_con c on c.con_id = j.con_id join t_j_jeurayon_jer v on v.jeu_id = j.jeu_id join t_r_rayon_ray r on r.ray_id=v.ray_id where (lower(jeu_nom) like '%".$motclef."%' or j.jeu_id in (select w.jeu_id from t_e_motcle_mot w where lower(w.mot_mot) like '%".$motclef."%')) and  ray_nom like '%".$srchRayon."%' and con_nom like '%".$srchConsole."%'");
				}
				//join t_e_motcle_mot w on w.jeu_id=j.jeu_id     "lower(mot_mot) like '".$motclef."'"
				
			}
			$st->execute();
			$list = array();
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				$list[] = new T_e_jeuvideo_jeu($this->_jeu_id = $row["jeu_id"]);
			}
			$this->render("search",$list);
			
	}
	public function error() {
    		$this->render("error");
  	}
	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}

	
 }