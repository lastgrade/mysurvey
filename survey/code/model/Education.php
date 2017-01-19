<?php
//
class Education extends DataObject
{
    private static $db = array(
        'Code' => "Varchar(4)",
        'Status' => "Varchar(2)"
    );

    private static $has_one = array(
        'FamilyMember' => 'FamilyMember'
    );

    private static $field_labels = array(
        'PrintStatus' => 'Status' // renames the column to "Cost"
    );

    private static $summary_fields = array(
        'Course',
        'PrintStatus'
    );

    public function Course(){
        $codes = Config::inst()->get('Education', 'Course');
        return $codes[$this->Code];
    }

    public function PrintStatus(){
        switch($this->Status){
            case 'p':
                return 'Passed';
                break;

            case 'f';
                return 'Failed';
                break;

            case 's';
                return 'Studying';
                break;

        }
    }

    public function getCMSFields(){
        $fields = parent::getCMSFields();

        $codes = Config::inst()->get('Education', 'Course');
        $codeField = new DropdownField("Code", 'Course', $codes );
        $fields->addFieldsToTab('Root.Main',$codeField);

        $status = array('p'=>'Passed','f'=>'Failed','s'=>'Studying');
        $statusField = new DropdownField("Status", 'Status', $status );
        $fields->addFieldsToTab('Root.Main',$statusField);

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
