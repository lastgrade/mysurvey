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
        'index',
		'search_by_parish',
		'search_by_location',
		'print_by_parish',
		'print_by_location',
		'show',
		'print_family',
		'list_records',
		'add_family',
		'AddFamilyForm',
		'edit_family',
		'EditFamilyForm',
		'view',
		'delete_family',
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

    public function list_records() {
		$this->title = 'Listing family';
		$this->list = $this->Results();		
		
        return $this->renderWith(array('Family_listrecords', 'App'));
    }
	
	
	public function add_family(){
		$this->title = "Add Family";
		$data = array(
				'Form' => $this->AddFamilyForm()
				);
		return $this->customise($data)->renderWith(array('Family_form', 'App'));			
	}
	
	
	public function AddFamilyForm(){							
		$form = new AddFamilyForm($this, __FUNCTION__);				
		return $form;
		
	}
	
	public function view(){
		// show Unathorised page with user does not have access other parish
		$familyID = Convert::raw2sql($this->request->param('ID'));		
		$family = Family::get()->byID($familyID);		
		if(!$family){
			return $this->httpError('404','Page not found');
		}
		$this->title = 'Family details';
		$data = array('Family' => $family);
		if($this->request->isAjax()){
			return $this->customise($data )
				->renderWith(array('Family_view'));
		}
		else{
			return $this->customise($data )
				->renderWith(array('Family_view','App'));			
		}
	}
	
	
    public function search_by_parish() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search by parish';
		$this->list = $this->Results();	
		return $this->renderWith(array('Family_parishresults', 'App'));
    }

    public function search_by_location() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search by location';
		$this->list = $this->Results();	
        return $this->renderWith(array('Family_locationresults', 'App'));
    }

	public function print_by_parish() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Family list';
        return $this->renderWith(array('Family_printparishresults', 'Print'));
    }

    public function print_by_location() {
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Family list';
        return $this->renderWith(array('Family_printlocationresults', 'Print'));
    }

	public function show(){
		// show Unathorised page with user does not have access other parish
		$familyID = Convert::raw2sql($this->request->param('ID'));		
		$family = Family::get()->byID($familyID);		
		if(!$family){
			return $this->httpError('404','Page not found');
		}
		$this->title = 'Show Family details';
		$data = array('Family' => $family);
		if($this->request->isAjax()){
			return $this->customise($data )
				->renderWith(array('Family_show'));
		}
		else{
			return $this->customise($data )
				->renderWith(array('Family_show','App'));			
		}
	}
	

	public function print_family(){
		// show Unathorised page with user does not have access other parish
		$familyID = Convert::raw2sql($this->request->param('ID'));		
		$family = Family::get()->byID($familyID);		
		if(!$family){
			return $this->httpError('404','Page not found');
		}
		$this->title = 'Print Family details';
		$data = array('Family' => $family);
        return $this->customise($data )
			->renderWith(array('Family_print','Print'));		
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
	
	
    public function FamilySearchForm(){
        $form = new FamilySearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('list-records'));
        $form->setLegend('Search');
        $form->loadDataFrom($this->request->getVars());
        $form->disableSecurityToken();
        return $form;
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

	public function MonthlyIncomeSearchForm(){
		$controller = new MonthlyIncomeController();
		$form = $controller->MonthlyIncomeSearchForm();
        return $form;
	}
	
	public function MonthlyExpenseSearchForm(){
		$controller = new MonthlyExpenseController();
		$form = $controller->MonthlyExpenseSearchForm();
        return $form;
	}
	
	public function VehicleSearchForm(){
		$controller = new VehicleController();
		$form = $controller->VehicleSearchForm();
        return $form;
	}
	
	public function ApplianceSearchForm(){
		$controller = new ApplianceController();
		$form = $controller->ApplianceSearchForm();
        return $form;
	}
	
	public function OtherFacilitySearchForm(){
		$controller = new OtherFacilityController();
		$form = $controller->OtherFacilitySearchForm();
        return $form;
	}
	
	public function MediaSearchForm(){
		$controller = new MediaController();
		$form = $controller->MediaSearchForm();
        return $form;
	}

	public function CatholicMagazineSearchForm(){
		$controller = new CatholicMagazineController();
		$form = $controller->CatholicMagazineSearchForm();
        return $form;
	}
	
	public function LoanSearchForm(){
		$controller = new LoanController();
		return $controller->LoanSearchForm();
	}

	public function SavingSearchForm(){
		$controller = new SavingController();
		return $controller->SavingSearchForm();
	}
	
}