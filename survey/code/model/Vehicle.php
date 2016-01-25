<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/9/2016
 * Time: 10:34 AM
 */
class Vehicle extends DataObject
{
    private static $db = array(
        'Cycle' => 'Boolean',
        'Bike' => 'Boolean',
        'Autoriskaw' => 'Boolean',
        'LightVehicle' => 'Boolean',
        'HeavyCommercial' => 'Boolean',
        'CountryBoat' => 'Boolean',
        'Vallam' => 'Boolean',
        'FishingBoat' => 'Boolean',
        'TourishBoat' => 'Boolean',
    );

    private static $has_one = array(
        'Family' => 'Family'
    );

    private static $field_labels = array(
        'HasCycle' => 'Has Cycle',
        'HasBike' => 'Has Bike',
        'HasAutoriskaw' => 'Has Autoriskaw',
    );


    private static $summary_fields = array(
        'HasCycle',
        'HasBike',
        'HasAutoriskaw'
    );

    public function HasCycle(){
        if($this->Cycle)
            return 'Yes';
        else
            return 'No';
    }

    public function HasBike(){
        if($this->Bike)
            return 'Yes';
        else
            return 'No';
    }

    public function HasAutoriskaw(){
        if($this->Autoriskaw)
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

        $fields->addFieldToTab('Root.Main',new HeaderField('CustomHeader','Vehicles Details'),'Cycle');

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