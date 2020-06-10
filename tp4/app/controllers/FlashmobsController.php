<?php
namespace controllers;
 /**
 * Controller FlashmobsController
 */
class FlashmobsController extends ControllerBase{
    
    /**
     *
     * @get("_default","name"=>"index")
     */
	public function index(){
	    $this->loadDefaultView();
	}
}
