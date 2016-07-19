<?php 
include 'TemplateClass.php';
include 'EmployeeClass.php';
$userId = $_REQUEST['q'];

$Employee = new EmployeeClass;
$userData = $Employee->getEmployeeDataById($userId);
$templateId = $userData['template_id'];

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
        
    <body>
        <?php echo str_replace($toBeReplace,$replacedText,$templateSource); ?>
       <?= "<a target='_blank' href='generatepdf.php?q=" . $userData['id']."'> Download PDF </a>" ?>
    </body>
</html>