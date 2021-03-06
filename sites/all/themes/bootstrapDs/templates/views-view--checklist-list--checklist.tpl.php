<?php

global $user;

$document_editor = base_path() . path_to_theme() .'/documents/Editor-manual.pptx' ;
$document_review_manager = base_path() . path_to_theme() .'/documents/Review Manager-manual.pptx' ;

?>

<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
      <div class="content-links-view-ds">
        <p class="view-link-ds back-list recommendations"><a href="recommendation-list"><?php echo t('Go to recommendations management');?></a></p>
        <p class="view-link-ds"><a href="../printpdf/201" target="_blank"><?php echo t('Checklist overview');?></a></p>
        <p class="view-link-ds recommendations user">
            <?php if ( isset($user->roles[5]) == 'Editor' && isset($user->roles[3]) != 'administrator' ): ?>
              <a href="<?php print $document_editor;?>"><?php echo t('User manual');?></a>
            <?php elseif ( isset($user->roles[11]) == 'Review Manager'): ?>
              <a href="<?php print $document_review_manager;?>"><?php echo t('User manual');?></a>
            <?php elseif ( isset($user->roles[3]) == 'administrator' ): ?>
              <a href="<?php print $document_review_manager;?>"><?php echo t('User manual');?></a>
            <?php endif; ?>
        </p>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content table-responsive">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>