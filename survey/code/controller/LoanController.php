<?php
//
class LoanController extends SiteController{
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
		$this->title = 'Loan';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Loan';		
		return $this->renderWith(array('Loan','App'));
	}

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Loan';
		$this->list = $this->Results();
		return $this->renderWith(array('Loan_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Loan list';		
		return $this->renderWith(array('Loan_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'loan', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'loan');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Loan','"Family"."ID" = "Loan"."FamilyID"');
		
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }

		$hasLoan = Convert::raw2sql($this->request->getVar('HasLoan'));		
        if($hasLoan!='all'){
            $list = $list->filter(array(
                'Loan.HasLoan' => $hasLoan
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
	
	
	public function LoanSearchForm(){
		$form = new LoanSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Loan');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}

	
}
