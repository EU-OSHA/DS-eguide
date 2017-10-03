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

