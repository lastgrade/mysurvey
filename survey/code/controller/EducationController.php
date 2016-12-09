<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class EducationController extends SiteController
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
		$this->title = 'Education';
    }

    public function index() {
        return $this->renderWith(array('Education', 'App'));
    }

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search education';
		$this->list = $this->Results();	
		return $this->renderWith(array('Education_results', 'App'));
    }


	public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Education list';
        return $this->renderWith(array('Education_printresults', 'Print'));
    }

	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'education', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'education');
        }
    }

    public function Results(){

        $list = FamilyMember::get()->
				leftJoin('Education','"Education"."FamilyMemberID" = "FamilyMember"."ID"');
        
		
		$code = Convert::raw2sql($this->request->getVar('Code'));
        if($code){
            $list = $list->filter(array(
                'Education.Code' => $code
            ));
        }

		$status = Convert::raw2sql($this->request->getVar('Status'));
        if($code && $status){
            $list = $list->filter(array(
                'Education.Status' => $status
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
	
    public function EducationSearchForm(){
        $form = new EducationSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search education');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }

	
}