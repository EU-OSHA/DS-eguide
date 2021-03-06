<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>

 <div class="container fluid">
  <h1 class="page-header container"><?php print(t("Glossary"));?></h1>
  <p class="text-questions glossary-header"><?php print t('The definitions in Italic letters are taken from a technical, scientific or medical standard, from a legislation or a renowned encyclopaedia. The definitions or explanations in normal letters use non-specialist language and are related to the context of dangerous substances at work places')?></p>
  <div class="<?php print $classes; ?>">
  

    <div class="view-content">
    <?php //print $rows; 
      global $language;
      $terms = taxonomy_get_tree(3);

      foreach ($terms as $glossary_type) {
        $name = $glossary_type->name;
        $number = $glossary_type->tid;

        //Load the data of the glossary terms of each type

        $glossary_list = views_get_view_result('glossary_list','page',$number);        
        if (count($glossary_list) >0){  
           $name =$glossary_list[0]->field_field_type[0]['rendered']['#markup'];
          ?>
          <div class="glossary_type">
            <div class="type-name" data-toggle="collapse" data-target="#demo<?php print $number;?>">
               <span class="display-down glyphicon glyphicon-triangle-bottom"></span>
              <?php print($name)?>
            </div>
            
            <div class="content-term collapssed  collapse" id="demo<?php print $number;?>">
              <dl>
              <?php
              
              foreach ($glossary_list as $term) {
                
                $term_title = $term->field_name_field[0]['rendered']['#markup'];
                $term_desc = $term->_field_data['tid']['entity']->description;
              ?>

                <dt class="term-title">
                 <?php print $term_title; ?>
                </dt>
                <dd class="term-description">
                  <?php print $term_desc; ?>
                </dd>
              <?php
              }
              ?>
            </dl>
            </div>
          </div>

          <?php
        }  



      }


?>
    </div>
  
  </div>
</div>
