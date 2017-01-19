<?php
//
class MonthlyExpenseController extends SiteController{
	#code
	
	#code	
	public static $allowed_actions = array(
        	'index',
    		'search',
    		'printlist',
    		'add_monthly_expense',
    		'AddMonthlyExpenseForm',
    		'edit_monthly_expense',
    		'EditMonthlyExpenseForm'
    );		
	
	/**
	 * Family datalist
	 * @var DataList
	 *
	 */
	protected $list;
	
	public function init(){
		parent::init();
		$this->title = 'Monthly-Expense';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Monthly-Expense';		
		return $this->renderWith(array('MonthlyExpense','App'));
	}

    public function add_monthly_expense(){
		    
    	$familyID = (int)$this->getRequest()->getVar('FamilyID');
    	$family = Family::get()->byID($familyID);
    	if(!$family){
    		return $this->httpError(404,'Page not found');
    	}
    
    	$this->title = "Add Monthly-Expense";
    	$form = $this->AddMonthlyExpenseForm();
    
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
    
    
    public function AddMonthlyExpenseForm(){
    	$form = new AddMonthlyExpenseForm($this, __FUNCTION__);
    	return $form;
    }
    
    public function edit_monthly_expense(){
    
    	$this->title = "Edit Monthly-Expense";
    	$form = $this->EditMonthlyExpenseForm();
    	$form->setTemplate('AddMonthlyExpenseForm');
    	
    	$id = (int)$this->request->param('ID');
    	$monthlyExpense = MonthlyExpense::get()->byID($id);
    	if(!$monthlyExpense){
    		return $this->httpError(404,'Page not found');
    	}
    	if($monthlyExpense->exists() && $form){
    		$form->loadDataFrom($monthlyExpense);
    	}
    
    	$backURL = urldecode($this->getRequest()->getVar('BackURL'));
    	$redirectURL = $form->Fields()->fieldByName('RedirectURL');
    	$redirectURL->setValue($backURL);
    
    
    	$data = array(
    			'Form' => $form
    	);
    	return $this->customise($data)->renderWith(array('Generic_form', 'App'));
    
    }
    
    
    public function EditMonthlyExpenseForm(){
    	$form = new EditMonthlyExpenseForm($this, __FUNCTION__);
    	return $form;
    }

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Monthly-Expense';
		$this->list = $this->Results();
		return $this->renderWith(array('MonthlyExpense_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Monthly-Expense list';		
		return $this->renderWith(array('MonthlyExpense_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'monthlyexpense', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'monthlyexpense');
        }
    }


    public function Results(){

        $list = Family::get()->leftJoin('MonthlyExpense','"Family"."ID" = "MonthlyExpense"."FamilyID"');
		
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }
		
        $amountForm = Convert::raw2sql($this->request->getVar('AmountForm'));
        if($amountForm){			
            $list = $list->where(
				     'MonthlyExpense.Total >= '. $amountForm
					);			
        }

		$amountUpto = Convert::raw2sql($this->request->getVar('AmountUpto'));		
        if($amountUpto){
            $list = $list->where(
                 'MonthlyExpense.Total <= '. $amountUpto
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
		
	public function MonthlyExpenseSearchForm(){
		$form = new MonthlyExpenseSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->Link('search'));
        $form->setLegend('Search Monthly-Expense');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}


}
