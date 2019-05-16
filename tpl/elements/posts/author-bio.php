<?php
/**
 * Gets the author bio
 * @since 1.0.0
 * @package Nothing_Personal
 */
$authorObj = nothing_personal_get_author_meta();
?>
<div class="np-author-bio">
    <div class="row">
        <div class="col-sm-1 col-xs-0">
            <img class="author-image img-responsive" src="<?php echo esc_url(get_avatar_url($authorObj['id'],
                array('size' => 64))); ?>"
                 alt="<?php echo esc_attr($authorObj['display_name']); ?>"/>
        </div>

        <div class="col-sm-11 col-xs-12">
            <div class="np-author-name marg-b-10">
                <?php echo esc_html($authorObj['authorName']) ?>
            </div>
            <div class="author-bio">
                <?php echo esc_html($authorObj['user_description']); ?>
            </div>
        </div>
    </div>
</div>
