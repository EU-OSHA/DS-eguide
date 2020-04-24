<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php 
    global $language;
    //print $head; 
    ?>
    <base href='<?php print $url ?>' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php print $print_title; ?></title>
    <?php print $scripts; ?>
    <?php if (isset($sendtoprinter)) print $sendtoprinter; ?>
    <?php print $robots_meta; ?>
    <?php if (theme_get_setting('toggle_favicon')): ?>
      <link rel='shortcut icon' href='<?php print theme_get_setting('favicon') ?>' type='image/x-icon' />
    <?php endif; ?>
    <style>
      
      @import url('https://fonts.googleapis.com/css?family=Open+Sans:300');
      
      header{
        margin-left: -50px;
        height: 150px;
      }

      body{
        font-family: 'Dejavu Sans', sans-serif;
        margin-top: -50px!important;
      }

      h1{
        color:#749b00;
      }

      .page-header{
        font-weight: 300!important;
        font-family: 'Open Sans', sans-serif!important;
        font-size: 2.6em;
        padding-left: 0;
        margin-left: -10px;
        padding-top: 0px;
        padding-bottom: 0px;
      }

      .block-title{
        color: #003399;
        margin-top: 0em;
        font-size: 1.6em;
        text-align: left;
        border-bottom: 1px dotted  #749b00;
        padding-bottom: 40px;
      }

      .q-title{
        margin-top: 1.2em;
        padding-top: 1em;
        margin-bottom: 0.2em;
        font-size: 1em;
        color: #749b00;
        border-top: 1px dotted  #749b00;
      }

      .q-answers{
        margin-top: 1em;
        display: inline-block !important;
      }

      .answer-title{
        font-weight: bold;
        color:#003399;
        padding-right: 5px;
      }

      .main-point{
        font-weight: bold;
          padding-bottom: 3px;
          padding-left: 0em;
          border-bottom: 1px dotted;
          margin-left: 1em;
          margin-bottom: 0.5em;
      }

      .second-point{
        font-weight: bold;
        padding-top: 10px;
        padding-left: 1em;
        color:#696769;
      }
      
      .rec-text{
        padding-bottom: 0em;
        padding-left: 1em;
      }

      li.rec-text{
        padding-left: 0em;
      }

      .comment-box{
        width:99%;
        padding-left: 1em;
          padding-top: 1em;
          margin-left: 1em;
      }

      .check-question{
        padding-top: 30px;
        padding-bottom: 10px;
      }

      .check-question ul{
        padding: 1em;
        margin: 0;
      }
      

      .check-question li{
        padding-left: 1em; 
        padding-bottom: 5px;
      }

      .check-question li::before {
        content: "• ";
        color: #003399;
        font-size: 16px;
      }
      
      .check-check{
        margin-bottom: 1em;
      }

      .checklist .check-title {
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 1.5em;
        color: #749b00;
      }

      .checklist .check-text {
          padding-left: 35px;
          font-size: 1em;
          padding-bottom: 15px;
          padding-top:10px;
          
      }

      .checklist .check-check span:before {
          content: "";
          width: 20px;
          height: 20px;
          display: inline-block;
          border: 2px solid black;
          vertical-align: sub;
          margin-right: 5px;
          margin-left: 35px;
          margin-top: 2px;
      }

      #footer:after { content: counter(page); font-size: 22px; position: absolute; right: 05px; top: 30px }
      #footer {
        color: #3c3c3c;
        font-size: 10pt;
        bottom: 10px;
        font-style: italic
      }
      .flyleaf {
          page-break-after: always;
          margin-top:-100px;
          padding:0;
        }
      .break{
        page-break-after: always;
      }
      

    </style>
  </head>
  <?php 
   if ($language->language!="" && $language->language!="en"){
    $lang_code = "-" . $language->language;
  }else{
    $lang_code = "";
  } 
  
  $coverpath =  base_path() . path_to_theme() .'/images/check-cover' .$lang_code.'.jpg' ;
  $headerpath = base_path() . path_to_theme() .'/images/check-header' .$lang_code.'.png' ;

  $fecha_actual = date('Y-m-d');  

  $email = "";
  if (isset($_SESSION['email'])==1){
    $email =  " - " . $_SESSION['email'];
  }

  ?>
  <div class="flyleaf" width="100%"> <?php print '<img  src="'.$coverpath.'">'; ?></div>
  <header  style="position: fixed;top:-60px;">
      <?php print '<img  src="'.$headerpath.'">'; ?>
  </header>
  <div id="footer" style="position: fixed;bottom: 10px; left: 10px; width:100%;">
    <div>
      <?php print t("My Chemical Guide - Questionnaire Report");?>
      <span style="position:absolute;right:5px;">
          <?php print $fecha_actual; ?>
      </span>
      <br />
     https://eguides.osha.europa.eu/dangerous-substances/ <?php print $email ?>
      <span style="position:absolute;right:60px;"> <?php print t("Page");?></span>
       <br />
       <br />
    </div>
  </div>
  <body style="padding-top:200px;">
  
  	<?php
//Array to include all the recommendations with their nodes titles
global $base_url;
drupal_add_css ( path_to_theme() . "/css/print.css");
$checks['1']['title'] = t('Good practice for certain chemical products and dangerous substances');
$checks['1']['check']['0'] = t("Do you apply good working practices described to reduce the risks when working with <b>carcinogenic, mutagenic or reprotoxic substances?</b>");
$checks['1']['check']['1'] = t("Do you apply good working practices to reduce the risks when working with <b>sensitising substances?</b>");
$checks['1']['check']['2'] = t("Do you apply good working practices to reduce exposure to <b>asbestos?</b> ");
$checks['1']['check']['3'] = t("Do you apply good working practices to reduce the risks when working with <b>cytostatics</b> or any other medical product which may cause adverse effects?");
$checks['1']['check']['4'] = t("Do you apply good working practices to reduce the risks when working with <b>isocyanates/polyurethane, epoxy, acrylates or cyanoacrylates?</b>");
$checks['1']['check']['5'] = t("Do you apply the good working practices to reduce exposure to <b>dust that contains quartz?</b>");
$checks['1']['check']['6'] = t("Do you apply good working practices to reduce exposure to dust from mineral wool, e.g. <b>glass wool, rock wool, or glass fibre?</b>");
$checks['1']['check']['7'] = t("If you cannot avoid working with <b>refractory fibres</b>, special fibres or crystalline fibres, do you apply good working practices described to reduce exposure (and the risk of cancer)? ");
$checks['2']['title'] = t('Employees with specific risk');
$checks['2']['check']['0'] = t("Do you know which chemical substances pregnant and breast-feeding women are not allowed to work with?");
$checks['2']['check']['1'] = t("Do you know which chemical substances young workers are not allowed to work with? ");
$checks['2']['check']['2'] = t("Have you done what is necessary to protect those that have not the necessary language capacities to understand all written and/or oral preventive instructions? ");
$checks['2']['check']['3'] = t("Have you done what is necessary to protect those that have mental or physical disabilities?");
$checks['2']['check']['4'] = t("Have you done what is necessary to protect those that work alone with chemical products or dangerous substances?");

$checks['3']['title'] = t('Good practice for certain activities and businesses');
$checks['3']['check']['0'] = t("Do you apply good working practices for hairdressers? ");
$checks['3']['check']['1'] = t("Do you apply good working practices for electroplating?");
$checks['3']['check']['2'] = t("Do you apply good working practices for laboratory work?");
$checks['3']['check']['3'] = t("Do you apply good working practices for welding and thermo-cutting?");
$checks['3']['check']['4'] = t("Do you apply good working practices for spray painting?");
$checks['3']['check']['5'] = t("Do you apply good practices for work in confined spaces?");
$checks['3']['check']['6'] = t("Do you apply good practices for work with liquid manure? ");

$checks['4']['title'] = t('Import of chemicals');
$checks['5']['title'] = t('Mixing');
$checks['6']['title'] = t('Repackaging and distributing');
$checks['4']['check']['0'] = t("Have you got the necessary documented information about risks and safety precautions for the chemicals you import?");
$checks['5']['check']['0'] = t("Have you taken the necessary risk and safety precautions for the chemical products that you mix and store for later use in your own company?");
$checks['6']['check']['0'] = t("Have you taken the necessary risk and safety precautions if you repackage or distribute chemical products or substances (e.g. filling a liquid chemical product from a larger barrel to smaller containers");

$checks['7']['title'] = t('Asbestos');
$checks['7']['check']['0'] = t("Have you checked whether you are working with asbestos or not?");
$checks['7']['check']['0'] = t("Have you checked whether you are working with asbestos in demolition and renovation works?");
$checks['7']['check']['1'] = t("Have you checked whether you are processing or treating material containing asbestos?");
$checks['7']['check']['2'] = t("Have you checked whether you are working with asbestos in research, development or analysis?");

$checks['8']['title'] = t('Sorting out unnecessary chemicals');
$checks['8']['check']['0'] = t("Did you sort out chemical products which are not used/not needed anymore?");

$checks['9']['title'] = t('Safety data sheets and information about risks');
$checks['9']['check']['0'] = t("Safety data sheets (SDS) are available for all the chemical products that are used or stored and which are labelled with one or more hazard pictograms (black and white in a red frame).");

$checks['10']['title'] = t('Correct info in the SDS');
$checks['10']['check']['0'] = t("We have checked that the safety data sheets and labelling of packaging seem to give reasonably correct information?");

$checks['11']['title'] = t('Awareness and knowledge');
$checks['11']['check']['0'] = t("Have all staff and all others who are in contact with chemical products or substances got information about and are aware of the risks and to they know how to work safely and protect themselves?");

$checks['12']['title'] = t('Register of chemical products');
$checks['12']['check']['0'] = t("Do you have a register (a list) of the chemical products and substances that is practical for you?");

$checks['13']['title'] = t('Risk assessment - complete');
$checks['13']['check']['0'] =  t("We have carried out a complete risk assessment for all the works in which chemical products and substances are used or dangerous substances are generated ");

$checks['14']['title'] = t('Risk assessment - complete');
$checks['14']['check']['0'] =  t("We have carried out a complete risk assessment for all the works in which chemical products and substances are used or dangerous substances are generated ");

$checks['15']['title'] = t('Risk assessment - written document');
$checks['15']['check']['0'] = t("Have you got a written record of those risk assessments that ought to/need to be documented?");

$checks['16']['title'] = t('Quality of risk assessment');
$checks['16']['check']['0'] = t("Are your risk assessments good enough?");

$checks['17']['title'] = t('Purchase routines');
$checks['17']['check']['0'] = t("Do you control now whether you purchase unnecessarily dangerous chemical products?");

$checks['18']['title'] = t('Storage');
$checks['18']['check']['0'] = t("Do you follow the specific rules in the safety data sheets on the storage of chemical products? ");

$checks['19']['title'] = t('Unidentified uses');
$checks['19']['check']['0'] =  t("Have you checked that you use chemical products only for the uses that are listed in the Safety Data Sheets?");

$checks['20']['title'] = t('Substitution');
$checks['20']['check']['0'] = t("Have you checked if you can replace /substitute dangerous chemical products or processes by less dangerous ones? ");

$checks['21']['title'] = t('Successful substitution ');
$checks['21']['check']['0'] = t("Have you checked that the outcome of an implemented or planned exchange/substitution of a chemical product or process was successful? ");

$checks['22']['title'] = t('Emissions into the work place air ');
$checks['22']['check']['0'] = t("Have you taken the measures needed to reduce the concentration of the emission of dangerous substances into the air at the work places?");

$checks['23']['title'] = t('Exposure at nearby work places');
$checks['23']['check']['0'] = t("Have you taken measures needed to reduce the spreading of dangerous substances to colleagues working close by? ");

$checks['24']['title'] = t('Personal Protective Equipment - Gloves');
$checks['24']['check']['0'] = t("Have you checked that you use the right type of protective gloves and use them in the right way?");
$checks['25']['title']= t('Personal Protective Equipment – Respiratory protection');
$checks['25']['check']['0'] = t("Have you checked that you use the right type of respiratory protection and use them in the right way? ");
$checks['26']['title'] = t('Personal Protective Equipment – Googles and visors');
$checks['26']['check']['0'] = t("Have you checked that you use the right type of safety goggles and visors and use them in the right way?");

$checks['27']['title'] = t('Labels available');
$checks['27']['check']['0'] = t("Signs and labelling may be needed, for example, on pipes and containers, and at work places handling dangerous substances. Do you have the required safety signs and labels? ");

$checks['28']['title'] = t('Emergency eye-wash');
$checks['28']['check']['0'] = t("Is emergency eye-wash fountain and/or emergency shower fast and easily accessible? ");

$checks['29']['title'] = t('Safety measure');
$checks['29']['check']['0'] = t("Have you checked that you use the right kind of emergency eye-wash fountains and emergency showers and use them in the right way? ");

$checks['30']['title'] = t('Reporting of chemical injuries and accidents');
$checks['30']['check']['0'] = t("Have you reported chemical incidents or injuries to the authorities (as well as other occupational injuries)?");

$checks['31']['title'] = t('Follow-up on chemical injuries and accidents ');
$checks['31']['check']['0'] = t("Have you followed up these accidents and injuries and taken precautions to avoid similar incidents and injuries? ");

$block_title = array();
$block_title['1'] = t('Part I: Handling, use and exposure of dangerous substances');
$block_title['2'] = t('Part II: Practices and routines');
$block_title['3'] = t('Part III: Control measures to reduce the risks');

$block_title = array();
$block_title['1'] = t('Part I: Handling, use and exposure of dangerous substances');
$block_title['2'] = t('Part II: Practices and routines');
$block_title['3'] = t('Part III: Control measures to reduce the risks');

$yes = t('Yes');
$yes = str_pad($yes,  10, " ");
$no = t('No');
$no = str_pad($no,  10, " ");

?>
  <div class="main-container" style="padding-bottom: 60px;"> 
  <h1 class="page-header container" style="margin-top:-40px;padding-top:0;"><?php print t("Checklist overview"); ?></h1>
  
<?php
 
  //Once we have get the number the checlist to show, we print all of them 
  print("<div class='checklist container'>");
 

  for($cont=1;$cont<=31;$cont++) {
    //Create a new page to avoid show question in 2 diferent pages
    $idSalto=array(3,5,8,18,23,30);

      //Blocks header section******************************************        
    if ($cont==1 ){
      print("<div class='block-title checklist first'>");
      print $block_title[1];
      print("</div>");
    }

    if ($cont==13 ){
      print("<div class='break'></div>");
      print("&nbsp;");
      print("<div class='block-title checklist'>");
      print $block_title[2];
      print("</div>");
    }

    if ($cont==25){
      print("<div class='break'></div>");
      print("&nbsp;");
      print("<div class='block-title checklist'>");
      print $block_title[3];
      print("</div>");  
    }
 
    if (in_array($cont, $idSalto)){
      print("<div class='break'></div>");
      print("&nbsp;");
    }
    //The title of the checklists
    print("<div class='check-title'>");
    print($checks[$cont]['title']);
    print("</div>");
    //print($cont);

    foreach($checks[$cont]['check'] as $value) {
    
      print("<div class='check-question'>");//Div for the whole question
      print($value);
      print("</div>");  

      print("<div class='check-check col-md-3'>");
      print "<span class='yes-txt'>".$yes."</span>";
      print "<span class='no-txt'>".$no."</span>";
      print("</div>"); 
      
    }

  }
    //End of the blocks header section******************************************
  print("</div>");//Close the block div
  