<footer class="ds-footer">
    <div class="container">
      <div class="copyright">
        <span><?php print t("© 2018 EU-OSHA | an agency of the European Union");?></span>
      </div>
      <div class="footer_menu">
        <?php
          $block = module_invoke('menu', 'block_view', 'menu-footer-menu');
          $block['content'][525]['#title'] = t("Site Map");
          $block['content'][526]['#title'] = t("Contact us");
          $block['content'][527]['#title'] = t("Accessibility");
          $block['content'][528]['#title'] = t("Privacy notice");
          $block['content'][529]['#title'] = t("Legal notice");
          $block['content'][530]['#title'] = t("About the Dangerous substances e-tool");
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
  
</footer>


