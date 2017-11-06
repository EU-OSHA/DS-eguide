
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
    <h1 class="title-home"><?php echo t('Dangerous Substances e-tool');?></h1>
    <h2 class="h2-subtitle"><?php echo t('Find and reduce the safety and health hazards associated with dangerous substances and chemical products in workplaces within your company.')
        ;?>
    </h2>
    <p><?php echo t('You can either start with a very short (Quick Start) questionnaire with seven questions or immediately start with a more detailed questionnaire of 36 questions. If you use the long questionnaire, you can save your answers and continue later. Once you have completed the long questionnaire, you can print a report, ‘My Chemical Guide’ that includes your answers, a to-do checklist and recommendations for good practices and measures.')
        ;?>
    </p>
  </div>
  <section class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="content-home-questions">
          
          <div class="number-questions"><?php echo t('7 Questions');?></div>
          <div class="starnew"><a href="node/14/take"><?php echo t('Quick start');?></a></div>
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
          <div class="starnew"><a href="node/25/take"><?php echo t('Quick start');?></a></div>
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
    <div class="btn-home"><a href="about-the-guide"><?php echo t('Learn more about the Dangerous substances e-tool');?></a></div>
    <div class="btn-home"><a href="glossary"><?php echo t('Glossary');?></a></div>
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






