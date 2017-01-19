<?php
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class HouseController extends SiteController
{

    public static $allowed_actions = array(
        'index',
    	'search',
    	'printlist',
   		'add_house',
   		'AddHouseForm',
   		'edit_house',
   		'EditHouseForm',
   		'view',    		
    );
	
	/**
	 * The current Family DataList .
	 *
	 * @var DataList
	 */	
	protected $list;
	

    public function init(){
        parent::init();
		$this->title = "House";
    }

    public function index() {
        return $this->renderWith(array('House', 'App'));
    }

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = "Search house";
		$this->list = $this->Results();	
        return $this->renderWith(array('House_results', 'App'));
    }

    public function add_house(){
    	 
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}
    	 
    	$this->title = "Add house";
    	$form = $this->AddHouseForm();
    	 
    	$familyID = $form->Fields()->fieldByName('FamilyID');
    	$familyID->setValue($family->ID);
    	 
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    	$data = array(
    			'Form' => $form
    	);
    	 
    	return $this->customise($data)->renderWith(array('House_form', 'App'));
    }
    
    
    public function AddHouseForm(){
    	$form = new AddHouseForm($this, __FUNCTION__);    	 
    	return $form;    
    }
    
    public function edit_house(){
    
    	$this->title = "Edit house";
    	$form = $this->EditHouseForm();
    	$form->setTemplate('AddHouseForm');
    	$id = (int)$this->request->param('ID');
    	//var_dump($_POST);EXIT();
    	$house = House::get()->byID($id);
    	if(!$house){
    		return $this->httpError(404,'Page not found');
    	}
    	if($house->exists() && $form){
    		$form->loadDataFrom($house);
    	}
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);    	 
    
    
   		$data = array(
			'Form' => $form
   		);
   		return $this->customise($data)->renderWith(array('House_form', 'App'));
    
    }
    
    
    public function EditHouseForm(){
    	$form = new EditHouseForm($this, __FUNCTION__);
    	return $form;
    }
    
    public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = "House list";
        return $this->renderWith(array('House_printresults', 'Print'));
    }

	
    public function Title() {
        return $this->title ;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'house', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'house');
        }
    }


    public function Results(){

        $list = Family::get()->leftJoin('House','"Family"."ID" = "House"."FamilyID"');

        $status = Convert::raw2sql($this->request->getVar('Status'));
        $holdsRationCard = Convert::raw2sql($this->request->getVar('HoldsRationCard'));
        $cardType = Convert::raw2sql($this->request->getVar('CardType'));
        $houseType = Convert::raw2sql($this->request->getVar('Type'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }

        if($status){
            $list = $list->filter(array(
                'House.Status' => $status
            ));
        }

        if($holdsRationCard!=''){
            $list = $list->filter(array(
                'House.HoldsRationCard' => $holdsRationCard
            ));
        }

        if($holdsRationCard && $cardType){
            $list = $list->filter(array(
                'House.CardType' => $cardType
            ));
        }

        if($houseType){
            $list = $list->filter(array(
                'House.Type' => $houseType
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
	


    public function HouseSearchForm(){
        $form = new HouseSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->Link('search'));
        $form->setLegend('Search House');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
    }


	/*	
    public function LandSearchForm(){
        $controller = new LandController();
        $form = $controller->LandSearchForm();
        return $form;
    }

    public function ShiftedFromSearchForm(){
        $controller = new ShiftedFromController();
        $form = $controller->ShiftedFromSearchForm();
        return $form;
    }
	*/

}