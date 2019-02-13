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
      }

      .block-title{
        color: #003399;
        margin-top: 1em;
        font-size: 1.6em;
        text-align: left;
      }

      .q-title{
        margin-top: 1.2em;
        padding-top: 1em;
        margin-bottom: 0.2em;
        font-size: 1.5em;
        color: #749b00;
        border-top: 1px dotted  #749b00;
      }

      .q-answers{
        margin-top: 1em;
      }

      .answer-title{
        font-weight: bold;
        color:#003399;
        padding-bottom: 0.5em;
        padding-right: 5px;
      }

      .answer-text p{
          padding-left: 1em;
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

      .check-question ul{
        padding: 1em;
        margin: 0;
      }
      
      .measures{
        padding-bottom: 10px;
        display: block;
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
      
      #footer:after { content: counter(page); font-size: 22px; position: absolute; right: 23px; top: 26px }
      #footer {
        color: #3c3c3c;
        font-size: 10pt;
        bottom: 10px;
        font-style: italic;
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
global $language;
$fecha_actual = date('Y-m-d');  

$email = "";
if (isset($_SESSION['email'])==1){
  $email =  " - " . $_SESSION['email'];
}

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
    https://eguides.osha.europa.eu/dangerous-substances/ <?php print $email ?>
    <span style="position:absolute;right:60px;">Page</span>
     <br />
     <br />
  </div>
</div>


  <body style="padding-top:200px;">
  <script type='text/php'>
      if ( isset($pdf) ) { 
        $font = Font_Metrics::get_font('helvetica', 'normal');
        $size = 9;
        $y = $pdf->get_height() - 24;
        $x = $pdf->get_width() - 15 - Font_Metrics::get_text_width('1/1', $font, $size);
        $pdf->page_text($x, $y, '{PAGE_NUM}/{PAGE_COUNT}', $font, $size);
      } 
    </script>
  	<?php
//Array to include all the recommendations with their nodes titles
global $base_url;
drupal_add_css ( path_to_theme() . "/css/print.css");

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


?>
<div class="main-container" style="padding-bottom: 60px;">
  <h1 class="page-header container" style="margin-top:-40px;padding-top:0;"><?php print t("Good practices and guidance"); ?></h1>
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
      return false;
    }else
    $dont_get = array(1,2,33,34);
    $dont_get_bycountry = array(1,9,21,22,23,24);//Question with empty recommendations for the moment in English version

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

   	
    foreach ($check_toshow as $checknumber) {
    	$number_key = (key($checknumber));
	    
	    $check_toshow[$number_key]['measures_printed'] = false;

	    if ($number_key<12 and $title1_printed == false){
	   		print("<div class='block-title col-md-12'>");
	   	    print $block_title[1];
	      	print("</div>");
	   		$title1_printed = true;
	   	}

	   	if ($number_key>12 and $number_key<24 and $title2_printed == false){
        print("<div class='break'></div>");
	   		print("<div class='block-title col-md-12'>");
	   	  print $block_title[2];
	      print("</div>");
	   		$title2_printed = true;
        print ('<div class="check-question col-md-12"><div class="q-title">'.t("Introduction").'</div>');
        $node_rec  = node_load_multiple(NULL, array("title" => "35.0"));
        $key_node = key($node_rec);
        if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
          $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
        }else{
          $body_rec = "";   
        }
        print($body_rec."</div>");
		}
	  
	   	if ($number_key>24 and $title3_printed == false){
        print("<div class='break'></div>");
	   		print("<div class='block-title col-md-12'>");
	   	  print $block_title[3];
	   	  print("</div>");	
	   		$title3_printed = true;
        print ('<div class="check-question col-md-12"><div class="q-title">'.t("Introduction").'</div>');
        $node_rec  = node_load_multiple(NULL, array("title" => "57.0"));
        $key_node = key($node_rec);
        if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
          $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
        }else{
          $body_rec = "";   
        }
        print($body_rec."</div>");
	   	}

	    print("<div class='check-question col-md-12'>");//Div for the whole question
            foreach ($checknumber[$number_key] as $checkarray) {
	        if (isset($checks[$number_key][$checkarray])){
	        	$node_q = node_load($check_toshow[$number_key]['nid']);
	        	$qtitle = $node_q->title;

	        	print("<div class='q-title'>" . $qtitle."</div>");
	        	print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span>");
	        	
	        	if ($checkarray=="skipped"){
					print("<span class='answer-text skipped'>");
	        		print(t('Do not know / Reply later'));
	        		print("</span>");	        		
	        	}

	        	foreach ($node_q->alternatives as $q_answer) {
	        		
	        		if ($checkarray == $q_answer['id']){
	        			
	        			$answer_text = $q_answer['answer']['value'];
	        			$answer_text = str_replace('<?php print t("', '',$answer_text);
	        			$answer_text = str_replace('");?>', '',$answer_text);
                $answer_text = str_replace('<p>', '',$answer_text);
                $answer_text = str_replace('</p>', '',$answer_text);
						print("<span class='answer-text'>");
	        			print(t($answer_text));
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
                  		print("<div class='q-answers'><span class='answer-title measures'>".t("Measures").":</span></div>");
                 		$check_toshow[$number_key][$key_node]['measures_printed'] = true;
                 		$print_title = false;
                 	}
                 	print($body_rec);
	            }
                /*Print the comments of the questions*/
             	//$user_comment = //getcomment($result_id , $number_key);
                $user_comment = getcomment_print($result_id , $number_key);
             	?>

              	<div class='q-answers'>
              		<span class='answer-title'><?php print t("Comments");?>:</span>
              	</div>

              	<p>
              	<?php print($user_comment);?>
               </p> 



<?php
	        }  
	    }         

}
}

function getcomment_print($result_id , $question_nid){
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

</body>
</html>


