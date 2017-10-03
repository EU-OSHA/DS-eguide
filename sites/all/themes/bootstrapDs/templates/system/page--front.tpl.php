


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



<div class="main-container container-fluid">
  <div class="container">
    <h1 class="title-home"><?php echo t('Find and reduce the safety and health hazards from dangerous substances and chemical products at the workplaces in your company.');?></h1>
    <p><?php echo t('You can decide to start with a very short questionnaire (Quick Start) with seven questions or immediately start with a more detailed questionnaire of 36 questions.
                      (My Chemical Guide). If you use the long questionnaire you can save your answers and continue later. 
                      You will also be able to print a report including your answers, a checklist about To-Do’s and recommendations for good practices and measures.  ')
        ;?>
    </p>
    <br>
  </div>
  <section class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="content-home-questions">
          <h2><?php echo t('Quick Start');?></h2>
          <div class="number-questions"><?php echo t('7 Questions');?></div>
          <div class="text-questions">
            <?php echo t('Seven questions will prompt you to answers about your current practices with dangerous substances 
                          and chemical products. If improvements are needed, you immediately get tips and advice on what you need to do and 
                          how you can do it as easily and efficiently as possible.')
            ;?>
            <br><br>
            <?php echo t('When you´re done with the seven questions, you can also continue with the longer questionnaire. 
                          This will help you with a more accurate analysis of the rules applicable to the chemical products and dangerous substances. 
                          You will also receive tips and advice tailored to your company regarding procedures for safe chemical handling and good practice measures.')
            ;?>
          </div>
          <div class="starnew"><a href="node/14/take"><?php echo t('Start new');?></a></div> 
        </div>
      </div>
      <div class="col-md-6">
        <div class="content-home-questions">
          <h2><?php echo t('My Chemical Guide');?></h2>
          <div class="number-questions prev-text">
            <span><?php echo t('36 Questions');?></span>
          </div>
          <div class="text-questions">
            <?php echo t('The long questionnaire will help you with a more accurate analysis of your current situation related to chemical products and dangerous substances. You will also receive a report containing your answers, To-Do’s, recommendations and advice.  In this report the advice is tailored to the needs of your company or work places based on your responses.  
                          You will be informed about procedures and good practice measures that help you to create a good and safe chemical work environment.')
            ;?>
             <br><br> <br><br><br>
          </div>
          <div class="starnew"><a href="node/25/take"><?php echo t('Start new');?></a></div>
        </div> 
      </div>
    </div>
  </section>
  <section class="container">
    <div class="btn-home"><a href="/about-the-guide"><?php echo t('Learn more about the Dangerous substances e-tool');?></a></div>
    <div class="btn-home"><a href=""><?php echo t('Glossary');?></a></div>
  </section>
   <section class="container">
    <p class="text-home text-center">
      <?php echo t('EU-OSHA is very grateful to PREVENT, Sweden, and the author of the Swedish KEMIGuiden, Ann-Beth Antonsson, 
        for providing the KEMIGuiden as the basis for the development of ‘My Chemical Guide’.');?>
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






