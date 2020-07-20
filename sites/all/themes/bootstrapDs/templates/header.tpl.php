<?php
  global $language;
            
  if ($language->language=="en"){
    $idioma = "";
     $logo_Osha = '/images/EU-OSHA.png';
  }else{
    $idioma = $language->language;
    $logo = str_replace("logo.png", "/images/" .$idioma ."_logo.jpg", $logo);
    $logo_Osha = '/images/EU-OSHA-'. $idioma . '.png';
  }
 
?>

<header>
  <div class="container ds-header">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <a class="pull-left border-right-header logo-camp" accesskey="0" href="https://healthy-workplaces.eu/" target="_blank">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
        <a class="logo-osha" href="http://osha.europa.eu" title="<?php print t('EU-OSHA corporate website')?>" target="_blank">
          <?php print '<img class="pull-left" alt="'.t("EU-OSHA logo").'" src="'.base_path() . path_to_theme() .$logo_Osha .'">'; ?>
        </a>
        <div class="border-right-header">
           <?php print '<img  class="pull-left logo-eu" alt="'.t("EU logo").'" src="'.base_path() . path_to_theme() .'/images/logo-eu.png">'; ?>
        </div>
       <div class="header-text"><?php echo t('Healthy Workplaces MANAGE DANGEROUS SUBSTANCES'); ?></div>
       <div class="content-right-header">
        <div class="print-friendly row">
          <a href="javascript:if(window.print)window.print();" title="<?php print t('Print page')?>">
            <?php print '<img alt="'.t("Print").'" src="'.base_path() . path_to_theme() .'/images/print-friendly.png">'; ?>
          </a>
        </div>
        <div class="header_top_bar">
          <div class="vertical-align">
            <?php print render($page['top_header']);?>
            <div class="content-back-login">
              <?php
              if ($user->uid==0 ){
              ?>
                <div class="login"><a href="user">Log in</a></div>
              <?php 
              }else{
              ?>
                <div class="logout"><a href="/dangerous-substances/user/logout">Log out</a></div>
              <?php
              }
              ?>
              <?php
              if (!$user->uid==0 ){
              ?>
                <div class="back-link-ds-pz"><a href="/dangerous-substances/toolkit/">Back to the Private zone</a></div>
              <?php 
              }
              ?>
            </div>
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
