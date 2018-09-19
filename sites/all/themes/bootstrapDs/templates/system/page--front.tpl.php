<meta name="description" content="<?php echo t('This dangerous substances e-tool gives an overview of the safety and health hazards associated with dangerous substances and chemical products in the workplaces. Based on your input, you will get tailored, company-specific advice.');?>" />

<?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/header.tpl.php');
?>

<div class="main-container container-fluid">
  <div class="container">
    <h1 class="title-home"><?php echo t('Dangerous Substances e-tool');?></h1>
    <h2 class="h2-subtitle"><?php echo t('Find and reduce the safety and health hazards associated with dangerous substances and chemical products in workplaces within your company.')
        ;?>
    </h2>
    <p><?php echo t('You can either start with a very short (Quick Start) questionnaire with seven questions or immediately start with a more detailed questionnaire of 36 questions. If you use the long questionnaire, you can save your answers and continue later. Once you have completed the long questionnaire, you can print a report, ‘My Chemical Guide’ that includes your answers, a to-do checklist and recommendations for good practices and measures.')
        ;?>
    </p>
   
<?php

  $nodeProd = node_load_multiple(array(), array('title' => 'Production'));
  $isProd = count($nodeProd);
  
  if ($isProd<1){
?>
<!--********************************Start of the lenguage section**************************************************************************************************-->
  <div id="langselect">
    <div id ="langheader">
      <div class="lan-sel">
        <?php print t('Select your country');?>
      </div>
      <div class="MapSC">
        <?php print t('MAP')?>
      </div>  
      <div class="ListSC">
        <?php print t('LIST')?>
      </div>  
    </div>

    <!----This is the List-->
      <div id="listText">
          <ul>
            <li class="lan-au"><a href="AT_de">Austria</a>
              <ul class="at">
                  <li class="LanHid"><a href="AT_de">German</a></li>
              </ul>
            </li>

            <li class="lan-et"><a href="et">Estonia</a>
              <ul class="ee">
                <li class="LanHid"><a href="et">Estonian</a></li>
              </ul>
            </li>
            <li class="lan-ro"><a href="ro">Romania</a>
              <ul class="ro">
                <li class="LanHid"><a href="ro">Romanian</a></li>
              </ul>
            </li>

          </ul>
       
      </div>

    <!--This is the start of the map-->  
    <div id="mapImg">
      <div id="europe_flag" title="<?php print t('European union standar version')?>">
        <a href="/dangerous-substances">
          <img class="pull-left logo-lan" alt="EU logo" src="/dangerous-substances/sites/all/themes/bootstrapDs/images/European_Union_logo.png">
          <div class="eu_version"><?php print ('EU version')?></div>
        </a>
      </div>
      
      <!--This is the map-->
      <script src="/dangerous-substances/sites/all/themes/bootstrapDs/js/manifestinteractive-jqvmap-1044285/jqvmap/jquery.vmap.js" type="text/javascript"></script>
      <script src="/dangerous-substances/sites/all/themes/bootstrapDs/js/manifestinteractive-jqvmap-1044285/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
      <script src="/dangerous-substances/sites/all/themes/bootstrapDs/js/mapOrList.js"></script>
      <link type="text/css" rel="stylesheet" href="/dangerous-substances/sites/all/themes/bootstrapDs/js/manifestinteractive-jqvmap-1044285/jqvmap/jqvmap.css" media="all">
     
      <div id="vmap"></div>
  </div>
  </div>
<!--********************************End of the lenguage section**************************************************************************************************-->
<?php
 } 
?>


  <section class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="content-home-questions">
          <?php
           global $language;
            
            $idsq =drupal_get_normal_path("my-chemical-guide","en");
            $idlq =drupal_get_normal_path("my-chemical-guide-long-questionnaire","en");
           
          
          if ($language->language=="en"){
            $idioma = "";
            $urlsh = drupal_get_path_alias($idsq,$idioma);
            $urllq = drupal_get_path_alias($idlq,$idioma);
          }else{
            $idioma = $language->language;
            $urlsh = $idioma ."/". drupal_get_path_alias($idsq,$idioma);
            $urllq = $idioma ."/". drupal_get_path_alias($idlq,$idioma);
            
          }
          
           
           
          ?>
          <div class="number-questions"><?php echo t('7 Questions');?></div>
          <div class="starnew"><a href="<?php print($urlsh);?>"><?php echo t('Quick start');?></a></div>
          <h2><?php echo t('My Chemical Guide — Quick Start');?></h2>
          <div class="text-questions">
            <?php echo t('Seven questions will address your current practices with regard to dangerous substances and chemical products. If improvements are needed, you will immediately get tips and advice on what you need to do and on how you can do it as easily and efficiently as possible.')
            ;?>
            <br><br>
            <?php echo t('When you have completed the seven questions, you may choose to continue with the longer questionnaire. This will allow a more accurate analysis of the rules applicable to the relevant chemical products and dangerous substances. You will also receive tips and advice tailored to your company on procedures for the safe handling of chemicals and good practice measures.')
            ;?>
          </div> 
        </div>
      </div>
      <div class="col-md-6">
        <div class="content-home-questions">
          <div class="number-questions prev-text">
            <span><?php echo t('36 Questions');?></span>
          </div>
          <div class="starnew"><a href="<?php print($urllq);?>"><?php echo t('Quick start');?></a></div>
          <h2><?php echo t('My Chemical Guide — long questionnaire');?></h2>
          <div class="text-questions">
            <?php echo t('The long questionnaire will allow a more accurate analysis of your current situation related to chemical products and dangerous substances. You will also receive a report, ‘My Chemical Guide’, containing your answers, a to-do checklist, recommendations and advice. In this report, the advice is tailored to the needs of your company or workplaces based on your responses. You will be informed of the procedures and good practice measures that will help you to create a safe and health working environment.')
            ;?>
          </div>
        </div> 
      </div>
    </div>
  </section>
  <section class="container">
    <p class="text-home text-center">
      <?php echo t('This dangerous substances e-tool will give you an overview of the safety and health hazards associated with dangerous substances and chemical products in the workplaces of your company. Based on your input, you will get tailored, company-specific advice on how to apply good practices and measures, and on how to follow the relevant rules and regulations. If you take the recommended action, you will effectively reduce the risks caused by dangerous substances and chemical products in your workplace.');?>
    </p>

    <?php
  
     if ($language->language=="en"){
      $idioma = "";
      $urlAbout = drupal_get_path_alias("node/2",$idioma);
      $urlGlossary =  "glossary";

     }else{
      $idioma = $language->language;
      $urlAbout = $idioma ."/". drupal_get_path_alias("node/2",$idioma);
      $urlGlossary = $idioma ."/glossary";

     }
          
    ?>

    <div class="btn-home"><a href="<?php print ($urlAbout)?>"><?php echo t('Learn more about the Dangerous substances e-tool');?></a></div>
    <div class="btn-home"><a href="<?php print ($urlGlossary)?>"><?php echo t('Glossary');?></a></div>
  </section>
   <section class="container">
    <p class="text-home text-center">
      <?php echo t('EU-OSHA is very grateful to PREVENT, Sweden, and the author of the Swedish KEMIGuiden, Ann-Beth Antonsson, for providing the KEMIGuiden as the basis for the development of EU-OSHA’s Dangerous Substances E-tool.');?>
    </p>
    <br>
    <p class="text-center">
      <a class="logo-prevent" href="http://www.prevent.se/" title="prevent" target="_blank">
          <img src="<?php print drupal_get_path('theme', 'bootstrapDs') . '/images/logo-prevent.png'; ?>" alt="<?php print t('Prevent logo'); ?>" />
      </a>
    </p>
  </section>
</div>

<?php if (!empty($page['footer'])): ?>
  <?php
  include(drupal_get_path('theme', 'bootstrapDs').'/templates/footer.tpl.php');
  ?>

<?php endif; ?>






