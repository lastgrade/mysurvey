<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class GroupsController extends SiteController
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
		$this->title = 'Groups';
    }

    public function index() {
        return $this->renderWith(array('Group', 'App'));
    }

    public function search() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search groups';
		$this->list = $this->Results();	
		return $this->renderWith(array('Group_results', 'App'));
    }


	public function printlist() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Groups list';
        return $this->renderWith(array('Group_printresults', 'Print'));
    }

	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'groups', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'groups');
        }
    }

    public function Results(){

        $list = FamilyMember::get();		//$list = FamilyMember::get()->leftJoin('CommunityGroup','"CommunityGroup"."FamilyMemberID" = "FamilyMember"."ID"');
		
		$group= Convert::raw2sql($this->request->getVar('Group'));
        if($group){
            $list = $list->filter(array(
                'CommunityGroups.ID' => $group
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
        return $list;
    }

	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
	}
	
    public function GroupsSearchForm(){
        $form = new GroupsSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search groups');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }

	
}