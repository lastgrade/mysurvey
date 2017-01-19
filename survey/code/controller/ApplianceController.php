<?php
//
class ApplianceController extends SiteController{
	#code
	
    public static $allowed_actions = array(
        'index','search', 'printlist'
    );
	
	/**
	 * Family datalist
	 * @var DataList
	 *
	 */
	protected $list;
	
	public function init(){
		parent::init();
		$this->title = 'Appliance';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Appliance';		
		return $this->renderWith(array('Vehicles','App'));
	}

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Appliance';
		$this->list = $this->Results();
		return $this->renderWith(array('Appliance_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Appliance list';		
		return $this->renderWith(array('Appliance_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'appliance', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'appliance');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Appliance','"Family"."ID" = "Appliance"."FamilyID"');
		
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        $computer = Convert::raw2sql($this->request->getVar('Computer'));
		$washingMachine = Convert::raw2sql($this->request->getVar('WashingMachine'));
		$airConditioner = Convert::raw2sql($this->request->getVar('AirConditioner'));
        $microwaveOven = Convert::raw2sql($this->request->getVar('MicrowaveOven'));		
		$cookingGas = Convert::raw2sql($this->request->getVar('CookingGas'));
		$fridge = Convert::raw2sql($this->request->getVar('Fridge'));
        $others = Convert::raw2sql($this->request->getVar('Others'));
		
        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($computer!='all'){
            $list = $list->filter(array(
                'Appliance.Computer' => $computer
            ));
        }
		
        if($washingMachine!='all'){
            $list = $list->filter(array(
                'Appliance.WashingMachine' => $washingMachine
            ));
        }
		
        if($airConditioner!='all'){
            $list = $list->filter(array(
                'Appliance.AirConditioner' => $airConditioner
            ));
        }
		
        if($microwaveOven!='all'){
            $list = $list->filter(array(
                'Appliance.MicrowaveOven' => $microwaveOven
            ));
        }
		
        if($cookingGas!='all'){
            $list = $list->filter(array(
                'Appliance.CookingGas' => $cookingGas
            ));
        }
		
        if($fridge!='all'){
            $list = $list->filter(array(
                'Appliance.Fridge' => $fridge
            ));
        }

        if($others!='all'){
            $list = $list->filter(array(
                'Appliance.Others' => $others
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
	
	
	public function ApplianceSearchForm(){
		$form = new ApplianceSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Appliance');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}


}
