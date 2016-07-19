<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('../../view_businesscard_action.php');
//echo 'ddd';die;
//$con=mysqli_connect("localhost","root",'root',"businesscard") or die("could not connect to server");
require 'include.php';
$flag=0;
$id = $_REQUEST['q'];
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

require_once('plugin/tcpdf/examples/tcpdf_include.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Iron Systems India Pvt. Ltd');
$pdf->SetTitle('Business Card');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set default font subsetting mode
//$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// Set some content to print
$html =  str_replace($toBeReplace,$replacedText,$templateSource);
        
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
die('dd');
//============================================================+
// END OF FILE
//============================================================+
