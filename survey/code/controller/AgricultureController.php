<?php
//
class AgricultureController extends SiteController{
	#code
	

	public static $allowed_actions = array(
        	'index',
    		'search',
    		'printlist',
    		'add_agriculture',
    		'AddAgricultureForm',
    		'edit_agriculture',
    		'EditAgricultureForm'
    );
	
	/**
	 * Family datalist
	 * @var DataList
	 *
	 */
	protected $list;
	
	public function init(){
		parent::init();
		$this->title = 'Agriculture';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Agriculture';		
		return $this->renderWith(array('Agriculture','App'));
	}
	
    public function add_agriculture(){
		    
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}
    
    	$this->title = "Add Agriculture";
    	$form = $this->AddAgricultureForm();
    
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
    
    
    public function AddAgricultureForm(){
    	$form = new AddAgricultureForm($this, __FUNCTION__);
    	return $form;
    }
    
    public function edit_agriculture(){
    
    	$this->title = "Edit Agriculture";
    	$form = $this->EditAgricultureForm();
    	$form->setTemplate('AddAgricultureForm');
    	$id = (int)$this->request->param('ID');
    	//var_dump($_POST);EXIT();
    	$agriculture = Agriculture::get()->byID($id);
    	if(!$agriculture){
    		return $this->httpError(404,'Page not found');
    	}
    	if($agriculture->exists() && $form){
    		$form->loadDataFrom($agriculture);
    	}
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    
    	$data = array(
    			'Form' => $form
    	);
    	return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    
    }
    
    
    public function EditAgricultureForm(){
    	$form = new EditAgricultureForm($this, __FUNCTION__);
    	return $form;
    }
	

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Agriculture';
		$this->list = $this->Results();
		return $this->renderWith(array('Agriculture_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Agriculture list';		
		return $this->renderWith(array('Agriculture_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'agriculture', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'agriculture');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Agriculture','"Family"."ID" = "Agriculture"."FamilyID"');

        $agricultureType = Convert::raw2sql($this->request->getVar('Type'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($agricultureType){
            $list = $list->filter(array(
                'Agriculture.Type' => $agricultureType
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
	
	
	public function AgricultureSearchForm(){
		$form = new AgricultureSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Agriculture');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}


}
