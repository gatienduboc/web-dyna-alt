<?php
namespace controllers;
 use Ubiquity\orm\DAO;
use Ubiquity\utils\http\UCookie;
use Ubiquity\utils\http\URequest;
use models\Rassemblement;
use Ubiquity\utils\http\UResponse;

 /**
 * Controller FlashmobsController
 */
class FlashmobsController extends ControllerBase{
    
    /**
     *
     * @get("_default","name"=>"index")
     */
	public function index(){
	    $message="Merci de votre retour !";
	    if(!UCookie::exists("flash-mob")){
	        $message="Il s'agit de votre première visite, bienvenue !";
	        UCookie::set("flash-mob", true);
	    }
	    $this->loadDefaultView(["cookie_start"=>$message]);
	}
	
	/**
	 * @get("/flashmobs/create","name"=>"flashmobs.create")
	 */
	public function flashmobsForm(){
	    $this->loadView('FlashmobsController/flashmobsForm.html');
	}
	
	/**
	 *@post("/flashmobs/create/do","name"=>"flashmobs.create.do")
	 **/
	public function flashmobsCreate(){
	    $create=URequest::getDatas();
	    
	    $e=new Rassemblement();
	    $e->setNom($create["nom"]);
	    $e->setLieu($create["lieu"]);
	    $e->setDateHeure($create["date"]);
	    $e->setActif(true);
	    if(!DAO::insert($e)){
	        $this->loadView("FlashmobsController/errors.html",["create_nom"=>$create["nom"]]);
	    }else{
	        UResponse::header("location","/flashmobs");
	    }
	}
	
	/**
	 *@get("/flashmobs/","name"=>"flashmobs.list")
	 */
	public function flashmobsList(){
	    $fs=DAO::getAll(Rassemblement::class,"actif=true");
	    $this->loadView("FlashmobsController/flashmobsList.html",["flashmobs"=>$fs]);
	}
}
