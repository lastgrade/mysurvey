<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/12/2016
 * Time: 2:08 PM
 */
class FamilyController extends SiteController
{

    public static $allowed_actions = array(
        'index','search_by_parish','search_by_location','print_by_parish','print_by_location'
    );


	/**
	 * The current Family DataList .
	 *
	 * @var DataList
	 */	
	protected $list;
	
    public function init(){
        parent::init();
		$this->title = 'Family';
    }

    public function index() {
        return $this->renderWith(array('Family', 'App'));
    }

    public function search_by_parish() {
		$this->title = 'Search by parish';
		$this->list = $this->Results();	
        return $this->renderWith(array('Family_parishresults', 'App'));
    }

    public function search_by_location() {
		$this->title = 'Search by location';
		$this->list = $this->Results();	
        return $this->renderWith(array('Family_locationresults', 'App'));
    }

	public function print_by_parish() {
		$this->title = 'Family list';
        return $this->renderWith(array('Family_printparishresults', 'Print'));
    }

    public function print_by_location() {
		$this->title = 'Family list';
        return $this->renderWith(array('Family_printlocationresults', 'Print'));
    }

    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'family', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'family');
        }
    }

    public function Results(){

        $list = Family::get();

        $blockNo = Convert::raw2sql($this->request->getVar('BlockNo'));
        $unitNo = Convert::raw2sql($this->request->getVar('UnitNo'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        $pincode = Convert::raw2sql($this->request->getVar('Pincode'));
        $isPanchayat = Convert::raw2sql($this->request->getVar('IsPanchayat'));
        $isMunicipality = Convert::raw2sql($this->request->getVar('IsMunicipality'));
        $isCorporation = Convert::raw2sql($this->request->getVar('IsCorporation'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }

        if($blockNo){
            $list = $list->filter(array(
                'BlockNo' => $blockNo
            ));
        }

        if($unitNo){
            $list = $list->filter(array(
                'UnitNo' => $unitNo
            ));
        }

        if($pincode){
            $list = $list->filter(array(
                'Pincode' => $pincode
            ));
        }

        if($isPanchayat){
            $list = $list->filter(array(
                'IsPanchayat' => $isPanchayat
            ));
        }

        if($isMunicipality){
            $list = $list->filter(array(
                'IsMunicipality' => $isMunicipality
            ));
        }

        if($isCorporation){
            $list = $list->filter(array(
                'IsCorporation' => $isCorporation
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
	
    public function ParishSearchForm(){
        $form = new ParishSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search-by-parish'));
        $form->setLegend('Based on parish');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }

    public function LocationSearchForm(){
        $form = new LocationSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search-by-location'));
        $form->setLegend('Based on location');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
    }


    public function HouseSearchForm(){
        $controller = new HouseController();
        $form = $controller->HouseSearchForm();
        return $form;
    }


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


    public function AgricultureSearchForm(){
        $controller = new AgricultureController();
        $form = $controller->AgricultureSearchForm();
        return $form;
    }
	
	public function BusinessSearchForm(){
		$controller = new BusinessController();
		$form = $controller->BusinessSearchForm();
        return $form;
	}
	

}