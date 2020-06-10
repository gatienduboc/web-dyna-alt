<?php
namespace controllers;
 use Ubiquity\utils\http\UCookie;

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
	 * @get("flashmobs/create","name"=>"flashmobs.create")
	 */
	public function flashmobsForm(){
	    $this->loadView('FlashmobsController/flashmobsForm.html');
	}
}
