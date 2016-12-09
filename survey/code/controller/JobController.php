<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class JobController extends SiteController
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
		$this->title = 'Job';
    }

    public function index() {
        return $this->renderWith(array('Job', 'App'));
    }

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search education';
		$this->list = $this->Results();	
		return $this->renderWith(array('Job_results', 'App'));
    }


	public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Job list';
        return $this->renderWith(array('Job_printresults', 'Print'));
    }

	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'job', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'job');
        }
    }

    public function Results(){

        $list = FamilyMember::get()->
				leftJoin('Job','"Job"."FamilyMemberID" = "FamilyMember"."ID"');
        
		
		$type= Convert::raw2sql($this->request->getVar('Type'));
        if($type){
            $list = $list->filter(array(
                'Job.Type' => $type
            ));
        }

		$location = Convert::raw2sql($this->request->getVar('Location'));
        if($location){
            $list = $list->filter(array(
                'Job.Location' => $location
            ));
        }
		
		$salary = Convert::raw2sql($this->request->getVar('Salary'));
        if($salary){
            $list = $list->filter(array(
                'Job.Salary' => $salary
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
	
    public function JobSearchForm(){
        $form = new JobSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search job');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }

	
}