<?php
//
class VehicleController extends SiteController{
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
		$this->title = 'Vehicle';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Vehicle';		
		return $this->renderWith(array('Vehicle','App'));
	}

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Vehicle';
		$this->list = $this->Results();
		return $this->renderWith(array('Vehicle_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Vehicle list';		
		return $this->renderWith(array('Vehicle_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'vehicle', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'vehicle');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Vehicle','"Family"."ID" = "Vehicle"."FamilyID"');
		
        $cycle = Convert::raw2sql($this->request->getVar('Cycle'));
		$bike = Convert::raw2sql($this->request->getVar('Bike'));
		$autoriskaw = Convert::raw2sql($this->request->getVar('Autoriskaw'));
        $lightVehicle = Convert::raw2sql($this->request->getVar('LightVehicle'));		
		$heavyCommercial = Convert::raw2sql($this->request->getVar('HeavyCommercial'));
		$countryBoat = Convert::raw2sql($this->request->getVar('CountryBoat'));
        $vallam = Convert::raw2sql($this->request->getVar('Vallam'));
		$fishingBoat = Convert::raw2sql($this->request->getVar('FishingBoat'));
		$touristBoat = Convert::raw2sql($this->request->getVar('TouristBoat'));		
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($cycle!='all'){
            $list = $list->filter(array(
                'Vehicle.Cycle' => $cycle
            ));
        }
        if($bike!='all'){
            $list = $list->filter(array(
                'Vehicle.Bike' => $bike
            ));
        }
        if($autoriskaw!='all'){
            $list = $list->filter(array(
                'Vehicle.Autoriskaw' => $autoriskaw
            ));
        }
        if($lightVehicle!='all'){
            $list = $list->filter(array(
                'Vehicle.LightVehicle' => $lightVehicle
            ));
        }
        if($heavyCommercial!='all'){
            $list = $list->filter(array(
                'Vehicle.HeavyCommercial' => $heavyCommercial
            ));
        }
        if($countryBoat!='all'){
            $list = $list->filter(array(
                'Vehicle.CountryBoat' => $countryBoat
            ));
        }
        if($vallam!='all'){
            $list = $list->filter(array(
                'Vehicle.Vallam' => $vallam
            ));
        }
        if($fishingBoat!='all'){
            $list = $list->filter(array(
                'Vehicle.FishingBoat' => $fishingBoat
            ));
        }
        if($touristBoat!='all'){
            $list = $list->filter(array(
                'Vehicle.TouristBoat' => $touristBoat
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
	
	
	public function VehicleSearchForm(){
		$form = new VehicleSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Vehicle');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}

	
}
