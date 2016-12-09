<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class HealthController extends SiteController
{

    public static $allowed_actions = array(
        'index','search','printlist'
    );


	/**
	 * The current Family DataList .
	 *
	 * @var DataList
	 */	
	protected $list;
	
    public function init(){
        parent::init();
		$this->title = 'Health';
    }

    public function index() {
        return $this->renderWith(array('Health', 'App'));
    }

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search health';
		$this->list = $this->Results();	
		return $this->renderWith(array('Health_results', 'App'));
    }


	public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Health list';
        return $this->renderWith(array('Health_printresults', 'Print'));
    }

	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'health', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'health');
        }
    }

    public function Results(){

        $list = FamilyMember::get()->
				leftJoin('Health','"Health"."FamilyMemberID" = "FamilyMember"."ID"');
        
		
		$blind= Convert::raw2sql($this->request->getVar('Blind'));
        if($blind!='all'){
            $list = $list->filter(array(
                'Health.Blind' => $blind
            ));
        }

		$deaf = Convert::raw2sql($this->request->getVar('Deaf'));
        if($deaf!='all'){
            $list = $list->filter(array(
                'Health.Deaf' => $deaf
            ));
        }
		
		$dumb = Convert::raw2sql($this->request->getVar('Dumb'));
        if($dumb!='all'){
            $list = $list->filter(array(
                'Health.Dumb' => $dumb
            ));
        }

		$otherPhsicalDisability = Convert::raw2sql($this->request->getVar('OtherPhsicalDisability'));
        if($dumb!='all'){
            $list = $list->filter(array(
                'Health.OtherPhsicalDisability' => $otherPhsicalDisability
            ));
        }
		
		$learningDisability = Convert::raw2sql($this->request->getVar('LearningDisability'));
        if($learningDisability!='all'){
            $list = $list->filter(array(
                'Health.LearningDisability' => $learningDisability
            ));
        }
		
		$mentalDisability = Convert::raw2sql($this->request->getVar('MentalDisability'));
        if($mentalDisability!='all'){
            $list = $list->filter(array(
                'Health.MentalDisability' => $mentalDisability
            ));
        }
		
		$hearthDisease = Convert::raw2sql($this->request->getVar('HearthDisease'));
        if($hearthDisease!='all'){
            $list = $list->filter(array(
                'Health.HearthDisease' => $hearthDisease
            ));
        }
		
		$diabetes = Convert::raw2sql($this->request->getVar('Diabetes'));
        if($diabetes!='all'){
            $list = $list->filter(array(
                'Health.Diabetes' => $diabetes
            ));
        }
		
		$cancer = Convert::raw2sql($this->request->getVar('Cancer'));
        if($cancer!='all'){
            $list = $list->filter(array(
                'Health.Cancer' => $cancer
            ));
        }
		
		$bloodPressure = Convert::raw2sql($this->request->getVar('BloodPressure'));
        if($bloodPressure!='all'){
            $list = $list->filter(array(
                'Health.BloodPressure' => $bloodPressure
            ));
        }
		
		$alcoholic = Convert::raw2sql($this->request->getVar('Alcoholic'));
        if($alcoholic!='all'){
            $list = $list->filter(array(
                'Health.Alcoholic' => $alcoholic
            ));
        }

		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
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
	
    public function HealthSearchForm(){
        $form = new HealthSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search health');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }

	
}