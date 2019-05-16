<?php

/*
* This is the search implemented inside a nice
* overlay.
*
* @since 1.0.0
* @package Nothing_Personal
*/
?>
<div id="search-overlay" class="np-search-modal block">
    <div class="centered">
        <span class="jam jam-close-circle-f close-btn"></span>
        <form action="" id='top-search-form' method='get'>
            <div class="row top-xs">
                <div class="col-xs-12">
                    <input id='search-text' name='s' placeholder='<?php echo esc_attr__('Search', 'nothing-personal'); ?>'
                           type='text'/>
                </div>
                <div class="col-xs-3">
                    <button id='top-search-button' class="no-radius" type='submit'>
                        <span><?php echo esc_html__('Search', 'nothing-personal'); ?></span>
                    </button>
                </div>
            </div>



        </form>
    </div>

</div>
