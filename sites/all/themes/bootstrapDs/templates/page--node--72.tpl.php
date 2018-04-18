<?php
global $base_url;
?>

<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/header.tpl.php');
?>

<div class="main-container">
  <h1 class="page-header container"><?php print t("Retrieve"); ?></h1>
  <?php
  if(isset($_GET["result_id"]) && isset($_GET["number"])){
    //Test if the number sweat with the code in the database
    if(isset($_GET["email"])){
      $_SESSION['email'] = $_GET["email"];
    }

    $query = db_select('quiz_node_results', 'que_ans');
    $query->fields('que_ans', array('retrieve_string'));
    $query->condition('result_id', $_GET["result_id"]);
    $answers = $query->execute();
     foreach ($answers as $answer) {

      if ($answer->retrieve_string == $_GET["number"]){

        if (isset($_GET["current"])){
          $current = $_GET["current"];
         }
         else{
          $current  = 1; 
        }

        $_SESSION['quiz'][25]['result_id'] = $_GET["result_id"];
        drupal_goto("node/25/take/".$current);
      }
    }
    //The verification code it's wrong
    drupal_goto("/");
  }else{
    //We redirect the user to the home page
    drupal_goto("/");
  }
  ?>
    
</div>
<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/footer.tpl.php');
?>

