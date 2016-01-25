<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/9/2016
 * Time: 10:34 AM
 */
class Health extends DataObject
{
    private static $db = array(
        'Blind' => 'Boolean',
        'Deaf' => 'Boolean',
        'Dumb' => 'Boolean',
        'OtherPhsicalDisability' => 'Boolean',
        'LearningDisability' => 'Boolean',
        'MentalDisability' => 'Boolean',
        'HearthDisease' => 'Boolean',
        'Diabetes' => 'Boolean',
        'Cancer' => 'Boolean',
        'BloodPressure' => 'Boolean',
        'OtherDisease' => 'Varchar(100)',
        'OccupationalDisease' => 'Varchar(100)',
        'Alcoholic' => 'Boolean',
        'OtherHealthInfo' => 'Varchar(100)'
    );

    private static $has_one = array(
        'FamilyMember' => 'FamilyMember'
    );

    private static $field_labels = array(
        'IsBlind' => 'Is Blind',
        'IsDeaf' => 'Is Deaf',
        'IsDumb' => 'Is Dumb',
    );

    private static $summary_fields = array(
        'IsBlind',
        'IsDeaf',
        'IsDumb'
    );


    public function IsBlind(){
        if($this->Blind)
            return 'Yes';
        else
            return 'No';
    }

    public function IsDeaf(){
        if($this->Deaf)
            return 'Yes';
        else
            return 'No';
    }

    public function IsDumb(){
        if($this->Dumb)
            return 'Yes';
        else
            return 'No';
    }


    public function getCMSFields() {
        $fields = parent::getCMSFields();

        if(Session::get("FamilyMemberID")){
            $this->FamilyMemberID = Session::get("FamilyMemberID");
            $fields->replaceField('FamilyMemberID', new HiddenField('FamilyMemberID'));
        }

        $fields->addFieldToTab('Root.Main',new HeaderField('CustomHeader','Health'),'Blind');

        //$fields->replaceField('Specify', new TextField('Specify','If others checked,please mention'));

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