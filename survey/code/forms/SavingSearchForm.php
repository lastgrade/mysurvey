<?php

/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 1/13/2016
 * Time: 5:42 PM
 */
class SavingSearchForm extends BaseForm
{

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
        
		
		$fields->push(OptionsetField::create('EducationFund', 'EducationFund', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('LifeInsurance', 'LifeInsurance', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('HealthInsurance', 'HealthInsurance', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('DeathFund', 'DeathFund', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('MarriageFund', 'MarriageFund', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('Mythri', 'Mythri', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('Chitty', 'Chitty', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
		$fields->push(OptionsetField::create('Others', 'Others', array('1'=>'Yes','0'=>'No','all'=>'All'),'all'));
			

        $parishes = Parish::get()->map('ID', 'NameWithLocation')->toArray();
        $parishField = DropdownField::create('ParishID', 'Parish')
            ->setSource($parishes);
        $parishField->setEmptyString('All Parish');
        $parishField->setValue(parent::getDefaultParishID());
        $fields->push($parishField);

		
     
	    return $fields;
    }

    public function getFormActions() {
        $actions = parent::getFormActions();
        $actions->first()->setTitle('Search');
        return $actions;
    }

    public function getFormValidator() {
        return RequiredFields::create();
    }

    /**
     * @param $data array Data from request vars
     * @param $form ContactForm The form instance handling the request
     * @param $request SS_HTTPRequest The HTTP Request object
     */
    public function doSubmit($data, $form, $request) {
        /*
        $email = new Email(
            $this->config()->email_from,
            $this->config()->email_to,
            $this->config()->email_subject
        );
        $email->setTemplate('ContactEmail');
        $email->populateTemplate($this->getData());
        $email->send();
        $this->getController()->redirect(
            $this->getController()->Link('success')
        );
        */
    }
}