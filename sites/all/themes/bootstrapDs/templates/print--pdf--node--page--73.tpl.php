<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>
    <base href='<?php print $url ?>' />
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
        font-family: Arial, sans-serif;
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
        padding-top: 30px
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

      #footer:after { content: counter(page); font-size: 22px; position: absolute; right: 23px; top: 26px }
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

  $fecha_actual = date('Y-m-d');  

  $email = "";
  if (isset($_SESSION['email'])==1){
    $email =  " - " . $_SESSION['email'];
  }

  $checkcount=0;

  ?>
  <div class="flyleaf" width="100%"> <?php print '<img  src="'.base_path() . path_to_theme() .'/images/cover.jpg">'; ?></div>
  <header  style="position: fixed;top:-60px;">
    <?php print '<img  src="'.base_path() . path_to_theme() .'/images/header-pdf.jpg">'; ?>
  </header>
  <div id="footer" style="position: fixed;bottom: 10px; left: 10px; width:100%;">
    <div>
      <?php print t("My Chemical Guide - Questionnaire Report");?>
      <span style="position:absolute;right:25px;">
        <?php print $fecha_actual; ?>
      </span>
      <br />
      http://dsetool.osha.eu <?php print $email ?>
      <span style="position:absolute;right:60px;">Page</span>
       <br />
       <br />
    </div>
  </div>
  <body style="padding-top:200px;">
  
  	<?php
//Array to include all the recommendations with their nodes titles
global $base_url;
drupal_add_css ( path_to_theme() . "/css/print.css");

$checks = array();
$checks['4']['99'] = t("Do you apply good working practices described to reduce the risks when working with <b>carcinogenic, mutagenic or reprotoxic substances?</b>");
$checks['4']['100'] = t("Do you apply good working practices to reduce the risks when working with <b>sensitising substances?</b>");
$checks['4']['102'] = t("Do you apply good working practices to reduce exposure to <b>asbestos?</b> ");
$checks['4']['104'] = t("Do you apply good working practices to reduce the risks when working with <b>cytostatics</b> or any other medical product which may cause adverse effects?");
$checks['4']['105'] = t("Do you apply good working practices to reduce the risks when working with <b>isocyanates/polyurethane, epoxy, acrylates or cyanoacrylates?</b>");
$checks['4']['106'] = t("Do you apply the good working practices to reduce exposure to <b>dust that contains quartz?</b>");
$checks['4']['107'] = t("Do you apply good working practices to reduce exposure to dust from mineral wool, e.g. <b>glass wool, rock wool, or glass fibre?</b>");
$checks['4']['108'] = t("If you cannot avoid working with <b>refractory fibres</b>, special fibres or crystalline fibres, do you apply good working practices described to reduce exposure (and the risk of cancer)? ");
$checks['7'] = t("Do you know which chemical substances pregnant and breast-feeding women are not allowed to work with?");
$checks['8'] = t("Do you know which chemical substances young workers are not allowed to work with? ");
$checks['9']['268'] = t("Have you done what is necessary to protect those that have not the necessary language capacities to understand all written and/or oral preventive instructions? ");
$checks['9']['269'] = t("Have you done what is necessary to protect those that have mental or physical disabilities?");
$checks['9']['270'] = t("Have you done what is necessary to protect those that work alone with chemical products or dangerous substances?");
$checks['10']['115'] = t("Do you apply good working practices for hairdressers? ");
$checks['10']['116'] = t("Do you apply good working practices for electroplating?");
$checks['10']['117'] = t("Do you apply good working practices for laboratory work?");
$checks['10']['118'] = t("Do you apply good working practices for welding and thermo-cutting?");
$checks['10']['119'] = t("Do you apply good working practices for spray painting?");
$checks['10']['120'] = t("Do you apply good practices for work in confined spaces?");
$checks['10']['121'] = t("Do you apply good practices for work with liquid manure? ");
$checks['11']['136'] = t("Have you got the necessary documented information about risks and safety precautions for the chemicals you import?");
$checks['11']['137'] = t("Have you taken the necessary risk and safety precautions for the chemical products that you mix and store for later use in your own company?");
$checks['11']['138'] = t("Have you taken the necessary risk and safety precautions if you repackage or distribute chemical products or substances (e.g. filling a liquid chemical product from a larger barrel to smaller containers");
$checks['12']['no'] = t("Have you checked whether you are working with asbestos or not?");
$checks['12']['258'] = t("Have you checked whether you are working with asbestos in demolition and renovation works?");
$checks['12']['259'] = t("Have you checked whether you are processing or treating material containing asbestos?");
$checks['12']['260'] = t("Have you checked whether you are working with asbestos in research, development or analysis?");
$checks['13'] = t("Did you sort out chemical products which are not used/not needed anymore?");
$checks['14'] = t("Safety data sheets (SDS) are available for all the chemical products that are used or stored and which are labelled with one or more hazard pictograms (black and white in a red frame).");
$checks['15'] = t("We have checked that the safety data sheets and labelling of packaging seem to give reasonably correct information?");
$checks['17'] = t("Have all staff and all others who are in contact with chemical products or substances got information about and are aware of the risks and to they know how to work safely and protect themselves?");
$checks['18'] = t("Do you have a register (a list) of the chemical products and substances that is practical for you?");
$checks['19'] = t("We have carried out a complete risk assessment for all the works in which chemical products and substances are used or dangerous substances are generated ");
$checks['19-1'] = t("We have carried out a complete risk assessment for all the works in which chemical products and substances are used or dangerous substances are generated ");
$checks['19-2'] = t("Have you got a written record of those risk assessments that ought to/need to be documented?");
$checks['20'] = t("Are your risk assessments good enough?");
$checks['21'] = t("Do you control now whether you purchase unnecessarily dangerous chemical products?");
$checks['23'] = t("Do you follow the specific rules in the safety data sheets on the storage of chemical products? ");
$checks['24'] = t("Have you checked that you use chemical products only for the uses that are listed in the Safety Data Sheets?");
$checks['25'] = t("Have you checked if you can replace /substitute dangerous chemical products or processes by less dangerous ones? ");
$checks['26'] = t("Have you checked that the outcome of an implemented or planned exchange/substitution of a chemical product or process was successful? ");
$checks['27'] = t("Have you taken the measures needed to reduce the concentration of the emission of dangerous substances into the air at the work places?");
$checks['28'] = t("Have you taken measures needed to reduce the spreading of dangerous substances to colleagues working close by? ");
$checks['30']['249'] = t("Have you checked that you use the right type of protective gloves and use them in the right way?");
$checks['30']['250'] = t("Have you checked that you use the right type of respiratory protection and use them in the right way? ");
$checks['30']['251'] = t("Have you checked that you use the right type of safety goggles and visors and use them in the right way?");
$checks['31'] = t("Signs and labelling may be needed, for example, on pipes and containers, and at work places handling dangerous substances. Do you have the required safety signs and labels? ");
$checks['32'] = t("Is emergency eye-wash fountain and/or emergency shower fast and easily accessible? ");
$checks['33'] = t("Have you checked that you use the right kind of emergency eye-wash fountains and emergency showers and use them in the right way? ");
$checks['35'] = t("Have you reported chemical incidents or injuries to the authorities (as well as other occupational injuries)?");
$checks['36'] = t("Have you followed up these accidents and injuries and taken precautions to avoid similar incidents and injuries? ");

$block_title = array();
$block_title['1'] = t('Part I: Handling, use and exposure of dangerous substances');
$block_title['2'] = t('Part II: Practices and routines');
$block_title['3'] = t('Part III: Control measures to reduce the risks');

$checks_title = array();
$checks_title['4'] = t('Good practice for certain chemical products and dangerous substances');
$checks_title['7'] = t('Employees with specific risk');
$checks_title['8'] = t('Employees with specific risk');
$checks_title['9'] = t('Employees with specific risk');
$checks_title['10'] = t('Good practice for certain activities and businesses');
$checks_title['11']['136'] = t('Import of chemicals');
$checks_title['11']['137'] = t('Mixing');
$checks_title['11']['138'] = t('Repackaging and distributing');
$checks_title['12'] = t('Asbestos');
$checks_title['13'] = t('Sorting out unnecessary chemicals');
$checks_title['14'] = t('Safety data sheets and information about risks');
$checks_title['15'] = t('Correct info in the SDS');
$checks_title['17'] = t('Awareness and knowledge');
$checks_title['18'] = t('Register of chemical products');
$checks_title['19'] = t('Risk assessment - complete');
$checks_title['19-1'] = t('Risk assessment - complete');
$checks_title['19-2'] = t('Risk assessment - written document');
$checks_title['20'] = t('Quality of risk assessment');
$checks_title['21'] = t('Purchase routines');
$checks_title['23'] = t('Storage');
$checks_title['24'] = t('Unidentified uses');
$checks_title['25'] = t('Substitution');
$checks_title['26'] = t('Successful substitution ');
$checks_title['27'] = t('Emissions into the work place air ');
$checks_title['28'] = t('Exposure at nearby work places');
$checks_title['30']['249'] = t('Personal Protective Equipment - Gloves');
$checks_title['30']['250'] = t('Personal Protective Equipment – Respiratory protection');
$checks_title['30']['251'] = t('Personal Protective Equipment – Googles and visors');
$checks_title['31'] = t('Labels available');
$checks_title['32'] = t('Emergency eye-wash');
$checks_title['33'] = t('Safety measure');
$checks_title['35'] = t('Reporting of chemical injuries and accidents');
$checks_title['36'] = t('Follow-up on chemical injuries and accidents ');

$block_title = array();
$block_title['1'] = t('Part I: Handling, use and exposure of dangerous substances');
$block_title['2'] = t('Part II: Practices and routines');
$block_title['3'] = t('Part III: Control measures to reduce the risks');

$yes = t('Yes');
$yes = str_pad($yes,  10, " ");
$no = t('No');
$no = str_pad($no,  10, " ");
?>



  <?php
  
  $result_id = 0;
  if (isset($_SESSION['quiz'][25]['result_id'])==1){
    $result_id = $_SESSION['quiz'][25]['result_id'];
    $next_que = $_SESSION['quiz'][25]['next_question'];
  }else{
    if (isset($_SESSION['quiz']['temp']['result_id'])){
      $result_id = $_SESSION['quiz']['temp']['result_id'];
      $next_que = 37;

    }
  }
  ?>
  <div class="main-container">
  <h1 class="page-header container" style="margin-top:-40px;padding-top:0;"><?php print t("Checklist"); ?></h1>
  
  <?php
    $number = 0; //Number of the question
    $block1 = 0; //Are there checklist for the block1?
    $block2 = 0; //Are there checklist for the block2?
    $block3 = 0; //Are there checklist for the block3?

    
  
    
      $dont_get = array(1,2,3,5,6,16,29,34);
      $show_yes= array(7,8,15);
      $show_no= array(13,14,17,18,19,20,21,23,24,25,26,27,28,31,32,33,35,36);
      $check_toshow = array();
      $query = db_select('quiz_node_results_answers', 'que_ans');
      $query->fields('que_ans', array('is_correct','number','is_skipped','question_nid'));
      $query->condition('result_id', $result_id);
      $query->condition('is_skipped',2,'<');
      $query->condition ('number',$dont_get, 'NOT IN');
      $query->condition('number', $next_que,'<');
      $query->isNotNull('answer_timestamp');
      $query->orderBy('number', 'ASC');
      $answers = $query->execute();
      

          //Question with more than an answer 4,9,10,12,19,30
      foreach ($answers as $answer) {
        
        $number = $answer->number;
        $question_nid = $answer->question_nid;

        if ($number==4 || $number==9 || $number==10 || $number==11 || $number==12 || $number==30){
          //We have to check what was the answers to these questions
          //print ("Mas de una respuesta :" . $number . "<br>");

           if ($answer->is_skipped==1){

              switch ($number){
                case 4:
                  $check_toshow[4][4][99] = 99;
                  $check_toshow[4][4][100] = 100;
                  $check_toshow[4][4][102] = 102;
                  $check_toshow[4][4][104] = 104;
                  $check_toshow[4][4][105] = 105;
                  $check_toshow[4][4][106] = 106;
                  $check_toshow[4][4][107] = 107;
                  $check_toshow[4][4][108] = 108;
                  $check_toshow[4]['is_skipped'] = true;
                  break;

                case 9:
                  $check_toshow[9][9][268] = 268;
                  $check_toshow[9][9][269] = 269;
                  $check_toshow[9][9][270] = 270;
                  $check_toshow[9]['is_skipped'] = true;
                  break;

                case 10:
                  $check_toshow[10][10][115] = 115;
                  $check_toshow[10][10][116] = 116;
                  $check_toshow[10][10][117] = 117;
                  $check_toshow[10][10][118] = 118;
                  $check_toshow[10][10][119] = 119;
                  $check_toshow[10][10][120] = 120;
                  $check_toshow[10][10][121] = 121;
                  $check_toshow[10]['is_skipped'] = true;
                  break;
                case 11:
                  $check_toshow[11][11][136] = 136;
                  $check_toshow[11][11][137] = 137;
                  $check_toshow[11][11][138] = 138;
                  $check_toshow[11]['is_skipped'] = true;
                  break;
                case 12:
                  $check_toshow[12][12]['no'] = 'no';
                  $check_toshow[12][12][258] = 258;
                  $check_toshow[12][12][259] = 259;
                  $check_toshow[12][12][260] = 260;
                  $check_toshow[12]['is_skipped'] = true;
                  break;
                case 30:
                  $check_toshow[30][30][249] = 249;
                  $check_toshow[30][30][250] = 250;
                  $check_toshow[30][30][251] = 251;
                  $check_toshow[30]['is_skipped'] = true;
                  break;
              }
           }else{
           

            $query = db_select('quiz_node_results_answers', 'a');
            $query->join('quiz_multichoice_user_answers', 'b', 'a.result_answer_id = b.result_answer_id');
            $query->fields('b', array('id'));
            $query->condition('result_id', $result_id);
            $query->condition('number', $number);
            $res_ans = $query->execute();
          
            $resp_id = "";
            foreach ($res_ans as $resp) {
             
             $resp_id = $resp->id;
            }

            if ($resp_id !=""){
              $query = db_select('quiz_multichoice_answers', 'a');
              $query->join('quiz_multichoice_user_answer_multi', 'b', 'a.id = b.answer_id');
              $query->fields('a', array('score_if_chosen','id'));
              $query->condition('user_answer_id', $resp_id);
              $res_answer = $query->execute();
           
              foreach ($res_answer as $resp) {
                 $check_toshow[$number][$number][$resp->id] = $resp->id;
                 $check_toshow[$number]['nid'] = $question_nid;
              }  
            } 
          }    
        }
        else{
          
          if ($answer->is_correct==1){
            if(in_array($number,$show_yes )){
               //$check_toshow[] = $number;
               $check_toshow[$number][$number] = $number;
               $check_toshow[$number]['nid'] = $question_nid;
            }
            
          }else{
            if(in_array($number,$show_no)){
              $check_toshow[$number][$number] = $number;
              $check_toshow[$number]['nid'] = $question_nid;
            }  
          }

          //Allways add to the check_toshow
          if ($answer->is_skipped==1){
            $check_toshow[$number][$number] = $number;
            $check_toshow[$number]['nid'] = $question_nid;
            $check_toshow[$number]['is_skipped'] = true;
          }

        }  
       } 
       //Once we have get the number the checlist to show, we print all of them 
       print("<div class='checklist container'>");
       $block1_printed = false;
       $block2_printed = false;
       $block3_printed = false;
       

     // krumo($check_toshow);
      foreach ($check_toshow as $checknumber) {
        
        $number_key = (key($checknumber));
                
        if ($number_key<12 and $block1_printed == false){
          print("<div class='block-title first'>");
          print $block_title[1];
          print("</div>");
          $block1_printed = true;
        }

        if ($number_key>12 and $number_key<24 and $block2_printed == false){
          print("<div class='break'></div>");
          print("&nbsp;");
          print("<div class='block-title '>");
          $checkcount=0;
          print $block_title[2];
          print("</div>");
          $block2_printed = true;

        }

        if ($number_key>24 and $block3_printed == false){
          print("<div class='break'></div>");
          print("&nbsp;");
          print("<div class='block-title'>");
          $checkcount=0;
          print $block_title[3];
          print("</div>");  
          $block3_printed = true;

        }
          
          

          if ($number_key == "11"  || $number_key =="30"){
            
            //print($number_key . "Array de " . count($checknumber[$number_key]));
            $show_title=true;
            foreach ($checknumber[$number_key] as $checkarray) {
              if ($checkarray!="139" &&  $checkarray!="252"){//These are the ids of the answer without checks
                print("<div class='check-question'>");//Div for the whole question


                if ($show_title==true){      
                  if ($checkcount==4){
                    print("<div class='break'></div>");
                    print("&nbsp;");
                    $checkcount=0;
                  }          
                  print("<div class='check-title'>");
                  print($checks_title[$number_key][$checkarray]);
                  print("</div>");
                  $show_title=false;
                }  

               /*print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span></div>");*/
               
                
                if (isset($check_toshow[$number_key]['is_skipped'])==1){
                  print("<span class='answer-title'>". t("Your answer").":</span>");
                  print("<span class='answer-text-check skipped'>");
                  print(t('Do not know / Reply later') . "Este otro");
                  if ($checkcount==4){
                    print("<div class='break'></div>");
                    print("&nbsp;");
                    $checkcount=0;
                  }
                  $checkcount=$checkcount+1;
                 
                  print("</span>");             
                }
                
                if(isset($check_toshow[$number_key]['nid'])){
                  $node_q = node_load($check_toshow[$number_key]['nid']);

                }


                foreach ($node_q->alternatives as $q_answer) {
            
                  if ($checkarray == $q_answer['id']){
                    
                    $answer_text = $q_answer['answer']['value'];
                    $answer_text = str_replace('<?php print t("', '',$answer_text);
                    $answer_text = str_replace('");?>', '',$answer_text);
                    $answer_text = str_replace('<p>', '',$answer_text);
                    $answer_text = str_replace('</p>', '',$answer_text);
                   
                    if ($checkcount==4){
                      print("<div class='break'></div>");
                      print("&nbsp;");
                      $checkcount=0;
                    }
                    $checkcount=$checkcount+1;

                    print("<span class='answer-text-check'>");
                    print("<span class='answer-title'>". t("Your answer").":</span>");
                    print(t($answer_text) . "<br/>");
                    $answer = t($answer_text);
                    $answer = str_replace("<p>","",$answer);
                    $answer = str_replace("</p>","",$answer);
                    
                    
                    print("</span>");
                  }
                }

                print("<div class='check-text col-md-9'>");
                print $checks[$number_key][$checkarray];
                print("</div>");

                print("<div class='check-check col-md-3'>");
                print "<span class='yes-txt'>".$yes."</span>";
                print "<span class='no-txt'>".$no."</span>";
                print("</div>"); 
                print("</div>");
        
              }
              
            }
 
          }
          
          else{
            
            if ($number_key == "4" || $number_key =="9" || $number_key =="10"|| $number_key =="12"){

             
              $show_title=true;
              foreach ($checknumber[$number_key] as $checkarray) {

                if ($checkarray!="114" &&  $checkarray!="121" &&  $checkarray!="261" && $checkarray!="110"){//These are the ids of the answer without checks
                  print("<div class='check-question'>");//Div for the whole question
                 
                  if ($show_title==true){
                    if ($checkcount==4){
                      print("<div class='break'></div>");
                      print("&nbsp;");
                      $checkcount=0;
                    }
                      
                    print("<div class='check-title'>");
                    print $checks_title[$number_key];
                    print("</div>");
                    $show_title=false;
                  }                 
                 
                  /*print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span></div>");*/
                  
                  if (isset($check_toshow[$number_key]['is_skipped'])==1){
                    if ($checkcount==4){
                      print("<div class='break'></div>");
                      print("&nbsp;");
                      $checkcount=0;
                    }
                    $checkcount=$checkcount+1;
                    
                    print("<span class='answer-title'>". t("Your answer").":</span>");
                    print("<span class='answer-text-check skipped'>");
                    print(t('Do not know / Reply later') . "O este");
                    print("</span>");             
                  }
                 
                  if(isset($check_toshow[$number_key]['nid'])){
                    $node_q = node_load($check_toshow[$number_key]['nid']);
                    foreach ($node_q->alternatives as $q_answer) {
                
                      if ($checkarray == $q_answer['id']){
                        
                        $answer_text = $q_answer['answer']['value'];
                        $answer_text = str_replace('<?php print t("', '',$answer_text);
                        $answer_text = str_replace('");?>', '',$answer_text);
                        $answer_text = str_replace('<p>', '',$answer_text);
                        $answer_text = str_replace('</p>', '',$answer_text);
                       
                        if ($checkcount==4){
                        
                         print("<div class='break'></div>");
                         print("&nbsp;");
                        $checkcount=0;
                        }
                        $checkcount=$checkcount+1;
                          
                       
                        print("<span class='answer-text-check'>");
                        print("<span class='answer-title'>". t("Your answer").":</span>");
                        print(t($answer_text) . "<br/>");
                        $answer = t($answer_text);
                        $answer = str_replace("<p>","",$answer);
                        $answer = str_replace("</p>","",$answer);
                        
                        print("</span>");
                      }
                    }

                }


                  if (isset($checks[$number_key][$checkarray])){
                    
                    print("<div class='check-text col-md-9'>");
                    print $checks[$number_key][$checkarray];
                    print("</div>");
                    print("<div class='check-check col-md-3'>");
                    print "<span class='yes-txt'>".$yes."</span>";
                    print "<span class='no-txt'>".$no."</span>";
                    print("</div>");
                   
                  }
                  print("</div>");
                }         
                
              }

            }else{  
              
              if (isset($checks[$number_key])==1){
                $answer_19 = "NOT";
                if ($number_key == "19" ){

                  if (isset($check_toshow[19]['is_skipped'])==1){
                    $answer19 =  "<p>".t('Do not know / Reply later')."</p>";
                    }else{
                      $answer_id =key($check_toshow[19][19]);
                      if ($answer_id==184){
                        $answer_19 = $no;
                      }
                      else{
                        $answer_19 = $yes;
                      }
                  }


                  //Print 19-1
                  if ($checkcount==4){
                      print("<div class='break'></div>");
                      print("&nbsp;");
                      $checkcount=0;
                    }
                  $checkcount=$checkcount+1;
                  print("<div class='check-question'>");//Div for the whole question
                  print("<div class='check-title'>");
                  print $checks_title['19-1'];
                  print("</div>");
                  print("<span class='answer-title'>". t("Your answer").":</span>");
                  print("<span class='answer-text-check'>".$answer_19."</span>");
                  print("<div class='check-text col-md-9'>");
                  print $checks['19-1'];
                  
                  print("</div>");
                  print("<div class='check-check col-md-3'>");
                  print "<span class='yes-txt'>".$yes."</span>";
                  print "<span class='no-txt'>".$no."</span>";
                  print("</div>");
                  print("</div>");

                  //Print 19-2
                  if ($checkcount==4){
                      print("<div class='break'></div>");
                      print("&nbsp;");
                      $checkcount=0;
                    }
                  $checkcount=$checkcount+1;
                  print("<div class='check-question'>");//Div for the whole question
                  print("<div class='check-title'>");
                  print $checks_title['19-2'];
                  print("</div>");
                  print("<span class='answer-title'>". t("Your answer").":</span>");
                  print("<span class='answer-text-check'>".$answer_19."</span>");
                  print("<div class='check-text col-md-9'>");
                  print $checks['19-2'];
                  
                  
                  print("</div>");
                  print("<div class='check-check col-md-3'>");
                  print "<span class='yes-txt'>".$yes."</span>";
                  print "<span class='no-txt'>".$no."</span>";
                  print("</div>");
                  print("</div>");

                }else { 
                  
                  if ($checkcount==4){
                      print("<div class='break'></div>");
                      print("&nbsp;");
                      $checkcount=0;
                    }
                    $checkcount=$checkcount+1;
                    

                  print("<div class='check-question'>");//Div for the whole question
                  print("<div class='check-title'>");
                  print $checks_title[$number_key];
                  
                  print("</div>");

                  /*print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span></div>");*/
                  
                  if (isset($check_toshow[$number_key]['is_skipped'])==1){
                    //print("<span class='answer-text-check'>");
                    print("<span class='answer-title'>". t("Your answer").":</span>");
                    print t('Do not know / Reply later');
                    //print("</span>");         
                    
                  }
                  
                  if(isset($check_toshow[$number_key]['nid'])){
                    $node_q = node_load($check_toshow[$number_key]['nid']);
                    $answer_id =key($check_toshow[$number_key][$number_key]);
                  


                    foreach ($node_q->alternatives as $q_answer) {
                      if ($answer_id == $q_answer['id']){
                      
                        $answer_text = $q_answer['answer']['value'];
                        $answer_text = str_replace('<?php print t("', '',$answer_text);
                        $answer_text = str_replace('");?>', '',$answer_text);
                        $answer_text = str_replace('<p>', '',$answer_text);
                        $answer_text = str_replace('</p>', '',$answer_text);
                        
                        print("<span class='answer-text-check'>");
                        if (isset($check_toshow[$number_key]['is_skipped'])!=1){
                          print("<span class='answer-title'>". t("Your answer").":</span>");
                        }
                        print(t($answer_text) . "<br/>");
                        $answer = t($answer_text);
                        $answer = str_replace("<p>","",$answer);
                        $answer = str_replace("</p>","",$answer);
                        print("</span>");
                      }
                    }
                  }

                  
                  if (in_array($number_key,$show_yes) && isset($check_toshow[$number_key]['is_skipped'])!=1){
                    print ('<span class="answer-text-check">');
                    print("<span class='answer-title'>". t("Your answer").":</span>");
                    print t("Yes");
                  }elseif(isset($check_toshow[$number_key]['is_skipped'])!=1){
                    print ('<span class="answer-text-check">');
                    print("<span class='answer-title'>". t("Your answer").":</span>");
                    print t("No");
                  }
                  print("</span>");  


                  print("<div class='check-text col-md-9'>");
                  
                  print $checks[$number_key];
                  print("</div>");

                  print("<div class='check-check col-md-3'>");

                  print "<span class='yes-txt'>".$yes."</span>";
                  print "<span class='no-txt'>".$no."</span>";
                  print("</div>");
                   print("</div>");
                }


              }
            }
          }
            //print("</div>"); //Close the question div
        }
        print("</div>");//Close the block div
  