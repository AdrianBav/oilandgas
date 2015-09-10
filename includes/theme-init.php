<?php
add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):
	function my_setup() {
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// This theme uses post thumbnails
		if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 258, 165, true ); // Normal post thumbnails
			add_image_size( 'slider-post-thumbnail', 1170, 425, true ); // Slider Thumbnail
			add_image_size( 'slider-thumb', 100, 50, true ); // Slider Small Thumbnail
		}

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// custom menu support
		add_theme_support( 'menus' );
		if ( function_exists( 'register_nav_menus' ) ) {
			register_nav_menus(
				array(
					'header_menu' => theme_locals("header_menu"),
					'footer_menu' => theme_locals("footer_menu")
				)
			);
		}
	}
endif;

/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
		array( 
			'label'               => theme_locals("slides"), 
			'singular_label'      => theme_locals("slides"),
			'_builtin'            => false,
			'exclude_from_search' => true, // Exclude from Search Results
			'capability_type'     => 'page',
			'public'              => true, 
			'show_ui'             => true,
			'show_in_nav_menus'   => false,
			'rewrite' => array(
						'slug'       => 'slide-view',
						'with_front' => FALSE,
			),
			'query_var' => "slide", // This goes to the WP_Query schema
			'menu_icon' => get_template_directory_uri() . '/includes/images/icon_slides.png',
			'supports'  => array(
							'title',
							'thumbnail'
			)
		)
	);
}
add_action('init', 'my_post_type_slider');

/* Tombstones */
function my_post_type_tombstones() {
	register_post_type( 'tombstones',
		array( 
				'label'             => theme_locals("tombstones"), 
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'menu_position'     => 20,
				'menu_icon' 		=> get_template_directory_uri() . '/admin/images/tombstone.png',
				'rewrite'           => array(
					'slug'       => 'tombstones-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'page-attributes'
						)
					) 
				);
}
add_action('init', 'my_post_type_tombstones');

/* Awards */
function my_post_type_awards() {
	register_post_type( 'awards',
		array( 
				'label'             => theme_locals("awards"), 
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'menu_position'     => 21,
				'menu_icon' 		=> get_template_directory_uri() . '/admin/images/award.png',
				'rewrite'           => array(
					'slug'       => 'awards-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',						
						'editor',
						'thumbnail',
						'page-attributes'						
						)
					) 
				);
}
add_action('init', 'my_post_type_awards');

/* Affiliations */
function my_post_type_affiliations() {
	register_post_type( 'affiliations',
		array( 
				'label'             => theme_locals("affiliations"), 
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'menu_position'     => 22,
				'menu_icon' 		=> get_template_directory_uri() . '/admin/images/group.png',
				'rewrite'           => array(
					'slug'       => 'affiliations-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',						
						'editor',
						'thumbnail',
						'page-attributes'						
						)
					) 
				);
}
add_action('init', 'my_post_type_affiliations');

/* Testimonial */
function my_post_type_testi() {
	register_post_type( 'testi',
		array( 
				'label'             => theme_locals("testimonial"), 
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'menu_position'     => 23,
				'menu_icon' 		=> get_template_directory_uri() . '/admin/images/client-comment.png',
				'rewrite'           => array(
					'slug'       => 'testimonial-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'page-attributes'
						)
					) 
				);
}
add_action('init', 'my_post_type_testi');


/* Portfolio */
/* [-ab]
function my_post_type_portfolio() {
	register_post_type( 'portfolio',
		array( 
				'label'             => theme_locals("portfolio"),
				'singular_label'    => theme_locals("portfolio"),
				'_builtin'          => false,
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => true,
				'hierarchical'      => true,
				'capability_type'   => 'page',
				'menu_icon'         => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite'           => array(
					'slug'       => 'portfolio-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						'comments')
					) 
				);
	register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => theme_locals("categories"), 'singular_name' => theme_locals("category"), "rewrite" => true, "query_var" => true));
	register_taxonomy('portfolio_tag', 'portfolio', array('hierarchical' => false, 'label' => theme_locals("tags"), 'singular_name' => theme_locals("tag"), 'rewrite' => true, 'query_var' => true));
}
add_action('init', 'my_post_type_portfolio');
*/

/* Clients */
/* [-ab]
function my_post_type_clients() {
	register_post_type( 'clients',
		array( 
				'label'             => __("Clients", CURRENT_THEME), 
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'menu_position'     => 22,
				'rewrite'           => array(
					'slug'       => 'clients-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'editor')
					) 
				);
}
add_action('init', 'my_post_type_clients');
*/

/* FAQs */
/* [-ab]
function phi_post_type_faq() {
	register_post_type('faq', 
		array(
				'label'               => theme_locals("faqs"),
				'singular_label'      => theme_locals("faqs"),
				'public'              => false,
				'show_ui'             => true,
				'_builtin'            => false, // It's a custom post type, not built in
				'_edit_link'          => 'post.php?post=%d',
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'rewrite'             => array("slug" => "faq"), // Permalinks
				'query_var'           => "faq", // This goes to the WP_Query schema
				'supports'            => array('title','author','editor'),
				'menu_position'       => 23,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				)
		);
}
add_action('init', 'phi_post_type_faq');
*/

/* Our Team */
/* [-ab]
function my_post_type_team() {
	register_post_type( 'team',
		array( 
				'label'               => theme_locals("our_team"), 
				'singular_label'      => theme_locals("our_team"),
				'_builtin'            => false,
				// 'exclude_from_search' => true, // Exclude from Search Results
				'capability_type'     => 'page',
				'public'              => true, 
				'show_ui'             => true,
				'show_in_nav_menus'   => false,
				'menu_position'       => 35,
				'rewrite'             => array(
					'slug'       => 'team-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
						'thumbnail')
					) 
				);
}
add_action('init', 'my_post_type_team');
*/

/* Services */
/* [-ab]
function my_post_type_services() {
	register_post_type( 'services',
		array( 
				'label'             => theme_locals("services"), 
				'public'            => true, 
				'show_ui'           => true,
				'show_in_nav_menus' => false,
				'menu_position'     => 21,
				'rewrite'           => array(
					'slug'       => 'services-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'excerpt',
						'editor')
					) 
				);
}
add_action('init', 'my_post_type_services'); 
*/

?>