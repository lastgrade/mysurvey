<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class FamilyMemberController extends SiteController
{

    public static $allowed_actions = array(
        'index',
    	'search',
    	'printlist',
    	'show',
    	'print_member',
    	'list_records',
    	'add_member',
		'AddFamilyMemberForm',
		'edit_member',
		'EditFamilyMemberForm',
		'view',
		'delete_member',    		
    );


	/**
	 * The current Family DataList .
	 *
	 * @var DataList
	 */	
	protected $list;
	
	protected $family;
	
    public function init(){
        parent::init();
		$this->title = 'Members';
    }

    public function index() {
        return $this->renderWith(array('FamilyMember', 'App'));
    }
    
    public function list_records() {
    	$this->title = 'Listing members';
    	$this->list = $this->Results();
    
    	return $this->renderWith(array('FamilyMember_listrecords', 'App'));
    }
    
    
    public function add_member(){
    	
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}    	
    	
    	$this->title = "Add member";
    	$form = $this->AddFamilyMemberForm();
    	
    	$familyID = $form->Fields()->fieldByName('FamilyID');
    	$familyID->setValue($family->ID);
    	$parishID = $form->Fields()->fieldByName('ParishID');
    	$parishID->setValue($family->ParishID);
    	
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    	 
    	$data = array(
    			'Form' => $form
    	);
    	
    	return $this->customise($data)->renderWith(array('FamilyMember_form', 'App'));
    }
    
    
    public function AddFamilyMemberForm(){
    	$form = new AddFamilyMemberForm($this, __FUNCTION__);
    	
    	return $form;
    
    }
    
    public function view(){
    	// show Unathorised page with user does not have access other parish
    	$id = Convert::raw2sql($this->request->param('ID'));
    	$familyMember = FamilyMember::get()->byID($id);
    	if(!$familyMember){
    		return $this->httpError('404','Page not found');
    	}
    	$this->title = 'Family Member details';
    	$data = array('FamilyMember' => $familyMember);
    	if($this->request->isAjax()){
    		return $this->customise($data )
    		->renderWith(array('FamilyMember_view'));
    	}
    	else{
    		return $this->customise($data )
    		->renderWith(array('FamilyMember_view','App'));
    	}
    }
    
    public function edit_member(){
    
    	$this->title = "Edit member";
    	$form = $this->EditFamilyMemberForm();
    	$form->setTemplate('AddFamilyMemberForm');
    	$id = (int)$this->request->param('ID');
    	//var_dump($_POST);EXIT();
    	$familyMember = FamilyMember::get()->byID($id);
    	if(!$familyMember){
    		return $this->httpError(404,'Page not found');
    	}
    	if($familyMember->exists() && $form){
    		$form->loadDataFrom($familyMember);
    	}

    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);    	 
    	
    	$dob = $form->Fields()->fieldByName('DateOfBirth');
    	$dob->setValue(date('d-m-Y',strtotime($familyMember->DateOfBirth)));
    	 
    	//check whether user belongs to myparish
    	//$myParish = $this->MyParish();
    	//$inParish = $family->Parishes()->filter(array('ID' => $myParish->ID))->First();
    	//if(!$inParish){
    	//	return $this->renderWith(array('Unathorised_access', 'App'));
    		//}
    
    		$data = array(
    				'Form' => $form
    		);
    		return $this->customise($data)->renderWith(array('FamilyMember_form', 'App'));
    
    	}
    
    
    	public function EditFamilyMemberForm(){
    		$form = new EditFamilyMemberForm($this, __FUNCTION__);
    		return $form;
    	}
    
    	public function delete_member(){
    
    		$this->title = "Delete family member";
    		$id = (int)$this->request->param('ID');
    		//var_dump($_POST);EXIT();
    		$familyMember = FamilyMember::get()->byID($id);
    
    		if(!$familyMember){
    			return $this->httpError(404,'Page not found');
    		}
    
    		if($familyMember->exists()){
    			$familyMember->destroy();
    			$familyMember->delete();
    			$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    			return $this->redirect($backURL.'&message=deleted');
    			//return $this->redirect($this->Link($backURL.'&message=deleted'));
    		}
    
    	}
    
    public function getFamily(){
    	if($this->family)
    		return $this->family;
    	else 
    		return null;
    }
    

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search members';
		$this->list = $this->Results();	
		return $this->renderWith(array('FamilyMember_results', 'App'));
    }

	public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Members list';
        return $this->renderWith(array('FamilyMember_printresults', 'Print'));
    }

	public function show(){
		$familyMemeberID = Convert::raw2sql($this->request->param('ID'));		
		$familyMember = FamilyMember::get()->byID($familyMemeberID);		
		if(!$familyMember){
			return $this->httpError('404','Page not found');
		}
		$this->title = 'Show Member details';
		$data = array('FamilyMember' => $familyMember);
		if($this->request->isAjax()){
			return $this->customise($data )
				->renderWith(array('FamilyMember_show'));
		}
		else{
			return $this->customise($data )
				->renderWith(array('FamilyMember_show','App'));			
		}
	}
	

	public function print_member(){		
		$familyMemeberID = Convert::raw2sql($this->request->param('ID'));		
		$familyMember = FamilyMember::get()->byID($familyMemeberID);		
		if(!$familyMember){
			return $this->httpError('404','Page not found');
		}		
		$this->title = 'Print Family Member details';
		$data = array('FamilyMember' => $familyMember);
		
        return $this->customise($data )
			->renderWith(array('FamilyMember_print','Print'));		
	}	
	
	
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'members', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'members');
        }        
        
    }

    public function Results(){

        $list = FamilyMember::get();
        
		if($ageFrom = $this->request->getVar('AgeForm')) {		
			$year = (int)$ageFrom;
			$time = strtotime("-$year year", time());
			$date = date("Y-m-d", $time);	
			//echo $date.'<br />';					
			$list = $list->filter(array(
				'DateOfBirth:LessThanOrEqual' => $date             
			));
		}
		
		if($ageUpTo = $this->request->getVar('AgeUpto')) {		
			$year = (int)$ageUpTo; 
			$time = strtotime("-($year+1) year", time());
			$date = date("Y-m-d", $time);						
			//echo $date.'<br />';
			$list = $list->filter(array(
				'DateOfBirth:GreaterThanOrEqual' => $date             
			));
		}
		
		$gender = Convert ::raw2sql($this->request->getVar('Gender'));
        if($gender!='all' && $gender){
            $list = $list->filter(array(
                'Gender' => $gender
            ));
        }

		$bloodGroup = Convert::raw2sql($this->request->getVar('BloodGroup'));
        if($bloodGroup){
            $list = $list->filter(array(
                'BloodGroup' => $bloodGroup
            ));
        }
		
		$martialStatus = Convert::raw2sql($this->request->getVar('MartialStatus'));		
        if($martialStatus){
            $list = $list->filter(array(
                'MartialStatus' => $martialStatus
            ));
        }

        $holdsPassport = Convert::raw2sql($this->request->getVar('HoldsPassport'));
        if($holdsPassport!='all' && $holdsPassport){
            $list = $list->filter(array(
                'HoldsPassport' => $holdsPassport
            ));
        }

        $holdsBankAccount = Convert::raw2sql($this->request->getVar('HoldsBankAccount'));
        if($holdsBankAccount!='all' && $holdsBankAccount){
            $list = $list->filter(array(
                'HoldsBankAccount' => $holdsBankAccount
            ));
        }
		
		$holdsDrivingLicence = Convert::raw2sql($this->request->getVar('HoldsDrivingLicence'));
        if($holdsDrivingLicence!='all' && $holdsDrivingLicence){
            $list = $list->filter(array(
                'HoldsDrivingLicence' => $holdsDrivingLicence
            ));
        }
		
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }        
        

        //$list = $list->leftJoin('Contact', "\"Contact\".\"FamilyID\" = \"Family\".\"ID\"");
        //Debug::show($list->sql());
		//Debug::show($list);

        return $list->sort('ID DESC');
    }

	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
	}

	public function FamilyMemberLiteSearchForm(){
		$form = new FamilyMemberLiteSearchForm($this,__FUNCTION__);
		$form->setFormMethod('get')
		->setFormAction($this->link('list-records'));
		$form->setLegend('Search members');
		$form->loadDataFrom($this->request->getVars());
		$form->disableSecurityToken();
		return $form;
	}
	
    public function FamilyMemberSearchForm(){
        $form = new FamilyMemberSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search members');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }

    public function EducationSearchForm(){
        $controller = new EducationController();
        $form = $controller->EducationSearchForm();
        return $form;
    }

	
    public function JobSearchForm(){
        $controller = new JobController();
        $form = $controller->JobSearchForm();
        return $form;
    }
	
	
    public function HealthSearchForm(){
        $controller = new HealthController();
        $form = $controller->HealthSearchForm();
        return $form;
    }

	
    public function GroupsSearchForm(){
        $controller = new GroupsController();
        $form = $controller->GroupsSearchForm();
        return $form;
    }
	
	
}