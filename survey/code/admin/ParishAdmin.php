<?php
//
class ParishAdmin extends ModelAdmin{
	
    private static $managed_models = array(
        'Family',
		'FamilyMember',
		'Parish',
		'CommunityGroup'
    );
	
	private static $url_segment = 'parishes';		
	private static $menu_title = 'My Parish';
	
    // ...
    public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);

        // $gridFieldName is generated from the ModelClass, eg if the Class 'Product'
        // is managed by this ModelAdmin, the GridField for it will also be named 'Product'

		if($this->modelClass == 'FamilyMember'){
			$gridFieldName = $this->sanitiseClassName($this->modelClass);
			$gridField = $form->Fields()->fieldByName($gridFieldName);

			// remove GridFieldAddNewButton if modelClass == 'FamilyMember'
			$gridField->getConfig()->removeComponentsByType('GridFieldAddNewButton');
		}

		/*	
		if($this->modelClass == 'Family'){
			$gridFieldName = $this->sanitiseClassName($this->modelClass);
			$gridField = $form->Fields()->fieldByName($gridFieldName);

			$gridField->getConfig()
				->addComponent(new GridFieldCopyButton(), 'GridFieldEditButton');
		}
		*/
		
        return $form;
    }	
}