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

 <?php 
//We have to know if this is a closed summary

$is_closed = "1";
if (isset($page['content']['system_main']['quiz_result'])){
  $number_result = key($page['content']['system_main']['quiz_result']);
}else{
  $number_result = 0;
}

if (isset($_SESSION['quiz'][25]['result_id'])==1){
  if ($_SESSION['quiz'][25]['result_id'] == $number_result){
    $is_closed = "0";
  }
}

  //We are not on the summary*****************************************
  if (isset ($page['content']['system_main']['quiz_result'])!=1  || $is_closed== 0){
  ?>


        <div class="group-left-questions">
          <!--Questions -->
          <div class="rail-select">
            <div class="select-side">
              <i class="glyphicon glyphicon-menu-down blue"></i>
            </div>
            <select name="" id="filter-questions">
              <option id="all-questions" class="all-questions" value="0">All Questions</option>
              <option id="skipped-questions" class="skipped-questions" value="1">Skipped Questions Only</option>
            </select>
          </div>


          <?php
          global $base_url;  
  
          if (isset($_SESSION['quiz'][25]['result_id'])){
            $quizresult =$_SESSION['quiz'][25]['result_id'];
          }else{
            if (isset($_SESSION['quiz'][25])!=1){
              $quizresult = 0;
            }
            else
            { 
              $quizresult =$_SESSION['quiz']['temp']['result_id'];
            }
          }
          
          //Get all the menus
          $nodoquiz = node_load(25);
          $quiz_vid = $nodoquiz->vid;
          //All the answer that can be answered (If a question is skiped by the workflow the field is_skipped=2)
          $sql="select distinct child_nid,field_group_value, number, is_skipped, answer_timestamp from quiz_node_relationship a, quiz_node_results_answers b, field_data_field_group c where parent_nid=25 and a.parent_vid=".$quiz_vid." and a.child_nid  = b.question_nid and c.entity_id = child_nid and b.result_id = " . $quizresult . " and is_skipped<>2 order by number asc";
         
          $query = db_query($sql);
          $cont =0;
          $ans_res = 0;
          $ans_ski = 0;

         //We will fill one array for each group. Then we will print them on three diferent groups.
          $array1 = array();
          $array2 = array();
          $array3 = array();
          $menu_item_pen ="";   
          $cur_que = $_SESSION['quiz'][25]['current'];
          $no_menu_item_pen =0;

          foreach($query as $item) {
           
            $menu_item = '';
            
            if ($item->is_skipped == 1) {
              $menu_url = $base_url."/node/25/take/" . $item->number;
              $nodo = node_load($item->child_nid);
              $menu_item = '<li class="skipped"> <a href="'.$menu_url.'">'.$nodo->title.'</a></li>';
              $ans_ski = $ans_ski +1;
              $max_que = $item->number;
              $menu_item_pen ="";
            }elseif ($item->answer_timestamp != null){
              $menu_url = $base_url."/node/25/take/" . $item->number;
              $nodo = node_load($item->child_nid);
              $menu_item = '<li class="answered"> <a href="'.$menu_url.'">'.$nodo->title.'</a></li>';
              $ans_res = $ans_res +1;
              $max_que = $item->number;
              $menu_item_pen ="";
            }elseif ($item->answer_timestamp == null && $menu_item_pen ==""){
              //First pending answer  
              $menu_url = $base_url."/node/25/take/" . $item->number;
              $nodo = node_load($item->child_nid);
              $menu_item_pen = '<li class="pending"> <a href="'.$menu_url.'">'.$nodo->title.'</a></li>';
              $menu_item_pen_group =$item->field_group_value;

              if ($item->number<36){
                $_SESSION['quiz'][25]['next_question'] = $item->number;
              }else{
                $_SESSION['quiz'][25]['next_question'] = 37;
                $menu_item_pen ="";
              }

              if($cur_que == 1 && $item->number <5){
                $no_menu_item_pen = 1;              
              }
            }

            
            //Add each item to the corresponding group  
            if ($menu_item != ''){
              if ($item->field_group_value==1){
                $array1[] = $menu_item;  
              }
            
              if ($item->field_group_value==2){
                $array2[] = $menu_item;  
              }   

              if ($item->field_group_value==3){
                $array3[] = $menu_item;  
              }
            }
 
          }
          
         //Add the next pending answer to the corresponding group 
         if ($menu_item_pen != '' && $no_menu_item_pen == 0){
            if ($menu_item_pen_group==1){
              $array1[] = $menu_item_pen;  
            }
            
            if ($menu_item_pen_group==2){
              $array2[] = $menu_item_pen;  
            }   

            if ($menu_item_pen_group==3){
              $array3[] = $menu_item_pen;  
            }
          }
            
          //Get the group to expand
          if (isset($_SESSION['quiz'][25]['current'])==1){
            $cur_que = $_SESSION['quiz'][25]['current'];
          }else{
            $cur_que = 1;
          }

          $g1_in ="";
          $current1="";
          $g2_in ="";
          $current2="";
          $g3_in ="";
          $current3="";

          if ($cur_que<13){//Group 1
            $g1_in ="in";
            $current1 = "current";
            
          }
          elseif ($cur_que<25){//Group 2
            $g2_in ="in";
            $current2 = "current";
            
          }else{//Group 3
            $g3_in ="in";
            $current3 = "current";
          }

          //We have the 3 arrays with all the question, so we will print the menu
          ?>
          <ul id="accordion1" class="nav nav-stacked questions-summary">
          
          <!--Group1 *********************-->
          <li class="panel">
            <a class="<?php print $current1;?>" data-toggle="collapse" data-parent="#accordion1" href="#firstLink"><?php print t("1. Use, handling and storage of dangerous substances");?></a>
          
          <ul id="firstLink" class="collapse <?php print ($g1_in);?>">
          <?php
          foreach($array1 as $item) {          
             print($item); 
          }
          ?>
          </li>
          </ul>
          
          <!--Group2 *********************-->
          <li class="panel">
            <a class="<?php print $current2;?>" data-toggle="collapse" data-parent="#accordion1" href="#secondLink"><?php print t("2. Your current practices and routines");?></a>
            <ul id="secondLink" class="collapse <?php print ($g2_in);?>">
          <?php
          foreach($array2 as $item) {          
             print($item); 
          }
          ?>
          </li>
          </ul>

          <!--Group3 *********************-->
          <li class="panel">
            <a class="<?php print $current3;?>" data-toggle="collapse" data-parent="#accordion1" href="#thirdLink"><?php print t("3. Your measures");?></a>
            <ul id="thirdLink" class="collapse <?php print ($g3_in);?>">
          <?php
          foreach($array3 as $item) {          
             print($item); 
          }
          ?>
         </li>
          </ul>
          <!-- end Questions -->

        </div>
        <!-- Legend -->
        <div class="content-legend">
          <span class="legend">Legend:</span>

          <ul class="questions">
            <li class="answered">
              <?php print t("Answered ");?>
            </li>
            <li class="pending">
              <?php print t("Not answered ");?>
            </li>
            <li class="skipped"> 
            <?php print t("Skipped");?>
            </li>
        </ul></div>

       <?php
       $report_class="";
       $sumary_link = "#";
       $sumary_class ="";
       if (isset($_SESSION['quiz'][25]['next_question'])==1){
          if ($_SESSION['quiz'][25]['next_question']<13){
            $sumary_link ="#";
            $sumary_class="class='disabled'";
            $report_class="disabled";

          }else{
            $sumary_class="";
            $number_result = $_SESSION['quiz'][25]['result_id'];
            $sumary_link= "/node/25/quiz-results/".$number_result."/view";
            $report_class="";
          }
       }
       
       ?> 
      <div class="content-summary">
        <a href="<?php print $sumary_link;?>" <?php print $sumary_class;?>> > <?php print t("Summary")?></a>
      </div>

        <div class="content-print-download">
        <ul class="print-download">
          <li class="save">
            <a href="#">&gt; <?php print t("Save and continue later") ?></a>
          </li>
          <li class="print <?php print $report_class?>" <?php print $sumary_class;?>>
            <a href="#" class="<?php print $report_class?>">&gt; <?php print t("View the checklist")?> </a>
          </li>
          <li class="download <?php print $report_class?>" <?php print $sumary_class;?>>
            <a href="#" class="<?php print $report_class?>">&gt; <?php print t("View the Recomendations")?></a>
          </li>
          
      </ul></div>

     



        <!-- end Legend -->
        </div>
 <?php }
  else{
    print ("</div>");
  }  
 ?>       
<!--/Left menu******************************************************************************************************************************************************************-->
<!--*****************************************CONTENT*************************************************************************************************************************-->
     <div class="col-md-6">
        <?php 
        
        //We are on the summary 
        if (isset ($page['content']['system_main']['quiz_result'])==1){
          //$max_que = 37;
          $number_result = key($page['content']['system_main']['quiz_result']);
          $header_text = t("End of assessment");
          $next_que  ="";
          
          
          if (isset($_SESSION['quiz'][25]['result_id'])==1){
            if ($_SESSION['quiz'][25]['result_id'] == $number_result){
              $next_que =$_SESSION['quiz'][25]['next_question'];
              $header_text = t("Partial summary");
            }
          }
          

        ?>
          
          <div class="question-header">
            <div class="title-header"><?php print $header_text ?></div>
            <div class="percent"></div>
          </div>
          <?php
          //Create the questions summary

           
           print ('<div class="quiz-question-multichoice-summary form-wrapper form-group">');
           print '<div class="question-body">';
           print '<div class="title-body">Summary</div>';
           print (quiz_calculate_risk("summary",$number_result,$next_que));
           
           print("</div>");
          //Print the buttons of the final report   
        ?>
            <div class="content-print-download final-summary">
            <ul class="print-download">
          
          <li class="print">
            <a href="">&gt; <?php print t("View the checklist")?> </a>
          </li>
          <li class="download">
            <a href="">&gt; <?php print t("View the Recomendations")?></a>
          </li>
          </ul></div>
          </div>
          <div class="question-footer"></div>
        <?php
        }
        //We are on a question
        else
        {
          if (isset($_SESSION['quiz'][25])==1){
            $cur_que = $_SESSION['quiz'][25]['current'];
            $cur_ans = $_SESSION['quiz'][25]['result_id'];
          }else{
            $cur_que =1;
            $cur_ans ="";
          }
          if (isset ($page['content']['system_main']['body']['question']['#markup'])==1){
            $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-submit" name="op" value="Next" class="btn btn-default form-submit">Next</button>','<button type="submit" id="edit-navigation-submit" name="op" value="Next question" class="btn btn-default form-submit">'. t("NEXT") .'<br/> <span class="cont-asess">'. t("Continue the assessment") .'</span></button>',$page['content']['system_main']['body']['question']['#markup']);
          }
          if (isset($page['content']['system_main']['body'])==1){
            $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-back" name="op" value="Back" class="btn btn-default form-submit">Back</button>','', $page['content']['system_main']['body']['question']['#markup']);
          }

         //WORKFLOF****************************************************************************************************************************************
          //Question 2 get the answer of the question 1
          if ($cur_que==2){
            $sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number=1";
            $query = db_query($sql);
          
            foreach($query as $item) {
                $answer = $item->points_awarded;
               //Question 1 Yes,so we go to the question 3
                if ($answer==1){
                
                	 db_update('quiz_node_results_answers')
        			->condition('result_id', $quizresult)
        			->condition('number', 2)
        			->fields(array('is_skipped' => 2))
        			->execute();  	


                	drupal_goto("node/25/take/3");
                }
            }
          }
          
          if ($cur_que==3){
            $sql ="select number,points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (1,2) order by number";
            $query = db_query($sql);
          	
            foreach($query as $item) {
            	$number= $item->number;
                $answer = $item->points_awarded;
                //Question 1 Yes, no action.
                if ($number == 1 && $answer ==1){
                	break;
                }
               //Question 2 No,so we go to the question 1
                if ($number == 2 && $answer ==0){
                	drupal_goto("node/25/take/1");
                	break;
                }
                //Question 2 Yes,so we go to the question 4	
				if ($number == 2 && $answer ==1){
					db_update('quiz_node_results_answers')
        			->condition('result_id', $quizresult)
        			->condition('number', 3)
        			->fields(array('is_skipped' => 2))
        			->execute();  	

                	drupal_goto("node/25/take/4");
                	break;
                }

            }

          }
          


           if ($cur_que==6){

            $sql ="select sum(points_awarded) total from quiz_node_results_answers where result_id = ". $quizresult ." and number in (1,3,4,5) order by number";
			      $query = db_query($sql);
         
            foreach($query as $item) {
            	$total1345= $item->total;	
            }
          
            //Q1,Q3,Q4 and Q5 No- So not neccessary to continue the Questionnaire
            if ($total1345 ==0){

            	//For Q4 we need to check if there is some substance selected
            	$sql ="select count(c.answer_id) number_choose from quiz_node_results_answers a, quiz_multichoice_user_answers b, quiz_multichoice_user_answer_multi c where result_id = ". $quizresult ." and number = 4 and a.result_answer_id = b.result_answer_id and b.id = c.user_answer_id and c.answer_id =114";
            	$query = db_query($sql);

            	foreach($query as $item) {
            		//The option of "none of these" is selected
                
	            	if ($item->number_choose ==1){	
		            //Delete the results of this Questionnaire to able the user to start the questionnaire again
			            db_delete('quiz_node_results_answers')
    			  			->condition('result_id', $quizresult)
    			  			->execute();

    			  			db_delete('quiz_node_results')
    			  			->condition('result_id', $quizresult)
    			  			->execute();

    			  			db_delete('quiz_user_comments')
    			  			->condition('result_id', $quizresult)
    			  			->execute();

						      unset($_SESSION['quiz'][25]);
			            	
			            drupal_goto("node/62");
		           	}
            	}
            }


	            $sql ="select sum(points_awarded) total from quiz_node_results_answers where result_id = ". $quizresult ." and number in (2,5) order by number";
				      $query = db_query($sql);
	          	
	            foreach($query as $item) {
	            	$total25= $item->total;	
	            }
	            //Q2 and Q5 YES
	            if ($total25 ==2){
	            	$dont_make = array('6','7','8');
	            	db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition ('number',$dont_make, 'IN')
	        			->fields(array('is_skipped'=> 2))
	        			->execute();  	
	            	drupal_goto("node/25/take/9");
	            }

	        }

       if ($cur_que==6||$cur_que==7||$cur_que==8){
            $sql ="select number,points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (1,2) order by number";
            $query = db_query($sql);
            
            foreach($query as $item) {
              $number= $item->number;
              $answer = $item->points_awarded;
              
              //Question 2 Yes,so we go to the question 9 
             if ($number == 2 && $answer ==1){
               db_update('quiz_node_results_answers')
                ->condition('result_id', $quizresult)
                ->condition('number', 3)
                ->fields(array('is_skipped' => 2))
               ->execute();    

                  drupal_goto("node/25/take/9");
                  break;
                }

            }
      }
    
			if ($cur_que==14 || $cur_que==15){
          		$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (2) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		$answer = $item->points_awarded;
                	//If Question 2 is YES SKip Q14 and Q15 
               	 	if ($answer ==1){
               	 		$dont_make = array('14','15');
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition ('number',$dont_make, 'IN')
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/16");
                		break;
               	 	}
           		 }
           	}
           		 	
        	if ($cur_que==15){
            $resp_id = 0;
            $query = db_select('quiz_node_results_answers', 'a');
            $query->join('quiz_multichoice_user_answers', 'b', 'a.result_answer_id = b.result_answer_id');
            $query->fields('b', array('id'));
            $query->condition('result_id', $quizresult);
            $query->condition('number', 14,'=');
            $res_ans = $query->execute();

            foreach ( $res_ans as $resp) {
              $resp_id = $resp->id;
            }
              
            $query = db_select('quiz_multichoice_answers', 'a');
            $query->join('quiz_multichoice_user_answer_multi', 'b', 'a.id = b.answer_id');
            $query->fields('a', array('score_if_chosen'));
            $query->condition('user_answer_id', $resp_id);
            $res_answer = $query->execute();
            $score=0;
            foreach ($res_answer as $resp) {
              $score = $resp->score_if_chosen;
            }

            if ($score ==0){
                    db_update('quiz_node_results_answers')
                  ->condition('result_id', $quizresult)
                  ->condition('number', 15)
                  ->fields(array('is_skipped' => 2))
                  ->execute();    

                    drupal_goto("node/25/take/16");
                    break;
                  }
			}

			if ($cur_que==17){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (16) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 16 No/Skip, so we go to the question 18
               	 	if ($answer !=1){
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition('number', 17)
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/18");
                		break;
               	 	}
           		 }
			}

			if ($cur_que==20){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (19) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 19 No/Skip, so we go to the question 21
               	 	if ($answer !=1){
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition('number', 20)
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/21");
                		break;
               	 	}
           		 }
			}	

			if ($cur_que==22){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (21) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 21 No/Skip, so we go to the question 23
               	 	if ($answer ==1){
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition('number', 22)
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/23");
                		break;
               	 	}
           		 }
			}	

			if ($cur_que==26){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (25) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 25 No/Skip, so we go to the question 27
               	 	if ($answer !=1){
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition('number', 26)
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/27");
                		break;
               	 	}
           		 }
			}	

			if ($cur_que==28){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (27) order by number";
            	$query = db_query($sql);
          	  $dont_make = array('28','29');
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 27 No/Skip, so we go to the question 29
               	 	if ($answer !=1){
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition ('number',$dont_make, 'IN')
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/30");
                		break;
               	 	}
           		 }
			}

			if ($cur_que==30){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (27) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 27 is not yes break
               	 	if ($answer !=1){
                		break;
                	}else{
                		$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (29) order by number";
            			$query = db_query($sql);
          	
            			foreach($query as $item) {
            				 $answer = $item->points_awarded;
                			//Question 27 is not yes break
               	 			if ($answer !=1){
  			           	 		db_update('quiz_node_results_answers')
  			        			->condition('result_id', $quizresult)
  			        			->condition('number', 30)
  			        			->fields(array('is_skipped' => 2))
  			        			->execute();  	

               	 				drupal_goto("node/25/take/31");
                				break;
               	 			}	
               			}
               	 	}
           		 }
			}

			if ($cur_que==33){
            	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (32) order by number";
            	$query = db_query($sql);
          	
            	foreach($query as $item) {
               		 $answer = $item->points_awarded;
                	//Question 32 No/Skip, so we go to the question 34
              	 	if ($answer !=1){
	           	 		db_update('quiz_node_results_answers')
	        			->condition('result_id', $quizresult)
	        			->condition('number', 33)
	        			->fields(array('is_skipped' => 2))
	        			->execute();  	

                		drupal_goto("node/25/take/34");
                		break;
               	 	}
           		 }
			}			

      
			if ($cur_que==35||$cur_que==36){

      	$sql ="select points_awarded from quiz_node_results_answers where result_id = ". $quizresult ." and number in (34) order by number";
      	$query = db_query($sql);
    	  $dont_make = array('35','36');
      	foreach($query as $item) {
         		 $answer = $item->points_awarded;
          	//Question 34 No/Skip, so we go to the END
         	 	if ($answer !=1){
       	 		db_update('quiz_node_results_answers')
    			  ->condition('result_id', $quizresult)
    			  ->condition ('number',$dont_make, 'IN')
    			  ->fields(array('is_skipped' => 2))
    			  ->execute();  	
            $_SESSION['quiz'][25]['current'] = 37;
            header("Location:".$base_url."/node/25/take/36/feedback/"); 
          	
          	break;
         	 	}
     		 }
			}		

		//END OF WORKFLOF*********************************************************************************************************************************


          //These are the mandatory questions
          $no_skip = array('1','2','13','15','16','22','25','26','27','30','33','36');
          if (isset($page['content']['system_main']['body']['question']['#markup']) ==1){
	          if (in_array($cur_que, $no_skip)){
	            //Don't show the Skip button

	            $page['content']['system_main']['body']['question']['#markup'] = str_replace('<button type="submit" id="edit-navigation-skip" name="op" value="Leave blank" class="btn btn-default form-submit">Leave blank</button>' , '',$page['content']['system_main']['body']['question']['#markup']);
	          }
	          else
	          {
	          	$page['content']['system_main']['body']['question']['#markup'] = str_replace('Leave blank</button>' , t("Skip Question") . '</button>',$page['content']['system_main']['body']['question']['#markup']);	
	          }
          }
                    
          if (isset($page['content']['system_main']['feedback'][0]['#title'])==1){
              
              switch ($page['content']['system_main']['feedback'][0]['#title']) {
                case "Question 12":
                  $page['content']['system_main']['feedback'][0]['#title']= t("End of Block 1");
                  break;
                case "Question 24":
                  $page['content']['system_main']['feedback'][0]['#title']= t("End of Block 2");
                  break;
                case "Question 36":
                  $page['content']['system_main']['feedback'][0]['#title']= t("End of Block 3");
                  break;
              }

          }
          //Finish 
          
          if ($cur_que==37 && isset($page['content']['system_main']['feedback'])!=1){
      
            $final_message=$page['content']['system_main']['body']['question']['#markup'];
           // $final_message = str_replace('edit-navigation-submit','edit-navigation-submit-finish',$final_message);
            $final_message = str_replace('<div class="table-responsive">','<div class="table-responsive" style="display:none">',$final_message);
            $final_message = str_replace('form-type-textarea form-group">','form-type-textarea form-group" style="display:none">',$final_message);
            $final_message = str_replace('value="240" class="form-radio"','value="240" class="form-radio"  checked="checked"',$final_message);
            $final_message = str_replace('value="Finish"','value="Finish"  style="display:none"',$final_message);
            $final_message = str_replace('Leave blank and finish</button>',t("Finish") . '</button>',$final_message);
           
            $page['content']['system_main']['body']['question']['#markup'] = $final_message;

          }
         
         
          print render($page['content']); 

         } 
       
        ?>

     </div>
<!--*****************************************/CONTENT************************************************************************************************************************-->

<!--MENU DCHA*********************************************************************************************************************************************************************-->
    <?php
    
    if(isset($max_que)!=1){
      $max_que =1; 
    }
    if(isset($cur_que)==1){
      if($cur_que==37){
        $max_que =37;    
      }
    }
    ?>
    <div class="col-md-3">
<?php
 if (isset ($page['content']['system_main']['quiz_result'])!=1 || $is_closed== 0){
?>

        <div class="progress-summary-content">
          <div class="title-right-group">
            <?php print t("Progress summary")?>
          </div>
          <!--<img src="<?php print($base_url . '/' . drupal_get_path('theme', 'bootstrapDs'));?>/images/short-progress-bar-step-2.png" alt="">-->

          <progress max="36" value="<?php print($max_que) -1 ?>" class="quiz-progress"></progress>
          <div class="total-answered"><?php print $ans_res; ?> answered</div>
          <div class="total-skipped"> <?php print $ans_ski; ?> skipped</div>
           
          <div class="info-ico-right"><a href=""><img title="info" src="<?php print ($base_url . '/' . drupal_get_path('theme', 'bootstrapDs'));?>/images/info-ico-white.png" alt=""></a></div>
        </div>
     
      </div> 


  <?php } 
  else{
    print ("</div>");
  }
  ?>   
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

<?php
/*
$question_flow = array("1","2","5","14","16","19","21","25","27","29","32","34");
$next_que =$_SESSION['quiz'][25]['next_question']; 
if (in_array($cur_que,$question_flow ) &&  $next_que > $cur_que){
  drupal_set_message($message = t('If you change the answer of this question, all the answers after this question will be deleted.'), $type = 'warning', $repeat = FALSE);
}


if (isset ($_SESSION['quiz'][25]['warning'])==1){
  if ($_SESSION['quiz'][25]['warning']==TRUE){
      //drupal_set_message($message = t('If you change the answer of this question, all the answers after this question will be deleted.'), $type = 'warning', $repeat = FALSE);
      //$_SESSION['quiz'][25]['warning']=FALSE;
  }
}
*/
?>