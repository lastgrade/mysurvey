<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/13/2016
 * Time: 12:57 PM
 */

class SiteController extends Controller
{

    private static $page_length = 5;

	protected $title;
	
    public function init()
    {
        parent::init();
        //$this->pageLength = 5;
		
		$this->title = 'Site';

        $member =Member::currentUser();
        if(!$member){
            return $this->redirect('Security/login?BackURL='.$this->RedirectURL());
        }

        Requirements::css('themes/default/foundation-icons/foundation-icons.css');
    }

    public function MyParish(){
        $parish = null;

        if(Cookie::get('myparishid')){
            $id = Cookie::get('myparishid');
            $parish = Parish::get()
                ->filter(array(
                    'ID' => $id
                ))
                ->first();
            return $parish;
        }

        if(Session::get('myparishid')){
            $id = Session::get('myparishid');
            $parish = Parish::get()
                        ->filter(array(
                            'ID' => $id
                        ))
                        ->first();
            return $parish;
        }
        return $parish;
    }

    public function MyParishes($limit = 10){
        $list = Parish::get()->limit($limit);
        return $list;
    }

    // return request url with baseurl
    public function RedirectURL(){
        //echo Director::baseURL();exit();
        return urlencode(Director::baseURL().$this->request->getURL(true));
    }

    // return pageLength
    public function getPageLength(){
        return self::$page_length;
    }
	
    public function getUrlParameters(){
        $vars = $this->request->getVars();
        if(isset($vars['url']))
            unset($vars['url']);
        if(count($vars)){
            return http_build_query($vars);
        }
        return null;
    }
	
}