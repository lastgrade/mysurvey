<?php
//
class AgricultureController extends SiteController{
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
		$this->title = 'Agriculture';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Agriculture';		
		return $this->renderWith(array('Agriculture','App'));
	}

	public function search(){
		$this->title = 'Search Agriculture';
		$this->list = $this->Results();
		return $this->renderWith(array('Agriculture_results','App'));
	}

	public function printlist(){
		$this->title = 'Agriculture list';		
		return $this->renderWith(array('Agriculture_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'agriculture', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'agriculture');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Agriculture','"Family"."ID" = "Agriculture"."FamilyID"');

        $agricultureType = Convert::raw2sql($this->request->getVar('Type'));
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));

        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }


        if($agricultureType){
            $list = $list->filter(array(
                'Agriculture.Type' => $agricultureType
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
	
	
	public function AgricultureSearchForm(){
		$form = new AgricultureSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Agriculture');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}

	public function BusinessSearchForm(){
		$controller = new BusinessController();
		$form = $controller->BusinessSearchForm();
        return $form;
	}

}
