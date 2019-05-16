<div class="col-xs-12">
    <?php
    $copyrightSettings = nothing_personal_get_copyright_settings();
    if (!empty($copyrightSettings)):
        echo $copyrightSettings['text'];
    else:
        ?>
        <p>
            <?php echo  esc_html__('Created by Akisthemes.com','nothing-personal');?>
        </p>
    <?php endif; ?>
</div>