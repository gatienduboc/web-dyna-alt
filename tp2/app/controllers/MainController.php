<?php
namespace controllers;
/**
 * Controller MainController
 */
class MainController extends ControllerBase{
    
    /**
     * 
     *
     * @get("_default","name"=>"Home")
     */
    public function index() {
        $this->loadView("MainController/index.html");
        //echo 'Hello world!';
    }
}
