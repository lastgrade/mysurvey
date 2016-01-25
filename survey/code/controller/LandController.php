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
		$this->title = "Land";
    }

    public function index() {
        return $this->renderWith(array('Land', 'App'));
    }

    public function search() {
		$this->title = "Search land ";
		$this->list = $this->Results();	
        return $this->renderWith(array('Land_results', 'App'));
    }

    public function printlist() {
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
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Land');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
    }
}