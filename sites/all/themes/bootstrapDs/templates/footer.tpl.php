<footer class="ds-footer">
    <div class="container">
      <div class="copyright">
        <span><?php print t("© 2018 EU-OSHA | an agency of the European Union");?></span>
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
  
</footer>


