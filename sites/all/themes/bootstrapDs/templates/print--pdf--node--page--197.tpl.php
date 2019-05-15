<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $head; ?>
    <base href='<?php print $url ?>' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php print $print_title; ?></title>
    <?php print $scripts; ?>
    <?php if (isset($sendtoprinter)) print $sendtoprinter; ?>
    <?php print $robots_meta; ?>
    <?php 
    global $language;

    if (theme_get_setting('toggle_favicon')): ?>
      <link rel='shortcut icon' href='<?php print theme_get_setting('favicon') ?>' type='image/x-icon' />
    <?php endif; ?>
    <style>
      header{
        margin-left: -50px;
        height: 150px;
      }

     
      body{
        font-family: 'Dejavu Sans', sans-serif;
        margin-top: -50px!important;
        text-decoration: none;
      }

     
      h1{
        color:#749b00;
      }

      strong {
        font-weight: bold;
      }

      .page-header{
        font-weight: 300!important;
        font-size: 2.6em;
        padding-left: 0;
        margin-left: -10px;
      }

      .block-title{
        color: #003399;
        margin-top: 1em;
        font-size: 1.6em;
        text-align: left;
      }

      .q-title{
        margin-top: 1.2em;
        padding-top: 1em;
        margin-bottom: 0.2em;
        font-size: 1.5em;
        color: #749b00;
        border-top: 1px dotted  #749b00;
      }

      .q-answers{
        margin-top: 1em;
      }

      .answer-title{
        font-weight: bold;
        color:#003399;
        padding-bottom: 0.5em;
        padding-right: 5px;
      }

      .answer-text p{
          padding-left: 1em;
      }

      .main-point{
        font-weight: bold;
          padding-bottom: 3px;
          padding-left: 0em;
          border-bottom: 1px dotted;
          margin-left: 1em;
          margin-bottom: 0.5em;
      }

      .second-point{
        font-weight: bold;
        padding-top: 10px;
        padding-left: 1em;
        color:#696769;
      }
      
      .rec-text{
        padding-bottom: 0em;
        padding-left: 1em;
      }

      li.rec-text{
        padding-left: 0em;
      }

      .check-question ul{
        padding: 1em;
        margin: 0;
      }
      
      .measures{
        padding-bottom: 10px;
        display: block;
      }

      .check-question li{
        padding-left: 1em; 
        padding-bottom: 5px;
      }

      .check-question li::before {
        content: "• ";
        color: #003399;
        font-size: 16px;
      }
      
      #footer:after { content: counter(page); font-size: 22px; position: absolute; right: 5px; top: 30px }
      #footer {
        color: #3c3c3c;
        font-size: 10pt;
        bottom: 10px;
        font-style: italic;
      }
       
     .flyleaf {
        page-break-after: always;
        margin-top:-100px;
        padding:0;
      }

      .break{
        page-break-after: always;
      }
      
    </style>

</head>

<?php 
  global $language;
  $fecha_actual = date('Y-m-d');  
?>

<div class="flyleaf" width="100%"> <?php print '<img  src="'.base_path() . path_to_theme() .'/images/cover.jpg">'; ?></div>


<header  style="position: fixed;top:-60px;">
  <?php print '<img  src="'.base_path() . path_to_theme() .'/images/header-dictionary-pdf.jpg">'; ?>
</header>
<div id="footer" style="position: fixed;bottom: 10px; left: 10px; width:100%;">
  <div>
    <?php print t("My Chemical Guide - Recommendations dictionary");?>
    <span style="position:absolute;right:5px;">
      <?php print $fecha_actual; ?>
    </span>
    <br />
    https://eguides.osha.europa.eu/dangerous-substances/ 
    <span style="position:absolute;right:60px;"> <?php print t("Page");?></span>
     <br />
     <br />
  </div>
</div>


<body style="padding-top:200px;">
  <script type='text/php'>
      if ( isset($pdf) ) { 
        $font = Font_Metrics::get_font('helvetica', 'normal');
        $size = 9;
        $y = $pdf->get_height() - 24;
        $x = $pdf->get_width() - 15 - Font_Metrics::get_text_width('1/1', $font, $size);
        $pdf->page_text($x, $y, '{PAGE_NUM}/{PAGE_COUNT}', $font, $size);
      } 
    </script>
  	<?php
//Array to include all the recommendations with their nodes titles
global $base_url;
drupal_add_css ( path_to_theme() . "/css/print.css");

//These are the required recommendations
$check1 = array("10.0","1.1","1.2","1.3","1.4","2.0","3.1","3.9","4.0","5.0","5.2","5.4","6.0","7.0","8.0","9.0","64.0","28.0","28.1","28.2","15.0","16.0","17.0","18.0","19.0","20.0","21.0","38.0","39.0","40.0","3.1","3.8");
$check2 = array("36.0","41.0","43.0","44.0","45.0","47.0","54.0","48.0","49.0","42.0");
$check3 = array("58.0","51.0","60.0","61.0","62.0","62.1","62.2","62.3","63.0","37.0","64.0","55.0");

$block_title = array();
$block_title['1'] = t('Part I: Handling, use and exposure of dangerous substances');
$block_title['2'] = t('Part II: Practices and routines');
$block_title['3'] = t('Part III: Control measures to reduce the risks');


?>
<div class="main-container" style="padding-bottom: 60px;">
  <h1 class="page-header container" style="margin-top:-20px;padding-top:0;"><?php print t("Good practices and guidance"); ?></h1>
  <?php
    

    //Bloque1
    print("<div class='block-title col-md-12'>");
    print $block_title[1];
    print("</div>");

    foreach($check1 as $rec_id){
      $node_rec  = node_load_multiple(NULL, array("title" => $rec_id));
      $key_node = key($node_rec);
      if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
        $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];

      }else{
        $body_rec = "";    
        
      }
      print($body_rec);

    }
    
    print("<div class='break'></div>");
    print("&nbsp;");
    print("<div class='block-title col-md-12'>");
    print $block_title[2];
    print("</div>");

    foreach($check2 as $rec_id){
      $node_rec  = node_load_multiple(NULL, array("title" => $rec_id));
      $key_node = key($node_rec);
      if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
        $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
      }else{
        $body_rec = "";    
        
      }
      print($body_rec);

    }

    print("<div class='break'></div>");
    print("&nbsp;");
    print("<div class='block-title col-md-12'>");
    print $block_title[3];
    print("</div>");

    foreach($check3 as $rec_id){
      $node_rec  = node_load_multiple(NULL, array("title" => $rec_id));
      $key_node = key($node_rec);
      if (isset($node_rec[$key_node]->body[$language->language][0]['value'])){
        $body_rec = $node_rec[$key_node]->body[$language->language][0]['value'];
      }else{
        $body_rec = "";    
        
      }
      print($body_rec);

    }

?>  

</body>
</html>


