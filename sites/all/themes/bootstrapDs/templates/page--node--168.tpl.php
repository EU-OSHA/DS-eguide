<?php
//Array to include all the recommendations with their nodes titles
$checks = array();

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
  <h1 class="page-header container"><?php print t("Short questionaire report"); ?></h1>
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
if (isset($_SESSION['quiz']['temp']['result_id'])==1){
  $result_id = $_SESSION['quiz']['temp']['result_id'];  
}

if ($result_id ==0 ){//Nothing to show
	print(t("There is still nothing on this Recommendation list."));  
}

$number = 0; //Number of the question
    
$check_toshow = array();
$query = db_select('quiz_node_results_answers', 'que_ans');
$query->fields('que_ans', array('is_correct','number','is_skipped','question_nid'));
$query->condition('result_id', $result_id);
$query->condition('is_skipped',2,'<');
$query->isNotNull('answer_timestamp');
$query->orderBy('number', 'ASC');
$answers = $query->execute();
      

foreach ($answers as $answer) {
    
  $number = $answer->number;
  $question_nid = $answer->question_nid;
  $is_skipped = $answer->is_skipped;
 
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
//krumo($nodefeed);
//Once we have get the number of the checlist to show, we print all of them 
?>
    
<div class='recommendation container'> <!--Closed at the end of the document-->
  <div class="content-print-download-up">
    <ul class="print-download col-md-4">
      <li class="print" >
        <a href="/dangerous-substances/printpdf/168" target="_blank" class="">&gt; <?php print t("Print to PDF")?> </a>
      </li>
      <li class="download " >
        <a href="sites/all/themes/bootstrapDs/rtf/samples/generated/sqreport-<?php print ($result_id)?>.rtf" class="">&gt; <?php print t("Print to RTF")?></a>
      </li>
      <li class="back" >
        <a href="javascript:window.history.back()" class=""><?php print t("Back")?></a>
     </li>
    </ul>
  </div>

<?php
//krumo ($check_toshow);
foreach ($check_toshow as $checknumber) {
  $number_key = (key($checknumber));
	print("<div class='check-question col-md-12'>");//Div for the whole question

  foreach ($checknumber[$number_key] as $checkarray) {
    $node_q = node_load($check_toshow[$number_key]['nid']);
	  $qtitle = substr($node_q->title,3);

	  print("<div class='q-title'>". $qtitle."</div>");
	  $sect->writeText('<b>'. $qtitle.'</b><br/>', new PHPRtfLite_Font(12, "Arial", '#749b00'), $parNormal);

	  print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span>");
	  $sect->writeText('<b>'.t("Your answer").'</b><br>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parNormal);

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
        $body_rec =  $q_answer['feedback_if_chosen']['value'];

  		}
   	}
	 	print("</div>");
    print("<div class='q-answers'><span class='answer-title'>".t("Measures").":</span></div>");
    print($body_rec);

    $sect->writeText('<b>' . t("Measures").'</b><br>', new PHPRtfLite_Font(12, "Arial", '#000000'), $parNormal);
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
     
    /*Print the comments of the questions*/
    $sect->writeText($body_rec .'<br>', new PHPRtfLite_Font(10, "Arial", '#000000'), $parSimple);  
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
	
print("</div>");//Close the recommendation div    
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
    <div class="content-print-download ">
        <ul class="print-download col-md-4">
          <li class="print" >
            <a href="/dangerous-substances/printpdf/168" target="_blank" class="">&gt; <?php print t("Print to PDF")?> </a>
          </li>
          <li class="download " >
            <a href="sites/all/themes/bootstrapDs/rtf/samples/generated/sqreport-<?php print ($result_id)?>.rtf" class="">&gt; <?php print t("Print to RTF")?></a>
          </li>
          <li class="back" >
            <a href="javascript:window.history.back()" class=""><?php print t("Back")?></a>
          </li>
          
      </ul></div>
</div>

</div><!--//Close therecommendations div-->

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
  </div>  
</footer>
<?php endif; ?>
<?php


// save rtf document
$rtf->save('sites/all/themes/bootstrapDs/rtf/samples/generated/sqreport-'.$result_id.'.rtf');



?>