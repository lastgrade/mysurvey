<?php
//
class MonthlyIncomeController extends SiteController{
	
	#code	
	public static $allowed_actions = array(
        	'index',
    		'search',
    		'printlist',
    		'add_monthly_income',
    		'AddMonthlyIncomeForm',
    		'edit_monthly_income',
    		'EditMonthlyIncomeForm'
    );
	
	
	/**
	 * Family datalist
	 * @var DataList
	 *
	 */
	protected $list;
	
	public function init(){
		parent::init();
		$this->title = 'Montly-Income';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Monthly';		
		return $this->renderWith(array('MonthlyIncome','App'));
	}
	
    public function add_monthly_income(){
		    
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}
    
    	$this->title = "Add Monthly-Income";
    	$form = $this->AddMonthlyIncomeForm();
    
    	$familyID = $form->Fields()->fieldByName('FamilyID');
    	$familyID->setValue($family->ID);
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    	$data = array(
    			'Form' => $form
    	);
    
    	return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    }
    
    
    public function AddMonthlyIncomeForm(){
    	$form = new AddMonthlyIncomeForm($this, __FUNCTION__);
    	return $form;
    }
    
    public function edit_monthly_income(){
    
    	$this->title = "Edit Monthly-Income";
    	$form = $this->EditMonthlyIncomeForm();
    	$form->setTemplate('AddMonthlyIncomeForm');
    	$id = (int)$this->request->param('ID');
    	//var_dump($_POST);EXIT();
    	$monthlyIncome = MonthlyIncome::get()->byID($id);
    	if(!$monthlyIncome){
    		return $this->httpError(404,'Page not found');
    	}
    	if($monthlyIncome->exists() && $form){
    		$form->loadDataFrom($monthlyIncome);
    	}
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    
    	$data = array(
    			'Form' => $form
    	);
    	return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    
    }
    
    
    public function EditMonthlyIncomeForm(){
    	$form = new EditMonthlyIncomeForm($this, __FUNCTION__);
    	return $form;
    }

	

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Montly-Income';
		$this->list = $this->Results();
		return $this->renderWith(array('MonthlyIncome_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Monthly-Income list';		
		return $this->renderWith(array('MonthlyIncome_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'monthlyincome', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'monthlyincome');
        }
    }


    public function Results(){

        $list = Family::get()->leftJoin('MonthlyIncome','"Family"."ID" = "MonthlyIncome"."FamilyID"');
		
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }
		
        $amountForm = Convert::raw2sql($this->request->getVar('AmountForm'));
        if($amountForm){			
            $list = $list->where(
				     'MonthlyIncome.Total >= '. $amountForm
					);			
        }

		$amountUpto = Convert::raw2sql($this->request->getVar('AmountUpto'));		
        if($amountUpto){
            $list = $list->where(
                 'MonthlyIncome.Total <= '. $amountUpto
		            );			
        }		
		//echo $list->sql();			
        return $list;
    }
	
	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
	}
		
	public function MonthlyIncomeSearchForm(){
		$form = new MonthlyIncomeSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Monthly-Income');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}


}
