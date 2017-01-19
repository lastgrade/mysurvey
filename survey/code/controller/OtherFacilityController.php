<?php
//
class OtherFacilityController extends SiteController{
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
		$this->title = 'Other Facility';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Other Facility';		
		return $this->renderWith(array('OtherFacility','App'));
	}

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Other Facility';
		$this->list = $this->Results();
		return $this->renderWith(array('OtherFacility_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Other Facility list';		
		return $this->renderWith(array('OtherFacility_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'otherfacility', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'otherfacility');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('OtherFacility','"Family"."ID" = "OtherFacility"."FamilyID"');
				
	
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }

		$waterWell = Convert::raw2sql($this->request->getVar('WaterWell'));
        if($waterWell!='all'){
            $list = $list->filter(array(
                'OtherFacility.WaterWell' => $waterWell
            ));
        }
		
		$drillWell = Convert::raw2sql($this->request->getVar('DrillWell'));		
        if($drillWell!='all'){
            $list = $list->filter(array(
                'OtherFacility.DrillWell' => $drillWell
            ));
        }
		
		$waterConnection = Convert::raw2sql($this->request->getVar('WaterConnection'));
        if($waterConnection!='all'){
            $list = $list->filter(array(
                'OtherFacility.WaterConnection' => $waterConnection
            ));
        }
		
        $rainwaterStorage = Convert::raw2sql($this->request->getVar('RainwaterStorage'));		
        if($rainwaterStorage!='all'){
            $list = $list->filter(array(
                'OtherFacility.RainwaterStorage' => $rainwaterStorage
            ));
        }
		
		$biogas = Convert::raw2sql($this->request->getVar('Biogas'));
        if($biogas!='all'){
            $list = $list->filter(array(
                'OtherFacility.Biogas' => $biogas
            ));
        }
		
		$electricity = Convert::raw2sql($this->request->getVar('Electricity'));
        if($electricity!='all'){
            $list = $list->filter(array(
                'OtherFacility.Electricity' => $electricity
            ));
        }
		
        $solarEnergy = Convert::raw2sql($this->request->getVar('SolarEnergy'));
        if($solarEnergy!='all'){
            $list = $list->filter(array(
                'OtherFacility.SolarEnergy' => $solarEnergy
            ));
        }

		$vegetableGarden = Convert::raw2sql($this->request->getVar('VegetableGarden'));		
        if($vegetableGarden!='all'){
            $list = $list->filter(array(
                'OtherFacility.VegetableGarden' => $vegetableGarden
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
	
	
	public function OtherFacilitySearchForm(){
		$form = new OtherFacilitySearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Other-Facility');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}

}
