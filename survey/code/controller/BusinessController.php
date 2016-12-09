<?php
//
class BusinessController extends SiteController{
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
		$this->title = 'Business';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Business';		
		return $this->renderWith(array('Business','App'));
	}

	public function search(){		
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Search Business';
		$this->list = $this->Results();
		return $this->renderWith(array('Business_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Business list';		
		return $this->renderWith(array('Business_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'business', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'business');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Business','"Family"."ID" = "Business"."FamilyID"');

        $agricultureType = Convert::raw2sql($this->request->getVar('Type'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($agricultureType){
            $list = $list->filter(array(
                'Business.Type' => $agricultureType
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
	
	
	public function BusinessSearchForm(){
		$form = new BusinessSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->Link('search'));
        $form->setLegend('Search Business');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}
	
}
