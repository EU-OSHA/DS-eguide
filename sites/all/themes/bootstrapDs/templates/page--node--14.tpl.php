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
          <div class="questions-title">All Questions</div>
          <ul class="questions">

          <?php
          global $base_url;  
          //dpm($_SESSION);
        
          if (isset($_SESSION['quiz'][14]['result_id'])){
            $quizresult =$_SESSION['quiz'][14]['result_id'];
          }else{
            $quizresult =$_SESSION['quiz']['temp']['result_id'];
          }
          //$quizresult = $_SESSION['temp']['result_id'];
          //dpm($_SESSION);
           //$sql="select distinct child_nid from quiz_node_relationship where parent_nid=14 order by weight asc;";
          $sql="select distinct child_nid, answer_timestamp from quiz_node_relationship a, quiz_node_results_answers b where parent_nid=14 and a.child_nid  = b.question_nid and b.result_id = " . $quizresult . " order by a.weight asc";
          
          $query = db_query($sql);
          $cont =0;
          $ans_res = 0;
          $ans_pen = 0;
          foreach($query as $item) {
            $cont = $cont +1;  
            $nodo = node_load($item->child_nid);
            
            if (isset ($page['content']['system_main']['quiz_result'])==1 || isset($_SESSION['quiz'][14])!=1){
                print ('<li class="answered">');  
                print ($nodo->title);

            }else{  
              if ($item->answer_timestamp == null){
                print ('<li class="pending">');   
                print ($nodo->title);
                $ans_pen = $ans_pen +1;
              }else{
                print ('<li class="answered">');  
                print ("<a href='".$base_url."/node/14/take/".$cont."'>".$nodo->title."</a>");
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
          <span class="legend">Legend:</span>
          <ul class="questions">
            <li class="answered">
              answered
            </li>
            <li class="pending">
              pending
            </li>
          
        </ul></div>
        <!-- end Legend -->
        </div>
<!--/Left menu******************************************************************************************************************************************************************-->
<!--*******************************************CONTENT*************************************************************************************************************************-->
     <div class="col-md-6">
        <?php 
        //dpm($page['content']);
        //We are on the summary 
        if (isset ($page['content']['system_main']['quiz_result'])==1){
          ?>
    
          <div class="question-header">
            <div class="title-header">Summary</div>
            <div class="percent">100% Complete</div>
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
              $feed_show = $item['feedback']['quiz_result_answer'][$number_answer]['answer_feedback']['#markup'];

              //Recortar y ver más
              print '<div class="short-and-see-more">'.$feed_show.'</div>';

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

          ?>
          
          <div class="content-print-download final-summary short">
            <ul class="print-download">
              <li class="print short">
              <a href="#">> <?php print t('View the report'); ?></a>
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
            Progress summary
          </div>
          <!--<img src="<?php print($base_url . '/' . drupal_get_path('theme', 'bootstrapDs'));?>/images/short-progress-bar-step-2.png" alt="">-->
          <progress max="7" value="<?php print($ans_res) ?>" class="quiz-progress"></progress>
          <div class="total-answered"><?php print $ans_res; ?> answered</div>
          <div class="total-pending"> <?php print $ans_pen; ?> pending</div>
          <div class="info-ico-right"><a href=""><img title="info" src="<?php print ($base_url . '/' . drupal_get_path('theme', 'bootstrapDs'));?>/images/info-ico-white.png" alt=""></a></div>
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
  <footer class="ds-footer">
    <div class="container">
      <div class="copyright">
        <span>© 2017 EU-OSHA | an agency of the European Union</span>
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