<?php

/**
* 
*/
//namespace model;
class ManagementPub
{
	private $pdo ;
	function __construct($pdo)
	{
		$this->pdo = $pdo ;

	}
	public function add_pub(Publication $pub)
	{
		$req = $this->pdo->prepare("INSERT INTO publications set titre = ?, date_pub = ?, id_user = ?, image = ?, contenu = ?, date_modif_pub= ?") ;
		$req->execute([$pub->getTitre(),$pub->getDate_pub(), $pub->getId_user(), $pub->getImage(), $pub->getContenu(), $pub->getDate_modif_pub()]);
	}
}