<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class ShiftedFromController extends SiteController
{

    public static $allowed_actions = array(
        	'index',
    		'search',
    		'printlist',
    		'add_shifted_from',
    		'AddShiftedFromForm',
    		'edit_shifted_from',
    		'EditShiftedFromForm'
    		
    );
	
	protected $list;

    public function init(){
        parent::init();
		$this->title = "Shifted Form";
    }

    public function index() {
        return $this->renderWith(array('ShiftedFrom', 'App'));
    }


    public function add_shifted_from(){
    
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}
    
    	$this->title = "Add Shifted-From";
    	$form = $this->AddShiftedFromForm();
    
    	$familyID = $form->Fields()->fieldByName('FamilyID');
    	$familyID->setValue($family->ID);
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    	$data = array(
    			'Form' => $form
    	);
    
    	return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    }
    
    
    public function AddShiftedFromForm(){
    	$form = new AddShiftedFromForm($this, __FUNCTION__);
    	return $form;
    }
    
    public function edit_shifted_from(){
    
    	$this->title = "Edit Shifted-Form";
    	$form = $this->EditShiftedFromForm();
    	$form->setTemplate('AddShiftedFromForm');
    	$id = (int)$this->request->param('ID');
    	//var_dump($_POST);EXIT();
    	$shiftedForm = ShiftedFrom::get()->byID($id);
    	if(!$shiftedForm){
    		return $this->httpError(404,'Page not found');
    	}
    	if($shiftedForm->exists() && $form){
    		$form->loadDataFrom($shiftedForm);
    	}
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    
    	$data = array(
    			'Form' => $form
    	);
    	return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    
    }
    
    
    public function EditShiftedFromForm(){
    	$form = new EditShiftedFromForm($this, __FUNCTION__);
    	return $form;
    }
    
    
    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = "Search Shifted From ";
		$this->list = $this->Results();
        return $this->renderWith(array('ShiftedFrom_results', 'App'));
    }

    public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		//$this->list = $this->Results();
		$this->title = "Shifted-Form list";
        return $this->renderWith(array('ShiftedFrom_printresults', 'Print'));
    }

	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'shifted-from', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'shifted-from');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('ShiftedFrom','"Family"."ID" = "ShiftedFrom"."FamilyID"');

        $status = Convert::raw2sql($this->request->getVar('Status'));
        $area = Convert::raw2sql($this->request->getVar('Area'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($status!=''){
            $list = $list->filter(array(
                'ShiftedFrom.Status' => $status
            ));
        }

        //$list = $list->leftJoin('Contact', "\"Contact\".\"FamilyID\" = \"Family\".\"ID\"");
        //Debug::show($list);
   
        return $list;
    }
	
	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
	}

    public function ShiftedFromSearchForm(){
        $form = new ShiftedFromSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Shifted-from');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
    }

}