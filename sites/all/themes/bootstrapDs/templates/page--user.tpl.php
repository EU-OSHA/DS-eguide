<?php global $base_url; ?>
<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/header.tpl.php');
?>

<div class="main-container">

<div class="container-fluid with-image">
<?php

  $path = current_path();

  if ($path == "user/register"){
    print '<h1 class="page-header container">Create New Account</h1>'; 
  }
  else{
    if($user->uid){
  	 	print '<h1 class="page-header container">My profile</h1>';  
  	}
    else{
  		print '<h1 class="page-header container">Login</h1>';  	 	
  	 }
  }
?>
</div>

  <div class="row no-margin">
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
	  
      <div class="container hide-tabs">
      <div class='col-md-6 user-login-css'>
        <?php print render($page['content']); ?>
       </div> 
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      <aside class="col-sm-3" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

  </div>
</div>

<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/footer.tpl.php');
?>
