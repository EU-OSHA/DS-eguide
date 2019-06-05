<?php
global $language;
//Array to include all the recommendations with their nodes titles
$checks = array();
$checks['3']['skipped'] = array("10.0");
$checks['3']['319'] = array("10.0");
$checks['4']['skipped'] = array("1.1","1.2","1.3","1.4","2.0","3.1","3.9","4.0","5.0","6.0","7.0","8.0");
$checks['4']['325'] = array("1.1","1.2","1.3","1.4");
$checks['4']['326'] = array("1.1","2.0");
$checks['4']['327'] = array("1.1","3.1","3.9");
$checks['4']['103'] = array("1.1"); //????Anaesthetic
$checks['4']['328'] = array("1.1","4.0");
$checks['4']['329'] = array("1.1","5.0","5.2","5.4");
$checks['4']['330'] = array("1.1","6.0");
$checks['4']['331'] = array("1.1","7.0");
$checks['4']['332'] = array("1.1","8.0");
$checks['5']['302'] = array("9.0");
$checks['5']['skipped'] = array("9.0");
$checks['6']['399'] = array("64.0");
$checks['6']['skipped'] = array("64.0");
$checks['7']['397'] = array("28.0","28.1");
$checks['7']['398'] = array("28.0");
$checks['7']['skipped'] = array("28.0","28.1");
$checks['8']['395'] = array("28.0","28.2");
$checks['8']['396'] = array("28.0");
$checks['8']['skipped'] = array("28.0","28.2");
$checks['9']['skipped'] = array("28.0");
$checks['9']['306'] = array("28.0");
$checks['9']['307'] = array("28.0");
$checks['9']['308'] = array("28.0");
$checks['10']['skipped'] =array("15.0","16.0","17.0","18.0","19.0","20.0","21.0");
$checks['10']['310'] =array("15.0","16.0");
$checks['10']['311'] =array("15.0","17.0");
$checks['10']['312'] =array("15.0","18.0");
$checks['10']['313'] =array("15.0","19.0");
$checks['10']['314'] =array("15.0","20.0");
$checks['10']['315'] =array("15.0","21.0");
$checks['11']['skipped'] =array("38.0","39.0","40.0");
$checks['11']['391'] =array("39.0","40.0");
$checks['11']['392'] =array("39.0","40.0");
$checks['11']['393'] =array("38.0","40.0");
$checks['12']['skipped'] =array("3.1","3.8");
$checks['12']['337'] =array("3.8");
$checks['12']['338'] =array("3.1");
$checks['12']['339'] =array("3.1");
$checks['13']['389'] =array("36.0");
$checks['14']['skipped'] =array("41.0");
$checks['14']['387'] =array("41.0");
$checks['14']['388'] =array("41.0");
$checks['15']['384'] =array("43.0");
$checks['16']['383'] =array("44.0","45.0");
$checks['17']['skipped'] =array("45.0");
$checks['17']['380'] =array("45.0");
$checks['18']['skipped'] =array("47.0");
$checks['18']['378'] =array("47.0");
$checks['18']['379'] =array("47.0");
$checks['19']['skipped'] =array("54.0");
$checks['19']['376'] =array("54.0");
$checks['20']['skipped'] =array("54.0");
$checks['20']['374'] =array("54.0");
$checks['21']['skipped'] =array("48.0");
$checks['21']['318'] =array("48.0");
$checks['22']['369'] =array("48.0");
$checks['22']['370'] =array("48.0");
$checks['22']['371'] =array("48.0");
$checks['23']['skipped'] =array("49.0");
$checks['23']['368'] =array("49.0");
$checks['24']['skipped'] =array("42.0");
$checks['24']['336'] =array("42.0");
$checks['25']['366'] =array("58.0");
$checks['26']['363'] =array("51.0");
$checks['26']['364'] =array("51.0");
$checks['27']['362'] =array("60.0");
$checks['28']['skipped'] =array("61.0");
$checks['28']['360'] =array("61.0");
$checks['29']['skipped'] =array("62.0");
$checks['29']['357'] =array("62.0");
//$checks['29']['358'] =array("62.0");
$checks['30']['353'] =array("62.2");
$checks['30']['354'] =array("62.1");
$checks['30']['355']=array("62.3");
$checks['31']['skipped'] =array("63.0","37.0");
$checks['31']['352'] =array("63.0","37.0");
$checks['32']['skipped'] =array("64.0");
$checks['32']['350'] =array("64.0");
$checks['35']['344'] =array("55.0");
$checks['35']['skipped'] =array("55.0");
$checks['36']['342'] =array("55.0");
$checks['36']['342'] =array("55.0");

$block_title = array();
$block_title['1'] = t('Part I: Handling, use and exposure of dangerous substances');
$block_title['2'] = t('Part II: Practices and routines');
$block_title['3'] = t('Part III: Control measures to reduce the risks');

$dir = dirname(__FILE__);
require_once $dir . '/../rtf/lib/PHPRtfLite.php';

//require_once '/var/www/html/dangerous/sites/all/themes/bootstrapDs/rtf/lib/PHPRtfLite.php';
PHPRtfLite::registerAutoloader();
$rtf = new PHPRtfLite();
$sect = $rtf->addSection();

$parSimple = new PHPRtfLite_ParFormat();
$parSimple->setIndentLeft(0.5);
$parSimple->setIndentRight(0.5);

$parNormal = new PHPRtfLite_ParFormat();
$parNormal->setIndentLeft(0);
$parNormal->setIndentRight(0.5);
$parFormat = new PHPRtfLite_ParFormat();
?>

<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/header.tpl.php');
?>

<div class="main-container">
  <h1 class="page-header container"><?php print t("Good practices and guidance"); ?></h1>
  <?php
  
$table = $sect->addTable();
$table->addRows(2,2);

$email = "";
if (isset($_SESSION['email'])==1){
  $email =  " - " . $_SESSION['email'];
}

$section = $rtf->addSection();
// add header
$header = $section->addHeader();
$footer = $section->addFooter();

$table = $footer->addTable();
$table->addRows(2);
$table->addColumnsList(array(12,4));

$cell = $table->getCell(1, 1);
$cell->setTextAlignment(PHPRtfLite_Table_Cell::TEXT_ALIGN_LEFT);
$cell->writeText(t('My Chemical Guide - Questionnaire Report'), new PHPRtfLite_Font(10, "Arial", '#000000'), $parNormal);

$cell = $table->getCell(2, 1);
$cell->setTextAlignment(PHPRtfLite_Table_Cell::TEXT_ALIGN_LEFT);
$cell->writeText("https://eguides.osha.europa.eu/dangerous-substances" . $email, new PHPRtfLite_Font(9, "Arial", '#000000'), $parNormal);

$cell = $table->getCell(1, 2);
$cell->setTextAlignment(PHPRtfLite_Table_Cell::TEXT_ALIGN_RIGHT);
$cell->writeText(date("Y-n-j"), new PHPRtfLite_Font(10, "Arial", '#000000'), $parNormal);

$cell = $table->getCell(2, 2);
$cell->setTextAlignment(PHPRtfLite_Table_Cell::TEXT_ALIGN_RIGHT);
$cell->writeText(t('Page'). " <pagenum>/<pagetotal>", new PHPRtfLite_Font(10, "Arial", '#000000'), $parNormal);

if ($language->language!="" && $language->language!="en"){
  $lang_code = "-" . $language->language;
}else{
  $lang_code = "";
} 

$header->addImage($dir . '/../../../../all/modules/print/images/header-que' .$lang_code.'.jpg', null, 15);
$sect->addImage($dir . '/../../../../all/modules/print/images/cover' .$lang_code.'.jpg', null, 15);
$sect->insertPageBreak();
$sect->writeText(t("Good practices and guidance") ."<br>", new PHPRtfLite_Font(28, "Arial", '#749b00'), $parSimple);

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

if ($result_id ==0 ){//Nothing to show
  	
	print(t("There is still nothing on this Recommendation list."));  

}else{
    $number = 0; //Number of the question
    if (isset($_SESSION['quiz'][25]['result_id'])==1){
    	$result_id = $_SESSION['quiz'][25]['result_id'];
    }else{
    	$result_id = $_SESSION['quiz']['temp']['result_id'];
    }
    
    if ($next_que<13){
      print(t("There is still nothing on this Recomendation list.")); 
      include(drupal_get_path('theme', 'bootstrapDs').'/templates/footer.tpl.php');
      return false;
    }else
      
      
	$dont_get = array(1,2,33,34);
  $dont_get_bycountry = array(1,9,21,22,23,24);
  	$check_toshow = array();
  	$query = db_select('quiz_node_results_answers', 'que_ans');
  	$query->fields('que_ans', array('is_correct','number','is_skipped','question_nid'));
  	$query->condition('result_id', $result_id);
  	$query->condition('is_skipped',2,'<');
  	$query->condition ('number',$dont_get, 'NOT IN');
    $query->condition ('number',$dont_get_bycountry, 'NOT IN');
  	$query->condition('number', $next_que,'<');
    $query->isNotNull('answer_timestamp');
  	$query->orderBy('number', 'ASC');
  	$answers = $query->execute();
      

    foreach ($answers as $answer) {
        
        $number = $answer->number;
        $question_nid = $answer->question_nid;
        $is_skipped = $answer->is_skipped;
       
        if ($is_skipped=="1"){ //Skipped question, so we add all the recommendations
        	$check_toshow[$number][$number]["skipped"] = "skipped";
	        $check_toshow[$number]['nid'] = $question_nid;
        }else
        {
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
  
  	$title1_printed = false;
    $title2_printed = false;
    $title3_printed = false;
   	//Once we have get the number of the checlist to show, we print all of them 

    if($language->language!=''){
      $linkPdf= "";
      $linkRtf = "../sites/all/themes/bootstrapDs/rtf/samples/generated/lqreport-" . $result_id . ".rtf";
    }
    else
    {
      $linkPdf= "";
      $linkRtf = "sites/all/themes/bootstrapDs/rtf/samples/generated/lqreport-" . $result_id . ".rtf";
    }


    ?>
    
    <div class='recommendation container'>
	<div class="content-print-download ">
    <ul class="print-download col-md-12">
      <li class="print" >
        <a href="printpdf/107" target="_blank" class="" onclick="_paq.push(['trackEvent', 'Download', 'rec-pdf']);">
          &gt; <?php print t("Download as pdf")?></a>
      </li>
      <li class="download " >
        <a href="<?php print $linkRtf ;?>" class="" onclick="_paq.push(['trackEvent', 'Download', 'rec-rtf']);">
          &gt; <?php print t("Download as rich text (rtf)")?></a>
      </li>
      <li class="back" >
        <a href="javascript:window.history.back()" class=""><?php print t("Back")?></a>
      </li>
      
  	</ul></div>
<?php

    foreach ($check_toshow as $checknumber) {

	    $number_key = (key($checknumber));
	    $check_toshow[$number_key]['measures_printed'] = false;

	    if ($number_key<12 and $title1_printed == false){
	   		print("<div class='block-title col-md-12'>");
	   	  print $block_title[1];
	   	  $sect->writeText('<b>'.$block_title[1].'</b><br>', new PHPRtfLite_Font(18, 'Arial', '#003399'), $parNormal);
	      print("</div>");
	   		$title1_printed = true;
       	$block_first_question = true;
	   	}

	   	if ($number_key>12 and $number_key<24 and $title2_printed == false){
	   		  print("<div class='block-title col-md-12'>");
	   	  	print $block_title[2];
	   	  	$sect->insertPageBreak();
	  		  $sect->writeText('<b>'.$block_title[2].'</b><br>', new PHPRtfLite_Font(18, 'Arial', '#003399'), $parNormal);
	      	print("</div>");
	   		  $title2_printed = true;
        	$block_first_question = true;

	        print ('<div class="check-question col-md-12"><div class="q-title">'.t("Introduction").'</div>');
	        $node_rec  = node_load_multiple(NULL, array("title" => "35.0"));
	        $key_node = key($node_rec);
          
	        if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
	          $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
          }else{
            $body_rec = "";   
	        }
	        print($body_rec."</div>");

          for ($i = 1; $i <= 500; $i++) {
            $body_rec  = str_replace('id="tmgmt-'.$i.'"', '', $body_rec);
          }
	        $body_rec  = str_replace("<p>", "<br>", $body_rec);
         	$body_rec  = str_replace("</p>", "", $body_rec);
         	$body_rec  = str_replace('<div class="main-point">', "", $body_rec);
         	$body_rec  = str_replace('<div class="rec-text">', "", $body_rec);
         	$body_rec  = str_replace('<div class="second-point">', "", $body_rec);
         	$body_rec  = str_replace('</div>', "", $body_rec);
         	$body_rec  = str_replace('<li class="rec-text">', "- ", $body_rec);
          $body_rec  = str_replace('<li>', "- ", $body_rec);
         	$body_rec  = str_replace('</li>', "", $body_rec);
         	$body_rec  = str_replace('</ul>', "", $body_rec);
         	$body_rec  = str_replace('<ul>', "", $body_rec);
          $body_rec  = str_replace('<span>', "", $body_rec);
          $body_rec  = str_replace('<span >', "", $body_rec);
          $body_rec  = str_replace('<p >', "", $body_rec);
          $body_rec  = str_replace('</span>', "", $body_rec);
          $body_rec  = str_replace('" target="_blank">', " - ", $body_rec);
          $body_rec  = str_replace('</a>', "", $body_rec);
          $sect->writeText(t("Introduction") .'<br/>', new PHPRtfLite_Font(12, "Arial", '#749b00'), $parSimple);
          
	        $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  

    	}
	  
	   	if ($number_key>24 and $title3_printed == false){
	   		print("<div class='block-title col-md-12'>");
	   	  print $block_title[3];
	   	  $sect->insertPageBreak();
	   	  $sect->writeText('<b>'.$block_title[3].'</b><br>', new PHPRtfLite_Font(18, 'Arial', '#003399'), $parNormal);
	   	  print("</div>");	
	   		$title3_printed = true;
        $block_first_question = true;
        print ('<div class="check-question col-md-12"><div class="q-title">'.t("Introduction").'</div>');
        $node_rec  = node_load_multiple(NULL, array("title" => "57.0"));
        $key_node = key($node_rec);
        if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
          $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
        }else{
          $body_rec = "Missing translation"; 
        }
        print($body_rec."</div>");
        for ($i = 1; $i <= 500; $i++) {
          $body_rec  = str_replace('id="tmgmt-'.$i.'"', '', $body_rec);
        }
        $body_rec  = str_replace("<p>", "<br>", $body_rec);
       	$body_rec  = str_replace("</p>", "", $body_rec);
       	$body_rec  = str_replace('<div class="main-point">', "", $body_rec);
       	$body_rec  = str_replace('<div class="rec-text">', "", $body_rec);
       	$body_rec  = str_replace('<div class="second-point">', "", $body_rec);
       	$body_rec  = str_replace('</div>', "", $body_rec);
       	$body_rec  = str_replace('<li class="rec-text">', "- ", $body_rec);
       	$body_rec  = str_replace('<li>', "- ", $body_rec);
       	$body_rec  = str_replace('</li>', "", $body_rec);
       	$body_rec  = str_replace('</ul>', "", $body_rec);
       	$body_rec  = str_replace('<ul>', "", $body_rec);
        $body_rec  = str_replace('<ul >', "", $body_rec);
        $body_rec  = str_replace('<span>', "", $body_rec);
        $body_rec  = str_replace('<span >', "", $body_rec);
        $body_rec  = str_replace('</span>', "", $body_rec);
        $body_rec  = str_replace('</span >', "", $body_rec);
        $body_rec  = str_replace('" target="_blank">', " - ", $body_rec);
        $body_rec  = str_replace('</a>', "", $body_rec);
        
        $sect->writeText(t("Introduction") .'<br/>', new PHPRtfLite_Font(12, "Arial", '#749b00'), $parSimple);
        $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
	   	}

	    print("<div class='check-question col-md-12'>");//Div for the whole question

	    foreach ($checknumber[$number_key] as $checkarray) {
        
	      if ($checkarray!="114" &&  $checkarray!="121" &&  $checkarray!="261"){//These are the ids of the answer without recommendations
	        
	        if (isset($checks[$number_key][$checkarray])){
	        	$node_q = node_load($check_toshow[$number_key]['nid']);
	        	$qtitle = $node_q->title;

	        	print("<div class='q-title'>". $qtitle."</div>");
	        	
            if ($block_first_question == true){
               $block_first_question = false;
            }else{
              $sect->insertPageBreak();
            }

            $sect->writeText('<b>'. $qtitle.'</b><br/>', new PHPRtfLite_Font(12, "Arial", '#749b00'), $parNormal);

	        	print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span>");
	        	$sect->writeText('<b>'.t("Your answer").'</b><br>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parNormal);
	        	if ($checkarray=="skipped"){
					    print("<span class='answer-text skipped'>");
	        		print("<p>".t('Do not know / Reply later')."</p>");
	        		$sect->writeText('<i>'.t("Do not know / Reply later").'</i><br><br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);
	        		print("</span>");	        		
	        	}

	        	foreach ($node_q->alternatives as $q_answer) {
              if ($checkarray == $q_answer['id']){

	        			$answer_text = $q_answer['answer']['value'];
	        			$answer_text = str_replace('<?php print t("', '',$answer_text);
	        			$answer_text = str_replace('");?>', '',$answer_text);
						    print("<span class='answer-text'>");
	        			print(t($answer_text));
	        			$answer = t($answer_text);
	        			$answer = str_replace("<p>","",$answer);
	        			$answer = str_replace("</p>","",$answer);
	        			$sect->writeText('<i>'.$answer.'</i><br>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parSimple);
	        			print("</span>");
	        		}
	        	}
	        	print("</div>");

	       		$print_title = true;
	          	foreach($checks[$number_key][$checkarray] as $rec_node){
	             
          		    $node_rec  = node_load_multiple(NULL, array("title" => $rec_node));
                 
                  
                	$key_node = key($node_rec);

                	if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
                    $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
                  }else{
                     $body_rec = ""; 
                  }
                 
                 	if ($print_title == true){
                  	print("<div class='q-answers'><span class='answer-title'>".t("Measures").":</span></div>");
                  	$sect->writeText('<b>' . t("Measures").'</b><br>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parNormal);
                 		$check_toshow[$number_key][$key_node]['measures_printed'] = true;
                 		$print_title = false;
                 	}
                  
                 	print($body_rec);
                  for ($i = 1; $i <= 500; $i++) {
                    $body_rec  = str_replace('id="tmgmt-'.$i.'"', '', $body_rec);
                  }
                  
                  $body_rec  = str_replace("<p >", "", $body_rec);
                  $body_rec  = str_replace("<span >", "", $body_rec);
                  $body_rec  = str_replace("<ul >", "", $body_rec);
                  $body_rec  = str_replace("</span>", "", $body_rec);
                 	$body_rec  = str_replace("<p>", "<br>", $body_rec);
                 	$body_rec  = str_replace("</p>", "", $body_rec);
                 	$body_rec  = str_replace('<div class="main-point">', "", $body_rec);
                 	$body_rec  = str_replace('<div class="rec-text">', "", $body_rec);
                 	$body_rec  = str_replace('<div class="second-point">', "", $body_rec);
                 	$body_rec  = str_replace('</div>', "", $body_rec);
                 	$body_rec  = str_replace('<li class="rec-text">', "", $body_rec);
                 	$body_rec  = str_replace('<li>', "", $body_rec);
                 	$body_rec  = str_replace('</li>', "", $body_rec);
                 	$body_rec  = str_replace('</ul>', "", $body_rec);
                 	$body_rec  = str_replace('<ul>', "", $body_rec);
                  $body_rec  = str_replace('<a href="', "URL:", $body_rec);
                  $body_rec  = str_replace('" target="_blank">', " - ", $body_rec);
                  $body_rec  = str_replace('</a>', "", $body_rec);
                  

                  //images
                  
                  if ($rec_node =="28.2" ||$rec_node =="38.0" ||$rec_node =="39.0" ||$rec_node =="58.0" ){
                    
                    if($rec_node == "58.0"){
                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/59-4.png', null);

                      $pos = strpos($body_rec,'.png"');
                      $body_rec = substr($body_rec, $pos + 8);

                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/59-1.png', null);

                      $pos = strpos($body_rec,'.png"');
                      $body_rec = substr($body_rec, $pos + 8);

                      $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                    }

                    if($rec_node == "28.2"){
                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/danger5.png', null);

                      $pos = strpos($body_rec,'.png"');
                      $body_rec = substr($body_rec, $pos + 12);

                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/dangerX.jpg', null);
                      $posGlobal = 43;
                      //Position for all languages excepts Au de

                      //Add the last image
                      if ($language->language=="AT_de"){
                        $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                        $sect->addImage($dir . '/../../../../default/files/dangerau_de.jpg', null);
                        $posGlobal = 90;
                      }


                      $pos = strpos($body_rec,'.jpg"');
                      $body_rec = substr($body_rec, $pos + $posGlobal);
                      
                      $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                    }


                   if($rec_node == "38.0"){
                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/38-6.png', null);

                      $pos = strpos($body_rec,'.png"');
                      $body_rec = substr($body_rec, $pos + 8);

                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/38-1.png', null);

                      $pos = strpos($body_rec,'.png"');
                      $body_rec = substr($body_rec, $pos + 49);

                      $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                    }
                     
                    if($rec_node == "39.0"){
                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/39.png', null);

                      $pos = strpos($body_rec,'.png"');
                      $body_rec = substr($body_rec, $pos + 8);

                      

                      $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                    }


                  }else{
                    
                    $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                  }
	            }
	            /*Print the comments of the questions*/
             	$user_comment = getcomment($result_id , $number_key);
             	?>

              	<div class='q-answers'>
              		<span class='answer-title'><?php print t("Comments")?>:</span>
              	</div>

              	<div class='comments-text'>
              		<textarea rows="4" cols="50" class="comment-box" disabled><?php print(trim($user_comment));?></textarea> 
				        </div>
				<?php
				$sect->writeText('<b>' . t("Comments").'</b>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parNormal);
				$sect->writeText('<br>' . $user_comment .'<br><br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);
	        }  
	    }         
	}
    print("</div>");//Close the recommendation div    
    }
  }

  function getcomment($result_id , $question_nid){

  	$query = db_select('quiz_user_comments', 'a');
    $query->fields('a', array('quc_comment'));
    $query->condition('result_id', $result_id);
    $query->condition('question_nid', $question_nid);
    $comments = $query->execute();
	$user_comment ="";
    foreach ($comments as $comment) {
       $user_comment = $comment->quc_comment;
    }	
    return $user_comment;
  }
  ?>
</div>
    <div class="content-print-download ">
        <ul class="print-download col-md-12">
          <li class="print" >
            <a href="printpdf/107" target="_blank" class=""  onclick="_paq.push(['trackEvent', 'Download', 'rec-pdf']);">&gt; <?php print t("Download as pdf")?> </a>
          </li>
          <li class="download " >
            <a href="<?php print ($linkRtf)?>" class=""  onclick="_paq.push(['trackEvent', 'Download', 'rec-rtf']);">&gt; <?php print t("Download as rich text (rtf)")?></a>
          </li>
          <li class="back" >
            <a href="javascript:window.history.back()" class=""><?php print t("Back")?></a>
          </li>
      </ul></div>

<?php if (!empty($page['footer'])): ?>
  <?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/footer.tpl.php');
  ?>
<?php endif;?>
<?php
// save rtf document
$rtf->save('sites/all/themes/bootstrapDs/rtf/samples/generated/lqreport-'.$result_id.'.rtf');
?>