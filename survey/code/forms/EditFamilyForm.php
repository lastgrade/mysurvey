<?php
class EditFamilyForm extends BaseForm{
	
    public function __construct(
        $controller,
        $name,
        FieldList $fields = null,
        FieldList $actions = null,
        $validator = null
    ) {
        //print __CLASS__.'<br>';
        parent::__construct($controller, $name, $fields, $actions, $validator);
        $this->addExtraClass('js-places-search-form');
        //echo __CLASS__;
    }

    public function getFormFields() {

        $fields = parent::getFormFields();
		
		$fields->push(TextField::create('Name','Name'));
		$fields->push(TextField::create('Address','Address'));
		$fields->push(TextField::create('Pincode','Pincode'));
		$fields->push(TextField::create('HouseNo','House No(govt)'));
		$fields->push(NumericField::create('BlockNo','Block No'));
		$fields->push(NumericField::create('UnitNo','Unit No'));
		$fields->push(NumericField::create('FamilyNo','Family No'));
		
		$fields->push(CheckboxField::create('IsPanchayat','Is Panchayat'));
		$fields->push(CheckboxField::create('IsMunicipality','Is Municipality'));
		$fields->push(CheckboxField::create('IsCorporation','Is Corporation'));
		$fields->push(HiddenField::create('ID','ID'));
		
		$member = Member::currentUser();		
		$parishes = $member->Parishes(); 
		
		if($parishes->exists()){
			$parishArray = $parishes->map('ID', 'NameWithLocation')->toArray();
		}
		else{
			$parishArray = Parish::get()->map('ID', 'NameWithLocation')->toArray();
		}
		
		$parishField = DropdownField::create('ParishID', 'Parish')
			->setSource($parishArray);
		$parishField->setEmptyString('select...');
		$parishField->setValue(parent::getDefaultParishID());
		$fields->push($parishField);
		//$fields->replaceField('ParishID', $parishField);
		
		
		//$fields->push( PhoneNumberField::create('Phone','HouseNo'));
		//$fields->push(HiddenField::create('ParishID','ParishID'));
	    return $fields;
    }

    public function getFormActions() {
        $actions = parent::getFormActions();
        $actions->first()->setTitle('Edit');
        return $actions;
    }

    public function getFormValidator() {
        return RequiredFields::create(array('FirstName','Email','Password'));
    }

    /**
     * @param $data array Data from request vars
     * @param $form ContactForm The form instance handling the request
     * @param $request SS_HTTPRequest The HTTP Request object
     */
    public function doSubmit($data, $form, $request) {
		//Debug::show($data); exit();
		$id = (int)$data['ID'];
		$family = DataObject::get_by_id('Family',$id);
        //$family = Family::create();
		$form->saveInto($family);		
		$family->write();
		
        $this->getController()->redirect(
            $this->getController()->Link('view/'.$family->ID)
        );        
    }	
}