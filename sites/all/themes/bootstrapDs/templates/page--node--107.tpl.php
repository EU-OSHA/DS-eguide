<?php
//Array to include all the recommendations with their nodes titles
$checks = array();
$checks['4']['skipped'] = array("1.1","1.2","1.3","1.4","2.0","3.1","3.9","4.0","5.0","6.0","7.0","8.0");
$checks['4']['99'] = array("1.1","1.2","1.3","1.4");
$checks['4']['100'] = array("1.1","2.0");
$checks['4']['102'] = array("1.1","3.1","3.9");
$checks['4']['103'] = array("1.1"); //????Anaesthetic
$checks['4']['104'] = array("1.1","4.0");
$checks['4']['105'] = array("1.1","5.0");
$checks['4']['106'] = array("1.1","6.0");
$checks['4']['107'] = array("1.1","7.0");
$checks['4']['108'] = array("1.1","8.0");
$checks['5']['150'] = array("9.0");
$checks['5']['skipped'] = array("9.0");
$checks['6']['154'] = array("59.0");
$checks['6']['skipped'] = array("59.0");
$checks['7']['156'] = array("28.1");
$checks['7']['skipped'] = array("28.1");
$checks['8']['159'] = array("28.2");
$checks['8']['skipped'] = array("28.2");
$checks['9']['skipped'] = array("29.0","30.0","31.0","32.0","33.0","34.0");
$checks['9']['268'] = array("29.0","30.0","31.0","32.0","33.0","34.0");
$checks['9']['269'] = array("29.0","30.0","31.0","32.0","33.0","34.0");
$checks['9']['270'] = array("29.0","30.0","31.0","32.0","33.0","34.0");
$checks['10']['skipped'] =array("15.0","16.0","17.0","18.0","19.0","20.0","21.0");
$checks['10']['115'] =array("15.0","16.0");
$checks['10']['116'] =array("15.0","17.0");
$checks['10']['117'] =array("15.0","18.0");
$checks['10']['118'] =array("15.0","19.0");
$checks['10']['119'] =array("15.0","20.0");
$checks['10']['120'] =array("15.0","21.0");
$checks['11']['skipped'] =array("38.0","39.0","40.0");
$checks['11']['136'] =array("39.0","40.0");
$checks['11']['137'] =array("39.0","40.0");
$checks['11']['138'] =array("38.0","40.0");
$checks['12']['skipped'] =array("3.1","3.8");
$checks['12']['258'] =array("3.8");
$checks['12']['259'] =array("3.1");
$checks['12']['260'] =array("3.1");
$checks['13']['165'] =array("36.0");
$checks['14']['skipped'] =array("41.0");
$checks['14']['169'] =array("41.0");
$checks['14']['237'] =array("41.0");
$checks['15']['171'] =array("43.0");
$checks['16']['175'] =array("44.0","45.0");
$checks['17']['skipped'] =array("49.0","45.0");
$checks['17']['177'] =array("49.0","45.0");
$checks['18']['skipped'] =array("47.0","51.0");
$checks['18']['181'] =array("47.0","51.0");
$checks['18']['238'] =array("47.0","51.0");
$checks['19']['skipped'] =array("54.0");
$checks['19']['184'] =array("54.0");
$checks['20']['skipped'] =array("54.0");
$checks['20']['187'] =array("54.0");
$checks['21']['skipped'] =array("57.0");
$checks['21']['190'] =array("57.0");
$checks['22']['191'] =array("57.0");
$checks['22']['192'] =array("57.0");
$checks['22']['193'] =array("57.0");
$checks['23']['skipped'] =array("46.0");
$checks['23']['196'] =array("46.0");
$checks['24']['skipped'] =array("42.0");
$checks['24']['272'] =array("42.0");
$checks['25']['200'] =array("58.0");
$checks['27']['204'] =array("60.0");
$checks['28']['skipped'] =array("61.0");
$checks['28']['206'] =array("61.0");
$checks['29']['skipped'] =array("63.0");
$checks['29']['207'] =array("63.0");
$checks['29']['208'] =array("63.0");
$checks['30']['249'] =array("63.2");
$checks['30']['250'] =array("63.1");
$checks['30']['251']=array("63.3");
$checks['31']['skipped'] =array("63.0","37.0");
$checks['31']['214'] =array("63.0","37.0");
$checks['32']['skipped'] =array("64.0");
$checks['32']['216'] =array("64.0");
$checks['36']['224'] =array("55.0");

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

<?php if (!empty($page['top_header'])): ?>
<header>
	
  <div class="container ds-header">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12 row">
        <a class="pull-left border-right-header logo-camp" accesskey="0" href="https://healthy-workplaces.eu/" target="_blank">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
        <a class="logo-osha" href="http://osha.europa.eu" title="EU-OSHA" target="_blank">
          <?php print '<img class="pull-left" alt="'.t("EU-OSHA logo").'" src="'.base_path() . path_to_theme() .'/images/logo-osha.png">'; ?>
        </a>
        <div class="border-right-header">
           <?php print '<img  class="pull-left logo-eu" alt="'.t("EU logo").'" src="'.base_path() . path_to_theme() .'/images/logo-eu.png">'; ?>
        </div>
       <div class="header-text"><?php echo t('Healthy Workplaces MANAGE DANGEROUS SUBSTANCES'); ?></div>
       <div class="content-right-header">
        <div class="print-friendly row">
          <a href="javascript:if(window.print)window.print();" title="Print page">
            <?php print '<img alt="'.t("Print").'" src="'.base_path() . path_to_theme() .'/images/print-friendly.png">'; ?>
          </a>
        </div>
        <div class="header_top_bar">
          <div class="vertical-align">
            <?php print render($page['top_header']); ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  <div class="container-fluid nav-ds">
    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <nav role="navigation" class="navbar navbar-default ds-menu container">
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
    <?php endif; ?>
  </div>
</header>
<?php endif; ?>

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
$cell->writeText("http://dsetool.osha.eu" . $email, new PHPRtfLite_Font(9, "Arial", '#000000'), $parNormal);

$cell = $table->getCell(1, 2);
$cell->setTextAlignment(PHPRtfLite_Table_Cell::TEXT_ALIGN_RIGHT);
$cell->writeText(date("Y-n-j"), new PHPRtfLite_Font(10, "Arial", '#000000'), $parNormal);

$cell = $table->getCell(2, 2);
$cell->setTextAlignment(PHPRtfLite_Table_Cell::TEXT_ALIGN_RIGHT);
$cell->writeText(t('Page'). " <pagenum>/<pagetotal>", new PHPRtfLite_Font(10, "Arial", '#000000'), $parNormal);


$header->addImage($dir . '/../../../../default/files/header-pdf.jpg', null, 15);
$sect->addImage($dir . '/../../../../default/files/cover.png', null, 15);
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
          if (!empty($page['footer'])): ?>
          <footer class="ds-footer">
            <div class="container">
              <div class="copyright">
                <span><?php print t("© 2017 EU-OSHA | an agency of the European Union");?></span>
              </div>
              <div class="footer_menu">
                <?php
                  $block = module_invoke('menu', 'block_view', 'menu-footer-menu');
                  print render($block['content']);
                ?>
              </div>
              <div class="footer_menu_social">
                <?php
                  $block = module_invoke('menu', 'block_view', 'menu-social-menu-footer');
                  print render($block['content']);
                ?>
              </div>
            </div>
          </div>  
        </footer>
        <?php endif; 
      return false;
    }else
      
      
	$dont_get = array(1,2,3,26,33,34,35);
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
    ?>
    
    <div class='recommendation container'>
	<div class="content-print-download ">
    <ul class="print-download col-md-4">
      <li class="print" >
        <a href="/dangerous-substances/printpdf/107" target="_blank" class="">&gt; <?php print t("Print to PDF")?> </a>
      </li>
      <li class="download " >
        <a href="sites/all/themes/bootstrapDs/rtf/samples/generated/lqreport-<?php print ($result_id)?>.rtf" class="">&gt; <?php print t("Print to RTF")?></a>
      </li>
      <li class="back" >
        <a href="javascript:window.history.back()" class=""><?php print t("Back")?></a>
      </li>
      
  	</ul></div>
<?php
   	//krumo ($check_toshow);
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
	        if (isset($node_rec[$key_node]->body['und'][0]['value'])){
	          $body_rec = $node_rec[$key_node]->body['und'][0]['value'];
	        }
	        print($body_rec."</div>");
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
        if (isset($node_rec[$key_node]->body['und'][0]['value'])){
          $body_rec = $node_rec[$key_node]->body['und'][0]['value'];
        }
        print($body_rec."</div>");
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
                	if (isset($node_rec[$key_node]->body['und'][0]['value'])){
                    	$body_rec = $node_rec[$key_node]->body['und'][0]['value'];
                  	}
                 
                 	if ($print_title == true){
                  	print("<div class='q-answers'><span class='answer-title'>".t("Measures").":</span></div>");
                  	$sect->writeText('<b>' . t("Measures").'</b><br>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parNormal);
                 		$check_toshow[$number_key][$key_node]['measures_printed'] = true;
                 		$print_title = false;
                 	}
                 	print($body_rec);

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
                      $body_rec = substr($body_rec, $pos + 8);

                      $pos = strpos($body_rec,'<img');
                      $body= substr($body_rec,0,$pos);
                      $sect->writeText($body .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
                      $sect->addImage($dir . '/../../../../default/files/dangerX.jpg', null);

                      $pos = strpos($body_rec,'.jpg"');
                      $body_rec = substr($body_rec, $pos + 43);

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
        <ul class="print-download col-md-4">
          <li class="print" >
            <a href="/dangerous-substances/printpdf/107" target="_blank" class="">&gt; <?php print t("Print to PDF")?> </a>
          </li>
          <li class="download " >
            <a href="sites/all/themes/bootstrapDs/rtf/samples/generated/lqreport-<?php print ($result_id)?>.rtf" class="">&gt; <?php print t("Print to RTF")?></a>
          </li>
          <li class="back" >
            <a href="javascript:window.history.back()" class=""><?php print t("Back")?></a>
          </li>
          
      </ul></div>



<?php if (!empty($page['footer'])): ?>
  <footer class="ds-footer">
    <div class="container">
      <div class="copyright">
        <span><?php print t("© 2017 EU-OSHA | an agency of the European Union");?></span>
      </div>
      <div class="footer_menu">
        <?php
          $block = module_invoke('menu', 'block_view', 'menu-footer-menu');
          print render($block['content']);
        ?>
      </div>
      <div class="footer_menu_social">
        <?php
          $block = module_invoke('menu', 'block_view', 'menu-social-menu-footer');
          print render($block['content']);
        ?>
      </div>
    </div>

</footer>
<?php endif; ?>
<?php


// save rtf document
$rtf->save('sites/all/themes/bootstrapDs/rtf/samples/generated/lqreport-'.$result_id.'.rtf');



?>