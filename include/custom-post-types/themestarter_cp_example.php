<?php

/**
 * Custom Post Type : Video
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'themestarter_create_themestarter_cp_example' ) ) :
function themestarter_create_themestarter_cp_example() {

	$labels = array(
		'name'               => _x( 'Examples', 'examples', THEMESTARTER_DOMAIN ),
		'singular_name'      => _x( 'Example', 'example', THEMESTARTER_DOMAIN ),
		'menu_name'          => _x( 'Examples', THEMESTARTER_DOMAIN ),
		'add_new'            => _x( 'Ajouter', 'example', THEMESTARTER_DOMAIN ),
		'add_new_item'       => __( 'Ajouter une example', THEMESTARTER_DOMAIN ),
		'new_item'           => __( 'Nouvelle example', THEMESTARTER_DOMAIN ),
		'edit_item'          => __( 'Modifier la example', THEMESTARTER_DOMAIN ),
		'view_item'          => __( 'Voir la example', THEMESTARTER_DOMAIN ),
		'all_items'          => __( 'Toutes les examples', THEMESTARTER_DOMAIN ),
		'search_items'       => __( 'Rechercher une example', THEMESTARTER_DOMAIN ),
		'parent_item_colon'  => __( 'Examples parentes', THEMESTARTER_DOMAIN ),
		'not_found'          => __( 'Aucune example n\'a été trouvée', THEMESTARTER_DOMAIN ),
		'not_found_in_trash' => __( 'La corbeille ne contient aucune example', THEMESTARTER_DOMAIN )
	);

	$args = array(
		'labels'                => $labels,
		'hierarchical' 			=> false,
		'has_archive' 			=> true,
		'supports' 				=> array('title', 'excerpt', 'thumbnail', 'editor'),
		'public'                => true,
	);

	register_post_type(THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, $args);
	register_taxonomy_for_object_type( 'category', THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG );
}
endif; // themestarter_create_themestarter_cp_example
add_action( 'init', 'themestarter_create_themestarter_cp_example' );

if( is_admin() ) {

	if( ! function_exists( 'themestarter_examples_add_mb' ) ) {

		function themestarter_examples_add_mb() {
			add_meta_box('themestarter_example_youtube', 'URL du player YouTube', 'themestarter_print_youtube_meta_box', THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, 'normal', 'high' );
			add_meta_box('themestarter_example_reference', 'Références', 'themestarter_print_reference_meta_box', THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, 'normal', 'high' );
			add_meta_box('themestarter_example_link', 'Lien vers article sur site ASL', 'themestarter_print_link_meta_box', THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, 'normal', 'high' );
		}

		add_action( 'add_meta_boxes', 'themestarter_examples_add_mb', 10, 2 );
	}

	if( ! function_exists( 'themestarter_example_save_meta_box_data' ) ) {
		function themestarter_example_save_meta_box_data( $post_id ) {

			// If this is an autosave, our form has not been submitted, so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			// Check the user's permissions.
			if ( isset( $_POST['post_type'] ) && THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			}

			themestarter_example_save_youtube( $post_id );
			themestarter_example_save_reference( $post_id );
			themestarter_example_save_link( $post_id );

		}
		add_action( 'save_post', 'themestarter_example_save_meta_box_data' );
	}

	if( ! function_exists( 'themestarter_print_youtube_meta_box' ) ) {
		function themestarter_print_youtube_meta_box( $post ) {

			// Add a nonce field so we can check for it later.
			wp_nonce_field( THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, 'themestarter_example_youtube_nonce' );

			/*
			 * Use get_post_meta() to retrieve an existing value
			 * from the database and use the value for the form.
			 */
			$value = get_post_meta( $post->ID, '_themestarter_youtube_value', true );

			echo '<div style="margin-top: 5px; margin-bottom: 10px;">';
			echo '<strong><label for="themestarter_youtube_field" style="display: block; margin-bottom: 10px;">';
			_e( 'Lien vers le player youtube (embed) :', THEMESTARTER_DOMAIN );
			echo '</label></strong>';
			echo '<input type="text" id="themestarter_youtube_field" name="themestarter_youtube_field" value="' . esc_attr( $value ) . '" size="30" style="width: 100%;" />';
			echo '</div>';
		}
	}

	if( ! function_exists( 'themestarter_example_save_youtube' ) ) {
		function themestarter_example_save_youtube( $post_id ) {

			/*
			 * We need to verify this came from our screen and with proper authorization,
			 * because the save_post action can be triggered at other times.
			 */

			// Check if our nonce is set.
			if ( ! isset( $_POST['themestarter_example_youtube_nonce'] ) ) {
				return;
			}

			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $_POST['themestarter_example_youtube_nonce'], THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG ) ) {
				return;
			}

			/* OK, it's safe for us to save the data now. */
			
			// Make sure that it is set.
			if ( ! isset( $_POST['themestarter_youtube_field'] ) ) {
				return;
			}

			// Sanitize user input.
			$data = sanitize_text_field( $_POST['themestarter_youtube_field'] );

			// Update the meta field in the database.
			update_post_meta( $post_id, '_themestarter_youtube_value', $data );

		}
	}

	if( ! function_exists( 'themestarter_print_reference_meta_box' ) ) {
		function themestarter_print_reference_meta_box( $post ) {

			wp_nonce_field( THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, 'themestarter_example_reference_nonce' );

			$values = get_post_meta( $post->ID, '_themestarter_reference_value', false );

			if ( empty( $values ) ) {
				echo get_ref_form();
			}

		    foreach( $values as $value ) {
		    	echo get_ref_form($value);
			}

			echo '<span id="themestarter_add_reference" class="button button-secondary" style="margin: 10px;" title="Ajouter une référence">';
			echo '<span class="dashicons dashicons-plus" style="line-height: 28px; height: 28px; margin-right: 5px"></span>';
			echo 'Ajouter une référence</span>';


			echo "	<script>
				    (function($){
				        $('#themestarter_add_reference').click(function(e) {
				        	var html = '" . get_ref_form() . "'
				            $('div.themestarter_reference_div').last().after(html);
				        });
				        $('.themestarter_remove_reference').click(function(){
				            $(this).parent().parent().remove();
				        });
				    })(jQuery)
				</script>
			";

		}
	}

	function get_ref_form( $value = array() ) {

		$title   = isset( $value['title'] ) ? esc_attr( $value['title'] ) : '';
		$url     = isset( $value['url'] ) ? esc_attr( $value['url'] ) : '';

		$output  = '<div class="themestarter_reference_div" style="padding: 10px; margin: 20px; border: 3px dashed #bbb;" >';

		$output .= '	<div style="margin-top: 5px; margin-bottom: 10px;">';
		$output .= '	<strong><label for="themestarter_reference_title_field" style="display: block; margin-bottom: 10px;">';
		$output .= '	Titre de la référence :';
		$output .= '	</label></strong>';
		$output .= '	<input type="text" name="themestarter_reference_field[][title] value="' . $title . '" size="30" style="width: 100%;" />';
		$output .= '	</div>';

		$output .= '	<div style="margin-top: 5px; margin-bottom: 10px;">';
		$output .= '	<strong><label for="themestarter_reference_url_field" style="display: block; margin-bottom: 10px;">';
		$output .= '	URL de la référence :';
		$output .= '	</label></strong>';
		$output .= '	<input type="text" name="themestarter_reference_field[][url] value="' . $url . '" size="30" style="width: 100%;" />';
		$output .= '	</div>';

		$output .= '</div>';

		return $output;
	}

	if( ! function_exists( 'themestarter_example_save_reference' ) ) {
		function themestarter_example_save_reference( $post_id ) {

			/*
			 * We need to verify this came from our screen and with proper authorization,
			 * because the save_post action can be triggered at other times.
			 */

			// Check if our nonce is set.
			if ( ! isset( $_POST['themestarter_example_reference_nonce'] ) ) {
				return;
			}

			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $_POST['themestarter_example_reference_nonce'], THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG ) ) {
				return;
			}

			/* OK, it's safe for us to save the data now. */
			
			if ( isset( $_POST['themestarter_reference_title_field'] ) ) {
				$data = sanitize_text_field( $_POST['themestarter_reference_title_field'] );
				update_post_meta( $post_id, '_themestarter_reference_title', $data );
			}

			if ( isset( $_POST['themestarter_reference_url_field'] ) ) {
				$data = sanitize_text_field( $_POST['themestarter_reference_url_field'] );
				update_post_meta( $post_id, '_themestarter_reference_url', $data );
			}

		}
	}

	if( ! function_exists( 'themestarter_print_link_meta_box' ) ) {
		function themestarter_print_link_meta_box( $post ) {

			wp_nonce_field( THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG, 'themestarter_example_link_nonce' );

			$value = get_post_meta( $post->ID, '_themestarter_link_title', true );

			echo '<div style="margin-top: 5px; margin-bottom: 10px;">';
			echo '<strong><label for="themestarter_link_title_field" style="display: block; margin-bottom: 10px;">';
			_e( 'Titre de l\'article :', THEMESTARTER_DOMAIN );
			echo '</label></strong>';
			echo '<input type="text" id="themestarter_link_title_field" name="themestarter_link_title_field" value="' . esc_attr( $value ) . '" size="30" style="width: 100%;" />';
			echo '</div>';

			$value = get_post_meta( $post->ID, '_themestarter_link_url', true );

			echo '<div style="margin-top: 5px; margin-bottom: 10px;">';
			echo '<strong><label for="themestarter_link_url_field" style="display: block; margin-bottom: 10px;">';
			_e( 'URL de l\'article :', THEMESTARTER_DOMAIN );
			echo '</label></strong>';
			echo '<input type="text" id="themestarter_link_url_field" name="themestarter_link_url_field" value="' . esc_attr( $value ) . '" size="30" style="width: 100%;" />';
			echo '</div>';

		}
	}

	if( ! function_exists( 'themestarter_example_save_link' ) ) {
		function themestarter_example_save_link( $post_id ) {

			/*
			 * We need to verify this came from our screen and with proper authorization,
			 * because the save_post action can be triggered at other times.
			 */

			// Check if our nonce is set.
			if ( ! isset( $_POST['themestarter_example_link_nonce'] ) ) {
				return;
			}

			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $_POST['themestarter_example_link_nonce'], THEMESTARTER_CUSTOM_POST_EXAMPLE_SLUG ) ) {
				return;
			}

			/* OK, it's safe for us to save the data now. */
			
			if ( isset( $_POST['themestarter_link_title_field'] ) ) {
				$data = sanitize_text_field( $_POST['themestarter_link_title_field'] );
				update_post_meta( $post_id, '_themestarter_link_title', $data );
			}

			if ( isset( $_POST['themestarter_link_url_field'] ) ) {
				$data = sanitize_text_field( $_POST['themestarter_link_url_field'] );
				update_post_meta( $post_id, '_themestarter_link_url', $data );
			}

		}
	}

}


