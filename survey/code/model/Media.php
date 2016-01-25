<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/9/2016
 * Time: 10:34 AM
 */
class Media extends DataObject
{
    private static $db = array(
        'Newspaper' => 'Boolean',
        'NewspaperCount' => 'Int',
        'NewspaperNames' => 'Varchar(100)',
        'Magazine' => 'Boolean',
        'KidsMagazine' => 'Boolean',
        'Television' => 'Boolean',
        'Internet' => 'Boolean',
        'Mobile' => 'Boolean',
        'MobileCount' => 'Int'
    );

    private static $has_one = array(
        'Family' => 'Family'
    );


    private static $field_labels = array(
        'HasNewspaper' => 'Has Newspaper',
        'HasMagazine' => 'Has Magazine',
        'HasKidsMagazine' => 'Has KidsMagazine',
    );
    private static $summary_fields = array(
        'HasNewspaper',
        'HasMagazine',
        'HasKidsMagazine'
    );


    public function HasNewspaper(){
        if($this->Newspaper)
            return 'Yes';
        else
            return 'No';
    }

    public function HasMagazine(){
        if($this->Magazine)
            return 'Yes';
        else
            return 'No';
    }

    public function HasKidsMagazine(){
        if($this->KidsMagazine)
            return 'Yes';
        else
            return 'No';
    }


    public function getCMSFields() {
        $fields = parent::getCMSFields();

        if(Session::get("FamilyID")){
            $this->FamilyID = Session::get("FamilyID");
            $fields->replaceField('FamilyID', new HiddenField('FamilyID'));
        }

        $fields->addFieldToTab('Root.Main',new HeaderField('CustomHeader','Media'),'Newspaper');

        return $fields;
    }

    function canView($member = null) {
        return true;
    }

    function canEdit($member = null) {
        return true;
    }

    function canDelete($member = null) {
        return true;
    }

    function canCreate($member = null) {
        return true;
    }

}