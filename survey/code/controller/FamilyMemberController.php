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
        'index','search','printlist', 'show', 'print_member'
    );


	/**
	 * The current Family DataList .
	 *
	 * @var DataList
	 */	
	protected $list;
	
    public function init(){
        parent::init();
		$this->title = 'Members';
    }

    public function index() {
        return $this->renderWith(array('FamilyMember', 'App'));
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
		
		$gender = Convert::raw2sql($this->request->getVar('Gender'));
        if($gender!='all'){
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
        if($holdsPassport!='all'){
            $list = $list->filter(array(
                'HoldsPassport' => $holdsPassport
            ));
        }

        $holdsBankAccount = Convert::raw2sql($this->request->getVar('HoldsBankAccount'));
        if($holdsBankAccount!='all'){
            $list = $list->filter(array(
                'HoldsBankAccount' => $holdsBankAccount
            ));
        }
		
		$holdsDrivingLicence = Convert::raw2sql($this->request->getVar('HoldsDrivingLicence'));
        if($holdsDrivingLicence!='all'){
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

        return $list;
    }

	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
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