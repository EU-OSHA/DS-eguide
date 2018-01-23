<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

// replace the meta content-type tag for Drupal 7
function bootstrapDs_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

function bootstrapDs_preprocess_page(&$variables){
	
	if (isset($variables['node']->type)) { 

		$variables['theme_hook_suggestions'][] = 'page--' . $variables['node']->type; 
	}


}

function bootstrapDS_preprocess_html(&$variables) {
  // Set specific metatag description to Contact page, for avoiding
  // Google Webmaster Tools warning about duplicate description with homepage
  
  if (drupal_get_path_alias() == 'contact-us-faqs') {
    $metag = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
         'name' => 'description',
         'content' => t(' Submit your feedback to the European Agency for Safety and Health at Work'),
      ),
    );
    drupal_add_html_head($metag, 'metatag_description_0');
  }
  
}
