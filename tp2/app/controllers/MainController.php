<?php
namespace controllers;

use Ubiquity\utils\base\UString;
use Ubiquity\utils\http\URequest;
use ws\controllers\AbstractWsController;
use Ubiquity\utils\http\UCookie;
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
	    $form=URequest::getDatas();
		$this->loadView('MainController/sendMessage.html', compact('form'));
	}


	/**
	 *@route("partner/{name}","methods"=>["get"])
	**/
	public function partnerDetails($name){
		
		$partner=$this->dataProvider->getPartner($name);
		if(isset($name)){
		    $this->loadView('MainController/partnerDetails.html',['name'=>$name] + compact('partner'));
		}else{
		    $this->notFound($route);
		}

	}
	
	/**
	 *@route("partners","methods"=>["get"],"name"=>"Partners")
	 **/
	public function partnersList(){
	    $menu=$this->getMenu('Partners');
	    $partners=$this->dataProvider->getPartners();
	    $this->loadView('MainController/partnersList.html', compact('partners') + $menu);
	}
	
	/**
	 *@route("contact","methods"=>["get"],"name"=>"Contact")
	 **/
	public function contactForm(){
	    
	    $menu=$this->getMenu('Contact');
	    $this->loadView('MainController/contactForm.html', $menu);
	    
	}
	
	public function initialize(){
	    parent::initialize();
	    if(!UCookie::exists("init-cookies")){
	        $this->loadView("MainController/cookiesInfo.html");
	    }
	}
	
	/**
	 *@get("cookies/{accept}/{redirect}","name"=>"Cookies")
	 *
	 **/
	public function acceptCookiesOrNot($accept, $redirect = ''){
	    $accept = UString::isBooleanTrue($accept);
	    UCookie::set('accepts-cookies', $accept);
	    UCookie::set('init-cookies',1);
	    header("location:/$redirect");
	}

}
