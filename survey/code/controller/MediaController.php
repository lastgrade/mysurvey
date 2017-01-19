<?php
//
class MediaController extends SiteController{
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
		$this->title = 'Media';
	}

	/**
	 * render agriculture index page
	 * @return string
	 */	
	public function index(){
		$this->title = 'Media';		
		return $this->renderWith(array('Media','App'));
	}

	public function search(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		
		$this->title = 'Search Media';
		$this->list = $this->Results();
		return $this->renderWith(array('Media_results','App'));
	}

	public function printlist(){
		// show Unathorised page with user does not have access other parish
		$parishID = Convert::raw2sql($this->request->getVar('ParishID'));		
		if(!$this->canAccess($parishID)){
			return $this->renderWith(array('Unathorised_access', 'App'));
		}
		
		$this->title = 'Media list';		
		return $this->renderWith(array('Media_printresults','Print'));
	}
	
    public function Title() {
        return $this->title;
    }

    public function Link($slug = null) {
        if($slug){
            return Controller::join_links(Director::baseURL(), 'media', $slug);
        } else {
            return Controller::join_links(Director::baseURL(), 'media');
        }
    }

    public function Results(){

        $list = Family::get()->leftJoin('Media','"Family"."ID" = "Media"."FamilyID"');
				
	
        $parishID = Convert::raw2sql($this->request->getVar('ParishID'));
        if($parishID){
            $list = $list->filter(array(
                'ParishID' => $parishID
            ));
        }

		$newspaper = Convert::raw2sql($this->request->getVar('Newspaper'));
        if($newspaper!='all'){
            $list = $list->filter(array(
                'Media.Newspaper' => $newspaper
            ));
        }
		
		$magazine = Convert::raw2sql($this->request->getVar('Magazine'));		
        if($magazine!='all'){
            $list = $list->filter(array(
                'Media.Magazine' => $magazine
            ));
        }
		
		$kidsMagazine = Convert::raw2sql($this->request->getVar('KidsMagazine'));
        if($kidsMagazine!='all'){
            $list = $list->filter(array(
                'Media.KidsMagazine' => $kidsMagazine
            ));
        }
		
        $television = Convert::raw2sql($this->request->getVar('Television'));		
        if($television!='all'){
            $list = $list->filter(array(
                'Media.Television' => $television
            ));
        }
		
		$internet = Convert::raw2sql($this->request->getVar('Internet'));
        if($internet!='all'){
            $list = $list->filter(array(
                'Media.Internet' => $internet
            ));
        }
		
		$mobile = Convert::raw2sql($this->request->getVar('Mobile'));
        if($mobile!='all'){
            $list = $list->filter(array(
                'Media.Mobile' => $mobile
            ));
        }
		

        return $list;
    }
	
	public function PaginatedList(){
		$list = new PaginatedList($this->list, $this->request);
        $list->setPageLength($this->getPageLength());
		return $list;
	}
	
	
	public function MediaSearchForm(){
		$form = new MediaSearchForm($this,__FUNCTION__);
        $form->setFormMethod('get')
            ->setFormAction($this->link('search'));
        $form->setLegend('Search Media');
        $form->disableSecurityToken();
        $form->loadDataFrom($this->request->getVars());
        return $form;
	}

}
