<table border="0" cellpadding="0" cellspacing="0" style="width:800px;margin-top:1em;height: 170px;" class="template-container newsletter-container newsletter-footer">
  <tbody>
    <tr>
      <?php
        global $base_url;
        $bg_path =  $base_url . "/sites/default/files/ds_footer_mail.png";
      ?>
      <td background="<?php print $bg_path; ?>" bgcolor="#416400" valign="top" style="background-image: url('<?php print $bg_path; ?>'); background-repeat: no-repeat; background-size: cover; padding: 0;">
        <!--[if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;">
            <v:fill type="frame" src="<?php print $bg_path; ?>" color="#416400" />
            <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
        <![endif]-->
        <div>
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 3em;margin-left: 3em;font-size: 14px;margin-bottom: 2em;" width: 800px>
            <tbody>
              <tr class="social footer-social">
                <td>
                  <span class="hidden-mobile" style="color: #ffffff;font-size: 14px;">
                    Follow us on:&nbsp;&nbsp;&nbsp;&nbsp;
                  </span>
                  <?php
                    $social = array(
                      'twitter' => array(
                        'path' => 'https://twitter.com/eu_osha',
                        'alt' => t('Twitter'),
                      ),
                      'face' => array(
                        'path' => 'https://www.facebook.com/EuropeanAgencyforSafetyandHealthatWork',
                        'alt' => t('Facebook'),
                      ),
                      'linkedin' => array(
                        'path' => 'https://www.linkedin.com/company/european-agency-for-safety-and-health-at-work',
                        'alt' => t('LinkedIn'),
                      ),
                      'youtube' => array(
                        'path' => 'https://www.youtube.com/user/EUOSHA',
                        'alt' => t('Youtube'),
                      ),
                      'flickr' => array(
                        'path' => 'https://www.flickr.com/photos/euosha/albums',
                        'alt' => t('Flickr'),
                      ),
                      'blog' => array(
                        'path' => url('tools-and-publications/blog', array(
                          'alias' => TRUE,
                          'absolute' => TRUE,
                        )
                        ),
                        'alt' => t('Blog'),
                      ),
                    );

                    foreach ($social as $name => $options) {
                      $directory = $base_url . "/sites/default/files/";

                      print l(theme('image',
                        array(
                          'path' => $directory . $name . '--green.png',
                          'width' => 20,
                          'height' => 20,
                          'alt' => $options['alt'],
                          'attributes' => array('style' => 'border:0px;height:20px;max-height:20px;width: 20px;max-width:20px;', 'class' => 'social-logo'),
                        )
                      ), $options['path'], array(
                        'attributes' => array('style' => 'color:#ffffff;text-decoration:none;', 'target' => '_blank'),
                        'html' => TRUE,
                        'external' => TRUE,
                      ));

                      print sprintf('<span class="spacing-%s">&nbsp;&nbsp;&nbsp;&nbsp;</span>', $name);
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if gte mso 9]>
          </v:textbox>
        </v:rect>
        <![endif]-->
      </td>
    </tr>

    <tr class="footer-disclaimer">
      <td>
        <p><?php echo $bottom_text; ?></p>
      </td>
    </tr>
  </tbody>
</table>
<div class="gmailfix" style="white-space:nowrap; font:15px courier; line-height:0;">
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</div>