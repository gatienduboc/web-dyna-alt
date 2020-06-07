<?php
namespace controllers;
use Ubiquity\orm\DAO;
use models\Organization;

/**
 * Controller Organizations
 * @route("organizations")
 **/
class Organizations extends \Ubiquity\controllers\ControllerBase{
    
    /**
     * @get("name"=>"orgas-index")
     **/
    public function index(){
        $organizations=DAO::getAll(Organization::class);
        $this->loadView("Organizations/index.html",["orgas"=>$organizations]);
    }

    /**
    * @get("{idOrga}/{idGroupe}","name"=>"orgas-display")
    **/    
    public function display($idOrga,$idGroupe=null){
        $orga=DAO::getById(Organization::class, $idOrga,['users','groupes']);
        $users=$this->users($orga->getUsers());
        $this->jquery->renderView("Organizations/display.html",["orga"=>$orga,"users"=>$users]);
    }
    
    protected function users($users=null){
        $title="Tous les utilisateurs";
        return $this->loadView("Organizations/users.html",compact("users","title"),true);
    }

}
