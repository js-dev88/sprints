<?php

class T_e_commande_comController extends Controller {
	
	public function index() {
	

		$this->render("index",T_e_commande_com::findAll());
	}

	public function view() {
	try {
			
			$b = new T_e_commande_com(parameters()["id"]);
			$this->render("view",$b);
		} catch (Exception $e) {
			
			//(new SiteController())->render("index");
		   // $this->render("error");
		}
	}
	public function error() {
    		$this->render("error");
  	}
	public function getAllCommande(){
		$client=unserialize($_SESSION['client']);
		$id = $client->cli_id;
		$st = db()->prepare("select * from t_e_commande_com where cli_id=:id");
		$st->bindValue(":id", $id);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new T_e_commande_com($this->_com_id = $row["com_id"]);
			}
		return $list;
	}

	public function listeArticlesPanier(){
		$client=unserialize($_SESSION['client']);
		$id = $client->cli_id;
		$list = T_e_commande_com::findPanier($id);
		return $list;
	}
	
	public function verifExistenceLC($idjeu){
		$bool = false;
		$list = $this->listeArticlesPanier();
		foreach($list as $lignecommande){
			if($lignecommande->jeu_id == $idjeu){
				return $bool = true;
			}
		}
		return $bool;

	}
	public function panier(){
		$list = $this->listeArticlesPanier();
		$this->render("panier", $list);
	}
	
	public function nbArticlesPanier(){
		$list = $this->listeArticlesPanier();
		$nbArticles = 0;
		foreach($list as $lignecommande){
			$nbArticles += $lignecommande->lec_quantite;
		}
		return $nbArticles;
	}

	public function addLigneCommande(){
		$client=unserialize($_SESSION['client']);
        $id = $client->cli_id;
        $idpanier = T_e_commande_com::findIdPanier($id);
        $json = array();

        if(isset($_POST['ipt_idjeu']) &&isset($_POST['ipt_quantite'])){
        	if(!empty($_POST['ipt_idjeu'])&&!empty($_POST['ipt_quantite'])){
        		$idjeu=$_POST['ipt_idjeu'];
        		$quantite = $_POST['ipt_quantite'];
        		$lignecommande = T_e_commande_com::insertLigneCommande($idpanier,$idjeu,$quantite);
        		
        		$lc = new T_e_commande_comController();
        		$json['nbArticles']=$lc->nbArticlesPanier();
        		$json['jeu_id'] = $idjeu;
        	}else{
        	    $json['error'] = "error";
        	}

        }else{
        	$json['error'] = "error";
        }
        echo json_encode($json); 
	}

	public function delLigneCommande(){
		$client=unserialize($_SESSION['client']);
        $id = $client->cli_id;
        $idpanier = T_e_commande_com::findIdPanier($id);
        $json = array();

        if(isset($_POST['ipt_idjeusup'])){
        	if(!empty($_POST['ipt_idjeusup'])){
        		$idjeu=$_POST['ipt_idjeusup'];
        		$lignecommande = T_e_commande_com::supprimeLigneCommande($idpanier,$idjeu);	
        		$lc = new T_e_commande_comController();
        		$json['nbArticles']=$lc->nbArticlesPanier();
        		$json['jeu_id'] = $idjeu;
        	}else{
        		$json['error'] = "error";
        	}

        }else{
        	$json['error'] = "error";
        }		
		echo json_encode($json);
	}
	
  	public function logout(){
		session_destroy();
		header('Location: ?r=site/index');
	}
	 	

  	
  	

}