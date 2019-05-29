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
    <span style="position:absolute;right:60px;"><?php print t('Page');?></span>
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
?>


<div class="main-container">
  <h1 class="page-header container"><?php print t("Short questionaire report"); ?></h1>
  <?php
  

$email = "";
if (isset($_SESSION['email'])==1){
  $email =  " - " . $_SESSION['email'];
}

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
  

<?php
//krumo ($check_toshow);
foreach ($check_toshow as $checknumber) {
  $number_key = (key($checknumber));
  
  //page break
  //print("<div class='break'></div>");
  
  print("<div class='check-question col-md-12'>");//Div for the whole question

  foreach ($checknumber[$number_key] as $checkarray) {
    $node_q = node_load($check_toshow[$number_key]['nid']);
    $qtitle = substr($node_q->title,3);

    print("<div class='q-title'>". $qtitle."</div>");
  

    print("<div class='q-answers'><span class='answer-title'>". t("Your answer").":</span>");
  

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
  
        print("</span>");
        $body_rec =  $q_answer['feedback_if_chosen']['value'];
        if (strlen($body_rec)<10){

          $nodefeed = node_load_multiple(NULL, array("title" => trim($body_rec)));
          $num_nid = key($nodefeed);
               
          if (isset($nodefeed[$num_nid]->body[$language->language][0]['value'])){
            $body_rec = $nodefeed[$num_nid]->body[$language->language][0]['value'];
          }
          else{
            //Take the default language
            $body_rec = $nodefeed[$num_nid]->body['en'][0]['value'];
          }
       
        }
      }
    }
    print("</div>");
    print("<div class='q-answers'><span class='answer-title'>".t("Measures").":</span></div>");
    print($body_rec);


    $user_comment = getcomment($result_id , $number_key);
    ?>

    <div class='q-answers'>
      <span class='answer-title'><?php print t("Comments")?>:</span>
    </div>

    <div class='comments-text'>
      <textarea rows="4" cols="50" class="comment-box" disabled><?php print(trim($user_comment));?></textarea> 
    </div>

<?php
  
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
</html>