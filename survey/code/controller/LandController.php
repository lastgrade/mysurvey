<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class LandController extends SiteController
{

    public static $allowed_actions = array(
        	'index',
    		'search',
    		'printlist',
    		'add_land',
    		'AddLandForm',
    		'edit_land',
    		'EditLandForm'
    );

	/**
	 * The current Family DataList .
	 *
	 * @var DataList
	 */	
	protected $list;
	
    public function init(){
        parent::init();
		$this->title = "Land";
    }

    public function index() {
        return $this->renderWith(array('Land', 'App'));
    }
    

    public function add_land(){
    
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}
    
    	$this->title = "Add land";
    	$form = $this->AddLandForm();
    
    	$familyID = $form->Fields()->fieldByName('FamilyID');
    	$familyID->setValue($family->ID);
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    	$data = array(
    			'Form' => $form
    	);
    
    	return $this->customise($data)->renderWith(array('Land_form', 'App'));
    }
    
    
    public function AddLandForm(){
    	$form = new AddLandForm($this, __FUNCTION__);
    	return $form;
    }
    
    public function edit_land(){
    
    	$this->title = "Edit land";
    	$form = $this->EditLandForm();
    	$form->setTemplate('AddLandForm');
    	$id = (int)$this->request->param('ID');
    	//var_dump($_POST);EXIT();
    	$land = Land::get()->byID($id);
    	if(!$land){
    		return $this->httpError(404,'Page not found');
    	}
    	if($land->exists() && $form){
    		$form->loadDataFrom($land);
    	}
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    
    	$data = array(
    			'Form' => $form
    	);
    	return $this->customise($data)->renderWith(array('Land_form', 'App'));
    
    }
    
    
    public function EditLandForm(){
    	$form = new EditLandForm($this, __FUNCTION__);
    	return $form;
    }
    

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = "Search land ";
		$this->list = $this->Results();	
        return $this->renderWith(array('Land_results', 'App'));
    }

    public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = "Land list";
        return $this->renderWith(array('Land_printresults', 'Print'));
    }

    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'land', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'land');
        }
    }
	
    public function Results(){

        $list = Family::get()->leftJoin('Land','"Family"."ID" = "Land"."FamilyID"');

        $holdsLand = Convert::raw2sql($this->request->getVar('HoldsLand'));
        $area = Convert::raw2sql($this->request->getVar('Area'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($holdsLand!=''){
            $list = $list->filter(array(
                'Land.HoldsLand' => $holdsLand
            ));
        }

        if($holdsLand && $area){
            $list = $list->filter(array(
                'Land.Area' => $area
            ));
        }


        return $list;
    }
	
	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
	}
	

    public function LandSearchForm(){
        $form = new LandSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->Link('search'));
        $form->setLegend('Search Land');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
    }
}