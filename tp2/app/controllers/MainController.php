<?php
namespace controllers;

use ws\controllers\AbstractWsController;
/**
 * Controller MainController
 */
class MainController extends AbstractWsController{
    
    /**
     * 
     *
     * @get("_default","name"=>"Home")
     */
    public function index() {
        $menu=$this->getMenu('Home');
        $messages=$this->dataProvider->getMessages();
        $content=nl2br($this->dataProvider->getPageContent('Home'));
        
        
        $this->loadView('MainController/index.html',compact('messages','content') + $menu);
    }


	/**
	 *@route("sendMessage","methods"=>["post"])
	**/
	public function sendMessage(){
		
		$this->loadView('MainController/sendMessage.html');

	}


	/**
	 *@route("partner/{name}","methods"=>["get"])
	**/
	public function partnerDetails($name){
		
		$this->loadView('MainController/partnerDetails.html');

	}
	
	/**
	 *@route("/partners","methods"=>["get"])
	 **/
	public function partnersList(){
	    $menu=$this->getMenu('Partners');
	    $partners=$this->dataProvider->getPartners();
	    $this->loadView('MainController/partnersList.html', compact('partners') + $menu);
	}
	
	/**
	 *@route("contact/","methods"=>["get"])
	 **/
	public function contactForm(){
	    
	    $this->loadView('MainController/contactForm.html');
	    
	}

}
