<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
global $base_url;
global $language;
drupal_add_library('system', 'ui.draggable');

?>
<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/header.tpl.php');
?>

<div class="main-container">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->

  <div class="no-margin">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <section>
       <!--<div class="container">-->
        <?php if (!empty($page['highlighted'])): ?>
          <div class="highlighted jumbotron"><?php //print render($page['highlighted']); ?></div>
        <?php endif; ?>
        
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <!--<h1 class="page-header"><?php print $title; ?></h1>-->
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
      <!--</div>-->
	  
    <section class="container">

<!--Left menu*******************************************************************************************************************************************************************-->
    <div class="col-md-3">
        <div class="group-left-questions">
          <!--Questions -->
          <div class="questions-title"><?php print t('All Questions');?></div>
          <ul class="questions">

          <?php
          global $base_url;  
          
          if(!isset($_SESSION['quiz'])){
            drupal_goto("/");
          }
       
          if (isset($_SESSION['quiz'][14]['result_id'])){
            $quizresult =$_SESSION['quiz'][14]['result_id'];
          }else{
            $quizresult =$_SESSION['quiz']['temp']['result_id'];
          }
          //$quizresult = $_SESSION['temp']['result_id'];
          
           //$sql="select distinct child_nid from quiz_node_relationship where parent_nid=14 order by weight asc;";
          $sql="select distinct child_nid, answer_timestamp from quiz_node_relationship a, quiz_node_results_answers b where parent_nid=14 and a.child_nid  = b.question_nid and b.result_id = " . $quizresult . " order by a.weight asc";
          
          $query = db_query($sql);
          $cont =0;
          $ans_res = 0;
          $ans_pen = 0;
       
          if (isset($_SESSION['quiz'][14]['current'])==1){
            $cur_que = $_SESSION['quiz'][14]['current'];  
          }else{
            $cur_que = 7;
          }
         
          foreach($query as $item) {
            $cont = $cont +1;  
            $nodo = node_load($item->child_nid);


            if ($language->language!="" && $language->language!="en"){
              $lang_code = "/" . $language->language;
            }else{
              $lang_code = "";
            } 
                       
            if (isset($nodo->title_field[$language->language][0]['value'])){
            	$nodo_title =$nodo->title_field[$language->language][0]['value'];
            }
            else{
            	$nodo_title =$nodo->title;
            }

            if (isset ($page['content']['system_main']['quiz_result'])==1 || isset($_SESSION['quiz'][14])!=1){
                print ('<li class="answered">');  
                if ($cont== $cur_que){
                  print ("<p class='curque-title'>");
                  print ($nodo_title);
                  print ("</p>");
                }else{
                  print ($nodo_title);
                }

            }else{  
              if ($item->answer_timestamp == null){
                print ('<li class="pending">');   
                if ($cont== $cur_que){
                  print ("<p class='curque-title'>");
                  print ($nodo_title);
                  print ("</p>");
                }else{
                  print ($nodo_title);
                }
                
                $ans_pen = $ans_pen +1;
              }else{
                print ('<li class="answered">'); 
                print ("<a href='".$base_url. $lang_code ."/node/14/take/".$cont."'>");
                
                if ($cont== $cur_que){
                  print ("<p class='curque-title'>");
                  print ($nodo_title);
                  print ("</p>");
                }else{
                  print ($nodo_title);
                }

                print ("</a>");
                $ans_res = $ans_res +1;
              }
            }
            print ('</li">');  

          }
          ?>

          </ul>
          <!-- end Questions -->

        </div>
        <!-- Legend -->
         <div class="content-legend">
          <span class="legend"><?php print t('Legend:')?></span>
          <ul class="questions">
            <li class="answered">
              <?php print t('answered');?>
            </li>
            <li class="pending">
              <?php print t('pending');?>
            </li>
          
        </ul></div>
        <!-- end Legend -->
        </div>
<!--/Left menu******************************************************************************************************************************************************************-->
<!--*******************************************CONTENT*************************************************************************************************************************-->
     <div class="col-md-6">
        <?php 
        
        //We are on the summary 
        if (isset ($page['content']['system_main']['quiz_result'])==1){
          ?>
    
          <div class="question-header">
            <div class="title-header"><?php print t('Summary');?></div>
            <div class="percent">100% <?php print t('Complete');?></div>
          </div>
          <?php
          //Create the questions summary
          $number_result = key($page['content']['system_main']['quiz_result']);

       
         $cont_ans=1;
          foreach ($page['content']['system_main']['quiz_result'][$number_result]['questions'] as $item){
            
            ?>
            <div class="question-body summary-questions">
              <div class="title-body">
              <?php 
              $number_answer = key ($item['feedback']['quiz_result_answer']);
              //Show the title of the question
             // print $item['feedback']['quiz_result_answer'][$number_answer]['quiz_question_view_full']['body']['#object']->title;

              print $item['feedback']['quiz_result_answer'][$number_answer]['quiz_question_view_full']['#node']->title;
              ?>  
              </div>
              
              <?php 
              $rec_title = $item['feedback']['quiz_result_answer'][$number_answer]['answer_feedback']['#markup'];

              if (strlen($rec_title)<10){
                $nodefeed = node_load_multiple(NULL, array("title" => trim($rec_title)));
                $num_nid = key($nodefeed);
                     
                if (isset($nodefeed[$num_nid]->body[$language->language][0]['value'])){
                  $feedback_text['quiz_result_answer'][$number_answer]['answer_feedback']['#markup'] = $nodefeed[$num_nid]->body[$language->language][0]['value'];
                }
                else{
                  //Take the default language
                  $feedback_text['quiz_result_answer'][$number_answer]['answer_feedback']['#markup'] = $nodefeed[$num_nid]->body['en'][0]['value'];
                }
              }




              //Cut and see more
              print '<div class="short-and-see-more">'.render($feedback_text['quiz_result_answer'][$number_answer]['answer_feedback']).'</div>';

            print ("<br>");
            
          ?>
              
          </div>
            <?php
            $comment_val = "";
            $query = db_select('quiz_user_comments','quc_comment');
            $query->fields('quc_comment');
            $query->condition('result_id', $number_result);
            $query->condition('question_nid', $cont_ans);
            $comment_value = $query->execute();

            foreach ($comment_value as $comment) {
              $comment_val =  $comment->quc_comment;
            }


            if ( $comment_val != ""){
            ?>
              <div class="comment-summary">
              <span><?php print  $comment_val ;?></span>
              </div>

            <?php
            }
            ?>

            <?php
            $cont_ans = $cont_ans +1;
          }
          print "<div class='question-body summary-questions'>" . t('This is a help to get started quickly, easily and efficiently with the chemical work. The quick start contains advice and tips on some basic requirements. There are other requirements that you also need to know to take the necessary prevention measures in your company and at your work places.') . "</div>";
          print "<div class='question-body summary-questions'>" . t('After the quick start, please proceed to ') . "<a href='".$base_url."/node/25/take/"."'>" . t('My Chemical Guide') . "</a> " . t('It deals with all the necessary measures that you need for a good management of chemical products and substances. My Chemical Guide helps you to sort out what you need to do. My Chemical Guide provides tailored advice based on your company and work place specific situation.') . "</div>";

          if ($language->language!="" && $language->language!="en"){
              $lang_code = "/" . $language->language;
          }else{
              $lang_code = "";
          } 

          $reportlink = $base_url . $lang_code . "/node/168";
        ?>

           <div class="content-print-download final-summary short">
            <ul class="print-download">
              <li class="print short">
              <a href="<?php print ($reportlink)?>"> <?php print t('View the report'); ?></a>
              </li>
            </ul>
          </div>

          <div class="question-footer"></div>

          <?php
           
        }
        //We are on a question
        else
        {
          if (isset($page['content']['system_main']['actions'])){
            $page['content']['system_main']['actions']['next']['#attributes'] = array('class' => array('two-lines'));
            $page['content']['system_main']['actions']['next']['#value'] = t("NEXT") .'<br/> <span class="cont-asess">'. t("Continue the assessment") .'</span>';   
          }

          
          //Remove the previous button
          if (isset($page['content']['system_main']['body']['question']['#markup'])){
          $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button id="edit-navigation-back" class="btn btn-default form-submit" type="submit" name="op" value="Back">BACK</button>',"", $page['content']['system_main']['body']['question']['#markup']);

          $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-back" name="op" value="Back" class="btn btn-default form-submit">Back</button>','', $page['content']['system_main']['body']['question']['#markup']);


          $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-submit" name="op" value="Next" class="btn btn-default form-submit">NEXT</button>','<button type="submit" id="edit-navigation-submit" name="op" value="Next" class="btn btn-default form-submit">'. t("NEXT") .
            '<br/> <span class="cont-asess">'. t("Continue the assessment") .'</span></button>',$page['content']['system_main']['body']['question']['#markup']);

          $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-submit" name="op" value="Next" class="btn btn-default form-submit">Next</button>','<button type="submit" id="edit-navigation-submit" name="op" value="Next question" class="btn btn-default form-submit two-lines">'. t("NEXT").
            '<br/> <span class="cont-asess">'. t("Continue the assessment") .'</span></button>',$page['content']['system_main']['body']['question']['#markup']);

          $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-submit" name="op" value="Finish" class="btn btn-default form-submit">Finish</button>','<button type="submit" id="edit-navigation-submit" name="op" value="Finish" class="btn btn-default form-submit finish">'. t("FINISH") .'</button>',$page['content']['system_main']['body']['question']['#markup']);

          }
          print render($page['content']);
          
         } 
       
        ?>

     </div>
<!--*****************************************/CONTENT************************************************************************************************************************-->

<!--MENU DCHA*********************************************************************************************************************************************************************-->
    <?php
    //We are on the summary 
    if (isset ($page['content']['system_main']['quiz_result'])==1){
      $ans_res = 7;
      $ans_pen = 0;
    }else{
      if (isset($_SESSION['quiz'][14]['current'])==1){
        $cur_que = $_SESSION['quiz'][14]['current'];  
     }else{
        $cur_que = 7;
     }
      
    }
   
    if (isset($page['content']['system_main']['actions']['finish'])==1){
     $ans_res = 7;
      $ans_pen = 0;
    } 

    ?>
    <div class="col-md-3">
        <div class="progress-summary-content">
          <div class="title-right-group">
            <?php print (t("Progress summary")); ?>
          </div>
          <!--<img src="<?php print($base_url . '/' . drupal_get_path('theme', 'bootstrapDs'));?>/images/short-progress-bar-step-2.png" alt="">-->
          <progress max="7" value="<?php print($ans_res) ?>" class="quiz-progress"></progress>
          <div class="total-answered"><?php print $ans_res; ?> <?php print t('answered')?></div>
          <div class="total-pending"> <?php print $ans_pen; ?> <?php print t('pending')?></div>
          <div class="info-ico-right"><a href="javascript:barInfo();"><img title="<?php print t('info')?>" src="<?php print ($base_url . '/' . drupal_get_path('theme', 'bootstrapDs'));?>/images/info-ico-white.png" alt=""></a></div>
        </div>
         <div id="barInfoDiv" style="display: none;" class="col-md-11">
        <div class="closebarInfo">
        <img src="/dangerous-substances/sites/all/themes/bootstrapDs/images/closeMoreinfo.png" alt="close">
        </div>
        <div class="contentBarInfo">
        <p><?php print (t("This graph shows which share of all questions you already completed. If you skip questions to answer them later, the progress bar will change.")); ?></p>
        </div>
        </div>
      </div> 
<!--MENU DCHA********************************************************************************************************************************************************************-->

    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<?php if (!empty($page['footer'])): ?>
  <?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/footer.tpl.php');
  ?>
<?php endif;?>

<script type="text/javascript">
function barInfo() {
 
    jQuery("#barInfoDiv").slideDown("fast",function() {
    jQuery("#barInfoDiv").attr("style","display: block !important;");
    
    });
  }

  jQuery(".closebarInfo").click(function() {
    jQuery("#barInfoDiv").slideUp("fast",function() {
    });
  });
</script>