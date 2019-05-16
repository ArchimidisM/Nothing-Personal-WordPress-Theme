<?php
$desc = get_the_archive_description(); ?>
<div class="np-archive-header">
    <div class="archive-header-contents text-center">
        <h1 class="archive-title <?php echo esc_attr(!empty($desc) ? 'marg-b-25' : 'marg-b-0');?> marg-t-0">
            <?php echo get_the_archive_title();?>
        </h1>
        <?php $desc = get_the_archive_description();
        if(!empty($desc)): ?>
        <p class="archive-description">
            <?php echo $desc;?>
        </p>
        <?php endif; ?>
    </div>
</div>