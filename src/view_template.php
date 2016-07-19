<?php 
include 'TemplateClass.php';
include 'EmployeeClass.php';

$templateId = $_REQUEST['q'];

if(!empty($templateId)){
    $Template = new TemplateClass;
    $templateData = $Template->getTemplateById($templateId);
    $templateSource = $templateData['design'];
    
    if(empty($userId)){
        $userData = $Template->tempData;
        $replacedText = array($userData['first_name'], $userData['middle_name'], $userData['last_name'],$userData['designation'],$userData['email'],
                              $userData['phone1'],$userData['phone2'],$userData['fax']);        
    }else{
        $Employee = new EmployeeClass;
        $userData = $Employee->getEmployeeDataById($userId);
        $replacedText = array($userData['first_name'], $userData['middle_name'], $userData['last_name'],$userData['designation'],$userData['email'],
                              $userData['phone1'],$userData['phone2'],$userData['fax']);        
    }   
    $toBeReplace = array("{{first_name}}", "{{middle_name}}", "{{last_name}}","{{designation}}","{{email}}","{{phone}}","{{mobile}}","{{fax}}");
    
}
?>
<html>
    <head>
    </head>
        <?php echo str_replace($toBeReplace,$replacedText,$templateSource); ?>
    <body>
    </body>
</html>