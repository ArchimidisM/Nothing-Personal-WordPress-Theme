<?php
/**
 * Main file that registers all the widgets for the specific theme!
 *
 * @package Nothing_Personal
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Register and load the widgets
if ( ! function_exists( 'nothing_personal_load_widgets' ) ):
	/**
	 * Lets load our custom widgets
	 *
	 * @package AkisPress
	 * @since 1.0.0
	 * @see WP_Widget
	 */
	add_action( 'widgets_init', 'nothing_personal_load_widgets' );
	function nothing_personal_load_widgets() {
		register_widget( 'Nothing_Personal_Recent_Posts' );
	}

endif;

class Nothing_Personal_Recent_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'np_widget_recent_posts',
			'description'                 => esc_html__( 'Recent Posts with a twist!', 'nothing-personal' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'np-widget-recent-posts', esc_html__( 'NP: Recent Posts', 'nothing-personal' ), $widget_ops );
		$this->alt_option_name = 'np_widget_recent_posts';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		$title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$orderBy = isset( $instance['orderBy'] ) ? esc_html( $instance['orderBy'] ) : 'post_date';
		$order   = isset( $instance['order'] ) ? esc_html( $instance['order'] ) : 'DESC';

		$use_full_image   = isset( $instance['use_full_image'] ) ? $instance['use_full_image'] : false;

		$show_date   = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;
		$style       = isset( $instance['style'] ) ? $instance['style'] : 1;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		), $instance ) );

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( $r->have_posts() ):
			$counter = 1;
			while ( $r->have_posts() ): $r->the_post();
				ob_start(); ?>
                <div class="np_widget_recent_posts_type_<?php echo absint( $style ); ?>">
					<?php include( locate_template( 'tpl/widget/widget-post-tpl-'.absint($style).'.php' ) ); ?>
                </div>
				<?php echo ob_get_clean();

				$counter ++;
			endwhile;

			echo $args['after_widget'];

		endif;
		wp_reset_postdata();
	}

	public function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = sanitize_text_field( $new_instance['title'] );
		$instance['number']      = (int) $new_instance['number'];
		$instance['use_full_image']   = isset( $new_instance['use_full_image'] ) ? (bool) $new_instance['use_full_image'] : false;
		$instance['show_date']   = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
		$instance['style']       = isset( $new_instance['style'] ) ? absint( $new_instance['style'] ) : 1;

		$instance['orderBy'] = isset( $new_instance['orderBy'] ) ? esc_html( $new_instance['orderBy'] ) : 'post_date';
		$instance['order']   = isset( $new_instance['order'] ) ? esc_html( $new_instance['order'] ) : 'DESC';


		return $instance;
	}

	public function form( $instance ) {
		$title       = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number      = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$use_full_image   = isset( $instance['use_full_image'] ) ? (bool) $instance['use_full_image'] : false;
		$show_date   = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;
		$style       = isset( $instance['style'] ) ? absint( $instance['style'] ) : 1;

		$orderBy = isset( $instance['orderBy'] ) ? esc_html( $instance['orderBy'] ) : 'post_date';
		$order   = isset( $instance['order'] ) ? esc_html( $instance['order'] ) : 'DESC';
		?>


        <div class="np-tabs">
            <a class="tab-link current"
               data-tab=".tab-content-1"><?php echo esc_html__( 'Settings', 'nothing-personal' ); ?></a>
            <a class="tab-link" data-tab=".tab-content-2"><?php echo esc_html__( 'Style', 'nothing-personal' ); ?></a>
        </div>

        <div id="tab-1" class="tb-content tab-content-1 active">

            <p><?php echo esc_html__( 'These are the main settings for this widget.', 'nothing-personal' ); ?>
            <?php echo esc_html__('You are currently using the style: ','nothing-personal').'<strong>'.$style.'</strong>';?>
            </p>

            <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:','nothing-personal' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                       value="<?php echo $title; ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php echo esc_html__( 'Number of posts to show:','nothing-personal' ); ?></label>
                <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>"
                       name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1"
                       value="<?php echo $number; ?>" size="3"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderBy' ) ); ?>">
					<?php echo esc_html__( 'Order By:', 'nothing-personal' ); ?></label>
                <select name="<?php echo esc_attr( $this->get_field_name( 'orderBy' ) ); ?>"
                        id="<?php echo esc_attr( $this->get_field_id( 'orderBy' ) ); ?>" class="widefat">
                    <option value="post_date"<?php selected( $instance['orderBy'], 'post_date' ); ?>><?php echo esc_html__( 'Date (Default)', 'nothing-personal' ); ?></option>
                    <option value="title"<?php selected( $instance['orderBy'], 'title' ); ?>><?php echo esc_html__( 'Title', 'nothing-personal' ); ?></option>
                    <option value="modified"<?php selected( $instance['orderBy'], 'modified' ); ?>><?php echo esc_html__( 'Last modified', 'nothing-personal' ); ?></option>
                    <option value="rand"<?php selected( $instance['orderBy'], 'rand' ); ?>><?php echo esc_html__( 'Random', 'nothing-personal' ); ?></option>
                    <option value="comment_count"<?php selected( $instance['orderBy'], 'comment_count' ); ?>><?php echo esc_html__( 'Number of comments', 'nothing-personal' ); ?></option>
                    <option value="comment_count"<?php selected( $instance['orderBy'], 'comment_count' ); ?>><?php echo esc_html__( 'Menu Order (Custom)', 'nothing-personal' ); ?></option>
                </select>
                <small>
                    <?php echo esc_html__('For help please visit this url','nothing-personal'); ?>
                    <a href="<?php echo esc_url( 'https://documentation.akispress.com/featured-posts-widget' ); ?>" target="_blank" rel="nofollow">
						<?php echo esc_html__( 'Widgets Documentation', 'nothing-personal' ); ?></a>
                </small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
					<?php echo esc_html__( 'Order:', 'nothing-personal' ); ?></label>
                <select name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>"
                        id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" class="widefat">
                    <option value="DESC"<?php selected( $instance['order'], 'DESC' ); ?>><?php echo esc_html__( 'DESC', 'nothing-personal' ); ?></option>
                    <option value="ASC"<?php selected( $instance['order'], 'ASC' ); ?>><?php echo esc_html__( 'ASC', 'nothing-personal' ); ?></option>
                </select>
                <small>
                    <?php echo esc_html__('For help please visit this url','nothing-personal');?> <a
                            href="<?php echo esc_url( 'https://documentation.akispress.com/featured-posts-widget' ); ?>"
                            target="_blank" rel="nofollow">
						<?php echo esc_html__( 'Widgets Documentation', 'nothing-personal' ); ?></a>
                </small>
            </p>

            <p>
                <input class="checkbox" type="checkbox"<?php echo checked( $show_date ); ?>
                       id="<?php echo $this->get_field_id( 'show_date' ); ?>"
                       name="<?php echo $this->get_field_name( 'show_date' ); ?>"/>
                <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php echo esc_html__( 'Display post date?','nothing-personal' ); ?></label>
            </p>
            <p>
                <input class="checkbox" type="checkbox"<?php echo checked( $use_full_image ); ?>
                       id="<?php echo $this->get_field_id( 'use_full_image' ); ?>"
                       name="<?php echo $this->get_field_name( 'use_full_image' ); ?>"/>
                <label for="<?php echo $this->get_field_id( 'use_full_image' ); ?>"><?php echo esc_html__( 'Use full width image?','nothing-personal' ); ?></label>
                <br/><small> <?php echo esc_html__('Check this checkbox if you would like to use this widget in a place other than the sidebars. For example if you are using a
                 layout builder and use it inside a column in the post or elsewhere','nothing-personal');?></small>
            </p>

            <p>
                <input class="checkbox" type="checkbox"<?php echo checked( $show_author ); ?>
                       id="<?php echo $this->get_field_id( 'show_author' ); ?>"
                       name="<?php echo $this->get_field_name( 'show_author' ); ?>"/>
                <label for="<?php echo $this->get_field_id( 'show_author' ); ?>">
                    <?php echo esc_html__( 'Display author?','nothing-personal' ); ?></label>
            </p>
        </div>

        <div id="tab-2" class="tb-content tab-content-2">
            <p>

                <label class="label_item">

                <input class="np-radio-widget" id="<?php echo $this->get_field_id( 'style1' ); ?>"
                       name="<?php echo $this->get_field_name( 'style' ); ?>" type="radio"
                       value="1" <?php if ( $style == 1 ) {
					echo 'checked="checked"';
				} ?>  />

                    <img src="<?php echo get_template_directory_uri().'/admin-assets/widget-layouts/widget-post-layout-1.jpg';?>">
                </label>


                <label class="label_item">

                <input class="np-radio-widget" id="<?php echo $this->get_field_id( 'style2' ); ?>"
                       name="<?php echo $this->get_field_name( 'style' ); ?>" type="radio"
                       value="2" <?php if ( $style == 2 ) {
					echo 'checked="checked"';
				} ?> />
                    <img src="<?php echo get_template_directory_uri().'/admin-assets/widget-layouts/widget-post-layout-2.jpg';?>">
                </label>

                <label class="label_item">

                    <input class="np-radio-widget" id="<?php echo $this->get_field_id( 'style3' ); ?>"
                           name="<?php echo $this->get_field_name( 'style' ); ?>" type="radio"
                           value="3" <?php if ( $style == 3 ) {
			            echo 'checked="checked"';
		            } ?> />
                    <img src="<?php echo get_template_directory_uri().'/admin-assets/widget-layouts/widget-post-layout-3.jpg';?>">
                </label>


            </p>

        </div>


		<?php
	}
}