<?php
/**
 * Widget Functions
 *
 * @package purdue-wp-theme
 */

include_once(ABSPATH . 'wp-admin/includes/plugin.php');


// Add theme support for selective refresh for widgets.
add_theme_support('customize-selective-refresh-widgets');

if (!function_exists('purdueBrand_widgets_init')) {
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function purdueBrand_widgets_init()
    {
        register_sidebar(array(
            'name'          => esc_html__('Right Sidebar', 'purdue'),
            'id'            => 'right-sidebar',
            'description'   => esc_html__('Widgets displayed on the right sidebar of Posts.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="title is-4">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Page Sidebar', 'purdue'),
            'id'            => 'page-sidebar',
            'description'   => esc_html__('Widgets displayed on the right sidebar of Pages.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="title is-4">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Related Content on Posts', 'purdue'),
            'id'            => 'post-related-content',
            'description'   => esc_html__('Add the related content widget here to show related content on posts.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Resources', 'purdue'),
            'id'            => 'post-resources',
            'description'   => esc_html__('Show Resources on posts.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget resources-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Page Top Alert', 'purdue'),
            'id'            => 'top-alert',
            'description'   => esc_html__('Show alert at page top.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget alert-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ));

        // check alm installed
        
        if (is_plugin_active('ajax-load-more-pro/ajax-load-more-pro.php')) {
            // register_sidebar(array(
            //     'name'          => esc_html__('Posts List on Front Page', 'purdueBrand'),
            //     'id'            => 'posts-front-page',
            //     'description'   => esc_html__('Add the Front Page Posts widget here to show a list of posts with filters on the front page.', 'purdueBrand'),
            //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
            //     'after_widget'  => '</div>',
            //     'before_title'  => '<h2>',
            //     'after_title'   => '</h2>',
            // ));
            register_sidebar(array(
                'name'          => esc_html__('Posts List on Publication Posts', 'purdueBrand'),
                'id'            => 'posts-pub-post',
                'description'   => esc_html__('Add the Publication Posts widget here to show a list of posts with filters on all publication posts.', 'purdueBrand'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2>',
                'after_title'   => '</h2>',
            ));
            register_sidebar(array(
                'name'          => esc_html__('Publications List on Department Pages', 'purdueBrand'),
                'id'            => 'pubs-dept-page',
                'description'   => esc_html__('Add the Department Publications widget here to show a list of publications related to the department on department pages.', 'purdueBrand'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2>',
                'after_title'   => '</h2>',
            ));
            register_sidebar(array(
                'name'          => esc_html__('Publications List on pub. archive Page', 'purdueBrand'),
                'id'            => 'pubs-all-page',
                'description'   => esc_html__('Add the All Publications widget here to show a list of publications on publication archive pages.', 'purdueBrand'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2>',
                'after_title'   => '</h2>',
            ));
        }
        
        //Footer widgets

        register_sidebar(array(
            'name'          => esc_html__('Footer links column 1', 'purdueBrand'),
            'id'            => 'footer-column-1',
            'description'   => esc_html__('Add a Footer Links Column widget here for the first link column on footer.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s footer__links">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Footer links column 2', 'purdueBrand'),
            'id'            => 'footer-column-2',
            'description'   => esc_html__('Add a Footer Links Column widget here for the second link column on footer.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s footer__links">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Footer links column 3', 'purdueBrand'),
            'id'            => 'footer-column-3',
            'description'   => esc_html__('Add a Footer Links Column widget here for the third link column on footer.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s footer__links">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Footer links column 4', 'purdueBrand'),
            'id'            => 'footer-column-4',
            'description'   => esc_html__('Add a Footer Links Column widget here for the fourth link column on footer.', 'purdueBrand'),
            'before_widget' => '<div id="%1$s" class="widget %2$s footer__links">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'purdueBrand_widgets_init');

if (!function_exists('register_relatedContent_widget')) {
    function register_relatedContent_widget()
    {
        register_widget('Related_Content');

        if (is_plugin_active('ajax-load-more-pro/ajax-load-more-pro.php')) {
            register_widget('Front_Page_Posts');
            register_widget('Publication_Posts');
            register_widget('Department_Publications');
            register_widget('All_Publications');
        }

        register_widget('LinksColumn_Widget');
    }
}
add_action('widgets_init', 'register_relatedContent_widget');

class Related_Content extends WP_Widget
{

    /**
     * Constructs the new widget.
     *
     * @see WP_Widget::__construct()
     */
    function __construct()
    {
        // Instantiate the parent object.
        $widget_options = array(
            'classname' => 'relatedContent_widget',
            'description' => 'This widget will add a related content section to the side of all posts.',
        );
        parent::__construct('relatedContent_widget', 'Related content Widget', $widget_options);
    }

    /**
     * The widget's HTML output.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Display arguments including before_title, after_title,
     *                        before_widget, and after_widget.
     * @param array $instance The settings for the particular instance of the widget.
     */
    function widget($args, $instance)
    {

        // Related Posts 
        global $post;
        $orig_post = $post;
        

        //By Category
        $cats = get_the_category($post->ID);
        if ($cats) {
            $cat_array = array();
            foreach ($cats as $catKey => $cat) {
                $cat_array[$catKey] = $cat->slug;
            }
        }

        $args = array(
            'post__not_in' => array($post->ID),
            'posts_per_page' => 3, // Number of related posts that will be shown.
            'orderby' => 'date',
            'order'   => 'DESC',
            'tax_query' => array(
                // 'relation' => 'OR',
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $cat_array,
                    'include_children' => false
                )
            )
        );

        $my_query = new wp_query($args);
        if ($my_query->have_posts()) {

            echo '<div class="related-content"><h2 class="related-content-header">Related Content</h2>';
            while ($my_query->have_posts()) {
                $my_query->the_post();

                echo '<a class="related-content-item media" href="';
                echo the_permalink();
                echo '">';
                if (has_post_thumbnail()) {
                    echo '<div class="media-left">';
                    echo '<figure class="image is-2by1" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID)).')">';
                    echo '</figure>';
                    echo '</div>';
                }
                echo '<div class="media-content">';

                echo the_title();
                echo '</div></a>';
            }
            echo '</div>';
        }
        $post = $orig_post;
        wp_reset_query();
    }

    /**
     * The widget update handler.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance The new instance of the widget.
     * @param array $old_instance The old instance of the widget.
     * @return array The updated instance of the widget.
     */
    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    /**
     * Output the admin widget options form HTML.
     *
     * @param array $instance The current widget settings.
     * @return string The HTML markup for the form.
     */
    function form($instance)
    {
        return '';
    }
}


if (is_plugin_active('ajax-load-more-pro/ajax-load-more-pro.php')) {
    class Front_Page_Posts extends WP_Widget
    {

        /**
         * Constructs the new widget.
         *
         * @see WP_Widget::__construct()
         */
        function __construct()
        {
            // Instantiate the parent object.
            $widget_options = array(
                'classname' => 'frontPosts_widget',
                'description' => 'This widget adds a list of all posts with category filter on the front page.',
            );
            parent::__construct('frontPosts_widget', 'Front Page Posts', $widget_options);
        }

        /**
         * The widget's HTML output.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {
            echo ('<section class="container filter-container">');
            echo do_shortcode('[ajax_load_more_filters id="category" target="my_alm_filters"]');
            echo ('</section>');

            echo ('<section class="post-container">');
            echo ('<div class="container">');
            echo do_shortcode('[ajax_load_more theme_repeater="post-list-masonry.php" id="my_alm_filters" target="category" filters="true" filters_url="false" filters_paging="false" post_type="post" posts_per_page="6" label="Load More" css_classes="post-list" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up"]');
            echo ('</div>');
            echo ('</section>');
        }

        /**
         * The widget update handler.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance The new instance of the widget.
         * @param array $old_instance The old instance of the widget.
         * @return array The updated instance of the widget.
         */
        function update($new_instance, $old_instance)
        {
            return $new_instance;
        }

        /**
         * Output the admin widget options form HTML.
         *
         * @param array $instance The current widget settings.
         * @return string The HTML markup for the form.
         */
        function form($instance)
        {
            return '';
        }
    }

    class Publication_Posts extends WP_Widget
    {

        /**
         * Constructs the new widget.
         *
         * @see WP_Widget::__construct()
         */
        function __construct()
        {
            // Instantiate the parent object.
            $widget_options = array(
                'classname' => 'pubPosts_widget',
                'description' => 'This widget adds a list of posts related to the publication on publication posts.',
            );
            parent::__construct('pubPosts_widget', 'Publication Posts', $widget_options);
        }

        /**
         * The widget's HTML output.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {

            // global $post;
            $terms = get_the_terms($post, 'pub_tax');
            $filter_terms = $terms[0]->slug;

            if ($filter_terms != '') {
                echo ('<section class="section print-publication-articles">');
                echo ('<div class="container articles-heading">');
                echo ('<h2 class="has-black-color has-text-color">' . get_the_title() . ' Articles</h2>');
                echo ('<div class="category-filter">');
                echo do_shortcode('[ajax_load_more_filters id="category2" target="ajax_load"]');
                echo ('</div>');

                echo ('</div>');
                echo ('<div class="container">');
                echo do_shortcode('[ajax_load_more id="ajax_load" theme_repeater="post-list-masonry.php" target="category2" filters="true" filters_url="false" taxonomy="pub_tax" taxonomy_terms="' . $filter_terms . '" taxonomy_operator="IN" filters_paging="false" post_type="post" posts_per_page="6" label="Load More" css_classes="post-list" transition="masonry" masonry_selector=".grid-item" masonry_animation="slide-up"]');
                echo ('</div>');
                echo ('</section>');
            } else {
            }
        }

        /**
         * The widget update handler.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance The new instance of the widget.
         * @param array $old_instance The old instance of the widget.
         * @return array The updated instance of the widget.
         */
        function update($new_instance, $old_instance)
        {
            return $new_instance;
        }

        /**
         * Output the admin widget options form HTML.
         *
         * @param array $instance The current widget settings.
         * @return string The HTML markup for the form.
         */
        function form($instance)
        {
            return '';
        }
    }

    class Department_Publications extends WP_Widget
    {

        /**
         * Constructs the new widget.
         *
         * @see WP_Widget::__construct()
         */
        function __construct()
        {
            // Instantiate the parent object.
            $widget_options = array(
                'classname' => 'deptPubs_widget',
                'description' => 'This widgets adds a list of all department publications on department pages.',
            );
            parent::__construct('deptPubs_widget', 'Department Publications', $widget_options);
        }

        /**
         * The widget's HTML output.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {
            // get the title and description from the taxonomy term settings for current post
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $title = $term->name;
            $description = $term->description;

            // get the image from the taxonomy term settings for current post.
            // $tax = $term->taxonomy;
            // $id = $tax . '_' . $term->term_id;
            // $imageUrl = '';
            // if (function_exists('get_field')) {
            //     $imageUrl = get_field('upload_hero_image', $id);
            // }


            $queried_object = get_queried_object();
            $tax = $queried_object->taxonomy;
            $tax_name = $queried_object->name;
            $tax_term = $queried_object->slug;

            echo ('<section class="post-container">');

            echo do_shortcode('[ajax_load_more theme_repeater="year-list.php" order="ASC" post_type="pub_post" taxonomy="' . $tax . '" taxonomy_terms="' . $tax_term . '" taxonomy_operator="IN" container_type="div" css_classes="container year-list" posts_per_page="6" transition_container_classes="columns is-multiline"]');

            echo ('</section>');
        }

        /**
         * The widget update handler.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance The new instance of the widget.
         * @param array $old_instance The old instance of the widget.
         * @return array The updated instance of the widget.
         */
        function update($new_instance, $old_instance)
        {
            return $new_instance;
        }

        /**
         * Output the admin widget options form HTML.
         *
         * @param array $instance The current widget settings.
         * @return string The HTML markup for the form.
         */
        function form($instance)
        {
            return '';
        }
    }
    class All_Publications extends WP_Widget
    {

        /**
         * Constructs the new widget.
         *
         * @see WP_Widget::__construct()
         */
        function __construct()
        {
            // Instantiate the parent object.
            $widget_options = array(
                'classname' => 'allPubs_widget',
                'description' => 'This widgets adds a list of all publications on publication archive pages.',
            );
            parent::__construct('allPubs_widget', 'All Publications', $widget_options);
        }

        /**
         * The widget's HTML output.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {

            echo ('<section class="post-container">');

            echo do_shortcode('[ajax_load_more theme_repeater="year-list.php" order="ASC" post_type="pub_post" container_type="div" css_classes="container year-list" posts_per_page="6" transition_container_classes="columns is-multiline"]');

            echo ('</section>');
        }

        /**
         * The widget update handler.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance The new instance of the widget.
         * @param array $old_instance The old instance of the widget.
         * @return array The updated instance of the widget.
         */
        function update($new_instance, $old_instance)
        {
            return $new_instance;
        }

        /**
         * Output the admin widget options form HTML.
         *
         * @param array $instance The current widget settings.
         * @return string The HTML markup for the form.
         */
        function form($instance)
        {
            return '';
        }
    }
}


class LinksColumn_Widget extends WP_Widget {

	/**
	 * Sets up a new Navigation Menu widget instance.
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		$widget_ops = array(
			'description'                 => __( 'Add links from navigation menu to your footer.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'linksColumn', __( 'Footer Links Column' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Navigation Menu widget instance.
	 *
	 * @since 3.0.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Navigation Menu widget instance.
	 */
	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $no = substr($args['id'], -1);
        echo $args['before_widget'];
		
		if ( $title ) {
           
			echo $args['before_title'] .'<button class="accordion__heading accordion__heading--footer" aria-expanded="true" aria-disabled="true" id="accordion'.$no.'id" aria-controls="sect'.$no.'">'. $title .'<i aria-hidden="true" class="fas fa-plus accordion__icon accordion__icon__plus"></i><i aria-hidden="true" class="fas fa-minus accordion__icon accordion__icon__minus"></i></button>'. $args['after_title'];
        }

        echo '<ul class="accordion__content--footer" id="sect'.$no.'" aria-labelledby="accordion'.$no.'id">';
		$nav_menu_args = array(
			'fallback_cb' => '',
            'menu'        => $nav_menu,
            'container'   =>false,
            'items_wrap' => '%3$s',
		);

		/**
		 * Filters the arguments for the Navigation Menu widget.
		 *
		 * @since 4.2.0
		 * @since 4.4.0 Added the `$instance` parameter.
		 *
		 * @param array    $nav_menu_args {
		 *     An array of arguments passed to wp_nav_menu() to retrieve a navigation menu.
		 *
		 *     @type callable|bool $fallback_cb Callback to fire if the menu doesn't exist. Default empty.
		 *     @type mixed         $menu        Menu ID, slug, or name.
		 * }
		 * @param WP_Term  $nav_menu      Nav menu object for the current menu.
		 * @param array    $args          Display arguments for the current widget.
		 * @param array    $instance      Array of settings for the current widget.
		 */
		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
        echo '</ul>';
        echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Navigation Menu widget instance.
	 *
	 * @since 3.0.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}

	/**
	 * Outputs the settings form for the Navigation Menu widget.
	 *
	 * @since 3.0.0
	 *
	 * @param array $instance Current settings.
	 * @global WP_Customize_Manager $wp_customize
	 */
	public function form( $instance ) {
		global $wp_customize;
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus();

		$empty_menus_style     = '';
		$not_empty_menus_style = '';
		if ( empty( $menus ) ) {
			$empty_menus_style = ' style="display:none" ';
		} else {
			$not_empty_menus_style = ' style="display:none" ';
		}

		$nav_menu_style = '';
		if ( ! $nav_menu ) {
			$nav_menu_style = 'display: none;';
		}

		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
			<?php
			if ( $wp_customize instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}

			/* translators: %s: URL to create a new menu. */
			printf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) );
			?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
					<button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}
}
