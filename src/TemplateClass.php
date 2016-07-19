<?php

require 'include.php';

class TemplateClass extends database {
    
    public function __construct() {
        parent::__construct();
    }
    
    public $tempData = array('first_name' => 'Jarmanjeet',
                              'middle_name' => 'Singh',
                              'last_name' => 'Batth',
                              'designation' => 'PHP Developer',
                              'email' => 'jarmanjeet@ironsystems.com',
                              'phone1' => '00000000000',
                              'phone2' => '00000000000',
                              'fax' => '111111111',
        );
    
    

    public function addTemplate($values) {
        $this->insertData('Templates', $values);
    }
    
     public function deleteTemplate($id) {
        return $this->deleteData('Templates', "id='".$id."'");
    }
    
    public function editTemplate($id){
       $rows = $this->fetchData('Templates','*',"id='".$id."'");
         return $rows[0];
    }
    
    public function updateTemplate($field, $id) {
        return $this->updateData('Templates', $field, "id='".$id."'");
    }
    
    public function listingTemplates($conditions = null, $fields = null, $limit = null) {        
        return $this->fetchData('Templates');
    } 
    
    public function getTemplateById($template_id) {
        $conditions = 'id = ' . $template_id;
        return $this->fetchData('Templates', '*', $conditions)[0];
    }
}
?>
